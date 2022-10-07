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
        <div class="card-header"> All Category </div>
    </div>


    <table class="table">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">User ID</th>
            <th scope="col">Created at</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>

@foreach ( $categories as $cat )


          <tr>
            <th scope="row">{{ $categories->firstItem()+$loop->index }}</th>
            <td>{{ $cat->Category_name }}</td>
            <td>{{ $cat->user->name }}</td>
            <td>{{ $cat->created_at->diffForhumans() }}</td>
            <td> <a href="{{ url('category/edit/'.$cat->id) }}" class="btn btn-info">Edit</a>
                <a href="{{ url('category/delete/'.$cat->id) }}" class="btn btn-danger">Delete</a>
            </td>



          </tr>
          @endforeach
        </tbody>
      </table>
{{ $categories->links() }}

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


            <form action="{{ route('store.category') }}" method="POST">
                @csrf
                <div class="form-group" >
                    <label for=""> Category Name</label>
                    <input type="text" class="form-control" name="category_name">

                    @error('category_name')
                  <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div> <br>
                <button type="submit" class="btn btn-primary">Add Category</button>
            </form>
</div>
        </div>
    </div>










<!-- Trash Part -->
    <div class="container">
<div class="row">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">Trash </div>
        </div>

    <table class="table">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">User ID</th>
            <th scope="col">Created at</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>

@foreach ( $trashcat as $cat )


          <tr>
            <th scope="row">{{ $categories->firstItem()+$loop->index }}</th>
            <td>{{ $cat->Category_name }}</td>
            <td>{{ $cat->user->name }}</td>
            <td>{{ $cat->created_at->diffForhumans() }}</td>
            <td> <a href="{{ url('category/restore/'.$cat->id) }}" class="btn btn-Primary">Restore</a>
                <a href="{{ url('category/remove/'.$cat->id) }}" class="btn btn-danger">P Delete</a>
            </td>


          </tr>
          @endforeach
        </tbody>
      </table>


{{ $trashcat->links() }}

    </div>


    <div class="col-md-4">
        <div class="card">


 </div>
    </div>

</div>
    </div>







</div>
</div>
</x-app-layout>
