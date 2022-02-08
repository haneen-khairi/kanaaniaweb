<?php

namespace App\Http\Livewire;
use App\Models\products;
use App\Models\categories;
use App\Models\settings;
use App\Models\sizes;
use App\Models\types;
use Illuminate\Http\Request;
use Livewire\Component;

class ProductsAdmin extends Component
{

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

        return view('dashboard.products.index')
            ->with('products',  $products)
            ->with('categories',  $categories)
            ->with('sizes',  $sizes)
            ->with('lang',  $lang)
            ->with('types',  $types);
    }

    public function edit($lang,$id,$title){
        $product=Products::leftJoin('categories', 'categories.categoryid', '=', 'products.catid');
        $product=$product->where('productid','=',$id);
        $product=$product->first()->toArray();
        // $categories=categories::all()->toArray();
        // $types=types::all()->toArray();
        $categories=categories::all()->toArray();
        $sizes=sizes::all()->toArray();
        $types=types::all()->toArray();
        return view('dashboard.products.edit')
            ->with('product',  $product)
            ->with('sizes',  $sizes)
            ->with('categories',  $categories)
            ->with('types',  $types)
            ->with('lang',  $lang);
    }
    public function new($lang){
        $categories=categories::all()->toArray();
        $sizes=sizes::all()->toArray();
        $types=types::all()->toArray();
        return view('dashboard.products.new')
            ->with('sizes',  $sizes)
            ->with('categories',  $categories)
            ->with('types',  $types)
            ->with('lang',  $lang);
    }

    public function update(Request $request,$lang,$id){
        $setings=settings::where('st_key','=','gold_price')->first();
        $goldPrice=json_decode($setings['st_value'],true);

        $product=Products::where('productid','=',$id);
        $product=$product->first();
        $product->title_ar= $request->post('title_ar');
        $product->title_en=$request->post('title_en');
        $product->description_ar=$request->post('desc_ar');
        $product->description_en=$request->post('desc_en');
        $product->product_type=$request->post('type');
        $product->qty=$request->post('quantity');
        $product->carat=$request->post('carat');
        $product->price=$request->post('price');
        $product->catid=$request->post('category');
        $product->weight=$request->post('weight');
        $product->status=$request->post('status');
        $product->total_price=round($product->weight*$goldPrice['price'.$request->post('carat')]+($product->price*$request->post('carat')),2);
        $product->save();
        return json_encode(array('result'=>1));
    }
    public function store(Request $request,$lang){
        $setings=settings::where('st_key','=','gold_price')->first();
        $goldPrice=json_decode($setings['st_value'],true);
        $product= new products();
        $product->title_ar= $request->input('title_ar');
        $product->title_en=$request->input('title_en');
        $product->description_ar=$request->input('desc_ar');
        $product->description_en=$request->input('desc_en');
        $product->product_type=$request->input('type');
        $product->qty=$request->input('quantity');
        $product->carat=$request->input('carat');
        $product->price=$request->input('price');
        $product->catid=$request->input('category');
        $product->weight=$request->input('weight');
        $product->status=$request->input('status');
        $product->total_price=round($product->weight*$goldPrice['price'.$request->input('carat')]+($product->price*$request->input('carat')),2);
        $product->save();
        return json_encode(array('result'=>1,"id"=>$product->productid,"title"=>$product->title_en));
    }

    public function makeimgdef(Request $request,$lang){
        $input = request()->all();
        $destinationPath=public_path()."/img/product/product-".$input['productid'].".".pathinfo($input['img'], PATHINFO_EXTENSION);
        $success = \File::copy(public_path()."/img/product/".$input['productid']."/".$input['img'],$destinationPath);
        if($success){
            return json_encode(array('result'=>1));
        }else{
            return json_encode(array('result'=>0));
        }
    }

    public function deleteimg(Request $request,$lang){
        $input = request()->all();
        $success = \File::delete(public_path()."/img/product/".$input['productid']."/".$input['img']);
        if($success){
            return json_encode(array('result'=>1));
        }else{
            return json_encode(array('result'=>0));
        }
    }

    public function uploadimgs(Request $request,$lang){
//        $this->validate($request, [
//            'file' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
//            'productid' => 'required|max:500',
//        ]);

        $files = [];
        if($request->hasfile('file'))
        {

            $path=public_path().'/img/product/'.$request->post('productid')."/";
            \File::isDirectory($path) or \File::makeDirectory($path, 0777, true, true);

            foreach($request->file('file') as $file)
            {
                $name = uniqid().'.'.$file->extension();
                $file->move($path, $name);
                $files[] = $name;
            }
        }

//        $file= new File();
//        $file->filenames = $files;
        return '<script type="text/javascript">window.parent.location.reload();</script>';

        //return json_encode(array('result'=>1,'path'=>$path,"files"=>$files));

    }

    public function delete($lang,$id){
        $products=Products::where('productid','=',$id)->delete();
        return json_encode(array('result'=>1,'id'=>$id));
    }
}
