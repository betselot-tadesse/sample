<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use BaconQrCode\Renderer\Path\Move;
use Carbon\Carbon;
use GrahamCampbell\ResultType\Success;
use Illuminate\Http\Request;
use Image;
class BrandController extends Controller
{
    public function AllBrand(){
        $brands=Brand::latest()->paginate(5);
        return view('admin.brand.index',compact('brands'));
    }

    public function insert(Request $request){
        $validation=$request->validate([
'brand_name'=>'required|min:3|unique:brands',
'brand_image'=>'required|mimes:png,jpg'
],
  [  'brand_image.required'=> 'You should Select an Image']);

  $brand_image=$request->file('brand_image');
//   $name_gen=hexdec(uniqid());
//   $image_ext=strtolower($brand_image->getClientOriginalExtension());
//   $img_name=$name_gen.'.'.$image_ext;

//   $up_location='Image/Brand/';
//   $last_image=$up_location.$img_name;
//   $brand_image->move($up_location,$img_name);
$name_gen=hexdec(uniqid()).'.'.$brand_image->getClientOriginalExtension();


Image::make($brand_image)->resize(300, 200)->save('image/brand'.$name_gen);
$last_image='image/brand'.$name_gen;

  $brands=new Brand;
  $brands->brand_name=$request->brand_name;
  $brands->brand_image=$last_image;
  $brands->save();


// Brand::insert([
// 'brand_name'=>$request->brand_name,
// 'brand_image'=>$last_image,
// 'created_at'=>Carbon::now()
// ]
// );
  return redirect()->back()->with('Success','Brand Inserted Succesfully');


    }

public function edit($id){
$brand=Brand::find($id);
return view('admin.brand.edit',compact('brand'));

}




public function Update(Request $request,$id){
    $validation=$request->validate([
        'brand_name'=>'required|min:3',

        ],
          [  'brand_image.required'=> 'You should Select an Image']);

         $old_image=$request->old_image;
          $brand_image=$request->file('brand_image');

          if($brand_image){
            $name_gen=hexdec(uniqid());
            $image_ext=strtolower($brand_image->getClientOriginalExtension());
            $img_name=$name_gen.'.'.$image_ext;

            $up_location='Image/Brand/';
            $last_image=$up_location.$img_name;
            $brand_image->move($up_location,$img_name);
            unlink($old_image);


      $update=Brand::find($id)->Update([
          'brand_image'=>$last_image
      ]

  );
   return redirect()->back()->with('Success','Brand Updated Successfully');

          }


    else{
        $update=Brand::find($id)->Update([
            'brand_name'=>$request->brand_name,
        ]);
        return redirect()->back()->with('Success','Brand Updated Successfully');
          }

}

public function Delete($id){
    $image=Brand::find($id);
    $old_image=$image->brand_image;
    unlink($old_image);
    $delete=Brand::find($id)->delete();
   return redirect()->route('all.brand')->with('Success','Brand is Deleted Successfully');
}


}
