<?php

namespace App\Http\Controllers;

use App\Brand;
use App\Category;
use App\Product;
use Illuminate\Support\Facades\DB;
use Image;
use Illuminate\Http\Request;

class ProductController extends Controller
{
  public function index(){
      $category=Category::where('publication_status',1)->get();
      $brand=Brand::where('publication_status',1)->get();
      return view('admin.product.add-product',[
          'category'=>$category,
          'brand'=>$brand
      ]);
  }
  protected  function saveImage($request){

      $productImage=$request->file('product_image');
     $filetype=$productImage->getClientOriginalExtension();
      $imageName=$request->product_name.'.'.$filetype;
      $directory='product-image/';
      $imageUrl=$directory.$imageName;
     // $productImage->move($directory,$imageName);
      Image::make($productImage)->save($imageUrl);
      return $imageUrl;
  }
  protected function productadd($request,$imageUrl){
      $product=new Product();
      $product->category_id=$request->category_id;
      $product->brand_id=$request->brand_id;
      $product->product_name=$request->product_name;
      $product->product_price=$request->product_price;
      $product->product_quantity=$request->product_quantity;
      $product->short_description=$request->short_description;
      $product->long_description=$request->long_description;
      $product->product_image=$imageUrl;
      $product->publication_status=$request->publication_status;
      $product->save();
  }
  public function productSave(Request $request){

    $imageUrl=$this->saveImage($request);
    $this->productadd($request,$imageUrl);

      return redirect('/product/add')->with('message','product save successfully');


  }
  public function productManege(){
      $product=DB::table('products')
          ->join('categories','products.category_id','=','categories.id')
          ->join('brands','products.brand_id','=','brands.id')
          ->select('products.*','categories.category_name','brands.brand_name')
      ->get();

      return view('admin.product.manege-product',[
          'product'=>$product
      ]);
  }
    public function UnpublishedProduct($id){
        $product=Product::find($id);
        $product->publication_status=0;
        $product->save();
        return redirect('/product/manege')->with('massage','product unpublished');


    }
    public function publishedProduct($id){
        $product=Product::find($id);
        $product->publication_status=1;
        $product->save();
        return redirect('/product/manege')->with('massage','product published');


    }
    public function editProduct($id) {
        $product = Product::find($id);
        $categories = Category::where('publication_status', 1)->get();
        $brands = Brand::where('publication_status', 1)->get();

        return view('admin.product.edit-product', [
            'product'=>$product,
            'categories'=>$categories,
            'brands'=>$brands
        ]);
    }
    public function productBasicInfoUpdate($product, $request, $imageUrl=null) {
        $product->category_id = $request->category_id;
        $product->brand_id = $request->brand_id;
        $product->product_name = $request->product_name;
        $product->product_price = $request->product_price;
        $product->product_quantity = $request->product_quantity;
        $product->short_description = $request->short_description;
        $product->long_description = $request->long_description;
        if($imageUrl) {
            $product->product_image = $imageUrl;
        }
        $product->publication_status = $request->publication_status;
        $product->save();

    }
    public function updateProduct(Request $request) {
        $productImage = $request->file('product_image');
        $product = Product::find($request->product_id);

        if($productImage) {
            unlink($product->product_image);
            $imageUrl= $this->saveImage($request);
            $this->productBasicInfoUpdate($product, $request, $imageUrl);
        }  else {
            $this->productBasicInfoUpdate($product, $request);
        }

        return redirect('/product/manege')->with('message', 'Product info updated');
    }
    public function deleteProduct($id){
      $product= Product::find($id);
        $product->delete();
        return redirect('/product/manege')->with('massage','product delete successfully');
    }

}
