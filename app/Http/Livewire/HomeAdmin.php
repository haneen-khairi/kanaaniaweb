<?php

namespace App\Http\Livewire;
use App\Models\settings;
use App\Models\slider;
use App\Models\home_types;
use App\Models\types;
use Illuminate\Http\Request;
use Livewire\Component;

class HomeAdmin extends Component
{

    public function index(Request $request,$lang){
        $sliders=slider::all()->toArray();

        return view('dashboard.home.index')
            ->with('sliders',  $sliders)
            ->with('lang',  $lang);
    }

    public function types(Request $request,$lang='en'){
        $types=types::all()->toArray();
        $homeTypes=home_types::all()->toArray();
        $settings=settings::where('st_key','=','cash')->first();

        return view('dashboard.home.types')
            ->with('types',  $types)
            ->with('homeTypes',  $homeTypes)
            ->with('cash',  $settings['st_value'])
            ->with('lang',  $lang);
    }
    public function updateType(Request $request,$lang,$id){
        $homeCategories=home_types::where('hcid','=',$id)->first();
        $homeCategories->title_ar= $request->post('title_ar');
        $homeCategories->title_en=$request->post('title_en');
        $homeCategories->typeid=$request->post('typeid');
        $homeCategories->save();

        if($request->hasfile('file')){
            $path=public_path().'/img/categories/';
            $name = $id.'.jpg';
            $request->file('file')->move($path, $name);

            $settings=settings::where('st_key','=','cash')->first();
            $settings->st_value=time();
            $settings->save();


        }

        return '<script type="text/javascript">window.parent.location.reload();</script>';
    }


    public function updateSlide(Request $request,$lang,$id){
        $sliders=slider::where('slid','=',$id)->first();
        $sliders->title_ar= $request->post('title_ar');
        $sliders->title_en=$request->post('title_en');
        $sliders->status=1;
        $sliders->save();

        if($request->hasfile('file'))
        {

            $path=public_path().'/img/slider/';
            $name = $id.'.'.$request->file('file')->extension();
            $request->file('file')->move($path, $name);
        }

        return '<script type="text/javascript">window.parent.location.reload();</script>';
    }


    public function updateVideo(Request $request,$lang){
        if($request->hasfile('file'))
        {

            $path=public_path().'/img/';
            $name = 'home.mp4';
            $request->file('file')->move($path, $name);
        }

        return '<script type="text/javascript">window.parent.location.reload();</script>';
    }
}
