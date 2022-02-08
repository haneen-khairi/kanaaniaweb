@extends('layouts.dashboard')
@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center py-4">
    <div class="d-block mb-4 mb-md-0">
        <h2 class="h4">Products</h2>
    </div>
    <div class="btn-toolbar mb-2 mb-md-0">
        <a href="{{URL::to('/'.$lang.'/product/new')}}" class="btn btn-sm btn-gray-800 d-inline-flex align-items-center">
            <svg class="icon icon-xs me-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" width="20" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path></svg>
            New Product
        </a>
    </div>
</div>
<div class="table-settings mb-4" style="display: none;">
    <div class="row align-items-center justify-content-between">
        <div class="col col-md-6 col-lg-3 col-xl-4">
            <div class="input-group me-2 me-lg-3 fmxw-400">
                <span class="input-group-text">
                    <svg class="icon icon-xs" x-description="Heroicon name: solid/search" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                        <path fill-rule="evenodd" width="20" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path>
                    </svg>
                </span>
                <input type="text" class="form-control" placeholder="Search Products">
            </div>
        </div>

    </div>
</div>
<div class="card card-body border-0 shadow table-wrapper table-responsive">
    <table class="table table-hover">
        <thead>
            <tr>
                <th class="border-gray-200">#</th>
                <th class="border-gray-200">Product Name</th>
                <th class="border-gray-200">weight</th>
                <th class="border-gray-200">Category</th>
                <th class="border-gray-200">Price</th>
                <th class="border-gray-200">Status</th>
                <th class="border-gray-200">Action</th>
            </tr>
        </thead>
        <tbody>
            <!-- Item -->
            @foreach ($products as $product)
                <tr>
                    <td>
                        <a href="#" class="fw-bold">
                            {{$product['productid']}}
                        </a>
                    </td>
                    <td>
                        <span class="fw-normal">{{$product['title_'.$lang]}}</span>
                    </td>
                    <td><span class="fw-normal">{{$product['weight']}}</span></td>
                    <td><span class="fw-normal">{{$product['ctitle_'.$lang]}}</span></td>
                    <td><span class="fw-bold">${{$product['total_price']}}</span></td>
                    <td><span class="fw-bold text-warning"><?php if($product['status']){echo 'active';}else{echo 'inactive';}?></span></td>
                    <td>
                        <div class="btn-group">
                            <button class="btn btn-link text-dark dropdown-toggle dropdown-toggle-split m-0 p-0" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="icon icon-sm">
                                <span class="fas fa-ellipsis-h icon-dark"></span>
                            </span>
                                <span class="visually-hidden">Toggle Dropdown</span>
                            </button>
                            <div class="dropdown-menu py-0">
                                <a class="dropdown-item" href="/{{$lang}}/edit-product/{{$product['productid']}}/product-{{$product['title_'.$lang]}}"><span class="fas fa-edit me-2"></span>Edit</a>
                                <a class="dropdown-item text-danger rounded-bottom jq_remove" data-item="products" data-id="{{$product['productid']}}" ><span class="fas fa-trash-alt me-2"></span>Remove</a>
                            </div>
                        </div>
                    </td>
                </tr>
            @endforeach

        </tbody>
    </table>
    <div class="card-footer px-3 border-0 d-flex flex-column flex-lg-row align-items-center justify-content-between">
        <nav aria-label="Page navigation example">
            {{$products->links()}}
        </nav>
        <!-- <div class="fw-normal small mt-4 mt-lg-0">Showing <b>{{$products->firstItem()}}–{{$products->lastItem()}}</b> out of <b>{{$products->total()}}</b> Products</div>
    </div>
</div>
@stop
