@extends('layouts.admin')

@section('content')
    @if(session("message"))
        
        <div class="alert alert-warning " role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        <strong>{{ session("message") }}</strong> 
        </div>
    
    @endisset
    <div class="row">
        <div class="col-xs-4  col-md-4">
            {{ Form::open([ "route" => "admin.createCategory"]) }}
            <div class="card">
                <div class="card-header">Category</div>
                <div class="card-body">
                    @if($errors->any())
                        @foreach ($errors->all() as $error)
                            <div class="alert alert-danger" role="alert">
                              <p class="alert-heading">{{$error}}</p>
                            </div>
                        @endforeach
                    @endif
                    @isset($categorySingle)
                        <input type="hidden" name="id" value="{{ $categorySingle->id }}">
                        <div class="form-group">
                            <label>Category Name</label>
                            <input type="text" name="name" value="{{ $categorySingle->name }}"  class="form-control"/>
                        </div>
                        <div class="form-group">
                            <label>Category Icon</label>
                            <input type="text" value="{{ $categorySingle->thumbnail }}" name="thumbnail"  class="form-control"/>
                        </div>
                        <div class="form-group">
                            <label>Display In Home</label>
                            <select name="show_in_home"  class="form-control">
                                <option {{ ($categorySingle->show_in_home == "no" ? "selected": "") }} value="no">No</option>
                                <option {{ ($categorySingle->show_in_home == "yes" ? "selected": "") }} value="yes">Yes</option>
                            </select>
                        </div>
                    @else
                        <div class="form-group">
                            <label>Category Name</label>
                            <input type="text" name="name"  class="form-control"/>
                        </div>
                        <div class="form-group">
                            <label>Category Icon</label>
                            <input type="text" name="thumbnail"  class="form-control"/>
                        </div>
                        <div class="form-group">
                            <label>Display In Home</label>
                            <select name="show_in_home"  class="form-control">
                                <option value="no">No</option>
                                <option value="yes">Yes</option>
                            </select>
                        </div>  
                    @endisset
                    
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-default btn-success">Submit</button>
                </div>
             </div>
                
            {{ Form::close() }}
        </div>
        <div class="col-xs-8 col-md-8">
            <table class="table">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Options</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($category as $cat)
                        <tr>
                            <td>{{$cat->name}}</td>
                            <td>
                                <a href="{{ route('admin.editCategory',['id' => $cat->id ]) }}" class="btn btn-info">Edit</a>
                                <a href="{{ route('admin.deleteCategory',['id' => $cat->id ]) }}" class="btn btn-danger ml-3">Delete</a>
                            </td>
                        </tr>
                    @endforeach
                    
                </tbody>
            </table>
            {{ $category->links() }}
        </div>
    </div>
@endsection
