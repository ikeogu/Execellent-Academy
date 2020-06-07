@extends('layouts.app')
@section('title')
    Submit Manuscript
@endsection
@section('content')
<section class="book-showc">
    <div class="book-showcase">
      <h2>Thanks for Patronage</h2>
    </div>
</section>
<section class="books">
    <div class="container">
        <div class="justify-content-center"> 
            <div class="container p-5">
                <marquee behavior="" direction="left"><h4 class="text-success"> Thanks for Patronage!</h4></marquee>
              <div class="form-card mt-5">
                <h5 class="text-center text-success">The payment  for <em>{{$book->title}}</em> by {{$book->author->name}} has been received. </h5>
                <p class="text-center">A mail to download the book you paid for has been sent to {{$email}}.<br>
                <small class="text-warning"> Please note that the link is valid for <em class="text-danger">48 hours only.</em></small></p>
              </div>
            </div>
        </div> 
    </div>
</section>
@endsection
