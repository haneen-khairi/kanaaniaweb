@extends('layouts.dashboard')
@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center py-4">
    <div class="d-block mb-4 mb-md-0">
        <h2 class="h4">Orders</h2>
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
                <th class="border-gray-200">Customer</th>
                <th class="border-gray-200">Email</th>
                <th class="border-gray-200">Phone</th>
                <th class="border-gray-200">Country</th>
                <th class="border-gray-200">City</th>
                <th class="border-gray-200">Price</th>
                <th class="border-gray-200">Action</th>
            </tr>
        </thead>
        <tbody>
            <!-- Item -->
            @foreach ($orders as $order)
                <tr>
                    <td>
                        <a href="#" class="fw-bold">
                            {{$order['orderid']}}
                        </a>
                    </td>

                    <td>
                        <span class="fw-normal">{{$order['first_name']." ".$order['last_name']}}</span>
                    </td>
                    <td><span class="fw-normal">{{$order['email']}}</span></td>
                    <td><span class="fw-normal">{{$order['phone']}}</span></td>
                    <td><span class="fw-normal">{{$order['country']}}</span></td>
                    <td><span class="fw-normal">{{$order['city']}}</span></td>
                    <td><span class="fw-normal">{{$order['grand_total']}}</span></td>
                    <td><span class="fw-bold"><a href="/{{$lang}}/dashboard/orders/{{$order['orderid']}}/{{$order['first_name']}}">Details</a></span></td>

                </tr>
            @endforeach

        </tbody>
    </table>
    <div class="card-footer px-3 border-0 d-flex flex-column flex-lg-row align-items-center justify-content-between">
        <nav aria-label="Page navigation example">
            {{$orders->links()}}
        </nav>
    </div>
</div>
@stop
