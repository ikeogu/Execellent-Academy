@extends('layouts.app')
@section('title')
    Book Store
@endsection

@section('content')
<section class="book-showc">
    <div class="book-showcase">
      <h2>Books Store</h2>
    </div>
  </section>
  <section class="section-book">
    <div class="container">
      <div class="row">
        <div class="col-lg-4 col-md-4 col-10 mx-auto">
          <div class="container">
            <h2 class="section-head">EXCELLENT ACADEMIC CONCEPT NIGERIA LIMITED <div class="bottom-line"></div></h2>
          </div>
        </div>
        <div class="col-lg-8 col-md-8 col10 mx-auto">
          <div class="container">
            <p> Welcome to our Book store. We also publish, market and sell books and our authors.</p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="books">
    <div class="container">
      <div class="row">
        <div class="col-lg-3 col-md-3 col-none mx-auto">
          <div class="img"></div>
        </div>
        <div class="col-lg-9 col-md-9 col-10 mx-auto">
          <div class="container-fliud mt-4">
            <div class="row">
                @if($book->count() > 0)
                @foreach($book as $id => $item)
                    <div class="col-lg-6 col-md-6 col-12 mx-auto right-line bottom-line">
                        <div class="bok-card">
                            <a href="{{route('book.show',[$item->id])}}"> <img src="/storage/cover_page/{{$item->cover_page}}" alt="" height=" 180" width="auto"></a>
                        <div class="bok-content">
                        <h6 class="bok-title"><a href="{{route('book.show',[$item->id])}}">{{$item->title}}</a>  </h6>
                            <small class="bok-discription">{{$item->description}}</small><br>
                            <a href="{{route('author.show',[$item->author->id])}}"><small class="author mt-3">{{$item->author->name}}</small></a><br>
                            <small class="bok-discription">N{{$item->price / 100}}</small><br>
                            <small class="bok-discription">Soft Copy</small><br>
                            <a href="{{route('book.show',[$item->id])}}">more...</a><br>
                            <button class="cart btn btn-danger buy" data-toggle="modal" type="button" data-target="#myModal-{{$id}}"> 
                              <i class="fas fa-shopping-cart 4x"></i>Buy now
                            </button>
                        </div>
                        </div>
                    </div>
                      <!-- Modal -->
                  <div class="modal" id="myModal-{{$id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h4 class="modal-title" id="myModalLabel"><i class="text-muted fa fa-shopping-cart"></i> <strong> {{$item->title}}</strong>  </h4>
                              <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="text-danger fa fa-times"></i></button>
                            
                            </div>
                            <div class="modal-body row">
                              <div class="col-8">
                                <table class="pull-left">
                                    <tbody>
                                        <tr>
                                            <td class="h6"><strong>Title</strong></td>
                                            <td> </td>
                                        <td class="h5"> <em> {{$item->title}}</em></td>
                                        </tr>
                                        
                                        
                                        
                                        <tr>
                                            <td class="h6"><strong>Author</strong></td>
                                            <td> </td>
                                        <td class="h5"> {{$item->author->name}}</td>
                                        </tr>
                                        
                                        <tr>
                                            <td class="h6"><strong>Published:  </strong></td>
                                            <td> </td>
                                        <td class="h5"> {{$item->year_pub}}</td>
                                        </tr>
                                        
                                        <tr>
                                            <td class="h6"><strong>Price</strong></td>
                                            <td> </td>
                                        <td class="h5"> ₦{{$item->price / 100}}</td>
                                        </tr>
                                        
                                        
                                        
                                          
                                        

                                    </tbody>
                                </table>
                                <hr>
                                <strong>Description </strong>
                                            
                                <p> {{$item->description}}</p>
                              </div>          
                                  
                              <div class="col-md-4"> 
                                  <img src="/storage/cover_page/{{$item->cover_page}}" alt="teste" class="img-thumbnail" height="180" width="auto">  
                              </div>
                              
                              
                            </div>
                              
                            <div class="modal-footer row">       
                                                              
                              <div class="col-9">
                                <form method="POST" action="{{ route('pay') }}" accept-charset="UTF-8" class="form-horizontal" role="form">
                                  <label>Email</label>
                                  <small class="text-muted"> <em>Give a valid Email Address where book will be recieved.</em></small>
                                  <input type="email" name="email" required class="form-control"> {{-- required --}}
                                  
                                  <label>Amount</label>
                                  <h6>₦{{$item->price / 100}}</h6>
                                  <input type="hidden" name="amount" value="{{$item->price }}"> {{-- required in kobo --}}
                                  <input type="hidden" name="quantity" value="1"> {{-- required in kobo --}}
                                <input type="hidden" name="book_id" value="{{$item->id}}">
                                  <input type="hidden" name="currency" value="NGN">
                                  
                                  <input type="hidden" name="reference" value="{{ Paystack::genTranxRef() }}"> {{-- required --}}
                                  {{ csrf_field() }} {{-- works only when using laravel 5.1, 5.2 --}}
                      
                                  <input type="hidden" name="_token" value="{{ csrf_token() }}"> {{-- employ this in place of csrf_field only in laravel 5.0 --}}
                      
                                <div class="text-right pull-right">
                                  <button class="btn btn-danger btn-lg " type="submit" value="Pay Now!">
                                    <i class="fa fa-plus-circle fa-lg"></i> Pay Now!
                                    </button>
                                </div>
                                </form>
                              </div>
                          </div>
                        </div>
                      </div>
                      </div>
<!-- fim Modal-->    
    
                @endforeach
                @else
                <h4>We have no book in store. Check in later!</h4>
                @endif
              
              
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  
 
@endsection