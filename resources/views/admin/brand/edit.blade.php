
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
         Brands <b></b>
    </x-slot> <br> <br>
@extends('layouts.bootstrap')
<div class="container">
<div class="row">



    <div class="col-md-6">
        <div class="card">



            <div class="card-header"> Update Brands </div>
            <div class="card-body">


            <form action="{{ url('brand/update/'.$brand->id) }}" method="POST" enctype="multipart/form-data">
                @csrf

   <input type="hidden" name="old_image" value={{ $brand->brand_image }}>

                <div class="form-group" >
                    <label for=""> Brand Name</label>
                    <input type="text" class="form-control" name="brand_name" value={{ $brand->brand_name }}>
                    @error('brand_name')
                    <span class="text-danger">{{ $message }}</span>
                      @enderror
                    <div class="form-group" >
                        <label for=""> Brand Image</label>
                        <input type="file" class="form-control" name="brand_image" value={{ $brand->brand_image }}>

                    @error('brand_image')
                  <span class="text-danger">{{ $message }}</span>
                    @enderror
<div class="form-group">
    <img src="{{ asset( $brand->brand_image ) }}" style="height: 200px; width: 400px" >
</div>

                </div> <br>
                <button type="submit" class="btn btn-primary">Update Brand</button>
            </form>
</div>
        </div>
    </div>









 </div>


</div>








</div>
</div>
</x-app-layout>
