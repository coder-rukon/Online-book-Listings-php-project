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
        <div class="col-xs-4  col-md-12">
            {{ Form::open([ "route" => "admin.locationCreate"]) }}
            <div class="card">
                <div class="card-header">New Location</div>
                <div class="card-body">
                    @if($errors->any())
                        @foreach ($errors->all() as $error)
                            <div class="alert alert-danger" role="alert">
                              <p class="alert-heading">{{$error}}</p>
                            </div>
                        @endforeach
                    @endif
                    <div class="form-group">
                        <label>Location Name</label>
                        <input type="text" name="name"  class="form-control"/>
                    </div>
                    <button type="submit" class="btn btn-default btn-success">Submit</button>
                </div>
             </div>
                
            {{ Form::close() }}
        </div>
        <div class="col-xs-8 col-md-12">
            <br>
            <table class="table">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Options</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($locations as $location)
                        <tr>
                            <td>{{$location->name}}</td>
                            <td><a href="{{ route('admin.locationDelete',['id' => $location->id ]) }}" class="btn btn-danger ml-3">Delete</a></td>
                        </tr>
                    @endforeach
                    
                </tbody>
            </table>
            {{ $locations->links() }}
        </div>
    </div>
@endsection
