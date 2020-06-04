@extends('layouts.app')
@section('title')
    Home Page
@endsection
@section('content')
<section class="slider-landing">
    <div id="sliderControls" class="carousel slide" data-ride="carousel">
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img src="{{asset('img/slider/slide_1.jpg')}}" class="d-block w-100 img-fluid" alt="...">
          <div class="overlay"></div>
          <div class="carousel-caption">
            <h1 class="slider-hea">When it all began</h1>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
            <a href="#" class="view-all">Read more</a>
          </div>
        </div>
        <div class="carousel-item">
          <img src="{{asset('img/slider/slide_2.jpg')}}" class="d-block w-100" alt="...">
          <div class="overlay"></div>
          <div class="carousel-caption d-none d-md-block">
            <h1 class="slider-hea">When it all began</h1>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Molestias, vel.</p>
            <a href="#" class="">Read more</a>
          </div>
        </div>
        <div class="carousel-item">
          <img src="{{asset('img/slider/slide_3.jpg')}}" class="d-block w-100" alt="...">
          <div class="overlay"></div>
          <div class="carousel-caption d-none d-md-block">
            <h1 class="slider-hea">When it all began</h1>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Molestias, vel.</p>
            <a href="#" class="view-all">Read more</a>
          </div>
        </div>
      </div>
      <a class="carousel-control-prev" href="#sliderControls" role="button" data-slide="prev">
        <i class="fas fa-chevron-circle-left"></i>
      </a>
      <a class="carousel-control-next " href="#sliderControls" role="button" data-slide="next">
        <i class="fas fa-chevron-circle-right"></i>
      </a>
    </div>
  </section>
  <section class="journal-section section">
    <h2 class="section-header">journals <div class="bottom-line"></div>
    </h2>
    <div class="container">
      <div class="row">
          @foreach ($journal as $j)
        <div class="col-lg-3 col-md-4 col-10 mx-auto">
          <div class="card">
          <img src="/storage/Journal_image/{{$j->cover}}" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title">
                <a href="#">{{$j->name}}</a>
              </h5>
              <p class="card-text">{{$j->des}} </p>
            <a href="{{route('category.show',[$j->id])}}" class="view-all">Read more</a>
            </div>
          </div>
        </div>
        
        @endforeach
      </div>
    </div>
  </section>
  <section class="about-section section">
    <div class="container">
      <div class="row">
        <div class="col-lg-4 col-md-4 col-10 mx-auto">
          <div class="container mt-4">
            <h2 class="about-title">About us</h2>
            <p>{{ \Illuminate\Support\Str::limit($about->body, 500, $end='...') }}</p>
            
         
            <a href="\about" class="view-all">Read More</a>
          </div>
        </div>
        <div class="col-lg-8 col-md-8 col-10 mx-auto">
          
          <div class="about-bg">
            <h4>Recently Published Articles</h4>
            <ul>
              @foreach($published as $pub)
              <li>
                <div class="icon">
                  <i class="fas fa-book"></i>
                </div>
                <div class="list">
                  <p>{{$pub->title}}</p>
                  <p class="author-name">{{$pub->author_name}}</p>
                  <p class="author-name">Published: {{ date('d-m-Y', strtotime($pub->created_at)) }}</p>
                <i class="fas fa-globle"></i><a href="{{route('publish.show',[$pub->id])}}" class="website">View</a>
                </div>
              </li>
              @endforeach
            </ul>
            
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="about-author section">
    <div class="container">
      <div class="row"> 
        <div class="col-md-4 col-10 mx-auto">
          <div class="author-card">
            <div class="card">
              <img src="img/team/Drrushmore-1.jpg" class="card-img-top" alt="...">
              <div class="card-body">
                <h5 class="card-title">
                  <a href="#">Dr. Rushmore</a>
                </h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                  card's content.</p>
                <a href="#" class="view-all">Read more</a>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-8 col-10 mx-auto">
          <div class="education-timeline">
            <ol class="ol-timeline">
             <li class="tl-item with-icon">
               <p>
                 <span class="item-section">"March 2012"</span>
               </p>
               <div class="content-wraper">
                 <h3 class="title">Calfornia Conference</h3>
                 <div class="discription">California national University, California, USA</div>
               </div>
             </li>
             <li class="tl-item with-icon">
              <p>
                <span class="item-section">March 2017</span>
              </p>
              <div class="content-wraper">
                <h3 class="title">PHD</h3>
                <p class="discription">Kusan National University, Busan, South Korea</p>
              </div>
            </li> 
            <li class="tl-item with-icon">
              <p>
                <span class="item-section">September 1999</span>
              </p>
              <div class="content-wraper">
                <h3 class="title">MSc</h3>
                <p class="discription">University of California, Davis, USA</p>
              </div>
            </li>
            <li class="tl-item with-icon">
              <p>
                <span class="item-section">Augest 1998</span>
              </p>
              <div class="content-wraper">
                <h3 class="title">BSc (Hons)</h3>
                <p class="discription">University of California, Davis, USA</p>
              </div>
            </li>    
            </ol>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="teams section">
    <div class="container">
      <div class="row">
        <div class="col-lg-4 col-md-4 col-10 mx-auto">
          <div class="card">
            <img src="img/team/Layer-5-263x216.jpg" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title">
                <a href="#">Susmita Sen</a>
              </h5>
              <p class="card-text">PHD Student</p>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-4 col-10 mx-auto">
          <div class="card">
            <img src="img/team/adult-beard-boy-903661-263x216.jpg" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title">
                <a href="#">Nai Nai Yung</a>
              </h5>
              <p class="card-text">PHD Student</p>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-4 col-10 mx-auto">
          <div class="card">
            <img src="img/team/Layer-6-263x216.jpg" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title">
                <a href="#">Jafar Juardar</a>
              </h5>
              <p class="card-text">PHD Student</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection