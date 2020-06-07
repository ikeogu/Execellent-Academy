@extends('layouts.app')
@section('title')
    Our Authors
@endsection
@section('content')
<section class="book-showc">
    <div class="book-showcase">
      <h2>Author</h2>
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
            <p> We sell not just books, andd journals, we also sell our authors.</p>
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
                @if($author->count() > 0)
                @foreach($author as $id => $item)
                    <div class="col-lg-6 col-md-6 col-12 mx-auto right-line bottom-line">
                        <div class="bok-card">
                        <img src="/storage/authors/{{$item->photo}}" alt="" height="180" width="auto">
                        <div class="bok-content">
                        <h6 class="bok-title">{{$item->title}}{{$item->name}} </h6>
                            
                            <small class="bok-discription">{{$item->education}}</small><br>
                        
                            {{-- modal button --}}
                        <a type="button" class="btn btn-danger" href="{{route('author.show',[$item->id])}}">
                                Read more..
                        </a>
                        </div>
                        </div>
                    </div>
                   
                      
                     
                          </div>
                        </div>
                      </div>
                @endforeach
                @else
                <h4>No Author has published Yet!</h4>
                @endif
              
              {{$author->links()}}
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection