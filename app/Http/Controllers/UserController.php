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
        $data = User::all();
        return view('User.index', compact(['data']));
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
                'title' => 'Data Successfully Added',
                'type' => 'success'
            ]);

        } catch (Exception $e){
            return redirect('/user')->with('status',[
                'title' => 'Error Store Input Data',
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

        try {
            $user = User::find($id);

            return view('User.show', compact(['user']));

        } catch (Exception $e) {
            return redirect('/user')->with('status',[
                'title' => "Error Can't Find Target Data",
                'type' => 'danger'
            ]);
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
        $request->validate([
            'nama' => 'required|max:50',
            'username' => 'required|max:20|min:8',
            'level' => 'required|max:8'
        ]);
        
        try {
            $user = User::find($id);
            $user->update([
                'nama' => $request->nama,
                'username' => $request->username,
                'level' => $request->level,
                $request->except(['_token'])
            ]);

            return redirect('/user')->with('status',[
                'title' => 'Data Successfully Added',
                'type' => 'success'
            ]);

        } catch (\Throwable $th) {
            return redirect('/user')->with('status',[
                'title' => 'Error Update Data',
                'type' => 'danger'
            ]);
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
        try {
            $user = User::find($id);
            $user->delete();

            return redirect('/user')->with('status',[
                'title' => 'Data Successfully Deleted!',
                'type' => 'warning'
            ]);

        } catch (\Throwable $th) {
            return redirect('/user')->with('status',[
                'title' => 'Error Destroy Data',
                'type' => 'danger'
            ]);
        }
    }

    public function pwd ($id) {
        try {
            $user = User::find($id);

            return view('User.show-pwd', compact(['user']));

        } catch (Exception $e) {
            return redirect('/user')->with('status',[
                'title' => "Error Can't Find Target Data",
                'type' => 'danger'
            ]);
        }
    }

    public function chpwd (Request $request, $id) {
        $request->validate([
            'npwd' => 'required|max:20|min:8',
            'cpwd' => 'required|max:20|min:8'
        ]);

        $npwd = $request->npwd;
        $cpwd = $request->cpwd;

        if ($npwd === $cpwd) {
            $user = User::find($id);
            $user->update([
                'password' => bcrypt($cpwd)
            ]);

            return redirect('/user')->with('status',[
                'title' => 'Password Successfully Changed!',
                'type' => 'success'
            ]);

        } else {
            return back()->with('status',[
                'title' => "Input Doesn't Match!",
                'type' => 'danger'
            ]);
        }
    }
}
