@extends('layouts.dashboard')
@section('content')
<div>

    <div class="row">
        <div class="col-12 col-xl-8">
            <div class="card card-body border-0 shadow mb-4">
                <h2 class="h5 mb-4">Slider</h2>

                    @foreach ($sliders as $slider)
                        <form action="{{URL::to('/'.$lang.'/dashboard/home/slider/update/'.$slider['slid'])}}" enctype='multipart/form-data' target="upluad_iframe" method="POST">
                            <div class="row">
                            <div class="pro-nav-thumb" style="display:inline-block;" >
                                <img  src="{{ asset('img/slider/'.$slider['slid'].'.jpg') }}" class="db-img-slide" alt="Slider">
                               <div class="db-m">
                               <input class="jq_slider_img dbslide form-control form-control-sm" style="margin-top:0px;"  type="file" name="file" id="file{{$slider['slid']}}">
                           
                               </div>
                            </div>
                            <div class="mt-3">
                                <label for="title_en">Arabic Title</label>
                                <input class="form-control" id="title_en{{$slider['slid']}}" name="title_ar" type="text" value="{{$slider['title_ar']}}"
                                       placeholder="Title English" required>
                            </div>
                            <div class="mt-3">
                                <label for="title_en">English Title</label>
                                <input class="form-control" id="title_en{{$slider['slid']}}" name="title_en" type="text" value="{{$slider['title_en']}}"
                                       placeholder="Title Araic" required>
                            </div>
                            </div>
                            <br>
                            <button class=" btn db-button"  type="submit"> Update </button>
                            <br>
                            <br>
                            <input type="hidden" name="_token" value="{{ csrf_token() }}" />

                        </form>
                    @endforeach



            </div>
        </div>
        <div class="col-12 col-xl-4">
            <div class="row">
                <div class="col-12 mb-4">
                    <div class="card shadow border-0 text-center p-0">

                        <div class="card-body pb-5" style="        margin-left: -1px;">

                            <h2 class="h5 mb-4">Home Video</h2>

                                <div class="col-md-6 mb-3">
                                    <video src="{{ asset('img/home.mp4') }}" controls style="width:250px">

                                    </video>
                                    <form METHOD="POST" id="video_form" enctype='multipart/form-data' target="upluad_iframe" action="{{URL::to('/'.$lang.'/dashboard/home/video/update/')}}">
                                        <input type="file" class="db-video form-control form-control-sm" id="upload_video" id="file" name="file" multiple>
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                                    </form>
                                </div>
                            <iframe style="display:none;" id="upluad_iframe" name="upluad_iframe"></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop
