<?php

namespace App\Http\Controllers;

use App\Article;
use App\Journal;
use App\Category;
use Illuminate\Http\Request;
use App\Mail\RecievedMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\URL;
class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function index()
    {
        //
        $article = Article::all();
        $journal = Journal::all();
        $category = Category::all();
        return view('recieved_a',['article'=>$article,'journal'=>$journal,'category'=>$category]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $journal = Journal::all();
        return view('manuscript',['journal'=>$journal]);
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
        $path =  $request->file('filename')->storeAs('public/A_recieved/', $fileNameToSave);
    }

    $publish = new Article();

    $publish->title = $request->Input('title');
    $publish->abstract = $request->Input('abstract');
    $publish->author_name =  $request->Input('author_name');
    $publish->author_email =  $request->Input('authors_email');
    $publish->keywords =  $request->Input('keywords');
    $publish->no_pages =  $request->Input('no_pages');
    $publish->journal_id = $request->journal_id;
    $publish->filename = $fileNameToSave;

    if($publish->save()){
        $data = [
            'email' => $publish->author_email,
            'subject' => "we have received your research article which shall be vetted and sent back to you for necessary corrections. We expect you to resend it to us  for publication after effecting the corrections. Thanks.",
            'title' => $publish->title,
            // 'url' =>  URL::signedRoute('artpub',  ['id'=> $publish->id]),
            'name' => $publish->author_name,
        ];

        Mail::to($publish->author_email)->send(new ReceivedMail($data)); 
        
        return back()->with('success','Article is submitted. We will get to you!');
    }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function show($article)
    {
        //
        $art = Article::find($article);
        return view();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function edit($article)
    {
        //
        $art = Article::find($article);
        return view();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $article)
    {
        //
        Article::whereId($article)->update(except(['_method','_token']));
        return redirect(route('book.index'))->with('success','Article Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function destroy($publish)
    {
        //
        $publish = Article::find($publish);
        $publish->delete();
        return back()->with('success','Article Deleted');
    }

    public function downloadPDF($id){
        $article= Article::find($id);
        //dd($article);
        $file_path = storage_path('app/public/A_recieved/'.$article->filename);
        return response()->download($file_path);


    }
    public function readBook($id)
    {
        $file = Article::find($id);
        $file_path = storage_path('app/public/A_recieved/'.$file->filename);
        return response()->file($file_path);

    }
}
