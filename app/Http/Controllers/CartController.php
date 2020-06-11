<?php

namespace App\Http\Controllers;

use App\Product;
use Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
   public function addCart(Request $request){
     $product= Product::find($request->id);
     \Cart::add([
         'id'=>$request->id,
         'name'=>$product->product_name,
         'price'=>$product->product_price,
         'quantity'=>$request->quantity,
         'attributes' =>[
             'image' => $product->product_image,

         ]

     ]);
     return redirect('/cart/show');
   }
   public function showCart(){
       $cartproduct=\Cart::getContent();

       return view ('front-end.cart.show-cart',[
           'cartproduct'=>$cartproduct
       ]);
   }
   public function deleteCart($id){
       Cart::remove($id);
       return redirect('/cart/show');
   }
   /*public function updateCart(Request $request){

       Cart::update($request->id, $request->quantity)  ;
       return redirect('/cart/show');
   }*/
}
