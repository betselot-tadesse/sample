<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
         Brands <b></b>
    </x-slot> <br> <br>
@extends('layouts.bootstrap')
<div class="container">
<div class="row">
    <div class="col-md-8">
    <div class="card">
        <div class="card-header"> All Brands </div>
    </div>
    @if (session('Success'))

    <div class="alert alert-primary alert-dismissible fade show" role="alert">
        <strong>{{ session('Success') }}</strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
@endif

    <table class="table">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Brand Name</th>
            <th scope="col">Brand Image</th>
            <th scope="col">Created at</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
@php
    $i=1
@endphp
@foreach ( $brands as $brand )


          <tr>
            <th scope="row">{{ $brands->firstItem()+$loop->index }}</th>
            <td>{{ $brand->brand_name }}</td>
            <<td><img src="{{ asset($brand->brand_image) }}" alt="" style="height: 40px; width:70px"></td>
            <td>{{ $brand->created_at->diffForhumans() }}</td>
            <td> <a href="{{ url('brand/edit/'.$brand->id) }}" class="btn btn-info">Edit</a>
                <a href="{{ url('brand/delete/'.$brand->id) }}" onclick="return confirm('Are you Sure To Delete')"
                    class="btn btn-danger">Delete</a>
            </td>



          </tr>
          @endforeach
        </tbody>
      </table>
{{ $brands->links() }}

    </div>


    <div class="col-md-4">
        <div class="card">



            <div class="card-header"> Add Brands </div>
            <div class="card-body">


            <form action="{{ route('store.brand') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group" >
                    <label for=""> Brand Name</label>
                    <input type="text" class="form-control" name="brand_name">
                    @error('brand_name')
                    <span class="text-danger">{{ $message }}</span>
                      @enderror
                    <div class="form-group" >
                        <label for=""> Brand Image</label>
                        <input type="file" class="form-control" name="brand_image">

                    @error('brand_image')
                  <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div> <br>
                <button type="submit" class="btn btn-primary">Add Brand</button>
            </form>
</div>
        </div>
    </div>









 </div>
    </div>

</div>
    </div>







</div>
</div>
</x-app-layout>
