@extends('layouts.dashboard')

@section('dashboard')
<div class="col-md-9">
                        
    <!-- Website Overview -->
    <div class="panel panel-default">
      <div class="panel-heading ">
        <h3 class="panel-title">List of Journals</h3>
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
                <th>Vol</th>
                <th>Month</th>
                <th>Year</th>
                <th>created</th>
            </tr>
            @foreach($journal as $id => $j)
            <tr>
                <td>{{$j->name}}</td>
                <td>{{$j->vol}}</td>
                <td>{{$j->month}}</td>
                <td>{{$j->year}}</td>
                <td>{{$j->created_at->diffForHumans()}}</td>
            <td>
            <a class="btn btn-primary"  data-toggle="modal" data-target="#addPage-{{$id}}">Edit</a> 
            
            <form action="{{ route('journal.destroy' , $j->id)}}" method="POST">
              <input name="_method" type="hidden" value="DELETE">
              {{ csrf_field() }}                                                       
                  <button type="submit" class="btn btn-danger btn-user btn-block" onclick="return confirm('Are you sure?')">Delete</button>
              
            </form>
            </tr>
            <div class="modal fade" id="addPage-{{$id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                <form method="POST" action="{{route('journal.update',[$j->id])}}" enctype="multipart/form-data">
                  @csrf
                  {{method_field('PUT')}}
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title" id="myModalLabel">Edit {{$j->abbr}}</h4>
                  </div>
                  <div class="modal-body">
                    <div class="form-group">
                        <label>Journal Name</label>
                        <input type="text" class="form-control" value="{{$j->name}}"
                        name="name">
                    </div>
                    <div class="form-group">
                        <label>Journal Abbr</label>
                        <input type="text" class="form-control" value="{{$j->abbr}}"
                        name="abbr">
                    </div>
                    
                    <div class="form-group">
                        <label>Journal Volume</label>
                        <input type="text" class="form-control" value="{{$j->vol}}"
                        name="vol">
                    </div>
                    <div class="form-group">
                        <label>Month</label>
                       <select name="month" class="form-control">
                        <option >Choose Month</option>
                        <option value="January">January</option>
                        <option value="February">February</option>
                        <option value="March">March</option>
                        <option value="April">April</option>
                        <option value="May">May</option>
                        <option value="June">June</option>
                        <option value="July">July</option>
                        <option value="August">August</option>
                        <option value="September">September</option>
                        <option value="October">October</option>
                        <option value="November">November</option>
                        <option value="December">December</option>
                       </select>
                    </div>
                    <div class="form-group">
                        <label>Year</label>
                        <input type="text" class="form-control" name="year" value="{{$j->year}}">
                    </div>
                    <div class="form-group">
                        <label>Image</label>
                        <input type="file" class="form-control" name="image">
                    </div>
                    <div class="form-group">
                        <label>Description</label>
                        <textarea  class="form-control" name="des">
                          {{$j->des}}
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
    
</div>
{{-- modal --}}

@endsection