<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use App\Models\Kelas;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $siswa = Siswa::all();
        return view('Siswa.index', compact(['siswa']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kelas = Kelas::all();
        if ($kelas === null) {
            return redirect('/siswa')->with('status',[
                'title' => 'Error Invalid Target Data',
                'type' => 'danger'
            ]);

        } else {
            return view('Siswa.create', compact(['kelas']));
        }

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
            'nis' => 'required|min:10|max:11|unique:table',
            'id_kelas' => 'required',
            'nama' => 'required|max:50',
            'no_telp' => 'min:12|max:13',
            'email' => 'email|max:35'
        ]);

        try {
            Siswa::create([
                'nis' => $request->nis,
                'id_kelas' => $request->id_kelas,
                'nama' => $request->nama,
                'no_telp' => $request->no_telp,
                'email' => $request->email,
                $request->except(['_token'])
            ]);

            return redirect('/siswa')->with('status',[
                'title' => 'Data Successfully Added',
                'type' => 'success'
            ]);

        } catch (\Throwable $th) {
            return redirect('/siswa')->with('status',[
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
        $siswa = Siswa::find($id);
        $kelas = Kelas::all();

        if ($siswa === null || $kelas === null) {
            return redirect('/siswa')->with('status',[
                'title' => 'Error Invalid Target Data',
                'type' => 'danger'
            ]);

        } else {
            return view('Siswa.show', compact(['siswa','kelas']));
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
        $siswa = Siswa::find($id);

        if ($siswa === null) {
            return redirect('/siswa')->with('status',[
                'title' => 'Error Invalid Target Data',
                'type' => 'danger'
            ]);
            
        } else {
            $request->validate([
                'nis' => 'required|min:10|max:11|unique:table',
                'id_kelas' => 'required',
                'nama' => 'required|max:50',
                'no_telp' => 'min:12|max:13',
                'email' => 'email|max:35'
            ]);
    
            try {
                $siswa->update([
                    'nis' => $request->nis,
                    'id_kelas' => $request->id_kelas,
                    'nama' => $request->nama,
                    'no_telp' => $request->no_telp,
                    'email' => $request->email,
                    $request->except(['_token'])
                ]);
    
                return redirect('/siswa')->with('status',[
                    'title' => 'Data Successfully Updated',
                    'type' => 'success'
                ]);
    
            } catch (\Throwable $th) {
                return redirect('/siswa')->with('status',[
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
        $siswa = Siswa::find($id);

        if ($siswa === null) {
            return redirect('/siswa')->with('status',[
                'title' => 'Error Invalid Target Data',
                'type' => 'danger'
            ]);

        } else {
            $siswa->delete();
            return redirect('/siswa')->with('status',[
                'title' => 'Data Successfully Deleted',
                'type' => 'warning'
            ]);
        }
    }
}
