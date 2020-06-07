@extends('layouts.dashboard')

@section('dashboard')
<div class="col-md-9">
                        
    <!-- Website Overview -->
    <div class="panel panel-default">
      <div class="panel-heading ">
        <h3 class="panel-title">Recieved Articles</h3>
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
              <table class="table table-strip table-hover">
                <tr>
                    <th>Title</th>
                    <th>Author Name</th>
                    <th>No Pages</th>
                    <th>Journal</th>
                    <th>Sent</th>
                    <th>Action</th>
                </tr>
                @foreach($article as $a)
                <tr>
                <td>{{$a->title}}</td>
                    <td>{{$a->author_name}}</td>
                    <td>{{$a->no_pages}}</td>
                    <td>
                        @if($a->journal_id == 20)
                            Publish for Book
                        @else
                            {{$a->journal->abbr}}
                        @endif
                    </td>
                    <td>{{$a->created_at->diffForHumans()}}</td>
                    <td><a class="btn btn-primary" href="{{route('readBook',[$a->id])}}">view</a> 
                    <form action="{{ route('article.destroy' , $a->id)}}" method="POST">
                        <input name="_method" type="hidden" value="DELETE">
                        {{ csrf_field() }}                                                       
                            <button type="submit" class="btn btn-danger btn-user btn-block" onclick="return confirm('Are you sure?')">Delete</button>
                        
                        </form>
                </tr>
                @endforeach
                
             </table>
            </div>
            
        </div>
          <br>
        </div>
    </div>
    
</div>
{{-- modal --}}

@endsection