<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="discription" content="This a jornal site">
  <!--OG tag for seo  -->
  <meta name="og:title" property="og:title" content="Your Awesome Open Graph Title">
  <meta name="og:discription" property="og:discription" content="Your Awesome Open Graph Title">
  <meta property="og:image" content="http://example.com/rock.jpg" />
  <link rel="stylesheet" href="{{asset('css/owl.carousel.min.css')}}">
  <link rel="stylesheet" href="{{asset('css/owl.theme.default.min.css')}}">
  <link rel="stylesheet" href="{{asset('css/animate.css')}}">
  <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
  <!-- FontAwesome -->
  <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
  <link rel="stylesheet" href="{{asset('css/style.css')}}">
  <title>Execellent Academy | @yield('title')</title>
</head>

<body>
    
    

  <header>
    <div class="container">
      <div class="logo">
        <img src="{{asset('img/logo/logo.png')}}" class="logo-link" alt="site-logo">
      </div>
      <nav class="nav">
        <ul>
          <li><a href="/">Home</a></li>
        <li><a href="{{route('about.index')}}">About</a></li>
        <li><a href="{{route('article.create')}}">Submit Article</a></li>
          <li><a href="books.html">Books</a></li>
        <li><a href="{{route('event.index')}}">Events</a></li>
          <li><a href="{{route('journal.index')}}">Journals</a></li>
          <li><a href="{{route('contact')}}" class="active">Contact</a></li>
          <li class="cart">
            <a href="cart.html">
              <i class="fas fa-shopping-cart 4x"></i>
              <p class="add">5</p>
            </a>
          </li>
        </ul>
      </nav>
      <div class="toggle">
        <div class="line"></div>
        <div class="line"></div>
        <div class="line"></div>
      </div>
    </div>
  </header>

  <main>
      @yield('content')
  </main>
  <footer class="footer">
    <div class="container">
      <div class="row">
        <div class="col-lg-3 col-md-3 col-10 mx-auto">
          <div class="container">
            <div class="footer-logo">
              <img src="img/logo/footer-logo.png" alt="footer logo">
            </div>
            <div class="address my-4">
              <h4 class="footer-header">Address</h4>
              <ul>
                <li>UGC Micro and Nanotechnology Centre ugc campus, Pacific University
                  2345 Southern Road
                  State Highway, Southbound 5712
                  Australia</li>
              </ul>
            </div>
            <div class="contact">
              <h4 class="footer-header">Contact Information</h4>
              <ul>
                <li><i class="fas fa-phone icon"></i> <span>Lorem ipsum dolor</span> </li>
                <li><i class="fas fa-envelope icon"></i> <span>Lorem ipsum dolor</span> </li>
              </ul>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-3 col-10 mx-auto">
          <div class="container">
            <div class="latest-article">
              <h4 class="footer-header">Latest Article</h4>
              <ul class="footer-article">
                <li class="footer-title">
                  <a href="#">Haematopoietic Stem Cell Transplantation For Autoimmune Diseases</a>
                </li>
                <li class="article-date">12 Jul 2017</li>
              </ul>
              <ul class="footer-article">
                <li class="footer-title">
                  <a href="#">Haematopoietic Stem Cell Transplantation For Autoimmune Diseases</a>
                </li>
                <li class="article-date">12 Jul 2017</li>
              </ul>
              <ul class="footer-article">
                <li class="footer-title">
                  <a href="#">Haematopoietic Stem Cell Transplantation For Autoimmune Diseases</a>
                </li>
                <li class="article-date">12 Jul 2017</li>
              </ul>
              <a href="#" class="view-all">View all Journals</a>
            </div>
          </div>
        </div>
        <div class="col-lg-2 col-md-2 col-10 mx-auto">
          <div class="container">
            <div class="quick-links">
              <h4 class="footer-header">Quick Links</h4>
              <ul>
                <li><a href="/">Home</a></li>
                <li><a href="#">About</a></li>
                <li><a href="#">Books</a></li>
                <li><a href="#">Journals</a></li>
                <li><a href="#">Contact</a></li>
              </ul>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-4 col-10 mx-auto">
          <div class="container">
            <div class="newsletter">
              <h2 class="footer-header">Subscribe to our newsletter</h2>
              <form action="" class="form">
                <input type="text" placeholder="Enter email">
                <button type="submit">Subscribe</button>
              </form>
            </div>
            <div class="social-icons">
              <h2 class="footer-header">Social Links</h2>
              <div class="icons">
                <a href="" target="_blank" title="Facebook"><i class="fab fa-facebook-f"></i></a>
                <a href="#" target="_blank" title="twitter"><i class="fab fa-twitter"></i></a>
                <a href="" target="_blank" title="Linkedin"><i class="fab fa-linkedin-in"></i></a>
                <a href="" target="_blank" title="Google"><i class="fab fa-google"></i></a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="bottom-footer">
      <div class="container">
        <div class="row">
          <div class="col-md-4">
            <p>Copyright&copy;2020-<a href="#" target="_blank">Company name</a></p>
          </div>
          <div class="col-md-4">
            <p>Designed by:<a href="#" target="_blank"> Calebbenjii</a></p>
          </div>
          <div class="col-md-4">
            <p>Manage and Powered by:<a href="#" target="_blank"> Emma</a></p>
          </div>
        </div>
      </div>
    </div>
  </footer>

  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
  <script src="{{asset('owlcarousel/owl.carousel.min.js')}}"></script>
  <script src="{{asset('js/app.js')}}"></script>
</body>

</html>