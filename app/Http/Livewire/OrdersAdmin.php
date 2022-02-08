<?php

namespace App\Http\Livewire;
use App\Models\orders;
use App\Models\orders_details;

use Illuminate\Http\Request;
use Livewire\Component;

class OrdersAdmin extends Component
{
    public function index(Request $request,$lang){
        $orders=orders::paginate(config('web.pagination'));
        //$products->with('category');
        //$orders=$orders->paginate(config('web.pagination'));


        return view('dashboard.orders.index')
            ->with('orders',  $orders)
            ->with('lang',  $lang);
    }
    public function details($lang,$id,$title){
        $orders=orders::where('orderid','=',$id)->first();
        $details=orders_details::leftJoin('products', 'products.productid', '=', 'orders_details.od_orderid')
        ->leftJoin('categories', 'categories.categoryid', '=', 'products.catid')
        ->leftJoin('types', 'types.typeid', '=', 'products.product_type')
        ->leftJoin('sizes', 'sizes.sizeid', '=', 'products.psizeid')
        ->where('od_orderid','=',$id)->get();

        return view('dashboard.orders.orderDetails')
            ->with('order',$orders)
            ->with('details',$details)
            ->with('lang',$lang);

    }

}
