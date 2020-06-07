@extends('layouts.app')
@section('title')
    {{$book->title}}
@endsection
@section('content')
<section class="book-showc">
    <div class="book-showcase">
      <h2>{{$book->title}}</h2>
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
  <section class="section book-details">
    <div class="container">
      <div class="row">
        <div class="col-md-6 col-10">
          <div class="img">
          <img src="/storage/cover_page/{{$book->cover_page}}" alt="" height="450" width="auto">
          </div>
        </div>
        <div class="col-md-6 col-10">
          <div class="book-details">
            <h6 class="bok-title"> <strong>Title: </strong> <em>{{$book->title}}</em>  </h6>
            <small class="bok-discription"> <strong>Description:</strong> {{$book->description}}</small><br>
            <h6 class="bok-title"> <strong>Author: </strong><a href="{{route('author.show',[$book->author->id])}}"><small class="author mt-3">{{$book->author->name}}</small></a><h6><br>
            <small class="bok-discription"><strong>Price</strong>: N{{$book->price / 100}}</small><br>
            <small><strong>Category:</strong> {{$book->family->name}}</small><br>
            <small><strong>Year Published:</strong> {{$book->year_pub}}</small><br>
            <small><strong>ISBN:</strong> {{$book->isbn}}</small><br>
            <small class="bok-discription"><strong>Avaliable: </strong>Soft Copy</small><br>
          </div>
        </div>
      </div>
    </div>
  </section>

@endsection