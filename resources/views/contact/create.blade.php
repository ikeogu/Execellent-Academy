@extends('layouts.app')
@section('title')
    Contact us
@endsection
@section('content')
<section class="book-showc">
    <div class="book-showcase">
      <h2>Contact</h2>
    </div>
  </section>

  <section class="section section-center">
    <div class="container">
      <div class="row">
        <div class="col-md-4 col-10 mx-auto">
          <div class="contact-address mt-5">
            <div class="address my-4">
              <h4 class="footer-header">Address</h4>
              <ul>
                <li>EXCELLENT ACADEMIC RESEARCH CONCEPTS NIGERIA LIMITED
                  CHOBA EXTENSION BY UPTH JUNCTION BY T & C RESTAUARANT CLOSE
                  EAST - WEST ROAD, PORT HARCOURT, RIVERS STATE</li>
              </ul>
            </div>
            <div class="contact">
              <h4 class="footer-header">Contact Information</h4>
              <ul>
                <li>Dr Ifeanyi Nwaeboh  <br> <i class="fas fa-phone icon"></i> <span>08035319326, 09039989994, 08089900094</span> </li>
                <li>Elder Godwin Ichendu <br> <i class="fas fa-phone icon"></i> <span>09067825099, 08072131180,08094459234</span> </li>
                <li> <i class="fas fa-envelope icon"></i> excellentacademicconcepts@gmail.com</li>
              </ul>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-10 mx-auto">
          <div class="form">
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
            <h4 class="title">Contact us</h4>
          <form id="form" action="{{route('storecontact')}}" method="POST">
                @csrf
              <div class="form-grup">
                <label for="name">Fullname</label>
                <input type="text" placeholder="Fullname" name="name"> 
              </div>
              <div class="form-grup">
                <label for="email">Email</label>
                <input type="email" placeholder="Email" name="email">
              </div>
              <div class="form-grup">
                <label for="subject">Subject</label>
                <input type="text" placeholder="Subject" name="subject">
              </div>
              <div class="form-grup">
                <label for="des">Message</label>
                <textarea type="text" placeholder="Message" name="body"></textarea>
              </div>
              <button class="btn btn-send">Send</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>

@endsection