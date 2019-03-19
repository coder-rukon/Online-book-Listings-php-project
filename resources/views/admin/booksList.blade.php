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
            <th>Thumbnail</th>
            <th>Details</th>
            <th>Uploaded By</th>
            <th>Status</th>
            <th>Option</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($books as $book)
            <tr>
                <td scope="row">
                        <img src="{{ asset('storage/'.$book->thumbnail ) }}" class="thumbnail round" style="width:70px;"/>
                </td>
                <td>{{$book->name}}</td>
                @php
                $userTemp = \App\User::find(['id'=>$book->uploaded_by])->first();
                @endphp
                <td>{{ ( isset($userTemp->name) ? $userTemp->name: "User not found or may be deleted") }}</td>
                <td>
                    @if ($book->status == 'publish')
                    <button class="btn btn-success"> {{ $book->status }} </button>
                    @else
                    <button class="btn btn-danger"> {{ $book->status }} </button>
                    @endif
                </td>
                <td>
                    <div class="btn-group" role="group" aria-label="Basic example">
                        <a class="btn btn-info" href="{{ route('admin.editBook',['id'=> $book->id ]) }}">Edit</a>
                        <a class="btn btn-danger ml-2" href="{{ route('admin.reauesteDeleteBook',['id'=> $book->id ]) }}">Delete</a>
                    </div>
                </td>
            </tr>
        @endforeach
        
    </tbody>
</table>
{{$books->links()}}
@endsection
