@extends('layouts.app')
@section('title')
    About us
@endsection
@section('content')
<section class="event-section">
    <img src="{{asset('img/slider/team-banner.jpg')}}" alt="section image">
    <div class="title">
      <h2>About us</h2>
    </div>
  </section>

  <section class="section about-section">
    <div class="container">
      <div class="row">
        <div class="col-md-10 col-12 mx-auto">
          <div class="about-content">
            @foreach($about as $a)
                <h2 class="section-header">{{$a->title}}</h2>
                <p>{{$a->body}}</p>
            @endforeach
            <h2 class="section-header">Journals</h2>
            <p>Available Journals for Publication include:</p>
            <ul class="journal-list">
                @foreach($journal as $j)
                    <li>{{$j->name}}</li>
                @endforeach
            </ul>

            <div class="authors">
              <div class="row">
                <div class="col-md-4 col-12 mx-auto">
                  <div class="author-card">
                    <div class="card">
                      <img src="{{asset('img/sir_pic.jpeg')}}" class="card-img-top" alt="...">
                      <div class="card-body">
                        <h5 class="card-title">Contact information</h5>
                        <span><b><i>Call: </b> +234897894454 </i></span>
                        <span><b><i>Email: </b> example@mail.com </i></span>
                        <div class="icons mt-4">
                          <a href="" target="_blank" title="Facebook"><i class="fab fa-facebook-f"></i></a>
                          <a href="#" target="_blank" title="twitter"><i class="fab fa-twitter"></i></a>
                          <a href="" target="_blank" title="Linkedin"><i class="fab fa-linkedin-in"></i></a>
                          <a href="" target="_blank" title="Google"><i class="fab fa-google"></i></a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-md-8 col-12 mx-auto">
                  <div class="author-details">
                    <h4 class="author-name">Dr. Rushmore</h4>
                    <ul>
                      <li>Senior Lecturer</li>
                      <li>NHMRC CDF Research Fellow</li>
                      <li>UGC Micro and Nanotechnology Centre ugc campus, Pacific University,</li>
                      <li>2345 Southern Road State Highway, Southbound 5712,Australia</li>
                    </ul>
                    <h6 class="bio">Biography</h6>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Facilis sequi fuga, delectus similique dolor ipsam fugiat perspiciatis tenetur maxime, eius totam voluptas dolorum. Deleniti aliquam explicabo blanditiis, assumenda eum ratione itaque modi tenetur excepturi sint quasi natus nisi totam molestias possimus, eius sed enim illo quod velit, ipsum suscipit error!</p>
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