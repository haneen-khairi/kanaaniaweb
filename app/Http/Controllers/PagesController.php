<?php

namespace App\Http\Controllers;
use App\Models\products;
use Illuminate\Support\Facades\Mail;



use Illuminate\Http\Request;

class PagesController extends Controller
{
    //


    public function about(Request $request,$lang='en'){

      return view('about-us')
      ->with('request',  $request)
      ->with('lang',  $lang);
    }
    public function contact(Request $request,$lang='en'){

      return view('contact-us')
      ->with('request',  $request)
      ->with('lang',  $lang);
    }
    public function founder(Request $request,$lang='en'){

      return view('founder')
      ->with('request',  $request)
      ->with('lang',  $lang);
    }

    public function delivery(Request $request,$lang='en'){

      return view('deliver')
      ->with('request',  $request)
      ->with('lang',  $lang);
    }
    public function terms(Request $request,$lang='en'){

      return view('term-condition')
      ->with('request',  $request)
      ->with('lang',  $lang);
    }
    public function privacy(Request $request,$lang='en'){

      return view('privacy')
      ->with('request',  $request)
      ->with('lang',  $lang);
    }

    public function sendContact(Request $request,$lang){

        $body='name : '.$request->post('full_name').'<br>';
        $body.='phone : '.$request->post('phone').'<br>';
        $body.='email : '.$request->post('emial').'<br>';
        $body.='subject : '.$request->post('contact_subject').'<br><br>';
        $body.=$request->post('message').'<br>';
        Mail::send([], [], function($message) use ($body) {
            $message->to(config('web.AppEmail'), config('web.AppName'))
                ->subject( config('web.AppName').' User Email');
            $message->from("preealweb@gmail.com","Test Mail")
            ->setBody($body, 'text/html'); // for HTML rich messages

        });
        return json_encode(array('result'=>1));
    }


}
