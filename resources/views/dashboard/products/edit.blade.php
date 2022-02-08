@extends('layouts.dashboard')
@section('content')
<div>

    <div class="row">
        <div class="col-12 col-xl-8">

            <div class="card card-body border-0 shadow mb-4">
                <h2 class="h5 mb-4">Product information</h2>
                <form action="{{URL::to('/'.$lang.'/product/'.$product['productid'].'/update')}}" method="POST" id="product_form">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <div>
                                <label for="title_en">Title English</label>
                                <input class="form-control" id="title_en" name="title_en" type="text" value="{{$product['title_en']}}"
                                    placeholder="Title English" required>
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <div>
                                <label for="title_ar">Title Arabic</label>
                                <input class="form-control" id="title_ar" name="title_ar" type="text" value="{{$product['title_ar']}}"
                                    placeholder="Title Arabic">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <div>
                                <label for="desc_en">Description English</label>
                                <textarea class="form-control" id="desc_en" name="desc_en" type="text" value="{{$product['description_en']}}"
                                          placeholder="Description English" required>{{$product['description_en']}}</textarea>
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <div>
                                <label for="desc_ar">Description Arabic</label>
                                <textarea class="form-control" id="desc_ar" name="desc_ar" type="text"  value="{{$product['description_ar']}}"
                                       placeholder="Description Arabic">{{$product['description_ar']}}</textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row align-items-center">
                        <div class="col-md-6 mb-3">
                            <label for="category">Category</label>
                            <select class="form-select mb-0" id="category" name="category"
                                    aria-label="Gender select example">
                                @foreach ($categories as $category)
                                    <option <?php if($category['categoryid']==$product['catid']){echo 'selected';}?> value="{{$category['categoryid']}}">{{ $category['ctitle_'.$lang] }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="type">Type</label>
                            <select class="form-select mb-0" id="type" name="type"
                                    aria-label="Gender select example">
                                @foreach ($types as $type)
                                    <option <?php if($type['typeid']==$product['product_type']){echo 'selected';}?> value="{{$type['typeid']}}">{{ $type['ttitle_'.$lang] }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row align-items-center">
                        <div class="col-md-6 mb-3">
                            <label for="carat">carat</label>
                            <select class="form-select mb-0" id="carat" name="carat"
                                    aria-label="Gender select example">
                                <option <?php if($product['carat']==18){echo 'selected';}?> value="18">18</option>
                                <option <?php if($product['carat']==21){echo 'selected';}?> value="21">21</option>
                                <option <?php if($product['carat']==24){echo 'selected';}?> value="24">24</option>
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <div>
                                <label for="quantity">Quantity</label>
                                <input  class="form-control" id="quantity" name="quantity" type="text" value="{{$product['qty']}}"
                                       placeholder="Quantity" required>
                            </div>
                        </div>
                    </div>
                    <div class="row align-items-center">
                        <div class="col-md-6 mb-3">
                            <div>
                                <label for="price">Price</label>
                                <input  class="form-control" id="price" name="price" type="text" value="{{$product['price']}}"
                                        placeholder="Price" required>
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <div>
                                <label for="weight">Weight</label>
                                <input  class="form-control" id="weight" name="weight" type="text" value="{{$product['weight']}}"
                                        placeholder="Weight" required>
                            </div>
                        </div>
                    </div>
                    <div class="row align-items-center">
                        <div class="col-md-6 mb-3">
                            <label for="status">Status</label>
                            <select class="form-select mb-0" id="status" name="status"
                                    aria-label="Gender select example">
                                <option <?php if($product['status']==1){echo 'selected';}?> value="1">Active</option>
                                <option <?php if($product['status']==0){echo 'selected';}?> value="0">Inactive</option>
                            </select>
                        </div>

                        <div class="col-md-6 mb-3">
                            <button type="button" id="update_product" class="btn db-button" style="margin-top: 25px; margin-left:100px">Update</button>
                        </div>
                    </div>
                </form>

            </div>
        </div>
        <div class="col-12 col-xl-4">
            <div class="row">
                <div class="col-12 mb-4">
                    <div class="card shadow border-0 text-center p-0">

                        <div class="card-body pb-5">
                            <?php
                            $path = public_path('img/product/'.$product['productid']);
                            $thumbs='';
                            if(File::isDirectory($path)){
                                $files = File::files(public_path().'/img/product/'.$product['productid']);
                                foreach ($files as $file) {
                                ?>
                                <div class="pro-nav-thumb" style="width:100px;display:inline-block;" >
                                    <img  src="{{ asset('img/product/'.$product['productid'].'/'.basename($file)) }}" alt="product-details">
                                    <a class="jq_delete_product_img" data-id="{{$product['productid']}}" data-file="{{basename($file)}}"><img src=" {{ asset('img/delete.png') }}" alt=""></a>
                                    <a class="jq_make_def_product_img" data-id="{{$product['productid']}}" data-file="{{basename($file)}}"><img src=" {{ asset('img/default.png') }}" alt=""></a>
                                </div>
                                <?php


                                }
                            }
                            ?>
                                <div class="col-md-6 mb-3">
                                    <form METHOD="POST" id="product_images" enctype='multipart/form-data' target="upluad_iframe" action="{{URL::to('/'.$lang.'/product/uploadimgs')}}">
                                        <input type="file"   id="upload" id="file" name="file[]" multiple>
                                        <input type="hidden" name="productid" id="productid" value="{{$product['productid']}}">
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
