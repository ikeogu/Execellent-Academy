<?php

namespace App\Http\Controllers;

use App\Journal;
use App\Published;
use App\Category;
use App\About;
use Illuminate\Http\Request;

class JournalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth')->except(['start','show','index']);
    }
    public function index()
    {
        //
        $category = Category::all();
        $journal = Journal::all();
        return view('journal/index',['journal'=>$journal,'category'=>$category]);
    }

    public function start(){
        $about = About::find(1)->first();
        $journal = Category::all();
        $published = Published::latest()->take(4)->get();
       
        return view('index',['journal'=>$journal,'published'=>$published,'about'=>$about]);
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
        return view('journal/create',['journal'=>$journal,'category'=>$category]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $this->validate(request(),[
            
            'vol' => 'required',
            'month' => 'required',
            'year' => 'required',
            
        ]);
        
        $nal = new Journal();
        $x = Category::find($request->cat_id);
        $nal->name = $x->name; 
        $nal->vol = $request->vol;
        $nal->month = $request->month;
        $nal->year = $request->year;
        $nal->category_id = $x->id;         
        if($nal->save()){
            return redirect(route('journal.create'))->with('success', 'Journal Created!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Journal  $journal
     * @return \Illuminate\Http\Response
     */
    public function show($j)
    {
         $journal = Journal::find($j);
         $publish = $journal->publish()->get();
               
         return view('journal/show',['journal'=>$journal,'publish'=>$publish]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Journal  $journal
     * @return \Illuminate\Http\Response
     */
    public function edit($j)
    {
        //
        // $journal = Journal::findOrFail($j);
        // return view('journal/show',['journal'=>$journal]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Journal  $journal
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $journal)
    {
        //
        if($request->hasFile('image')){
            $image = $request->file('image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(300, 300)->save( storage_path('/Journal_image/' . $filename ) );
            $j = Journal::find($journal);
            $j->image = $filename;
            $j->save();
           
          };
        Journal::whereId($journal)->update($request->except(['_method','_token','image']));
        return redirect(route('journal.create'))->with('success','Updated');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Journal  $journal
     * @return \Illuminate\Http\Response
     */
    public function destroy($journal)
    {
        //
        $journ = Journal::find($journal);
        $journ->delete();
        return back()->with('success', "Deleted ");
    }
}
