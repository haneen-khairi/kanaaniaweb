@extends('layouts.dashboard')
@section('content')
<div>

    <div class="row">
        <div class="col-12 col-xl-8">
            <div class="card card-body border-0 shadow mb-4">
                <h2 class="h5 mb-4">Home Types</h2>

                    @foreach ($homeTypes as $homeTypes)
                        <form action="{{URL::to('/'.$lang.'/dashboard/home/categories/update/'.$homeTypes['hcid'])}}" enctype='multipart/form-data' target="upluad_iframe" method="POST">
                            <div class="row">
                            <div class="pro-nav-thumb" style="display:inline-block;" >
                                <img  src="{{ asset('img/categories/'.$homeTypes['hcid'].'.jpg?v='.$cash) }}" class="db-img-slide" alt="Slider">
                               <div class="db-m">
                               <input class="jq_slider_img dbslide form-control form-control-sm" style="margin-top:0px;"  type="file" name="file" id="file{{$homeTypes['hcid']}}">
                               </div>
                            </div>
                            <div class="mt-3">
                                <label for="title_en">Arabic Title</label>
                                <input class="form-control" id="title_en{{$homeTypes['title_ar']}}" name="title_ar" type="text" value="{{$homeTypes['title_ar']}}"
                                       placeholder="Title English" required>
                            </div>
                            <div class="mt-3">
                                <label for="title_en">English Title</label>
                                <input class="form-control" id="title_en{{$homeTypes['title_en']}}" name="title_en" type="text" value="{{$homeTypes['title_en']}}"
                                       placeholder="Title Araic" required>
                            </div>
                                <div class="col-md-6 mb-3">
                                    <label for="status">Type</label>
                                    <select class="form-select mb-0" id="typeid" name="typeid"  aria-label="Category">
                                        @foreach ($types as $type)
                                            <option <?php if($type['typeid']==$homeTypes['typeid']){echo 'selected';}?> value="{{$type['typeid']}}">{{ $type['ttitle_'.$lang] }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <br>
                            <button class=" btn db-button"  type="submit"> Update </button>
                            <br>
                            <br>
                            <input type="hidden" name="_token" value="{{ csrf_token() }}" />

                        </form>
                        <iframe style="display: none;" name="upluad_iframe" id=""></iframe>
                    @endforeach
            </div>
        </div>
    </div>
</div>
@stop
