@extends('layouts.dashboard')

@section('dashboard')
<div class="col-md-9">
    
    
    <!-- Website Overview -->
    <div class="panel panel-default">
      <div class="panel-heading row">
        <div class="col-6">
            <h3 class="panel-title">Books Sold</h3>
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
                <th>Reference</th>
                <th>Amount</th>
                <th>Card Type</th>
                <th>Bank</th>
                <th>Email</th>
                <th>Title</th>
                <th>paid</th>
                <th>Action</th>
            </tr>
            @foreach($purchase as $id => $j)
            <tr>
                <td>{{$j->reference}}</td>
                <td>N{{$j->amount }} </td>
                <td>{{$j->card_type}} </td>
                <td>{{$j->bank}} </td>
                <td>{{$j->email}} </td>
                <td>{{$j->book->title}} </td>
                
                <td>{{$j->created_at->diffForHumans()}}</td>
                <td>
                {{-- <a class="btn btn-primary"  data-toggle="modal" data-target="#addPage-{{$id}}">Edit</a>  --}}
                
                <form action="{{ route('purchase_destroy' , $j->id)}}" method="POST">
                <input name="_method" type="hidden" value="DELETE">
                {{ csrf_field() }}                                                       
                    <button type="submit" class="btn btn-danger btn-user btn-block" onclick="return confirm('Are you sure?')">Delete</button>
                
                </form>
                 </td>
            </tr>
            

            @endforeach
            <td>Total</td>
            <td>N {{$total}}</td>
         </table>
      </div>
    </div>
   
</div>
{{-- modal --}}

@endsection