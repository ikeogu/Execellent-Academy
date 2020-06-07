<?php

namespace App\Http\Controllers;

use App\About;
use App\Journal;
use App\Category;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    

    public function index()
    {
        //
        $about = About::all();
        $journal = Journal::all();
        return view('about/index',['about'=>$about,'journal'=>$journal]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $category = Category::all();
        $journal = Journal::all();
        $about = About::all();
        return view('about/create',['category'=>$category,'journal'=>$journal,'about'=>$about]);
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
            'title'=>'required|string',
            'body'=>'required|string',
        ]);
        About::create($request->all());
        return back()->with('success','About us Added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\About  $about
     * @return \Illuminate\Http\Response
     */
    public function show($about)
    {
        //
        $abt = About::find($about);
        return view('');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\About  $about
     * @return \Illuminate\Http\Response
     */
    public function edit($about)
    {
        //
        
        $abt = About::find($about);
        return view('about.create',['abt'=>$abt]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\About  $about
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $about)
    {
        //
        About::whereId($about)->update($request->except(['_method','_token']));
        return redirect(route('about.create'))->with('success','Updated');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\About  $about
     * @return \Illuminate\Http\Response
     */
    public function destroy($about)
    {
        //
        
        $abt = About::find($about);
        $abt->delete();
        return back()->with('success','Deleted!');

    }
}
