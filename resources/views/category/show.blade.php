@extends('layouts.app')
@section('title')
    Journals
@endsection
@section('content')
<section class="book-showc">
    <div class="">
    <h2>{{$journal->name}}</h2>
    </div>
  </section>

  <section class="description section mt-5">
    <div class="container">
      <div class="content">
        <p><b>Disclaimer:</b> The papers below are intended for private viewing by the page owner or those who
          otherwise have legitimate access to them. No part of it may in any form or by any electronic, mechanical,
          photocopying, recording, or any other means be reproduced, stored in a retrieval system or be broadcast or
          transmitted without the prior permission of the respective publishers. If your organization has a valid
          subscription of the journals, click on the DOI link for the legitimate copy of the papers.</p>
      </div>
    </div>
  </section>

  <section class="journals">
    <div class="container">
      <div class="row">
        <div class="col-md-9 col-10 mx-auto">
          <div class="journal-content-area">
            <nav class="journal-nav">
              <ul>
                 @foreach($journals as $j)
                <li role="presentation">
                <a href="{{route('journal.show',[$j->id])}}" class="link-pref">{{$j->year}}, {{$j->month}} Vol({{$j->vol}}) </a>
                </li>
                @endforeach
                
              </ul>
            </nav>
            
          </div>
        </div>
        {{-- <div class="col-md-3 col-10 mx-auto">
          <div class="archive-section">
            <div class="archive">
              <h5 class="title">Archives</h5>
              <ul class="archive-list">
                <li class="month-1">
                  <a href="#">August 2018</a>
                </li>
                <li class="month-2">
                  <a href="#">August 2017</a>
                </li>
                <li class="month-3">
                  <a href="#">August 2016</a>
                </li>
                <li class="month-4">
                  <a href="#">August 2015</a>
                </li>
                <li class="month-5">
                  <a href="#">August 2014</a>
                </li>
                <li class="month-3">
                  <a href="#">August 2013</a>
                </li>
                <li class="month-4">
                  <a href="#">August 2012</a>
                </li>
                <li class="month-5">
                  <a href="#">August 2011</a>
                </li>
              </ul>
            </div>
          </div>
        </div> --}}
      </div>
    </div>
  </section>

@endsection