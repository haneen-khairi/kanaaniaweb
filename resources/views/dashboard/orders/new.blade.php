@extends('layouts.dashboard')
@section('content')
<div>

    <div class="row">
        <div class="col-12 col-xl-8">

            <div class="card card-body border-0 shadow mb-4">
                <h2 class="h5 mb-4">Product information</h2>
                <form action="{{URL::to('/'.$lang.'/product/store')}}" method="POST" id="product_form">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <div>
                                <label for="title_en">Title English</label>
                                <input class="form-control" id="title_en" name="title_en" type="text" value=""
                                    placeholder="Title English" required>
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <div>
                                <label for="title_ar">Title Arabic</label>
                                <input class="form-control" id="title_ar" name="title_ar" type="text" value=""
                                    placeholder="Title Arabic">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <div>
                                <label for="desc_en">Description English</label>
                                <textarea class="form-control" id="desc_en" name="desc_en" type="text" value=""
                                          placeholder="Description English" required></textarea>
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <div>
                                <label for="desc_ar">Description Arabic</label>
                                <textarea class="form-control" id="desc_ar" name="desc_ar" type="text"  value=""
                                       placeholder="Description Arabic"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row align-items-center">
                        <div class="col-md-6 mb-3">
                            <label for="category">Category</label>
                            <select class="form-select mb-0" id="category" name="category"
                                    aria-label="Gender select example">
                                @foreach ($categories as $category)
                                    <option value="{{$category['categoryid']}}">{{ $category['ctitle_'.$lang] }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="type">Type</label>
                            <select class="form-select mb-0" id="type" name="type"
                                    aria-label="Gender select example">
                                @foreach ($types as $type)
                                    <option value="{{$type['typeid']}}">{{ $type['ttitle_'.$lang] }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row align-items-center">
                        <div class="col-md-6 mb-3">
                            <label for="carat">carat</label>
                            <select class="form-select mb-0" id="carat" name="carat"
                                    aria-label="Gender select example">
                                <option value="18">18</option>
                                <option value="21">21</option>
                                <option value="24">24</option>
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <div>
                                <label for="quantity">Quantity</label>
                                <input  class="form-control" id="quantity" name="quantity" type="text"
                                       placeholder="Quantity" required>
                            </div>
                        </div>
                    </div>
                    <div class="row align-items-center">
                        <div class="col-md-6 mb-3">
                            <div>
                                <label for="price">Price</label>
                                <input  class="form-control" id="price" name="price" type="text"
                                        placeholder="Price" required>
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <div>
                                <label for="weight">Weight</label>
                                <input  class="form-control" id="weight" name="weight" type="text"
                                        placeholder="Weight" required>
                            </div>
                        </div>
                    </div>
                    <div class="row align-items-center">
                        <div class="col-md-6 mb-3">
                            <label for="status">Status</label>
                            <select class="form-select mb-0" id="status" name="status"
                                    aria-label="Gender select example">
                                <option  value="1">Active</option>
                                <option  value="0">Inactive</option>
                            </select>
                        </div>

                        <div class="col-md-6 mb-3">
                            <button type="button" id="save_product">Save</button>
                        </div>
                    </div>
                </form>

            </div>
        </div>

    </div>
</div>
@stop
