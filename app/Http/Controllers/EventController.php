<?php

namespace App\Http\Controllers;

use App\Event;
use App\Category;
use App\Journal;
use Image;
use Illuminate\Http\Request;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth')->except(['index']);
    }
    public function index()
    {
        //
        $event = Event::all();
        return view('event/index',['event'=>$event]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $event = Event::all();
        $journal = Journal::all();
        $category = Category::all();
        return view('event/create',['event'=>$event,'journal'=>$journal,'category'=>$category]);
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
            'title' => 'required',
            'date' => 'required',
            'location' => 'required',
        ]);
        if($request->hasFile('image')){
            
            $fileNameWithExt = $request->file('image')->getClientOriginalName();
            //get just file name
            $filename = pathinfo($fileNameWithExt,PATHINFO_FILENAME);
            //get just extension
            $extension =  $request->file('image')->getClientOriginalExtension();
            //file name to store
            $fileNameToSave = $filename.'_'.time().'.'.$extension;
            //upload image
            $path =  $request->file('image')->storeAs('public/event_pix/', $fileNameToSave);
            
           
          };
        $event = new Event();
        $event->title = $request->title;
        $event->date = $request->date;
        $event->location = $request->location;
       
        $event->image = $fileNameToSave;
         
        if($event->save()){
            return redirect(route('event.create'))->with('success', 'Event Created!');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function show($event)
    {
        //
        $eve = Event::find($event);
        return view();

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function edit(Event $event)
    {
        //
        $eve = Event::find($event);
        return view();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $event)
    {
        //
        
        if($request->hasFile('image')){
            $fileNameWithExt = $request->file('image')->getClientOriginalName();
            //get just file name
            $filename = pathinfo($fileNameWithExt,PATHINFO_FILENAME);
            //get just extension
            $extension =  $request->file('image')->getClientOriginalExtension();
            //file name to store
            $fileNameToSave = $filename.'_'.time().'.'.$extension;
            //upload image
            $path =  $request->file('image')->storeAs('public/event_pix/', $fileNameToSave);

            $j = Event::find($event);
            
            //$j->image->delete();
            
            $j->image = $fileNameToSave;
            $j->save();
           
          };
        Event::whereId($event)->update($request->except(['_method','_token','image']));
        return redirect(route('event.create'))->with('success','Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function destroy(Event $event)
    {
        //
        $e = Event::find($event);
        $e->delete();
        return view();
    }
}
