@extends('layouts.app')
@section('title')
    Gallery
@endsection
@section('content')
<section class="event-section">
    <img src="{{asset('img/event/events_hd-2.jpg')}}" alt="section image">
    <div class="title">
      <h2>Events</h2>
    </div>
  </section>

  <section class="section section-center">
    <div class="container">
      <div class="row">
        @foreach($event as $e)
        <div class="col-md-6 col-10 mx-auto">
          <div class="event-card">
           <a href="#" class="event-link">
           <img src="/storage/event_pix/{{$e->image}}" alt="" class="img-fluid" height="195" width="auto">
            <div class="event-content mt-4">
            <h3>{{$e->title}}</h3>
            <p class="text-dark"> <i class="fas fa-map-marker-alt"></i> {{$e->location}} <i class="fas fa-calendar-alt"> </i> {{$e->date}} </p>
            </div>
           </a>
          </div>
        </div>
       @endforeach
      </div>
    </div>
  </section>
@endsection