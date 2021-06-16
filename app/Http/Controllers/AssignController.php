<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\gp;
use App\gt;
use App\User;


class AssignController extends Controller
{



    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $this->user = Auth::user();

            return $next($request);
        });
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
         $data =gp::join('group', 'gp.g_id', '=', 'group.id')
            ->join('projects', 'gp.p_id', '=', 'projects.id')
            ->select('group.group_name', 'projects.title', 'gp.id')
            ->get();
         $chat_users=User::whereIn('userRole',[2,3])->orderBy('id','desc')->get();

        return view('admin.assignproject')->with(array('chat_users'=>$chat_users,'data'=>$data));
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
        $this->validate($request,[
            'project'=>'required',
            'group'=>'required'
        ]);
        //

        $gp = new gp;
        $gp->g_id = $request->group;
        $gp->p_id = $request->project;
        if($gp->save()){
            return redirect()->back()->with('success','Project and Group are assigned');
        }
        else{
            return redirect()->back()->with('error','Project and Group not assigned');
  
        }

    }

    public function assignteacher(Request $request)
    {
        $this->validate($request,[
            'group'=>'required',
            'teacher'=>'required'
        ]);
        //

        $data_exist=gt::where('g_id',$request->group)->where('t_id',$request->teacher)->first();

if(empty($data_exist))
   {    
        $gt = new gt;

        $gt->g_id = $request->group;
        $gt->t_id = $request->teacher;
        if($gt->save()){
            return redirect()->back()->with('success','Group and Teacher are assigned');
        }
        else{
            return redirect()->back()->with('error','Group and Teacher not assigned');
  
        }
    }
    else{
        return redirect()->back()->with('error','Group and Teacher already assigned');
  
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
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
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
         $gp=gp::find($id);
         
         $gp->delete();
         return redirect()->back()->with('success','Project and Group are unassigned');
        }
        public function destroy1($id)
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
             $gt=gt::find($id);
             
             $gt->delete();
             return redirect()->back()->with('success','Group and Teacher are unassigned');
            }
        public function indexteacher()
        {
            //
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
             $data =gt::join('group', 'gt.g_id', '=', 'group.id')
                ->join('users', 'gt.t_id', '=', 'users.id')
                ->select('group.group_name', 'users.name', 'gt.id')
                ->get();
             $chat_users=User::whereIn('userRole',[2,3])->orderBy('id','desc')->get();
    
            return view('admin.assignteacher')->with(array('chat_users'=>$chat_users,'data'=>$data));
        }
}
