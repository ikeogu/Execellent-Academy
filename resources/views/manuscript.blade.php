@extends('layouts.app')
@section('title')
    Submit Manuscript
@endsection
@section('content')
<section class="book-showc">
    <div class="book-showcase">
      <h2>Submit Article</h2>
    </div>
  </section>

  <section class="section section-center">
    <div class="container">
      <div class="row">
      
        <div class="col-md-9 col-10 mx-auto">
          <div class="form">
            <h4 class="title">Manuscript</h4>
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
          <form id="form" method="POST" action="{{route('article.store')}}" enctype="multipart/form-data">
            @csrf
              <div class="form-grup">
                <label for="name">Title</label>
                <input type="text" placeholder="Article title" name="title">
              </div>
              <div class="form-grup">
                <label for="email">Abstract</label>
                <textarea name="abstract" placeholder="Abstract"></textarea>
              </div>
              <div class="form-grup">
                <label for="subject">keywords</label>
                <textarea name="keywords" placeholder="Enter keywords: Home, Component,"></textarea>
              </div>
              <div class="form-grup">
                <label for="subject">No Pages</label>
                <input name="no_pages" placeholder="Enter No of Pages :01 - 66" type="text">
              </div>
              <div class="form-grup">
                <label for="subject">Author(s)</label>
                <textarea name="author_name" placeholder=" Author(s) Name: A. Teo, K. H. H. Li, N.-T. Youuyen, W. Guo, N. Heere, H.D. Xi, C."></textarea>
              </div>
              <div class="form-grup">
                <label for="subject">Author's Mail</label>
                <input name="authors_email" placeholder="Author(s) Mail: author@gmail.com" type="email">
              </div>
              <div class="form-grup">
                <label for="des">Manuscript</label>
                <input type="file" name="filename" placeholder="Manuscript">
              </div>
              <div class="form-grup">
                <label for="des">Journal</label>
                <select class="form-control" name="journal_id">
                    <option>Choose Journal</option>
                    <option value="20">Article for Book</option>
                    @foreach($journal as $j)
                <option value="{{$j->id}}">{{$j->name}}</option>
                @endforeach
                </select>
              </div>
              <button class="btn btn-send">Send</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection