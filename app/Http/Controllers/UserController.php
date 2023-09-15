<?php

namespace App\Http\Controllers;

use App\Models\User;
use Exception;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::all();
        return view('User.index', compact(['user']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('User.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|max:50',
            'username' => 'required|max:20|min:8',
            'password' => 'required|max:20|min:8'
        ]);

        try {
            User::create([
                'nama' => $request->nama,
                'username' => $request->username,
                'password' => bcrypt($request->password),
                $request->except(['_token'])
            ]);

            return redirect('/user')->with('status',[
                'title' => 'Data Successfully Created',
                'type' => 'success'
            ]);

        } catch (Exception $e){
            return redirect('/user')->with('status',[
                'title' => 'Error Store Data',
                'type' => 'danger'
            ]);
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
        $user = User::find($id);

        if ($user === null) {
            return redirect('/user')->with('status',[
                'title' => "Error Invalid Target Data",
                'type' => 'danger'
            ]);

        } else {
            return view('User.show', compact(['user']));
        }
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
        $user = User::find($id);

        if ($user === null) {
            return redirect('/user')->with('status',[
                'title' => "Error Invalid Target Data",
                'type' => 'danger'
            ]);

        } else {
            $request->validate([
                'nama' => 'required|max:50',
                'username' => 'required|max:20|min:8',
                'level' => 'required|max:8'
            ]);
            
            try {
                $user->update([
                    'nama' => $request->nama,
                    'username' => $request->username,
                    'level' => $request->level,
                    $request->except(['_token'])
                ]);
    
                return redirect('/user')->with('status',[
                    'title' => 'Data Successfully Updated',
                    'type' => 'success'
                ]);
    
            } catch (\Throwable $th) {
                return redirect('/user')->with('status',[
                    'title' => 'Error Update Data',
                    'type' => 'danger'
                ]);
            }
        }

        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);

        if ($user === null) {
            return redirect('/user')->with('status',[
                'title' => "Error Invalid Target Data",
                'type' => 'danger'
            ]);

        } else {
            $user->delete();
            return redirect('/user')->with('status',[
                'title' => 'Data Successfully Deleted!',
                'type' => 'warning'
            ]);
        }
    }

    public function show_password ($id) {
        $user = User::find($id);

        if ($user === null) {
            return redirect('/user')->with('status',[
                'title' => "Error Invalid Target Data",
                'type' => 'danger'
            ]);

        } else {
            return view('User.show-password', compact(['user']));
        }
    }

    public function change_password (Request $request, $id) {
        $user = User::find($id);

        if ($user === null) {
            return redirect('/user')->with('status',[
                'title' => "Error Invalid Target Data",
                'type' => 'danger'
            ]);

        } else {
            $request->validate([
                'new_password' => 'required|max:20|min:8',
                'confirm_password' => 'required|max:20|min:8'
            ]);

            $new = $request->new_password;
            $confirm = $request->confirm_password;

            if ($new === $confirm) {
                try {
                    $user->update([
                        'password' => bcrypt($confirm)
                    ]);
    
                    return redirect('/user')->with('status',[
                        'title' => 'Password Successfully Changed!',
                        'type' => 'success'
                    ]);
                } catch (\Throwable $th) {
                    return redirect('/user')->with('status',[
                        'title' => 'Error Change Password',
                        'type' => 'danger'
                    ]);
                }

            } else {
                return back()->with('status',[
                    'title' => "Password Doesn't Match!",
                    'type' => 'danger'
                ]);
            }
        }
    }
}
