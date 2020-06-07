<?php

namespace App\Http\Controllers;

use App\Family;
use App\Category;
use App\Journal;
use Illuminate\Http\Request;

class FamilyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $family = Family::all();
        return view('family',['family'=>$family,'category'=>$category,'journal'=>$journal]);
    

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
            'name'=>'required',
            'description'=>'required'
        ]);

        Family::create($request->all());
        return back()->with('success','Category created!');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Family  $family
     * @return \Illuminate\Http\Response
     */
    public function show($family)
    {
        //
        $category = Family::find($family);
        return view('');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Family  $family
     * @return \Illuminate\Http\Response
     */
    public function edit(Family $family)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Family  $family
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $family)
    {
        //
        Family::whereId($family)->update($request->except(['_method','_token']));
        return back()->with("success","Category Updated!"); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Family  $family
     * @return \Illuminate\Http\Response
     */
    public function destroy($family)
    {
        //
        $category = Family::find($family);
        $category->delete();
        return back()->with('Success',"Category Deleted"); 
    
    }
}
