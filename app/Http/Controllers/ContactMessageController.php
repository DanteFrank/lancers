<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\ContactMessage;
use Auth;
use Illuminate\Support\Facades\Validator;

class ContactMessageController extends Controller
{
          /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $id = Auth::id();

        if (ContactMessage::get()->exists()) {
            $contactsupports = ContactMessage::get()->toJson(JSON_PRETTY_PRINT);
    
            return response()->json([
                "message" => "success",
                "contactsupports" => $contactsupports], 200);
            } else {
            return response()->json([
                "message" => "Resource not found"
            ], 404);
        }

    }

public function process_contact_form(Request $request)
    {

       $message = new ContactMessage;

      $request->validate(["contents"=>"required","subject"=>"required"],["contents.required" => "Content Field is Required","subject.required"=> "Subject Field is required"]);


       $message->user_id = Auth::User()->id;
       $message->message =  $request->contents;
       $message->subject = $request->subject;
       $message->save();

       //$data["success"] =;
       return redirect('/guest/contact')->with(["success" => "<span style='color:green;'>Message Set Successfully</span>"]);

    }
    public function store(Request $request)
    {

        $this->validate($request, [
            'subject' => 'required|string|max:255',
            'message' => 'nullable|string'
        ]);

        $user = auth('api')->user(); 

        if ( $user) {
           
            $data = [
                'subject' => $request->subject,
                'message' => $request->message,
                'user_id' => $user->id
            ];
            // $message->save();

            $contactsupport = ContactMessage::create($data);
           
            return response()->json([
                "message" => 'Success! Message sent',
              "contactsupport" => $contactsupport], 201);
            } else {
            return response()->json([
                "message" => "You are not authorize to perform this action"
            ], 404);
        }

    }

    public function show($id)
    {

        if (ContactMessage::where('id', $id)->exists()) {
            $contactmessage = ContactMessage::find($id);
            return response($contactmessage, 200);
          } else {
            return response()->json([
              "message" => "Resource not found"
            ], 404);
          }
    }
}
