<?php

namespace App\Http\Livewire;
use App\Models\testimonials;
use Illuminate\Http\Request;
use Livewire\Component;

class TestimonialsAdmin extends Component
{

    public function index(Request $request,$lang){
        $testimonials=testimonials::all()->toArray();

        return view('dashboard.testimonials.index')
            ->with('testimonials',  $testimonials)
            ->with('lang',  $lang);
    }

    public function edit($lang,$id,$title){
        $testimonials=testimonials::where('tsid','=',$id)->first()->toArray();
        return view('dashboard.testimonials.edit')
            ->with('item',  $testimonials)
            ->with('lang',  $lang);
    }

    public function new($lang){
        return view('dashboard.testimonials.new')
            ->with('lang',  $lang);
    }

    public function update(Request $request,$lang,$id){
        $testimonials=testimonials::where('tsid','=',$id)->first();
        $testimonials->tsname_ar= $request->post('title_ar');
        $testimonials->tsname_en=$request->post('title_en');
        $testimonials->tsdesc_ar=$request->post('desc_ar');
        $testimonials->tsdesc_en=$request->post('desc_ar');
        $testimonials->status=$request->post('status');
        $testimonials->save();
        if($request->hasfile('file')){
            $path=public_path().'/img/testimonials/';
            $name = $id.'.'.$request->file('file')->extension();
            $request->file('file')->move($path, $name);
        }

        return redirect()->route('testimonials',['lang'=>$lang]);
    }
    public function store(Request $request,$lang){
        $testimonials= new testimonials();
        $testimonials->tsname_ar= $request->post('title_ar');
        $testimonials->tsname_en=$request->post('title_en');
        $testimonials->tsdesc_ar=$request->post('desc_ar');
        $testimonials->tsdesc_en=$request->post('desc_ar');
        $testimonials->status=$request->post('status');
        $testimonials->save();

        if($request->hasfile('file'))
        {

            $path=public_path().'/img/testimonials/';
            $name = $testimonials->tsid.'.'.$request->file('file')->extension();
            $request->file('file')->move($path, $name);
        }

        return redirect()->route('testimonials',['lang'=>$lang]);
    }


    public function delete($lang,$id){
        $testimonials=testimonials::where('tsid','=',$id)->delete();
        return json_encode(array('result'=>1,'id'=>$id));
    }
}
