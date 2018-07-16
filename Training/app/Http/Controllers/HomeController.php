<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Ap;
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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $user_id=auth()->user('id');
        $username=$user_id['name'];
       $ads=$user_id->ads()->paginate(10);
       $data=array(
            'ads'=>$ads,
            'username'=>$username
       );
        return view('home')->with($data);
    }
    public function sortbydate($way)
    {
        if($way==='desc'||$way==='asc'){
            $user_id=auth()->user('id');
            $username=$user_id['name'];
           $ads=$user_id->ads()->orderBy('created_at',$way)->paginate(10);
           $data=array(
                'ads'=>$ads,
                'username'=>$username
           );
            return view('home')->with($data);
        }
        else
        {
           
        
            index();
        }
        return view('Pages.main')->with('ads',$ads);
    }
}
