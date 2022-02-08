<?php

namespace App\Http\Livewire;
use App\Models\types;
use Illuminate\Http\Request;
use Livewire\Component;

class TypesAdmin extends Component
{

    public function index(Request $request,$lang){
        $types=types::all()->toArray();

        return view('dashboard.types.index')
            ->with('types',  $types)
            ->with('lang',  $lang);
    }

    public function edit($lang,$id,$title){
        $types=types::where('typeid','=',$id)->first()->toArray();
        return view('dashboard.types.edit')
            ->with('item',  $types)
            ->with('lang',  $lang);
    }
    public function new($lang){
        return view('dashboard.types.new')
            ->with('lang',  $lang);
    }

    public function update(Request $request,$lang,$id){
        $types=types::where('typeid','=',$id)->first();
        $types->ttitle_ar= $request->post('title_ar');
        $types->ttitle_en=$request->post('title_en');
        $types->status=$request->post('status');
        $types->save();
        return json_encode(array('result'=>1));
    }
    public function store(Request $request,$lang){
        $types= new types();
        $types->ttitle_ar= $request->post('title_ar');
        $types->ttitle_en=$request->post('title_en');
        $types->status=$request->post('status');
        $types->save();
        return json_encode(array('result'=>1));
    }


    public function delete($lang,$id){
        $types=types::where('typeid','=',$id)->delete();
        return json_encode(array('result'=>1,'id'=>$id));
    }
}
