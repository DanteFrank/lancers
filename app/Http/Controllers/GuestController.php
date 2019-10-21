<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Illuminate\Auth\Events\Registered;
use App\User;
use App\Project;
use App\Estimate;
use App\Invoice;
use Response;
use Hash;
Use Validator;
use Session;
use Redirect;


class GuestController extends Controller
{

    // public $project;

    public function step1(Request $request)
    {
        $project = $request->session()->get('project');
        
        if(!$project)
        {
        return view('guests/guest_estimate');
        }

        return view('guests/guest_estimate',compact('project', $project));
        
       
    }

    public function createproject(Request $request)
    {
       
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'description' => 'nullable|string'
        ]);

       

        

        if ($validator->fails()) 
        {
            return back()->withErrors($validator)->withInput();
        } 
        else 
        {

            $data = ["title"=> $request->title,
            "description"=> $request->description,
            'tracking_code' => Project::generateTrackingCode()
        ];

        if(empty($request->session()->get('project'))){
            $request->session()->put('project',  $data);
        }else{
            $project = $request->session()->get('project');
            $request->session()->put('project',  $data);
        }

        return redirect('guest/create/estimate/');

                // dd(session('project'));
            
        }

    }

    public function estimatecreate(Request $request)
    {
        $data = session('project');

        if ($data) {
            $project = Session::get('project');
            $request->session()->put('project', $project);
            return view('guests/set_estimate')->with(['project' => $project]);
           
        }

        return redirect('guest/create/project/')->with("error", "You need to create a project first");

     
    }



    public function estimatesave(Request $request)
    {
       
        $validator = Validator::make($request->all(), [
            // 'project_id' => 'required|numeric',
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

        

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        } else {
            $data = [
                'time' => $request->time,
                'price_per_hour' => $request->cost_per_hour,
                'equipment_cost' => $request->est1,
                'sub_contractors' => $request->sub_contractors,
                'sub_contractors_cost' => $request->sub_contractors_cost,
                'similar_projects' => $request->similar_projects,
                'rating' => $request->rating,
                'currency_id' => $request->currency,
                'start' => $request->start,
                'end' => $request->end
        ];
           $project = Session::get('project');
            // session::put(['estimate' =>  $data]);
            $request->session()->put('estimate', $data);
            $request->session()->put('project', $project);

            // $ddata = Session::all();
            //  dd($ddata);
            return redirect('guest/create/client/');
        }

    }

    public function clientcreate(Request $request)
    {
        $data = session('project');

        if ($data) {
            $estimate = Session::get('estimate');
            $project = Session::get('project');
            $request->session()->put('project', $project);
            $request->session()->put('estmate', $estimate);
            return view('guests/client')->with(['project' => $project,'estimate' => $estimate,]);
           
        }



        // return redirect('guest/create/client/')->with("error", "You need to create a project first");

     
    }
}
