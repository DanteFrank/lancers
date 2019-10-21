<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Client;
use App\State;
use App\Country;
use App\Project;
use App\Invoice;
use App\Estimate;
use App\Currency;
use Mail;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Resources\Estimate as EstimateResource;
use App\Http\Resources\EstimateCollection;
use Illuminate\Support\Facades\Auth;

class EstimateController extends Controller
{
    public function step1(Request $request){
        $projects = Project::where('user_id', Auth::user()->id)->select('id', 'title')->get();
        return view('estimate.step1')->withProjects($projects);
    }

    public function step2(Request $request){
        $project = '';
        $currencies = Currency::all('id', 'code');

        if($request->old_project && $request->new_project) $project = ['type'=>'new', 'project'=>$request->new_project];
        elseif($request->old_project) $project = ['type'=>'old', 'project'=>$request->old_project];
        elseif($request->new_project) $project = ['type'=>'new', 'project'=>$request->new_project];

        if($project == '') return back()->with('error', 'Please specify either an old or new project');
        if($project['type'] == 'old') $project['project'] = Project::whereId($project['project'])->first()->title;

        session(['project'=>$project]);
        return view('estimate.step2')->withProject($project['project'])->withCurrencies($currencies);
    }

    public function step3(Request $request){
        $estimate = $request->all();
        $clients = Client::where('user_id', Auth::user()->id)->select('id', 'name')->get();
        session(['estimate'=>$estimate]);

        return view('estimate.step3')->withClients($clients);
    }

    public function step4(Request $request){
        $countries = Country::all('id', 'name');
        $states = State::all('id', 'name');
        $client = 'new';

        if($request->client) $client = $request->client;

        if($client !== 'new') {
            $client = Client::whereId($client)->first();
            session(['client'=>$client]);
            return view('estimate.step5')->withClient($client);
        }else{
            return view('estimate.step4')->withCountries($countries)->withStates($states);
        }        
    }

    public function step5(Request $request){
        $data = [];
        $client = $request->all();
        $contacts = [];

        if($request->contact){
            foreach($request->contact as $contact){
                array_push($contacts, ["name"=>$contact["'name'"], "email"=>$contact["'email'"] ]);
            }
            $contacts = json_encode($contacts);
        }

        $client['contacts'] = $contacts;
        session(['client'=>$client]);

        DB::beginTransaction();
        try{
            // $client = new Client;
            // $estimate = new Estimate;
            
            $data['project'] = session('project')['project'];
            $data['company'] = session('client')['name'];
            $data['company_address'] = session('client')['street'] . session('client')['city'];
            $data['company_country'] = Country::find(session('client')['country_id'])->name;
            $data['issued_date'] = Carbon::now();
            $data['due'] = session('estimate')['end'];
            $data['currency'] = Currency::find(session('estimate')['currency_id'])->code;
            $data['currency_symbol'] = Currency::find(session('estimate')['currency_id'])->symbol;
            $data['lancer_name'] = Auth::user()->name;
            $data['workmanship'] = session('estimate')['price_per_hour'] * session('estimate')['time'];
            $data['equipment_cost'] = session('estimate')['equipment_cost'];
            $data['sub_contractors_cost'] = session('estimate')['sub_contractors_cost'];
            $data['total'] = $data['workmanship'] + $data['equipment_cost'] + $data['sub_contractors_cost'];
            
            // Estimate ID set to 1 because an estimate must not have a project
            $estimate = Estimate::create(array_merge(session('estimate'), ['estimate'=>$data['total'], 'project_id'=>1]));
            // $client = Client::create(array_merge(session('client'), ['user_id'=>Auth::user()->id]) );
            
            $client = new Client;
            $client->user_id = Auth::user()->id;
            $client->name = session('client')['name'];
            // $client->email = session('client')['email'];
            $client->street = session('client')['street'];
            $client->street_number = session('client')['street_number'];
            $client->city = session('client')['city'];
            $client->country_id = session('client')['country_id'];
            $client->state_id = session('client')['state_id'];
            $client->zipcode = session('client')['zipcode'];
            $client->contacts = session('client')['contacts'];
            
            $project = Project::create([
                        'title'=>$data['project'], 
                        'user_id' => Auth::user()->id, 
                        'client_id' => $client->id,
                        'estimate_id' => $estimate->id,
                        'tracking_code' => random_int(10, 100000),
                        'progress' => 0,
                        'collaborators' => session('estimate')['sub_contractors'],
                        'status' => 'pending'
                        ]);

            $invoice = Invoice::create([
                'project_id' => $project->id,
                'issue_date' => $data['issued_date'],
                'due_date' => $data['due'],
                'amount' => $data['total'],
                'estimate_id' =>  $estimate->id,
                'amount_paid' =>  0,
                'currency_id' => session('estimate')['currency_id'],
                'status' => 'unpaid'
            ]);
            

            $data['invoice_no'] = $invoice->id;
            $client->save();
            $project->save();
            $invoice->save();
            DB::commit();
            // dd(session()->all());
            return view('estimate.step5')
                    ->withData($data);
        }catch(\Throwable $e){
            return back()->with('error', $e->getMessage());
            DB::rollback();
        }

    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        $estimate = Estimate::where('project_id', $project->id)->first();
        if($estimate){
            return $this->SUCCESS($estimate);
        }
        return $this->ERROR('Estimate not Found');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'project_id' => 'required|numeric',
            'time' => 'required|numeric',
            'price_per_hour' => 'required|numeric',
            'equipment_cost' => 'nullable|numeric',
            'sub_contractors' => 'nullable|string',
            'sub_contractors_cost' => 'nullable|numeric',
            'similar_projects' => 'required|numeric',
            'rating' => 'required|numeric',
            'currency_id' => 'required|numeric',
            'start' => 'required|date',
            'end' => 'required|date'
        ]);

        $estimateCost = ($request->input('price_per_hour') * $request->input('time')) + $request->equipment_cost + $request->sub_contractors_cost;

        $estimate = Estimate::create($request->all() + ['estimate' => $estimateCost]);

        if ($estimate) {
            return $this->SUCCESS("estimate created", $estimate);
        }

        return $this->ERROR('Estimate creation failed');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Estimate $estimate)
    {

        $request->validate([
            'project_id' => 'required|numeric',
            'time' => 'required|numeric',
            'price_per_hour' => 'required|numeric',
            'equipment_cost' => 'nullable|numeric',
            'sub_contractors' => 'nullable|string',
            'sub_contractors_cost' => 'nullable|numeric',
            'similar_projects' => 'required|numeric',
            'rating' => 'required|numeric',
            'currency_id' => 'required|numeric',
            'start' => 'required|date',
            'end' => 'required|date'
        ]);

        $estimate = Estimate::where('project_id', $request->input('project_id'))->first();

        if ($estimate) {
            $estimateCost = $request->input('price_per_hour') * $request->input('time');
            $estimate->update($request->all() + ['estimate' => $estimateCost]);
            return $this->SUCCESS($estimate);
        }

        return $this->ERROR('Estimate not found');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Estimate $estimate)
    {
        if($estimate = Estimate::find($estimate->id)){
            $estimate->delete();
            return $this->SUCCESS('Estimate Deleted');
        }
        return $this->ERROR('Estimate deletion failed');
    }
}
