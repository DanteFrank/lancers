<?php

namespace App\Http\Controllers;

use Auth;
use App\User;
use App\State;
use App\Client;
use App\Project;
use App\Country;
use App\Estimate;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function show(){
        $countries = Country::all('id', 'name');
        $states = State::all('id', 'name');
        return view('clients.add')->withCountries($countries)->withStates($states);
    }

    public function store(Request $request){
        $contacts = [];
        if($request->contact){
            foreach($request->contact as $contact){
                array_push($contacts, ["name"=>$contact["'name'"], "email"=>$contact["'email'"] ]);
            }
            $contacts = json_encode($contacts);
        }
        try{
            $client = new Client;
            $client->user_id = Auth::user()->id;
            $client->name = $request->name;
            $client->email = $request->email;
            $client->street = $request->street;
            $client->street_number = $request->street_number;
            $client->city = $request->city;
            $client->country_id = $request->country_id;
            $client->state_id = $request->state_id;
            $client->zipcode = $request->zipcode;
            if(gettype($contacts) == 'string'){
                $client->contacts = $contacts;
            };
            if($client->save()){
                return back()->with('success', 'New client created');
                // return $this->SUCCESS('New client created', $data);
            }
        }catch(\Throwable $e){
            return back()->with('error', $e->getMessage());
            // return $this->ERROR('Client creation failed');
        }
    }

    public function update(Request $request){
        $data = $request->all();
        $client = Client::find($request->id);
        try{
            if($client){
                // dd($client);
                $client->update($data);
                logger('Client record modified successfully - ' . $client->name);
                return $this->SUCCESS('Client record modified successfully - ' . $client->name);
            }
            return $this->ERROR('No record found for specified client');
        }catch(\Throwable $e){
            return $this->ERROR('Unable to update client', $e);
        }
    }

    public function delete(Request $request){
        if($client = Client::find($request->client_id)){
            $client->delete();
            logger('Client Deleted - ' . $client->name);
            return $this->SUCCESS('Client Deleted - ' . $client->name);
        }
        return $this->ERROR('Client creation failed');
    }

    public function list(){
        $user = Auth::user();
        $clients = $user->clients()->select('id','name','contacts','profile_picture')->with('project:title,status')->get();
        return view('clients.list')->withClients($clients);
        // return $clients !== null ? $this->SUCCESS('Client retrieved', $clients) : $this->SUCCESS('No client found');
    }

    public function view($client_id){
        $client = Client::where(['id'=>$client_id, 'user_id' => Auth::user()->id])->first();
        return $client !== null ? $this->SUCCESS('Client retrieved', $client) : $this->SUCCESS('No client found');
    }
}
