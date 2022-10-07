<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
         All Category <b></b>
    </x-slot> <br> <br>
@extends('layouts.bootstrap')
<div class="container">
<div class="row">
    <div class="col-md-8">
    <div class="card">

    </div>




    <div class="col-md-4">
        <div class="card">
@if (session('Success'))

            <div class="alert alert-primary alert-dismissible fade show" role="alert">
                <strong>{{ session('Success') }}</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
   @endif


            <div class="card-header"> Add Category </div>
            <div class="card-body">


            <form action="{{ url('category/update/'.$category->id) }}" method="POST">
                @csrf
                <div class="form-group" >
                    <label for=""> Edit Category</label>
                    <input type="text" class="form-control" name="category_name" value="{{ $category->Category_name }}">

                    @error('category_name')
                  <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div> <br>
                <button type="submit" class="btn btn-primary">Update Category</button>
            </form>
</div>
        </div>
    </div>

</div>
</div>
</x-app-layout>
