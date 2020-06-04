<DOCTYPE html>
    <html lang-en>
        <head>
            <meta charset="utf-8">
            <meta http-equiv="X-UA-compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, intial-scale=1">
            <title>Admin Area | Dashboard</title>
            <!-- core css -->
            <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">
            <link href="{{asset('css/style2.css')}}" rel="stylesheet">
            <script src="https://cdn.ckeditor.com/4.8.0/standard/ckeditor.js"></script>
        </head>
        <body>
            <nav class="navbar navbar-default">
                <div class="container">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapsed" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="#">Excellent Academy</a>
                    </div>
                    <div id="navbar" class="collapse navbar-collapse">
                        <ul class="nav navbar-nav">
                            <li class="active"><a href="#">Dashboard</a></li>
                            
                        </ul>
                         <ul class="nav navbar-nav navbar-right">
                            <li><a href="#">Welcome, Lilian</a></li>
                            <li><a href="login.html">Logout</a></li>
                        </ul>
                    </div><!-- end of nav-collapse-->
                </div>
            </nav>
            
            <header id="header">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6">
                            <h3><span class="glyphicon glyphicon-cog" aria-hidden="true"></span>Dashboard <small> Manage your site</small></h3>
                            <div class="dropdown create">
                            <a class="btn btn-danger " href="{{Auth::logout()}}" >
                                Logout
                                <span class="caret"></span>
                              </a>
                              
                            </div>
                        </div>

                       
                        <div class="col-md-2">
                            <div class="dropdown create">
                              <button class="btn btn-danger " type="button" data-toggle="modal" data-target="#addPage">
                                Add new Journal
                                <span class="caret"></span>
                              </button>
                              
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="dropdown create">
                              <button class="btn btn-danger " type="button" data-toggle="modal" data-target="#addPage2">
                                Publish new Article
                                <span class="caret"></span>
                              </button>
                              
                            </div>
                        </div>
                        <div class="col-md-2">
                          <div class="dropdown create">
                            <button class="btn btn-danger " type="button" data-toggle="modal" data-target="#myModal">
                              Add new Category
                              <span class="caret"></span>
                            </button>
                            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                              <div class="modal-dialog" role="document" >
                                <div class="modal-content">
                                  
                                  
                                    <form method="POST" action="{{route('category.store')}}" enctype="multipart/form-data">
                                      @csrf
                                    <div class="modal-header">
                                      <h4 class="modal-title" id="myModalLabel">Add Category</h4>
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                      
                                    </div>
                                    <div class="modal-body">
                                      <div class="form-group">
                                          <label>Category Name</label>
                                          <input type="text" class="form-control" placeholder="Journal Name"
                                          name="name">
                                      </div>
                                      <div class="form-group">
                                          <label>Category Abbr</label>
                                          <input type="text" class="form-control" placeholder="Journal Abbrv"
                                          name="abbr">
                                      </div>
                                      
                                      <div class="form-group">
                                          <label>Cover Image</label>
                                          <input type="file" class="form-control" name="cover">
                                      </div>
                                      <div class="form-group">
                                          <label>Description</label>
                                          <textarea  class="form-control" name="des"></textarea>
                                      </div>
                                    </div>
                                    <div class="modal-footer">
                                      
                                      <button type="submit" class="btn btn-danger">Create</button>
                                    </div>
                                  </form>
                                
                                  
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                        
                    </div>
                </div>
            </header>
            
            <section id="breadcrumb">
                <div class="container">
                    <ol class="breadcrumb">
                        <li class="active">
                            Dashboard
                        </li>
                    </ol>
                </div>
            </section>
            
            <section>
                <div class="container">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="list-group">
                              <a href="index.html" class="list-group-item active main-color-bg">
                                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span> Dashboard
                              </a>
                              <a href="{{route('category.index')}}" class="list-group-item"><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> All Categories <span class="badge"></span></a>
                            <a href="{{route('journal.create')}}" class="list-group-item"><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> All Journals <span class="badge"></span></a>
                            <a href="{{route('publish.index')}}" class="list-group-item"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Published Articles <span class="badge"></span></a>
                            <a href="{{route('article.index')}}" class="list-group-item"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Recieved Articles <span class="badge"></span></a>
                            <a href="{{route('event.create')}}" class="list-group-item"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> All Events <span class="badge"></span></a>
                            <a href="{{route('about.create')}}" class="list-group-item"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> About us <span class="badge"></span></a>

                              <a href="users.html" class="list-group-item"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> User <span class="badge">503</span></a>
                            </div>
                            
                            
                        </div>
                        {{-- <div class="col-md-9">
                            
                            <!-- Website Overview -->
                            <div class="panel panel-default">
                              <div class="panel-heading main-color-bg">
                                <h5 class="panel-title">Website Overview</h5>
                              </div>
                              <div class="panel-body">
                                <div class="col-md-3">
                                    <div class="well dash-box">
                                        <h2><span class="glyphicon glyphicon-user" aria-hidden="true"></span> {{App\Journal::count()}}</h2>
                                        <h4>Journals</h4>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="well dash-box">
                                        <h2><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> {{App\Published::count()}}</h2>
                                        <h4>Published</h4>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="well dash-box">
                                        <h2><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> {{App\Article::count()}}</h2>
                                        <h4>To be Published</h4>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="well dash-box">
                                        <h2><span class="glyphicon glyphicon-start" aria-hidden="true"></span> 2,3074</h2>
                                        <h4>Vistors</h4>
                                    </div>
                                </div>
                              </div>
                            </div>
                            
                        </div> --}}
                        @yield('dashboard')
                    </div>
                </div>
            </section>
            
            <footer id="footer">
                <p>Copyright Excellent Academy &copy; {{date('Y')}}</p>
            </footer>
            
            <!-- Modals -->
            
            <!-- Add Pages -->
            <div class="modal fade" id="addPage" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                <form method="POST" action="{{route('journal.store')}}" enctype="multipart/form-data">
                    @csrf
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Add Journal</h4>
                  </div>
                  <div class="modal-body">
                    <div class="form-grup">
                      <label for="des">Journal Category</label>
                      <select class="form-control" name="cat_id">
                            <option>Choose Category</option>
                          @foreach($category as $j)
                            <option value="{{$j->id}}">{{$j->name}}</option>
                          @endforeach
                      </select>
                    </div>
                    
                    
                    <div class="form-group">
                        <label>Journal Volume</label>
                        <input type="text" class="form-control" placeholder="Vol 1"
                        name="vol">
                    </div>
                    <div class="form-group">
                        <label>Month</label>
                       <select name="month" class="form-control">
                        <option >Choose Month</option>
                        <option value="January">January</option>
                        <option value="February">February</option>
                        <option value="March">March</option>
                        <option value="April">April</option>
                        <option value="May">May</option>
                        <option value="June">June</option>
                        <option value="July">July</option>
                        <option value="August">August</option>
                        <option value="September">September</option>
                        <option value="October">October</option>
                        <option value="November">November</option>
                        <option value="December">December</option>
                       </select>
                    </div>
                    <div class="form-group">
                        <label>Year</label>
                        <input type="text" class="form-control" placeholder="2020" name="year">
                    </div>
                    
                    
                  </div>
                  <div class="modal-footer">
                    
                    <button type="submit" class="btn btn-danger">Create</button>
                  </div>
                </form>
                </div>
              </div>
            </div>
            
            <div class="modal fade" id="addPage2" tabindex="-2" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                  <form method="POST" action="{{route('publish.store')}}" enctype="multipart/form-data">
                      @csrf
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                      <h4 class="modal-title" id="myModalLabel">Publish new Article</h4>
                    </div>
                    <div class="modal-body">
                      <div class="form-group">
                          <label>Title</label>
                          <input type="text" class="form-control" placeholder="Title"
                          name="title">
                      </div>
                      <div class="form-group">
                          <label>Abstract</label>
                          <textarea name="abstract" class="form-control"></textarea>
                      </div>
                      
                      
                      <div class="form-grup">
                        <label for="subject">keywords</label>
                        <textarea name="keywords" placeholder="Enter keywords: Home, Component," class="form-control"></textarea>
                      </div>
                      <div class="form-grup">
                        <label for="subject">No Pages</label>
                        <input name="no_pages" placeholder="Enter No of Pages :01 - 66" type="text" class="form-control">
                      </div>
                      <div class="form-grup">
                        <label for="subject">Author(s)</label>
                        <textarea name="author_name" class="form-control" placeholder=" Author(s) Name: A. Teo, K. H. H. Li, N.-T. Youuyen, W. Guo, N. Heere, H.D. Xi, C."></textarea>
                      </div>
                      <div class="form-grup">
                        <label for="subject">Author's Mail</label>
                        <input name="authors_email" placeholder="Author(s) Mail: author@gmail.com" type="email" class="form-control">
                      </div>
                      <div class="form-grup">
                        <label for="des">Manuscript</label>
                        <input type="file" name="filename" placeholder="Manuscript" class="form-control">
                      </div>
                      <div class="form-grup">
                        <label for="des">Journal</label>
                        <select class="form-control" name="journal_id">
                            <option>Choose Journal</option>
                            @foreach($journal as $j)
                        <option value="{{$j->id}}">{{$j->category->abbr}}, Vol {{$j->vol}},{{$j->year}}</option>
                        @endforeach
                        </select>
                      </div>
                    <div class="modal-footer">
                      
                      <button type="submit" class="btn btn-danger">Publish</button>
                    </div>
                  </form>
                  </div>
                </div>
            </div>
            

                        <!-- Modal -->
          
          
            <script>
                CKEDITOR.replace( 'editor1' );
            </script>
            
            
            
            <!-- Bootstrap core Javascript
            ======================================== -->
            <!-- placed at the end of the document so the pages load faster -->
             <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
            <script src="{{asset('js/bootstrap.min.js')}}"></script>
        </body>
    </html>