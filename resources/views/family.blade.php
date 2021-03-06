@extends('layouts.dashboard')

@section('dashboard')
<div class="col-md-9">
    
    
    <!-- Website Overview -->
    <div class="panel panel-default">
      <div class="panel-heading row">
        <div class="col-6">
            <h3 class="panel-title">Book Categories</h3>
        </div>
        <div class="col-2">
            <div class="dropdown create">
              <button class="btn btn-danger btn-md-9" type="button" data-toggle="modal" data-target="#myModal1">
                Add Category
                
              </button>
              
            </div>
          </div>
      </div>
      <div class="panel-body">
        <div class="row">
            <div class="col-md-12">
              @if ($errors->any())
              <div class="alert alert-danger">
                  <ul>
                      @foreach ($errors->all() as $error)
                          <li>{{ $error }}</li>
                      @endforeach
                  </ul>
              </div><br />
              @endif
              @if (\Session::has('success'))
              <div class="alert alert-success">
                  <p>{{ \Session::get('success') }}</p>
              </div><br />
              @endif
            </div>
        </div>
          <br>
        <table class="table table-strip table-hover">
            <tr>
                <th>Name</th>
                <th>Description</th>
                
                
                <th>Action</th>
            </tr>
            @foreach($family as $id => $j)
            <tr>
                <td>{{$j->name}}</td>
                <td>{{$j->description}}</td>
                
                
                <td>{{$j->created_at->diffForHumans()}}</td>
            <td>
            <a class="btn btn-primary"  data-toggle="modal" data-target="#addPage-{{$id}}">Edit</a> 
            
            <form action="{{ route('family.destroy' , $j->id)}}" method="POST">
              <input name="_method" type="hidden" value="DELETE">
              {{ csrf_field() }}                                                       
                  <button type="submit" class="btn btn-danger btn-user btn-block" onclick="return confirm('Are you sure?')">Delete</button>
              
            </form>
            </tr>
            <div class="modal fade" id="addPage-{{$id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                <form method="POST" action="{{route('family.update',[$j->id])}}" enctype="multipart/form-data">
                  @csrf
                  {{method_field('PUT')}}
                  <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">Edit {{$j->name}}</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  
                  </div>
                  <div class="modal-body">
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Name</label>
                        <input type="text" class="form-control" value="{{$j->name}}" 
                            name="name">
                        </div>
                        <div class="form-group">
                            <label>Description</label>
                            <textarea  class="form-control" name="description" >
                                {{$j->description}}
                            </textarea>
                        </div>
                    
                  </div>
                  <div class="modal-footer">
                    
                    <button type="submit" class="btn btn-danger">Update</button>
                  </div>
                </form>
                </div>
              </div>
            </div>
            @endforeach
         </table>
      </div>
    </div>
    <div class="modal fade" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document" >
          <div class="modal-content">
            
            
            <form method="POST" action="{{route('family.store')}}" enctype="multipart/form-data">
                @csrf
              <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">Add Category</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                
              </div>
              <div class="modal-body">
                <div class="form-group">
                    <label>Name</label>
                    <input type="text" class="form-control" 
                    name="name">
                </div>
                <div class="form-group">
                    <label>Description</label>
                    <textarea  class="form-control" name="description" ></textarea>
                </div>
                
               
                
              
              </div>
              <div class="modal-footer">
                
                <button type="submit" class="btn btn-danger">Create</button>
              </div>
            </form>
          
            
          </div>
        </div>
      </div>
</div>
{{-- modal --}}

@endsection