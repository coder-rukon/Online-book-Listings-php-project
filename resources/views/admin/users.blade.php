@extends('layouts.admin')

@section('content')
@if (session('message'))
<div class="alert alert-success">
    <h4 class="alert-heading">{{session('message')}}</h4>
</div>  
@endif
<table class="table table-striped table-inverse">
    <thead class="thead-inverse">
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Option</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($users as $user)
            <tr>
                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>
                <td>
                    <a class="btn btn-danger ml-2" href="{{ route('admin.reauesteDeleteUser',['id'=> $user->id ]) }}">Delete</a>
                </td>
            </tr>
        @endforeach
        
    </tbody>
</table>
{{$users->links()}}
@endsection
