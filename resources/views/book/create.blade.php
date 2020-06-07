@extends('layouts.dashboard')

@section('dashboard')
<div class="col-md-9">
    
    
    <!-- Website Overview -->
    <div class="panel panel-default">
      <div class="panel-heading row">
        <div class="col-6">
            <h3 class="panel-title">Books in Store</h3>
        </div>
        <div class="col-2">
            <div class="dropdown create">
              <button class="btn btn-danger btn-md-9" type="button" data-toggle="modal" data-target="#myModal1">
                Add new Book
                
              </button>
              
            </div>
          </div>
      </div>
      <div class="panel-body">
        <div class="row">
            <div class="col-md-12">
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
            </div>
        </div>
          <br>
        <table class="table table-strip table-hover">
            <tr>
                    <th>Title</th>
                    <th>Authors</th>
                    <th>Description</th>
                    
                    <th>Status</th>
                    <th>Category</th>
                    <th>Cover Page</th>
                    <th>Price</th>
                    <th>Year</th>
                    <th>Action</th>
            </tr>
            @foreach ($book as $id => $item)
                    <tr>
                    <td>{{$item->title}}</td>
                    <td>{{$item->author->name}}</td>
                    <td class="text-center">{{$item->description}}</td>
                    
                    <td class="text-center">
                        @if ($item->status == 1)
                            <button class="btn btn-success"> active</button>
                        @else
                        <button class="btn btn-warning">Not active</button>
                        @endif
                    </td>
                    <td class="text-center">{{$item->family->name}}</td>
                    <td class="text-center">
                        <img src="/storage/cover_page/{{$item->cover_page}}" height="50" width="60">
                    </td>
                    <td class="text-center">{{$item->price / 100}}</td>
                    <td class="text-center">{{$item->year_pub}}</td>
                    <td class="d-flex justify-content-between flex-wrap">
                    <a  class="btn btn-danger btn-user btn-block" data-toggle="modal" data-target="#addPage-{{$id}}">Edit</a>
                        <form action="{{ route('publish.destroy' , [$item->id])}}" method="POST">
                        <input name="_method" type="hidden" value="DELETE">
                        {{ csrf_field() }}                                                       
                            <button type="submit" class="btn btn-danger btn-user btn-block" onclick="return confirm('Are you sure?')">Delete</button>
                            
                    </form>
                    </td>
                    <td class="d-flex justify-content-between flex-wrap">
                        <a href="{{route('dis_book',[$item->id])}}" class="btn btn-warning ">Disable</a>
                        <a href="{{route('ena_book',[$item->id])}}" class="btn btn-info ">Enable </a>
                    </td>
                     
                    
                </tr>
            <div class="modal fade" id="addPage-{{$id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                <form method="POST" action="{{route('book.update',[$item->id])}}" enctype="multipart/form-data">
                  @csrf
                  {{method_field('PUT')}}
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title" id="myModalLabel">Edit {{$item->title}}</h4>
                  </div>
                  <div class="modal-body">
                    <div class="modal-body">
                        <div class="form-group">
                            <input type="text" class="form-control " id="Name" aria-describedby="name"
                        value="{{$item->title}}" name="title">
                          </div>
                          <div class="form-group">
                            <input type="text" class="form-control " id="Name" aria-describedby="name"
                          value="{{$item->isbn}}" name="isbn">
                          </div>
                          <div class="form-group">
                            <textarea class="form-control " aria-describedby="name" cols="7"row="7"
                          value="{{$item->description}}" name="description"></textarea>
                          </div>
                          <div class="form-group">
                            <input type="date" class="form-control " id="Name" aria-describedby="name"
                          value="{{$item->year_pub}}" name="year_pub">
                              <small>Date of Publication</small>
                          </div>
                            <div class="form-group">
                                <input type="text" class="form-control " id="Name" aria-describedby="name"
                            value="{{$item->price}}" name="price">
                            </div>
                          
                          <div class="form-group">
                              <select class="form-control " id="Name" 
                                  name="family_id">
                                  <option  >-Select Category-</option>
                                  @foreach ($family as $item)
                                  <option value="{{$item->id}}" >{{$item->name}}</option>
                                  
                                  @endforeach
                                  
                              </select>   
                          </div>
                          <div class="form-group">
                              <select class="form-control " id="Name" 
                                  name="author_id">
                                  <option  >-Select Author-</option>
                                  @foreach ($author as $item)
                                  <option value="{{$item->id}}" >{{$item->name}}</option>
                                  
                                  @endforeach
                                  
                              </select>   
                          </div>
                          <div class="form-group">
                            <input type="file" class="form-control  " id="Name" aria-describedby="name"
                             name="cover_page">
                              <small>Upload Cover page</small>
                          </div>
                         
                          
                          <textarea name="contents" class="form-control my-editor" rows="10" cols="100" >{!! old('content', $content ?? '') !!}</textarea>
                  </div>
                  <div class="modal-footer">
                    
                    <button type="submit" class="btn btn-danger">Update</button>
                  </div>
                </form>
                </div>
              </div>
            </div>
            @endforeach
         </table>
      </div>
    </div>
    <div class="modal fade" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog modal-lg" role="document" >
          <div class="modal-content">
            
            
            <form method="POST" action="{{route('book.store')}}" enctype="multipart/form-data">
                @csrf
              <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">Add Book</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                
              </div>
              <div class="modal-body">
                <div class="form-group">
                    <input type="text" class="form-control " id="Name" aria-describedby="name"
                      placeholder="Enter Book Title" name="title">
                  </div>
                  <div class="form-group">
                    <input type="text" class="form-control " id="Name" aria-describedby="name"
                      placeholder="Enter Book ISBN" name="isbn">
                  </div>
                  <div class="form-group">
                    <textarea class="form-control " aria-describedby="name" cols="7"row="7"
                      placeholder="Enter Description" name="description"></textarea>
                  </div>
                  <div class="form-group">
                    <input type="date" class="form-control " id="Name" aria-describedby="name"
                      placeholder="Enter Date of Publication " name="year_pub">
                      <small>Date of Publication</small>
                  </div>
                    <div class="form-group">
                        <input type="text" class="form-control " id="Name" aria-describedby="name"
                        placeholder="Enter Price of Book" name="price">
                    </div>
                  
                  <div class="form-group">
                      <select class="form-control " id="Name" 
                          name="family_id">
                          <option  >-Select Category-</option>
                          @foreach ($family as $item)
                          <option value="{{$item->id}}" >{{$item->name}}</option>
                          
                          @endforeach
                          
                      </select>   
                  </div>
                  <div class="form-group">
                      <select class="form-control " id="Name" 
                          name="author_id">
                          <option  >-Select Author-</option>
                          @foreach ($author as $item)
                          <option value="{{$item->id}}" >{{$item->name}}</option>
                          
                          @endforeach
                          
                      </select>   
                  </div>
                  <div class="form-group">
                    <input type="file" class="form-control  " id="Name" aria-describedby="name"
                     name="cover_page">
                      <small>Upload Cover page</small>
                  </div>
                 
                  
                  <textarea name="contents" class="form-control my-editor" rows="10" cols="100">{!! old('content', $content ?? '') !!}</textarea>
                  <button type="submit" class="btn btn-danger btn-user btn-block">
                    Add Book
                  </button>
                  <hr>
              </div>
              <div class="modal-footer">
                
                <button type="submit" class="btn btn-danger">Create</button>
              </div>
            </form>
          
            
          </div>
        </div>
      </div>
</div>
{{-- modal --}}
<script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
    <script type="text/javascript">
    
 

     
      
          
        var editor_config = {
          path_absolute : "/",
          selector: "textarea.my-editor",
          plugins: [
            "advlist autolink lists link image charmap print preview hr anchor pagebreak",
            "searchreplace wordcount visualblocks visualchars code fullscreen",
            "insertdatetime media nonbreaking save table contextmenu directionality",
            "emoticons template paste textcolor colorpicker textpattern"
          ],
          toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media",
          relative_urls: false,
          file_browser_callback : function(field_name, url, type, win) {
            var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;
            var y = window.innerHeight|| document.documentElement.clientHeight|| document.getElementsByTagName('body')[0].clientHeight;
      
            var cmsURL = editor_config.path_absolute + 'laravel-filemanager?field_name=' + field_name;
            if (type == 'image') {
              cmsURL = cmsURL + "&type=Images";
            } else {
              cmsURL = cmsURL + "&type=Files";
            }
      
            tinyMCE.activeEditor.windowManager.open({
              file : cmsURL,
              title : 'Filemanager',
              width : x * 0.8,
              height : y * 0.8,
              resizable : "yes",
              close_previous : "no"
            });
          }
        };
      
        tinymce.init(editor_config);
        $(document).on('focusin', function(e) {
            if ($(event.target).closest(".mce-window").length) {
                e.stopImmediatePropagation();
            }
        });
      </script> 
      
@endsection