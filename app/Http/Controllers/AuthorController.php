<?php

namespace App\Http\Controllers;

use App\Author;
use App\Category;
use App\Journal;
use App\Family;
use App\Book;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $author = Author::where('state',1)->paginate(10);
        return view('author/index',['author'=>$author]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
         $category= Category::all();
        $journal = Journal::all();
        $author = Author::all();
        return view('author/create',['author'=>$author,'category'=>$category,'journal'=>$journal]);
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
            'name'=> 'required|max:50',
            
            'book_authored'=> 'required',
            'photo'=> 'required',
            

        ]);

        if($request->hasFile('photo')){
            //get file name with extension
            $fileNameWithExt = $request->file('photo')->getClientOriginalName();
            //get just file name
            $filenames = pathinfo($fileNameWithExt,PATHINFO_FILENAME);
            //get just extension
            $extension = $request->file('photo')->getClientOriginalExtension();
            //file name to store
            $fileNameToStore = $filenames.'_'.time().'.'.$extension;
            //upload image
            $path = $request->file('photo')->storeAs('public/authors/', $fileNameToStore);
        }

        

        $author = new Author();
        $author->name = $request->name;
        
        $author->title = $request->title;
        
        $author->email = $request->email;
        $author->photo = $fileNameToStore;
        
        $author->biography = $request->biography;
        $author->state = 1;
        $author->education = $request->education;
        
        if($author->save()){
            return back()->with('success', 'Author Added');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function show($author)
    {
        //
        $authors= Author::find($author);
        $book= Book::where('author_id',$author)->get();
        
        return view('author/show',['author'=>$authors,'book'=>$book]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function edit($author)
    {
        //
        // $list = Author::find($author);
        // return view('author/edit',['author'=>$list]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $author)
    {
        //
        if($request->hasFile('photo')){
            //get file name with extension
            $fileNameWithExt = $request->file('photo')->getClientOriginalName();
            //get just file name
            $filenames = pathinfo($fileNameWithExt,PATHINFO_FILENAME);
            //get just extension
            $extension = $request->file('photo')->getClientOriginalExtension();
            //file name to store
            $fileNameToStore = $filenames.'_'.time().'.'.$extension;
            //upload image
            $path = $request->file('photo')->storeAs('public_html/authors/', $fileNameToStore);
            $a = Author::find($author);
            $a->photo = $fileNameToStore;
            $a->save();
        }
        
       Author::whereId($author)->update($request->except(['_method','_token','photo']));
       return back()->with('success', 'Author Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function destroy($author)
    {
       $auth = Author::find($author);
       $auth->delete();
       return back()->with('success', 'Author Deleted');
    }
    
    public function disable($author){
        $auth = Author::find($author);
        $auth->state = 0 ;
        $auth->save();
        return back()->with('success','Author Disabled');
    }
    public function enable($author){
        $auth = Author::find($author);
        $auth->state = 1 ;
        $auth->save();
        return back()->with('success','Author Enabled');
    }
}
