<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use Illuminate\Http\Request;

class NewShopController extends Controller
{
   public function index(){
       $category=Category::where('publication_status',1)->get();
       $newProduct=Product::where('publication_status',1)
                            ->orderBy('id','DESC')
                            ->take(8)
                            ->get();
       return view('front-end.home.home',[
           'category'=>$category,
           'newProduct'=>$newProduct
       ]);
   }
    public function categoryProduct($id){

      $categoryProduct= Product::where('category_id',$id)
          ->where('publication_status',1)
          ->get();
        return view('front-end.category.category-content',['categoryProduct'=>$categoryProduct
       ]);
    }
    public function MailUs(){
        $category=Category::where('publication_status',1)->get();
        return view('front-end.Contact.mail',['category'=>$category]);
    }
    public function productDetails($id){
       $product=Product::find($id);
       return view ('front-end.product.product-details',['product'=>$product]);
    }
}
