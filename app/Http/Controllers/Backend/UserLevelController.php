<?php

namespace App\Http\Controllers\Backend;

use App\Photo;
use App\Role;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class UserLevelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users=User::with(['roles','photo'])->orderBy('created_at','desc')->get();
     // return $users;

        return view('admin.user_level.index',compact(['users']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.user_level.create');
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
        $user=User::with('roles','photo')->whereId($id)->first();
   // return $user;
        $roles=Role::all();
        return view('admin.user_level.edit',compact(['user','roles']));
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
     //return $request->all();
        $user=User::findorfail($id);
        $user->email=$request['email'];
        $user->photo_id=$request['photo_id'];

        $user->save();

        $user->roles()->sync($request->input('role'));

        Session::flash('updated','کاربر با موفقیت ویرایش گردید.');
        return redirect('/administrator/user_level');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $us=User::findorfail($id);
        $us->delete();

        Session::flash('delete_user','کاربر با موفقیت حذف گردید.');
        return redirect('/administrator/user_level');
    }
}
