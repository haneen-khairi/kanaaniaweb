<?php

namespace App\Http\Livewire;
use App\Models\sizes;
use Illuminate\Http\Request;
use Livewire\Component;

class SizesAdmin extends Component
{

    public function index(Request $request,$lang){
        $sizes=sizes::all()->toArray();

        return view('dashboard.sizes.index')
            ->with('sizes',  $sizes)
            ->with('lang',  $lang);
    }

    public function edit($lang,$id,$title){
        $sizes=sizes::where('sizeid','=',$id)->first()->toArray();
        return view('dashboard.sizes.edit')
            ->with('item',  $sizes)
            ->with('lang',  $lang);
    }
    public function new($lang){
        return view('dashboard.sizes.new')
            ->with('lang',  $lang);
    }

    public function update(Request $request,$lang,$id){
        $sizes=sizes::where('sizeid','=',$id)->first();
        $sizes->stitle_ar= $request->post('title_ar');
        $sizes->stitle_en=$request->post('title_en');
        $sizes->status=$request->post('status');
        $sizes->save();
        return json_encode(array('result'=>1));
    }
    public function store(Request $request,$lang){
        $sizes= new sizes();
        $sizes->stitle_ar= $request->post('title_ar');
        $sizes->stitle_en=$request->post('title_en');
        $sizes->status=$request->post('status');
        $sizes->save();
        return json_encode(array('result'=>1));
    }


    public function delete($lang,$id){
        $sizes=sizes::where('sizeid','=',$id)->delete();
        return json_encode(array('result'=>1,'id'=>$id));
    }
}
