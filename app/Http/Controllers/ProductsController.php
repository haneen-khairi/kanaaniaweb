<?php

namespace App\Http\Controllers;
use App\Models\products;
use App\Models\categories;
use App\Models\sizes;
use App\Models\types;
use App\Models\settings;

use Illuminate\Http\Request;

class ProductsController extends Controller
{
    //
    public $goldPrice18=25;
    public $goldPrice21=32;
    public $goldPrice24=38;

    public function index(Request $request,$lang){
      $products=Products::where([]);
      $products->leftJoin('categories', 'categories.categoryid', '=', 'products.catid');

      if (request()->isMethod('GET')) {
                $input = request()->all();
                if(isset($input['category']) && $input['category']!=''){
                  $whereCat=array();
                  foreach ($input['category'] as $key => $value) {
                    $whereCat[]=$value;
                  }
                  $products->whereIn('catid',$whereCat);
                }
                if(isset($input['type']) && $input['type']!=''){
                  $whereType=array();
                  foreach ($input['type'] as $key => $value) {
                    $whereType[]=$value;
                  }
                  $products->whereIn('product_type',$whereType);
                }
                if(isset($input['size']) && $input['size']!=''){
                  $whereSizes=array();
                  foreach ($input['size'] as $key => $value) {
                    $whereSizes[]=$value;
                  }
                  $products->whereIn('psizeid',$whereSizes);
                }
                if(isset($input['amount']) && $input['amount']!=''){
                  $amount=explode('-',$input['amount']);
                  $min=(int)str_replace('$','',$amount[0]);
                  $max=(int)str_replace('$','',$amount[1]);

                  $products->whereBetween('total_price', [$min, $max]);
                }
                if(isset($input['keywords']) && $input['keywords']!=''){
                    $keywords=str_replace(' ','%',$input['keywords']);
                    $products->where('title_ar','like', '%' . $keywords . '%')->orWhere('title_ar', 'like', '%' . $keywords . '%')->orWhere('description_ar', 'like', '%' . $keywords . '%')->orWhere('description_en', 'like', '%' . $keywords . '%');
                }
       }
       //$products->with('category');
       $products=$products->paginate(config('web.pagination'));
      // $products->get();
       $categories=categories::all()->toArray();
       $sizes=sizes::all()->toArray();
       $types=types::all()->toArray();

      return view('products')
      ->with('products',  $products)
      ->with('categories',  $categories)
      ->with('sizes',  $sizes)
      ->with('lang',  $lang)
      ->with('types',  $types);
    }



    public function productDetails($lang,$id,$title){
      $product=Products::leftJoin('categories', 'categories.categoryid', '=', 'products.catid');
      $product=$product->where('productid','=',$id);
      $product=$product->first()->toArray();
      $sizes=sizes::all()->toArray();
      $relatedproducts=$this->getRelaedProduct($id,10);

      return view('productDetails')
      ->with('product',  $product)
      ->with('related',  $relatedproducts)
      ->with('sizes',  $sizes)
      ->with('lang',  $lang);
    }
    public function getRelaedProduct($id,$count){
      return null;
    }

    public function updateAllProductsPrice(){
        $goldPrice=$this->getPrice();
        $products=Products::all();
        foreach ($products as $product){
            $product->total_price=round($product->weight*$goldPrice['price'.$product['carat']]+($product->price*$product->carat),2);
            $product->save();
        }

        return json_encode(array('result'=>1));
    }

    public function getPrice()
    {

        $endpoint = config('web.goldAPIendPoint');
        $headers = [
            'Content-Type' => 'application/json',
            'x-access-token' => config('web.goldAPI')
        ];
//        $client = new \GuzzleHttp\Client(['headers' => $headers]);
//        $id = 5;
//        $value = "ABC";
//
//        $response = $client->request('GET', $endpoint.'/XAU/USD'
////            ['query' => [
////            'key1' => $id,
////            'key2' => $value,
////        ]]
//        );
//
//// url will be: http://my.domain.com/test.php?key1=5&key2=ABC;
//
//        $statusCode = $response->getStatusCode();
//        $content = $response->getBody();

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $endpoint.'/XAU/USD');
// SSL important
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

        $output = curl_exec($ch);
        curl_close($ch);
        $data=json_decode($output);
        $data['price']=1808;

        $price21=((($data['price']+25)+32.15)*0.885)/1000;
        $price18=((($data['price']+25)+32.15)*0.0790)/1000;
        $final_price=array('price18'=>$price18,'price21'=>$price21);

        $setings=settings::where('st_key','=','gold_price')->first();
        $setings->st_value=json_encode($final_price);
        $setings->save();

        return $final_price;
    }
}
