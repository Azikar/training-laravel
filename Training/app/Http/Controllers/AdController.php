<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Ad;
class AdController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth', ['except'=>['index','show','sortbydate']]);
    }
    public function index()
    {
        $ads= DB::table('ads')->join('users','users.id','=','ads.user_id')->select('ads.*','users.name')->orderBy('created_at','desc')->paginate(2);
       // $ads= Ad::orderBy('created_at','desc')->paginate(15);

       return view('Pages.main')->with('ads',$ads);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Pages.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
   
    public function store(Request $request)
    {
        $this->validate($request,[
            'title'=>'required|string|max:50',
            'price'=>'required|numeric',
            'description'=>'required|string|max:100',
            'Fulldescription'=>'required|string|max:20000',
            
        ]);
        $Ad=new Ad;
        $Ad->Title=$request->input('title');
        $Ad->Price=$request->input('price');
        $Ad->Description=$request->input('description');
        $Ad->DetailedDescription=$request->input('Fulldescription');
        $Ad->user_id=auth()->user()->id;
        $Ad->save();
        return redirect('/home')->with('success','Ad created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //$Ad= DB::table('ads')->join('users','users.id','=','ads.user_id')->select('ads.*','users.id','users.name')-> where('ads.id','=',$id);
        $Ad=Ad::find($id);
        if ($Ad!==null)
        {
       $data=array(
            'Ad'=>$Ad,
            'user'=>$Ad->user
       );
        return view('Pages.ad')->with($data);
    }
    return redirect('/home');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $Ad=Ad::find($id);
        if ($Ad==null)
        {
            return redirect ('/home');
        }
        //checks user authorization
        if(auth()->user()->id!=$Ad->user_id){
            return redirect ('/home')->with('error','Post doesnt belong to you');
        }
    
   
        return view('Pages.edit')->with('Ad',$Ad);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'title'=>'required|string|max:50',
            'price'=>'required|numeric',
            'description'=>'required|string|max:100',
            'Fulldescription'=>'required|string|max:20000',
            
        ]);
        //update ad
        $Ad=Ad::find($id);
        $Ad->Title=$request->input('title');
        $Ad->Price=$request->input('price');
        $Ad->Description=$request->input('description');
        $Ad->DetailedDescription=$request->input('Fulldescription');
       // $Ad->user_id=auth()->user()->id;
        $Ad->save();
        return redirect('/home')->with('success','Ad updated');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $Ad = Ad::find($id);
        //checks if ad exists
        if ($Ad==null)
        {
            return redirect ('/home');
        }
        //checks users authorization
        if(auth()->user()->id!=$Ad->user_id){
            return redirect ('/home')->with('error','Post doesnt belong to you');
        }

        $Ad->delete();

        return redirect('/home')->with('success','Ad deleted');;
    }
    //Sorting ads by date
    public function sortbydate($way)
    {
        if($way==='desc'||$way==='asc'){
        $ads= DB::table('ads')->join('users','users.id','=','ads.user_id')->select('ads.*','users.name')->orderBy('created_at',$way)->paginate(10);
        // $ads= Ad::orderBy('created_at','desc')->paginate(15);
        }
        else
        {
            $ads= DB::table('ads')->join('users','users.id','=','ads.user_id')->select('ads.*','users.name')->orderBy('created_at','desc')->paginate(10);
        }
        return view('Pages.main')->with('ads',$ads);
    }
}
