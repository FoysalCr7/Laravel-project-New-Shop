<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
   public function index(){
       return view('admin.category.add-category');
   }
public function manegeCategory(){
       $catogries=Category::all();

    return view('admin.category.manege-category',['categories'=>$catogries]);
}
public function save(Request $request){
       $category = new Category();
       $category->category_name = $request->category_name;
        $category->category_description = $request->category_description;
       $category->publication_status = $request->publication_status;
       $category->save();

     /*  Category::create($request->all());

          DB::table('categories')->insert([
              'category_name'           => $request->category_name,
              'category_description'    => $request->category_description,
          'publication_status'      => $request->publication_status
        ]);
*/


    return redirect('/category/add')->with('massage','category save successfully');

}
public function UnpublishedCategory($id){
       $cattegory=Category::find($id);
       $cattegory->publication_status=0;
       $cattegory->save();
       return redirect('/category/manege')->with('massage','category unpublished');


}
    public function publishedCategory($id)
    {
        $cattegory = Category::find($id);
        $cattegory->publication_status = 1;
        $cattegory->save();
        return redirect('/category/manege')->with('massage', 'category published');
    }
public function editCategory($id){
    $category = Category::find($id);
return view('admin.category.edit-category',['category'=>$category]) ;
}
public function updateCategory(Request $request){
       $category=Category::find($request->category_id);
    $category->category_name = $request->category_name;
    $category->category_description = $request->category_description;
    $category->publication_status = $request->publication_status;
    $category->save();

    return redirect('/category/manege')->with('massage','category update successfully');
}
public function deleteCategory($id){
    $category = Category::find($id);
    $category->delete();
    return redirect('/category/manege')->with('massage','category delete successfully');
}
}
