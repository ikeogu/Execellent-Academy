<?php

namespace App\Http\Controllers;

use App\Category;
use App\Journal;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $category = Category::all();
        $journal = Journal::all();
        return view('category/index',['category'=>$category,'journal'=>$journal]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'name' => 'required|string',
            'des' => 'required|string',
            'cover'=>'required'
        ]);
        if($request->hasFile('cover')){
             //get file name with extension
            $fileNameWithExt = $request->file('cover')->getClientOriginalName();
            //get just file name
            $filename = pathinfo($fileNameWithExt,PATHINFO_FILENAME);
            //get just extension
            $extension =  $request->file('cover')->getClientOriginalExtension();
            //file name to store
            $fileNameToSave = $filename.'_'.time().'.'.$extension;
            //upload image
            $path =  $request->file('cover')->storeAs('public/Journal_image/', $fileNameToSave);         
            
        };
        $cat = new Category();
        $cat->name = $request->input('name');
        $cat->abbr = $request->input('abbr');
        $cat->des = $request->input('des');
        $cat->cover = $fileNameToSave;
        if($cat->save()){
            return back()->with('success','Category Created.');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show($category)
    {
        //
        $journal = Category::find($category);
        
        $journals = Journal::where('category_id','=',$category)->get();
        
        return view('category/show',['journal'=>$journal,'journals'=>$journals]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit( $category)
    {
        //
        $cat = Category::find($category);
        return view('category/edit',['cat'=>$cat]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $category)
    {
        //
        if($request->hasFile('image')){
            $image = $request->file('image');
            $filename = time() . '.' . $image->getClientOriginalExtension();          
            $request->file('image')->storeAs('public/Journal_image/', $filename);
        
            $I = Category::find($category);
            $I->cover->delete();
            $I->cover = $fileNameToSave;
            $I->save();

        }
        Category::whereId($category)->update($request->except(['_method','_token','cover']));
        return redirect(route('category.index'))->with('success', ' Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy($category)
    {
        //
        $cat = Category::find($category);
        $cat->delete();
        return redirect(route('category.index'))->with('success','Deleted');
    }
}
