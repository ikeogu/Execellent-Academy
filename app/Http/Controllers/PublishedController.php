<?php

namespace App\Http\Controllers;

use App\Published;
use App\Journal;
use App\Category;
use Illuminate\Http\Request;

class PublishedController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth')->except(['show']);
    }
    public function index()
    {
        //
        $category = Category::all();
        $published = Published::all();
        $journal = Journal::all();
        return view('publish/index',['published'=>$published,'journal'=>$journal,'category'=>$category]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('published/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $this->validate(request(),[
            'title'=>'required|string:max:1000',
            'abstract'=>'required|string:max:1000000',
            'authors_email'=>'required|string:max:100',
            'author_name'=>'required|string:max:1000',
            'no_pages'=>'required|string:max:8',


        ]);
    if($request->hasFile('filename')){
        //get file name with extension
        $fileNameWithExt = $request->file('filename')->getClientOriginalName();
        //get just file name
        $filename = pathinfo($fileNameWithExt,PATHINFO_FILENAME);
        //get just extension
        $extension =  $request->file('filename')->getClientOriginalExtension();
        //file name to store
        $fileNameToSave = $filename.'_'.time().'.'.$extension;
        //upload image
        $path =  $request->file('filename')->storeAs('public/published/', $fileNameToSave);
    }

    $publish = new Published();

    $publish->title = $request->Input('title');
    $publish->abstract = $request->Input('abstract');
    $publish->author_name =  $request->Input('author_name');
    $publish->author_email =  $request->Input('authors_email');
    $publish->keywords =  $request->Input('keywords');
    $m = Journal::find($request->journal_id);
    $publish->month =  $m->month;
    $publish->no_pages =  $request->Input('no_pages');
    $publish->journal_id = $m->id;
    $publish->status = 1;
    $publish->filename = $fileNameToSave;

    if($publish->save()){
    //    send mail to author
    // $data = [
    //     'email' => $publish->author_email,
    //     'subject' => "Article has been Published.",
    //     'title' => $paper->title,
    //     'url' =>  URL::signedRoute('artpub',  ['id'=> $publish->id]),
    //     'name' => $paper->firstname + $paper->lastname
    // ];

    // Mail::to($publish->authors_email)->send(new ArticlePublished($data)); 
        return redirect(route('publish.index'))->with('success', "Article has been Published");
    }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Published  $published
     * @return \Illuminate\Http\Response
     */
    public function show($published)
    {
        //
        $publish = Published::find($published);
        // dd($publish->journal->category->abbr);
        return view('publish/show',['publish'=>$publish]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Published  $published
     * @return \Illuminate\Http\Response
     */
    public function edit($published)
    {
        //
        $publish = Published::find($published);
        return view('published/edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Published  $published
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $published)
    {
        //
        Published::whereId($published)->update(except(['_method','_token']));
        return redirect(route('published.index'))->with('success','Article Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Published  $published
     * @return \Illuminate\Http\Response
     */
    public function destroy( $published)
    {
        //
        $p = Published::find($published);
        $p->delete();
        return redirect(route('published.index'))->with('success','Article deleted');
    }

    public function readBook($id)
    {
        $file = Published::find($id);
        $file_path = storage_path('app/public/Published/'.$file->filename);
        return response()->file($file_path);

    }
}
