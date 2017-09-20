<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Post;
use Mail;
use Session;

class PagesController extends Controller{


  public function getContact() {
    return view('pages.contact');
  }

  public function postContact(Request $request){
    $this->validate($request, [
      'email' => 'required|email',
      'subject' => 'min:3',
      'message' => 'min:10']);

    $data = array(
      'email' => $request->email,
      'subject' =>$request->subject,
      'messageBody' => $request->message
      );

    Mail::send('emails.contact', $data, function($message) use ($data){
      $message->from($data['email']);
      $message->to('randy.inverarity@gmail.com');
      $message->subject($data['subject']);

    } );  

    Session::flash('success', 'You have successfully sent your email!');

    //return redirect()-> route('/contact');
    return view('pages.contact');
  }

  public function getAbout() {
    $first = 'Randy';
    $last = 'Inverarity';
    $age = 52;

    $fullname = $first . " " . $last;
    $email = "randy.inverarity@gmail.com";

    $data = [];
    $data['fullname'] = $fullname;
    $data['email'] = $email;
    $data['age'] = $age;

    return view('pages.about')->withData($data);
  }

  public function getIndex() {
    $posts = Post::orderBy('created_at', 'desc')->limit(4)->get();
    return view('pages.welcome')->withPosts($posts);
  }



}

