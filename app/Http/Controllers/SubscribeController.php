<?php

namespace App\Http\Controllers;
use App\Models\subscribe;
use Illuminate\Http\Request;

class SubscribeController extends Controller{

    public function indexUser($lang){
      return view('subscribe')
      ->with('lang',  $lang);
    }

    public function save(Request $request,$lang,$is_customer=0){
        $subscribe=new subscribe();
        $subscribe->name=$request->post('name');
        $subscribe->email=$request->post('email');
        $subscribe->phone=$request->post('phone');
        $subscribe->is_customer=$is_customer;
        $subscribe->save();

        return json_encode(array('result'=>1));
    }
}
