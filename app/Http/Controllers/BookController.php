<?php

namespace App\Http\Controllers;

use App\Book;
use App\Family;
use App\Author;
use App\Category;
use App\Journal;
use Paystack;
use PDF;
use App\Purchase;
use Illuminate\Http\Request;
use App\Mail\PurchaseMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\URL;

class BookController extends Controller
{
    /** 
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $book = Book::all();
        return view('book/index',['book'=>$book]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $book = Book::all();
        $family = Family::all();
        $author = Author::all();
        $category= Category::all();
        $journal = Journal::all();
        return view('book/create',['book'=>$book,'family'=>$family,'author'=>$author,'category'=>$category,'journal'=>$journal]);
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
            'title'=> 'required',
            'price' => 'required',
            'year_pub' =>'required',
            'description'=> 'required',
            'contents' => 'required'
        ]);
        

        if($request->hasFile('cover_page')){
            //get file name with extension
            $fileNameWithExt = $request->file('cover_page')->getClientOriginalName();
            //get just file name
            $filenames = pathinfo($fileNameWithExt,PATHINFO_FILENAME);
            //get just extension
            $extension = $request->file('cover_page')->getClientOriginalExtension();
            //file name to store
            $fileNameToStore = $filenames.'_'.time().'.'.$extension;
            //upload image
            $path = $request->file('cover_page')->storeAs('public/cover_page/', $fileNameToStore);
           
        }
        
        $book = new Book();
        $book->title = $request->title;
        $book->price = ($request->price * 100);
        
        $book->year_pub = $request->year_pub;
        $book->isbn = $request->isbn;
        
        $book->family_id = $request->family_id;
        $book->description = $request->description;
        
        if($book->price == 0){
            $book->status = 0;
        }elseif ($book->price !== 0) {
            # code...
            $book->status = 1;
        }
         

        $book->author_id = $request->author_id;
        $book->state=1;
        $book->contents = $request->contents;
        $book->cover_page = $fileNameToStore;
        
        if($book->save()){
         return back()->with('success','Book Published');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function show($book)
    {
        //
        $bk= Book::find($book);
        return view('book/show',['book'=>$bk]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function edit($book)
    {
        //
        $bk= Book::find($book);
        return view('book/show',['book'=>$bk]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $book)
    {
        //
        if($request->hasFile('cover_page')){
            //get file name with extension
            $fileNameWithExt = $request->file('cover_page')->getClientOriginalName();
            //get just file name
            $filenames = pathinfo($fileNameWithExt,PATHINFO_FILENAME);
            //get just extension
            $extension = $request->file('cover_page')->getClientOriginalExtension();
            //file name to store
            $fileNameToStore = $filenames.'_'.time().'.'.$extension;
            //upload image
            $path = $request->file('cover_page')->storeAs('public/cover_page/', $fileNameToStore);
           $i = Book::find($book);
           $i->cover_page = $fileNameToStore;
           $i->save();

        }
        Book::whereId($book)->update($request->except(['_method','_token','cover_page']));
        return redirect(route('book.create'))->with('success', ' Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy($book)
    {
        //
        $bk= Book::find($book);
        return back()->with('success','Book Deleted!');
    }
    public function disable($book){
        $auth = Book::find($book);
        $auth->state = 0 ;
        $auth->save();
        return back()->with('success','Book Disabled');
    }
    public function enable($book){
        $auth = Book::find($book);
        $auth->state =1 ;
        $auth->save();
        return back()->with('success','Author Enabled');
    }
    /**
     * Redirect the User to Paystack Payment Page
     * @return Url
     */
    public function redirectToGateway()
    {
        
        request()->metadata = json_encode(request()->all());
        return Paystack::getAuthorizationUrl()->redirectNow();
    }
    public function handleGatewayCallback()
    {
        $paymentDetails = Paystack::getPaymentData();

         //dd($paymentDetails);
        // Now you have the payment details,
        // you can store the authorization_code in your db to allow for recurrent subscriptions
        // you can then redirect or do whatever you want
        $paid = new Purchase();
            
            $paid->reference =  data_get($paymentDetails, 'data.reference');
            $amount = data_get($paymentDetails, 'data.amount');
            $paid->amount = $amount / 100;
            $paid->email = data_get($paymentDetails, 'data.customer.email');
            $paid->bank = data_get($paymentDetails, 'data.authorization.bank');
            $paid->card_type = data_get($paymentDetails, 'data.authorization.card_type');
            
            $paid->book_id = data_get($paymentDetails, 'data.metadata.book_id');
            
            $paid->paid_at = data_get($paymentDetails, 'data.paidAt');
             
            if($paid->save()){
                    
                 $book = Book::find($paid->book_id);
                
                $url = URL::temporarySignedRoute('down', now()->addMinutes(2880), ['id'=> $book->id,'email'=>$paid->email]);
                $data = array('url'=>$url, 'book'=>$book);
                // dd($url);
                Mail::to($paid->email)->send(new PurchaseMail($data)); 
                 
                return view('thanks',['email'=>$paid->email,'book'=>$book]);
            }
    }
    public function downloadPDF($id, $email){
    
        $article = Book::find($id);
        
        $pdf = PDF::loadView('pdf.book', ['article' => $article]);
        // $pdf->SetProtection(['print'],$email,"MyMasterPassword",0);
        
        $article->download_count = $article->download_count + 1;
        $article->save();
        return $pdf->stream($article->title.'.pdf');
    }
    public function purchase_destroy($id){
         $purchase = Purchase::find($id);
         $purchase->delete();
         return back()->with('success','Purchase Deleted!');
    }
    public function purchase_create(){
        $category= Category::all();
        $purchase = Purchase::all();
        $journal = Journal::all();
        $total = 0;
        foreach($purchase as $item){
            $total += $item->amount;
            
            
        }
        return view('purchases',['purchase'=>$purchase,'category'=>$category,'journal'=>$journal,'total'=>$total]);
    }
}
