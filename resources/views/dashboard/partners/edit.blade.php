@extends('layouts.dashboard')
@section('content')
<div>

    <div class="row">
        <div class="col-12 col-xl-8">

            <div class="card card-body border-0 shadow mb-4">
                <h2 class="h5 mb-4">Partners information</h2>
                <form action="{{URL::to('/'.$lang.'/dashboard/partners/'.$item['prid'].'/update')}}" enctype="multipart/form-data"  method="POST" id="product_form">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <div>
                                <label for="title_en">Name English</label>
                                <input class="form-control" id="title_en" name="title_en" type="text" value="{{$item['pr_titleen']}}"
                                    placeholder="Title English" required>
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <div>
                                <label for="title_ar">Name Arabic</label>
                                <input class="form-control" id="title_ar" name="title_ar" type="text" value="{{$item['pr_titlear']}}"
                                    placeholder="Title Arabic">
                            </div>
                        </div>
                    </div>
                    <div class="row align-items-center">
                        <div class="col-md-6 mb-3">
                            <label for="status">Status</label>
                            <select class="form-select mb-0" id="status" name="status"
                                    aria-label="Gender select example">
                                <option <?php if($item['status']==1){echo 'selected';}?> value="1">Active</option>
                                <option <?php if($item['status']==0){echo 'selected';}?> value="0">Inactive</option>
                            </select>
                        </div>
                        <img src="{{ asset('img/partners/'.$item['prid'].'.jpg') }}" style="width: 250px">
                        
                        <div class="col-md-6 mb-3">
                            <label for=""> Edit Logo</label>
                        <input type="file" class="dbslide form-control" style="    margin: 3px;
    margin-left: 1px;
    margin-bottom: 14px;" name="file" id="file" >
                        <button type="submit"   class="btn db-button">Update</button>
                        </div>
                    </div>
                    <input type="hidden" name="_token" value="{{ csrf_token() }}" />

                </form>

            </div>
        </div>
    </div>
</div>
@stop
