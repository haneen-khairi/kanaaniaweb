@extends('layouts.dashboard')
@section('content')
<div>
<div class="row">
        <div class="col-12 col-xl-12">
            <label for=""> Orders Info</label>
        <table class="table table-sm table-dark">

  <thead>
    <tr>
      <th scope="col-2">id</th>
      <th scope="col-2">Customer</th>
      <th scope="col-2">Email</th>
      <th scope="col-2">Phone</th>
      <th scope="col-2">Country</th>
      <th scope="col-2">City</th>
      <th scope="col-2">Price</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td scope="row"> {{$order['orderid']}}</th>
      <td>{{$order['first_name']." ".$order['last_name']}}</td>
      <td>{{$order['email']}}</td>
      <td>{{$order['phone']}}</td>
      <td>{{$order['country']}}</td>
      <td>{{$order['city']}}</td>
      <td>{{$order['grand_total']}}</td>
    </tr>

  </tbody>
</table>



        </div>
</div>
    <div class="row">
        <div class="col-12 col-xl-12">
        <label for=""> Order Details</label>
        <table class="table  table-dark">
  <thead>
    <tr>
      <th scope="col-2">#</th>
      <th scope="col-2">ID</th>
      <th scope="col-2">Title</th>
      <th scope="col-2">Image</th>
      <th scope="col-2">Price</th>
      <th scope="col-1">Size</th>
      <th scope="col-1">Kerat</th>
      <th scope="col-2">Categoury</th>

    </tr>
  </thead>
  <tbody>
  {{$i=1}}
  @foreach($details as $item)
      <tr>
          <th scope="row">{{$i}}</th>
          <td>{{$item['productid']}}</td>
          <td><a target="_blank" style="color: white;" href="{{  url('/en/products/'.$item['productid'].'/'.$item['title_en'])  }}">{{$item['title_en']}}</a></td>
          <td><img src="{{ asset('img/product/product-'.$item['productid'].'.jpg') }}" style="width:75px;"> </td>
          <td>${{$item['total_price']}}</td>
          <td>{{$item['stitle_en']}}</td>
          <td>{{$item['carat']}}</td>
          <td>{{$item['ctitle_en']}}</td>
      </tr>
      {{$i++}}
  @endforeach
  </tbody>
</table>

    </div>
</div>
@stop
