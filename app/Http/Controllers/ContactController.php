<?php
namespace App\Http\Controllers;

use App\Message;
use App\Email;

use Illuminate\Http\Request;

 
class ContactController extends Controller
{
	
	public function getMessage(){
		return view('contact/sayhello');
	}



	public function sendMessage(Request $request){



      $this->validate($request, [

        	'name'=>'required|max:120',
        	'email'=>'required|max:220',
        	'message'=>'required|max:10000',
        	'subject'=>'required|max:200'
        ]);

		$name = ucfirst($request['name']);
		$message = ucfirst($request['message']);
		$subject = $request['subject'];
		$email = $request['email'];


        
 		$sender_email = Email::where('email', $email)->first();

 		if (!$sender_email) {
 			$sender_email = new Email();
 			$sender_email->email = $email;
 			$sender_email->save();
 		}

 		$new_message = new Message();

 		$new_message->name = $name;
 		 $new_message->subject = $subject;
 		 $new_message->message = $message;
     

 		$sender_email->message()->save($new_message);

 		return redirect()->route('contact')->with([
 			'success'=>'Message Sent!!'
 			]); 


     	
	 

	}



}


?>