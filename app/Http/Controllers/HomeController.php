<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Item;
use Carbon\Carbon;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function default(){
        $userItems = Item::all()->where('itemToUserID', Auth::user()->id)->sortBy('created_at');

        // dd(json_encode($userItems));
    
        return view('welcome', ['userItems'=> json_encode($userItems)]);
    }

    public function saveItems(){

        // dd(request());

        // dd( json_decode( request()->items) );

        $items = json_decode( request()->items);

        $data = [];

        for($i = 0; $i < count($items); $i++ ){
            if(!Item::where('url', $items[$i]->url)->where('justName', $items[$i]->justName)->exists()  ){
                array_push($data, [ 'itemToUserID'=>Auth::user()->id,'url'=>$items[$i]->url, 'justName'=>$items[$i]->justName , 'created_at'=> Carbon::now(), 'updated_at'=> Carbon::now()  ]);
                }
        }

        // dd($data);

        Item::insert($data);

        return redirect("/");

    }
}