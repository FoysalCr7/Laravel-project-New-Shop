<?php

namespace App\Http\Controllers;

use App\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    public function index(){
        return view('admin.brand.add-brand');
    }
    public function brandSave(Request $request){

       $this->validate($request,[
           'brand_name' => 'required|alpha|regex:/^[\pL\s\-]+$/u',
           'brand_description' => 'required',
           'publication_status' => 'required'
       ]);
        $brand=new Brand();
        $brand->brand_name=$request->brand_name;
        $brand->brand_description=$request->brand_description;
        $brand->publication_status=$request->publication_status;
        $brand->save();
        return redirect('/brand/add')->with('message','Brand save successfully');

    }
    public function manegeBrand(){
        $brand=Brand::all();

        return view('admin.brand.manege-brand',['brand'=>$brand]);
    }
    public function UnpublishedBrand($id){
        $brand=Brand::find($id);
        $brand->publication_status=0;
        $brand->save();
        return redirect('/brand/manege')->with('massage','brand unpublished');


    }
    public function publishedBrand($id){
        $brand=Brand::find($id);
        $brand->publication_status=1;
        $brand->save();
        return redirect('/brand/manege')->with('massage','brand unpublished');


    }
    public function editBrand($id){
        $brand = Brand::find($id);
        return view('admin.brand.edit-brand',['brand'=>$brand]) ;
    }
    public function updateBrand(Request $request){
        $brand=Brand::find($request->brand_id);
        $brand->brand_name = $request->brand_name;
        $brand->brand_description = $request->brand_description;
        $brand->publication_status = $request->publication_status;
        $brand->save();

        return redirect('/brand/manege')->with('massage','brand update successfully');
    }
    public function deleteBrand($id){
        $brand = Brand::find($id);
        $brand->delete();
        return redirect('/brand/manege')->with('massage','brand delete successfully');
    }
}
