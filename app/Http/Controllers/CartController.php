<?php

namespace App\Http\Controllers;
use App\Models\products;


use Illuminate\Http\Request;

class CartController extends Controller
{
    //


    public function index(Request $request,$lang){
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


      return view('cart')
      ->with('products',$products)
      ->with('cart',$cart)
      ->with('lang',  $lang);
    }

    public function checkout(Request $request,$lang){
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
        $SubTotal+=(float)$SubTotal+(float)$product['total_price']*(float)$cart[$product['productid']]['qty'];
      }
      $shipping=config('web.shipping');
      $Total=$SubTotal+$shipping;


      return view('checkout')
      ->with('subtotal',$SubTotal)
      ->with('shipping',$shipping)
      ->with('Total',$Total)
      ->with('lang',  $lang);
    }

    public function addToCart(Request $request){
      if(request()->isMethod('GET')){
        $input = request()->all();
        if ($request->session()->exists('cart')) {
          $cart=$request->session()->get('cart');
        }else{
          $cart=array();
        }
        $cart[$input['id']]=array('productid'=>$input['id'],'price'=>$input['price'],'qty'=>$input['qty'],'size'=>$input['size']);
        $request->session()->put('cart',$cart);
        echo json_encode(array("cart_count"=>count($cart)));
      }
    }

    public function updateCart(Request $request){
      if(request()->isMethod('GET')){
        $input = request()->all();
        if ($request->session()->exists('cart')) {
          $cart=$request->session()->get('cart');
        }else{
          $cart=array();
        }
        $updatedCart=json_decode($input['items'],true);
        print_r($updatedCart);
          print_r($cart);
        $newCart=array();
        foreach ($cart as $item) {
          $cart[$item['productid']]['qty']=$updatedCart[$item['productid']];
        }
        $request->session()->put('cart',$cart);
        echo json_encode(array("cart_count"=>count($cart)));
      }
    }

    public function removeItem(Request $request){
      if(request()->isMethod('GET')){
        $input = request()->all();
        if ($request->session()->exists('cart')) {
          $cart=$request->session()->get('cart');
        }else{
          $cart=array();
        }
        unset($cart[$input['id']]);
        $request->session()->put('cart',$cart);
        echo json_encode(array("cart_count"=>count($cart)));
      }
    }



}
