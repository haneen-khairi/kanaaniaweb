@extends('layouts.dashboard')
@section('content')
<div>

    <div class="row">
        <div class="col-12 col-xl-8">

            <div class="card card-body border-0 shadow mb-4">
                <h2 class="h5 mb-4">Testimonial information</h2>
                <form action="{{URL::to('/'.$lang.'/dashboard/testimonials/'.$item['tsid'].'/update')}}" enctype="multipart/form-data" method="POST" id="product_form">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <div>
                                <label for="title_en">Name English</label>
                                <input class="form-control" id="title_en" name="title_en" type="text" value="{{$item['tsname_en']}}"
                                    placeholder="Title English" required>
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <div>
                                <label for="title_ar">Name Arabic</label>
                                <input class="form-control" id="title_ar" name="title_ar" type="text" value="{{$item['tsname_ar']}}"
                                    placeholder="Title Arabic">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <div>
                                <label for="title_en">Description English</label>
                                <input class="form-control" id="desc_en" name="desc_en" type="text" value="{{$item['tsdesc_ar']}}"
                                       placeholder="Description English" required>
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <div>
                                <label for="title_ar">Description Arabic</label>
                                <input class="form-control" id="desc_ar" name="desc_ar" type="text" value="{{$item['tsdesc_en']}}"
                                       placeholder="Description Arabic">
                            </div>
                        </div>
                    </div>
                    <div class="row ">
                        <div class="col-md-6 mb-3">
                          

                         
                            <label for="status">Status</label>
                            <select class="form-select mb-0" id="status" name="status"
                                    aria-label="Gender select example">
                                <option <?php if($item['status']==1){echo 'selected';}?> value="1">Active</option>
                                <option <?php if($item['status']==0){echo 'selected';}?> value="0">Inactive</option>
                            </select>
                            <label for="" style="margin-top:3px;">Edit Picture</label>
                            <input type="file" name="file" class="dbslide form-control form-control-sm" id="file" style=" margin-top: 5px;
    margin-left: 0px;
    margin-bottom: 15px;">
                            <div class="update-pic">
                            <button type="submit" class="btn db-button" >Update</button>
                            
                     
                       
                       
                        </div>
                        </div>
                        <div class="col-md-6 mb-3">
                        <img src="{{ asset('img/testimonials/'.$item['tsid'].'.jpg') }}" style="width: 150px">
                        </div>
                    </div>
                    <input type="hidden" name="_token" value="{{ csrf_token() }}" />

                </form>

            </div>
        </div>
    </div>
</div>
@stop
