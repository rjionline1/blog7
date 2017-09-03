<?php
namespace App\Http\Controllers;

class PagesController extends Controller {

  public function getAbout() {
    $first = 'Randy';
    $last = 'Inverarity';
    $fullname = $first . " " . $last;
    $email = 'randy.inverarity@gmail.com';
    $data = [];
    $data['email'] = $email;
    $data['fullname'] = $fullname;
    return view('pages.about')->withData($data);
  }

  public function getContact() {
    return view('pages.contact');
  }

  public function getIndex() {
    return view('pages.welcome');
  }

}

 ?>
