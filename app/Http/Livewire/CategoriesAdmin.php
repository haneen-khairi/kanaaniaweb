<?php

namespace App\Http\Livewire;
use App\Models\categories;
use App\Models\sizes;
use App\Models\types;
use Illuminate\Http\Request;
use Livewire\Component;

class CategoriesAdmin extends Component
{

    public function index(Request $request,$lang){
        $categories=categories::all()->toArray();

        return view('dashboard.categories.index')
            ->with('categories',  $categories)
            ->with('lang',  $lang);
    }

    public function edit($lang,$id,$title){
        $categories=categories::where('categoryid','=',$id)->first()->toArray();
        return view('dashboard.categories.edit')
            ->with('item',  $categories)
            ->with('lang',  $lang);
    }
    public function new($lang){
        return view('dashboard.categories.new')
            ->with('lang',  $lang);
    }

    public function update(Request $request,$lang,$id){
        $categories=categories::where('categoryid','=',$id)->first();
        $categories->ctitle_ar= $request->post('title_ar');
        $categories->ctitle_en=$request->post('title_en');
        $categories->status=$request->post('status');
        $categories->save();
        return json_encode(array('result'=>1));
    }
    public function store(Request $request,$lang){
        $categories= new categories();
        $categories->ctitle_ar= $request->post('title_ar');
        $categories->ctitle_en=$request->post('title_en');
        $categories->status=$request->post('status');
        $categories->save();
        return json_encode(array('result'=>1));
    }


    public function delete($lang,$id){
        $categories=categories::where('categoryid','=',$id)->delete();
        return json_encode(array('result'=>1,'id'=>$id));
    }
}
