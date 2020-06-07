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
                <div class="bok-card">
                    <img src="/storage/authors/{{$author->photo}}" alt="">
                    <div class="bok-content p-5">
                        <h6 class="bok-title">{{$author->title}}{{$author->name}} </h6>
                        <small class="bok-discription">{{$author->pob}}</small><br>
                        <small class="author mt-3">{{$author->biography}}</small><br>
                        <small class="bok-discription">{{$author->education}}</small><br>
                       <small class="bok-discription"> books authored:{{$author->book_authored}}</small><br>
                        {{-- modal button --}}
                    
                    </div>
                    <hr>
                   
                </div>    
                
                <div class="row">
                    <h6>Books Published by <em>{{$author->name}}</em></h6>
                    <div class="bok-card ">
                        @foreach($book as $b)
                        <div class="card p-3" style="width: 15rem;" >

                            <img class="card-img-top" src="/storage/cover_page/{{$b->cover_page}}" alt="Card image cap" height="180" width="auto">
                            <div class="card-body">
                                <h5 class="card-title">{{$b->title}}</h5>
                                
                                <a href="{{route('book.show',[$b->id])}}" class="btn btn-danger">view book</a>
                            </div>
                        </div>
                        
                        @endforeach
                    </div>
                    
                </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection