@extends('layouts.app')
@section('title')
    Journals
@endsection
@section('content')
<section class="book-showc">
    <div class="book-showcase">
      <h2>{{$journal->name}}</h2>
    </div>
  </section>

  <section class="description section mt-5">
    <div class="container">
      <div class="content">
      <p>{{$journal->category->des}}</p>
      </div>
    </div>
  </section>
  <section class="journals">
    <div class="container">
      <div class="row">
        <div class="col-md-9 col-10 mx-auto">
          <div class="journal-content-area">
            
            <div class="journal-papers-wrap tab-content">
              
              <div class="journal-papers tab-pan1 fae" id="2017-2018" role="tabpane2">
                <nav class="journal-papers-nav">
                  <h4 class="nav-title">{{$journal->year}}, Vol({{$journal->vol}}),{{$journal->month}}</h4>
                </nav>
                <div class="journal-papers-list">
                  <div class="journal-papers">
                    <div class="row">

                      @foreach($publish as $pub)
                        <div class="col-md-3 col-10 mx-auto">
                        <p class="author-name">{{$pub->author_name}}</p>
                        </div>
                        <div class="col-md-8 col-10 mx-auto">
                        <p class="journal-title">
                        <a href="{{route('read',[$pub->id])}}">{{$pub->title}} <b>{{$pub->vol}}</b> {{$pub->no_pages}}, pp <i
                                class="fas fa-file-pdf"> PDF </i></a>
                        </p><br>
                        </div>
                        @endforeach
                      <!-- <div class="col-md-3 col-10 mx-auto"></div> -->
                    </div>
                  </div>
                 
                </div>
              </div>
            </div>
          </div>
        </div>
        {{-- <div class="col-md-3 col-10 mx-auto">
          <div class="archive-section">
            <div class="archive">
              <h5 class="title">Archives</h5>
              <ul class="archive-list">
                <li class="month-1">
                  <a href="#">{{$journal->month}}</a>
                </li>
                
              </ul>
            </div>
          </div>
        </div> --}}
      </div>
    </div>
  </section>
 
@endsection