<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">

           Hi.. <b>{{ Auth::user()->name }}</b>
           <b style="float: right">Total Users
            <span class="badge badge-danger">{{ count($users) }}</span>

            </b>
<style>
    #cl {
        display: inline-block;
        padding-left: 30%;
    }
</style>

        
    </x-slot>
    @extends('layouts.mdb')

    <table class="table">
        <thead class="table-dark">
          <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Created at</th>
          </tr>
        </thead>
        <tbody>
            @php($i=1)
            @foreach ($users as $user )


          <tr>
            <th scope="row">{{ $i++ }}</th>
            <td>{{$user->name }}</td>
            <td>{{$user ->email }}</td>
            <td>{{$user->created_at->diffForhumans() }}</td>

          </tr>
          @endforeach
        </tbody>
      </table>



</x-app-layout>
