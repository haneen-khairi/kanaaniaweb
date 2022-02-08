<?php

namespace App\Http\Livewire;
use App\Models\partners;
use Illuminate\Http\Request;
use Livewire\Component;

class PartnersAdmin extends Component
{

    public function index(Request $request,$lang){
        $partners=partners::all()->toArray();

        return view('dashboard.partners.index')
            ->with('partners',  $partners)
            ->with('lang',  $lang);
    }

    public function edit($lang,$id,$title){
        $partners=partners::where('prid','=',$id)->first()->toArray();
        return view('dashboard.partners.edit')
            ->with('item',  $partners)
            ->with('lang',  $lang);
    }

    public function new($lang){
        return view('dashboard.partners.new')
            ->with('lang',  $lang);
    }

    public function update(Request $request,$lang,$id){
        $partners=partners::where('prid','=',$id)->first();
        $partners->pr_titlear= $request->post('title_ar');
        $partners->pr_titleen=$request->post('title_en');
        $partners->status=$request->post('status');
        $partners->save();

        if($request->hasfile('file')){
            $path=public_path().'/img/partners/';
            $name = $id.'.'.$request->file('file')->extension();
            $request->file('file')->move($path, $name);
        }

        return redirect()->route('partners',['lang'=>$lang]);
    }
    public function store(Request $request,$lang){
        $partners= new partners();
        $partners->pr_titlear= $request->post('title_ar');
        $partners->pr_titlear=$request->post('title_en');
        $partners->status=$request->post('status');
        $partners->save();

        if($request->hasfile('file')){
            $path=public_path().'/img/partners/';
            $name = $partners->prid.'.'.$request->file('file')->extension();
            $request->file('file')->move($path, $name);
        }

        return redirect()->route('partners',['lang'=>$lang]);
    }


    public function delete($lang,$id){
        $partners=partners::where('prid','=',$id)->delete();
        return json_encode(array('result'=>1,'id'=>$id));
    }
}
