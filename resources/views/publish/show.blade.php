@extends('layouts.app')
@section('title')
    Journals
@endsection
@section('content')
<section class="book-showc">
    <div class="book-showcase">
      <h2>{{$publish->title}}</h2>
    </div>
  </section>

  <section class="description section mt-5">
    <div class="container">
      <div class="content">
      <p>{{$publish->journal->category->des}}</p>
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
                  <h4 class="nav-title">{{$publish->journal->year}}, Vol({{$publish->journal->vol}}),{{$publish->journal->month}}</h4>
                </nav>
                <div class="journal-papers-list">
                  <div class="journal-papers">
                    <div class="row">

                    <p class="journal-title"><strong>{{$publish->title}}</strong></p><br>
                    <p class="journal-title">{{$publish->abstract}}</p><br>
                    <p class="journal-title"><strong>keywords:{{$publish->keywords}}</strong></p><br/>
                    <h5 class="journal-title">Author: {{$publish->author_name}}</h5><br/>
                    <p class="journal-title">
                        <a href="{{route('read',[$publish->id])}}"> <i
                                class="fas fa-file-pdf"> PDF </i></a>
                        </p><br>
                      
                    </div>
                  </div>
                 
                </div>
              </div>
            </div>
          </div>
        </div>
        
      </div>
    </div>
  </section>
 
@endsection