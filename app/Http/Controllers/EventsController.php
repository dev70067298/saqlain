<?php

namespace App\Http\Controllers;
use App\Events;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\User;
 
class EventsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $this->user = Auth::user();

            return $next($request);
        });
    }
    public function index()
    {
        if (Auth::check()) {
            if($this->user->userRole != 1)
            {
             return redirect('/admin');
            }
         }
         else
         {
             return redirect('/admin');
         }
         $events=Events::all();
         $chat_users=User::whereIn('userRole',[2,3])->orderBy('id','desc')->get();

        return view('admin.events')->with(array('chat_users'=>$chat_users,'events'=>$events));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $chat_users=User::whereIn('userRole',[2,3])->orderBy('id','desc')->get();
       return view('admin.create_event')->with(array('chat_users'=>$chat_users));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (Auth::check()) {
            if($this->user->userRole != 1)
            {
             return redirect('/admin');
            }
         }
         else
         {
             return redirect('/admin');
         }

$events=new Events();
               $this->validate($request,[
                'title'=>'required',
                'descerption'=>'required',

               ]);


            if(isset($request->image))
            {

            $path=$request->image->store('events');
            $events->image=$path;
            }
            $events->title=$request->title;
            $events->description=$request->descerption;


            if($events->save())
            {
                return redirect('events')->with('success','Event Added');
            }
            else
            {
                return redirect()->back()->with('error','Event Not Added Try Again');
            }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($event)
    {
        if (Auth::check()) {
            if($this->user->userRole != 1)
            {
             return redirect('/admin');
            }
         }
         else
         {
             return redirect('/admin');
         }
$chat_users=User::whereIn('userRole',[2,3])->orderBy('id','desc')->get();
$events = Events::where('id',$event)->first();
return view('admin.edit_events')->with(array('chat_users'=>$chat_users,'events'=>$events));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $event)
    {
        if (Auth::check()) {
            if($this->user->userRole != 1)
            {
             return redirect('/admin');
            }
         }
         else
         {
             return redirect('/admin');
         }


               $this->validate($request,[
                'title'=>'required',
                'descerption'=>'required',

               ]);

               $events = Events::where('id',$event)->first();
            if(isset($request->image))
            {

            $path1=$events->image;
            Storage::delete($path1);
            $path=$request->image->store('events');
            $events->image=$path;
            }
            $events->title=$request->title;
            $events->description=$request->descerption;


            if($events->save())
            {
                return redirect('events')->with('success','Event Updated');
            }
            else
            {
                return redirect()->back()->with('error','Event Not Updated');
            }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($event)
    {
        if (Auth::check()) {
            if($this->user->userRole != 1)
            {
             return redirect('/admin');
            }
         }
         else
         {
             return redirect('/admin');
         }
         $user=Events::find($event);
         $path1=$user->image;
         Storage::delete($path1);
         $user->delete();
         return redirect()->back()->with('success','Event Deleted');
    }
}
