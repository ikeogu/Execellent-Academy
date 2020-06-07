@extends('layouts.dashboard')

@section('dashboard')
<div class="col-md-9">
    
    
    <!-- Website Overview -->
    <div class="panel panel-default">
      <div class="panel-heading row">
        <div class="col-6">
            <h3 class="panel-title">Authors</h3>
        </div>
        <div class="col-2">
            <div class="dropdown create">
              <button class="btn btn-danger btn-md-9" type="button" data-toggle="modal" data-target="#myModal1">
                Add an Author
                
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
                    <th>Authors</th>
                    
                    <th>Edu</th>
                    <th>Bio</th>
                    
                    <th>Photo</th>
                    <th>Status</th>
                    <th>Action</th>
                    
            </tr>
            @foreach ($author as $id => $item)
                    <tr>
                    <td>{{$item->title}}</td>
                    <td>{{$item->name}}</td>
                    
                    <td class="text-center">{{$item->education}}</td>
                    <td class="text-center">{{$item->biography}}</td>
                   
                    <td class="text-center">
                        <img src="/storage/authors/{{$item->photo}}" height="50" width="60">
                    </td>

                   
                    <td class="text-center ">
                        @if($item->state == 1)
                      <button class="btn btn-success">  Active</button>
                      @else
                      <button class="btn btn-danger">   Not Active</button>
                      @endif
                    </td>
                    
                       
                    <td class="d-flex justify-content-between flex-wrap">
                        <a href="{{route('dis_auth',[$item->id])}}" class="btn btn-warning"> Disable</a>
                        <a href="{{route('ena_auth',[$item->id])}}" class="btn btn-info">  Enable</a>
                    </td>
                    
                    <td class="d-flex justify-content-between flex-wrap">
                        <a  class="btn btn-danger btn-md btn-block" data-toggle="modal" data-target="#addPage-{{$id}}">Edit</a>
                        <form action="{{ route('author.destroy' , [$item->id])}}" method="POST">
                           <input name="_method" type="hidden" value="DELETE">
                             {{ csrf_field() }}                                                       
                            <button type="submit" class="btn btn-danger btn-user btn-block" onclick="return confirm('Are you sure?')">Delete</button>
                            
                       </form>
                    </td>

                   
                     
                    
                </tr>
            <div class="modal fade" id="addPage-{{$id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                <form method="POST" action="{{route('author.update',[$item->id])}}" enctype="multipart/form-data">
                  @csrf
                  {{method_field('PUT')}}
                  <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">Edit {{$item->name}}</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  
                  </div>
                  <div class="modal-body">
                    <div class="modal-body">
                        <div class="form-group">
                            <input type="text" class="form-control " id="Name" aria-describedby="name"
                        value="{{$item->title}}" name="title">
                          </div>
                          <div class="form-group">
                            <input type="text" class="form-control " id="Name" aria-describedby="name"
                        value="{{$item->name}}" name="name">
                          </div>
                          <div class="form-group">
                            <input type="text" class="form-control " id="Name" aria-describedby="name"
                          value="{{$item->email}}" name="email">
                          </div>
                          <div class="form-group">
                            <textarea class="form-control " aria-describedby="name" cols="7"row="7"
                          value="{{$item->biography}}" name="biography"></textarea>
                          </div>
                          <div class="form-group">
                            <input type="text" class="form-control " id="Name" aria-describedby="name"
                          value="{{$item->education}}" name="education">
                              <small>Author Education</small>
                          </div>
                          
                          
                          
    
                          <div class="form-group">
                            <input type="file" class="form-control  " id="Name" aria-describedby="name"
                             name="photo">
                              <small>Upload author's picture</small>
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
        <div class="modal-dialog modal-lg" role="document" >
          <div class="modal-content">
            
            
            <form method="POST" action="{{route('author.store')}}" enctype="multipart/form-data">
                @csrf
              <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">Add Author</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                
              </div>
              <div class="modal-body">
                <div class="form-group">
                    <input type="text" class="form-control " id="Name" aria-describedby="name"
                name="title">
                <small>Author's Title</small>
                  </div>
                  <div class="form-group">
                    <input type="text" class="form-control " id="Name" aria-describedby="name"
                 name="name">
                 <small>Author's Name</small>
                  </div>
                  <div class="form-group">
                    <input type="text" class="form-control " id="Name" aria-describedby="name"
                   name="email">
                   <small>Author's Email</small>
                  </div>
                  <div class="form-group">
                    <textarea class="form-control " aria-describedby="name" cols="7"row="7"
                  name="biography"></textarea>
                  <small>Author's biograph</small>
                  </div>
                  <div class="form-group">
                    <input type="text" class="form-control " id="Name" aria-describedby="name"
                   name="education">
                      <small>Author Education</small>
                  </div>
                  
                  
                  

                  <div class="form-group">
                    <input type="file" class="form-control  " id="Name" aria-describedby="name"
                     name="photo">
                      <small>Upload author's picture</small>
                  </div>
                 
                  <button type="submit" class="btn btn-danger btn-user btn-block">
                    Add Author
                  </button>
                  <hr>
              </div>
              
                
            </form>
          
            
          </div>
        </div>
      </div>
</div>

@endsection