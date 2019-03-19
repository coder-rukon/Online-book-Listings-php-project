@extends('layouts.admin')

@section('content')
    {{ Form::open([ "route" => "admin.requestCreateBook",'files' => true]) }}
        @if ($errors->any())
            @foreach ($errors->all() as $error)
                <div class="alert alert-danger">
                    <h4 class="alert-heading">{{$error}}</h4>
              </div>  
            @endforeach
            
        @endif
        <div class="form-group">
            <label>Book Name</label>
            <input type="text" name="name"  class="form-control"/>
        </div>
        <div class="form-group">
            <label>Author</label>
            <input type="text" name="author"  class="form-control"/>
        </div>
        <div class="form-group">
            <label>Edition</label>
            <input type="text" name="edition"  class="form-control"/>
        </div>
        <div class="form-group">
            <label>File type</label>
            <select name="type"  class="form-control">
                <option value='soft_copy'>Soft Copy</option>
                <option value="hard_copy">Hard Copy</option>
            </select>
        </div>
        
        <div class="form-group">
            <label>Book Cover Image/Thumbnail</label>
            <input type="file" name="thumbnail" class="form-control"/>
        </div>
        <div class="form-group">
            <label>Select Book</label>
            <input type="file" name="book_file" class="form-control"/>
        </div>
        <div class="form-group">
            <label>Contact Details</label>
            <textarea name="contact_details"  rows="10" class="form-control"></textarea>
        </div>
        <div class="form-group">
            <label>Category</label>
            <select name="category[]" multiple  class="form-control">
                @foreach ($category as $cat)
                    <option value="{{ $cat->id }}">{{$cat->name}}</option>
                @endforeach
            </select>
        </div>
        </div>
        <div class="form-group">
            <label>Location</label>
            <select name="location"  class="form-control">
                @foreach ($locations as $cat)
                    <option value="{{ $cat->id }}">{{$cat->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label>Description</label>
            <textarea name="description"  rows="10" class="form-control"></textarea>
        </div>
        <div class="form-group">
            <label>Status</label>
            <select name="status"  class="form-control">
                <option value="publish">Publish</option>
                <option value='pending'>Pending</option>
            </select>
        </div>
        <button type="submit" class="btn btn-default btn-success">Submit</button>
    {{ Form::close() }}
@endsection
