<?php

namespace App\Http\Controllers;
use App\Models\products;
use App\Models\orders;
use App\Models\orders_details;
use Illuminate\Http\Request;

class PaymentController extends Controller{
    //
    public function pay(Request $request){
      $itemsId=array();
      if ($request->session()->exists('cart')) {
        $cart=$request->session()->get('cart');
        foreach ($cart as $item) {
          $itemsId[]=$item['productid'];
        }
      }else{
        $cart=[];
      }
      $products=Products::whereIn('productid',$itemsId);
      $products=$products->get();
      $SubTotal=0;
      $Total=0;
      foreach ($products as $product) {
        $SubTotal+=(float)$SubTotal+(float)$product['total_price']*(float)$cart[$product['productid']];
      }
      $shipping=config('web.shipping');
      $Total=$SubTotal+$shipping;

      $order=new orders;
      $order->odate=now();
      $order->subtotal=$SubTotal;
      $order->shipping=$shipping;
      $order->grand_total=$Total;
      $order->payment_method= $request->input('payment_method');
      $order->first_name=$request->input('f_name');
      $order->last_name=$request->input('l_name');
      $order->email=$request->input('email');
      $order->country=$request->input('country');
      $order->address1=$request->input('address');
      $order->address2=$request->input('address');
      $order->city=$request->input('city');
      $order->phone=$request->input('phone');
      $order->note=$request->input('ordernote');
      $order->save();
      $orderid=$order->orderid;

      foreach ($cart as $item){
        $order_details=new orders_details;
        $order_details->od_orderid=$orderid;
        $order_details->od_productid=$item['productid'];
        $order_details->od_size=$item['size'];
        $order_details->od_price=$item['price'];
        $order_details->od_qty=$item['qty'];
        $order_details->save();
      }
      return json_encode(array('result'=>1));
    }
    public function success(Request $request,$lang){
        return view('success')
            ->with('lang',$lang);
    }
}
