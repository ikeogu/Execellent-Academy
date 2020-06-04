@extends('layouts.dashboard')

@section('dashboard')
<div class="col-md-9">
    
    
    <!-- Website Overview -->
    <div class="panel panel-default">
      <div class="panel-heading row">
        <div class="col-6">
            <h3 class="panel-title">List of Events</h3>
        </div>
        <div class="col-2">
            <div class="dropdown create">
              <button class="btn btn-danger btn-md-9" type="button" data-toggle="modal" data-target="#myModal1">
                Add new Event
                
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
                <th>Title</th>
                <th>Location</th>
                
                <th>Date</th>
                <th>Image</th>
                <th>Created</th>
                <th>Action</th>
            </tr>
            @foreach($event as $id => $j)
            <tr>
                <td>{{$j->title}}</td>
                <td>{{$j->location}}</td>
                <td>{{$j->date}}</td>
                <td><img src="/storage/event_pix/{{$j->image}}" height="80" width="auto"></td>
                <td>{{$j->created_at->diffForHumans()}}</td>
            <td>
            <a class="btn btn-primary"  data-toggle="modal" data-target="#addPage-{{$id}}">Edit</a> 
            
            <form action="{{ route('event.destroy' , $j->id)}}" method="POST">
              <input name="_method" type="hidden" value="DELETE">
              {{ csrf_field() }}                                                       
                  <button type="submit" class="btn btn-danger btn-user btn-block" onclick="return confirm('Are you sure?')">Delete</button>
              
            </form>
            </tr>
            <div class="modal fade" id="addPage-{{$id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                <form method="POST" action="{{route('event.update',[$j->id])}}" enctype="multipart/form-data">
                  @csrf
                  {{method_field('PUT')}}
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title" id="myModalLabel">Edit {{$j->title}}</h4>
                  </div>
                  <div class="modal-body">
                    <div class="form-group">
                        <label>Title</label>
                        <input type="text" class="form-control" value="{{$j->title}}"
                        name="title">
                    </div>
                    <div class="form-group">
                        <label>Location</label>
                        <input type="text" class="form-control" value="{{$j->location}}"
                        name="location">
                    </div>
                    
                    <div class="form-group">
                        <label>Date</label>
                        <input type="date" class="form-control" value="{{$j->date}}"
                        name="date">
                    </div>
                    
                    <div class="form-group">
                        <label>Image</label>
                        <input type="file" class="form-control" name="image">
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
            
            
            <form method="POST" action="{{route('event.store')}}" enctype="multipart/form-data">
                @csrf
              <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">Add Event</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                
              </div>
              <div class="modal-body">
                <div class="form-group">
                    <label>Title</label>
                    <input type="text" class="form-control" 
                    name="title">
                </div>
                <div class="form-group">
                    <label>Location</label>
                    <input type="text" class="form-control" 
                    name="location">
                </div>
                
                <div class="form-group">
                    <label>Date</label>
                    <input type="date" class="form-control" 
                    name="date">
                </div>
                
                <div class="form-group">
                    <label>Image</label>
                    <input type="file" class="form-control" name="image">
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