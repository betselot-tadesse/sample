<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Carbon\Carbon;
use GrahamCampbell\ResultType\Success;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CatagoryController extends Controller
{
    public function cat(){
        $categories=Category::latest()->paginate(5);
        $trashcat=Category::onlyTrashed()->latest()->paginate(3);
        return view('admin.category.cat',compact('categories','trashcat'));
    }
    public function add(Request $Request){
        $validatedata=$Request->validate([
'category_name'=>'required|unique:categories|max:255|',
        ],
['category_name.required'=>'please input Category Name']

    );
    // Category::insert([
    //   'category_name'=>$Request->category_name,
    //   'user_id'=>Auth::user()->id,
    //   'created_at'=>Carbon::now()

    // ]);

    $category=new Category;
    $category->category_name=$Request->category_name;
    $category->user_id=Auth::user()->id;
    $category->save();
    return redirect()->back()->with('Success','Category Inserted Succesfully');

    }
   public function edit($id){
    $category=Category::find($id);
    return view('admin.category.edit',compact('category'));
   }


   public function Update(Request $request,$id){
    $update=Category::find($id)->update([
        'Category_name'=>$request->category_name,
        'user_id'=>Auth::user()->id
    ]);
    return redirect()->route('all.cat')->with('Success','Category Updated Succesfully');

   }


   public function SoftDelete($id){
    $delete=Category::find($id);
    $delete->delete();
    return redirect()->back()->with('Success','Category Deleted Succesfully');
   }


   public function Restore($id){
    $restore=Category::withTrashed()->find($id);
    $restore->restore();
    return redirect()->back()->with('Success','Category Restore Succesfully');
   }

   public function Remove($id){
$delete=Category::onlyTrashed()->find($id)->forceDelete();
return redirect()->back()->with('Success','Category Deleted Succesfully');
   }
}
