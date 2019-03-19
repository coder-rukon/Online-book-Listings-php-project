@extends('layouts.admin')

@section('content')
    {{ Form::open([ "route" => "admin.requestEditBook",'files' => true]) }}
        @if ($errors->any())
            @foreach ($errors->all() as $error)
                <div class="alert alert-danger">
                    <h4 class="alert-heading">{{$error}}</h4>
              </div>  
            @endforeach
            
        @endif
        @if (session('message'))
            <div class="alert alert-success">
                <h4 class="alert-heading">{{session('message')}}</h4>
            </div>  
        @endif
        <input type="hidden" value="{{ $book->id }}" name="id">
        <div class="form-group">
            <label>Book Name</label>
            <input type="text" name="name" value="{{ $book->name }}"  class="form-control"/>
        </div>
        <div class="form-group">
            <label>Author</label>
            <input type="text" name="author"  value="{{ $book->author }}" class="form-control"/>
        </div>
        <div class="form-group">
            <label>Edition</label>
            <input type="text" name="edition" value="{{ $book->edition }}"  class="form-control"/>
        </div>
        <div class="form-group">
            <label>File type</label>
            <select name="type"  class="form-control">
                <option {{ ( $book->type == 'soft_copy' ? 'selected' : '' ) }} value='soft_copy'>Soft Copy</option>
                <option {{ ( $book->type == 'hard_copy' ? 'selected' : '' ) }} value="hard_copy">Hard Copy</option>
            </select>
        </div>
        
        <div class="form-group">
            <label>Book Cover Image/Thumbnail</label>
            <img src="{{ asset('storage/'.$book->thumbnail ) }}" style="max-width:100%;"/>
            <input type="file" name="thumbnail" class="form-control"/>
        </div>
        <div class="form-group">
            <label>Select Book</label>
            <input type="file" name="book_file" class="form-control"/>
        </div>
        <div class="form-group">
            <label>Contact Details</label>
            <textarea name="contact_details"  rows="10" class="form-control">{{ $book->contact_details }}</textarea>
        </div>
        <div class="form-group">
            <label>Category</label>
            <select name="category[]" multiple  class="form-control">
                @foreach ($category as $cat)
                    <option {{ (in_array($cat->id, $existCategory) ? "selected": '') }} value="{{ $cat->id }}">{{$cat->name}}</option>
                @endforeach
            </select>
        </div>
        </div>
        <div class="form-group">
            <label>Location</label>
            <select name="location"  class="form-control">
                @foreach ($locations as $loc)
                    <option {{ ( $book->location == $loc->id ? 'selected' : '' ) }} value="{{ $loc->id }}">{{$loc->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label>Description</label>
            <textarea name="description"  rows="10" class="form-control">{{ $book->description }}</textarea>
        </div>
        <div class="form-group">
            <label>Status</label>
            <select name="status"  class="form-control">
                <option {{ ( $book->type == 'publish' ? 'selected' : '' ) }} value='publish'>Publish</option>
                <option {{ ( $book->type == 'pending' ? 'selected' : '' ) }} value="pending">Pending</option>
            </select>
        </div>
        <button type="submit" class="btn btn-default btn-success">Submit</button>
    {{ Form::close() }}
@endsection
