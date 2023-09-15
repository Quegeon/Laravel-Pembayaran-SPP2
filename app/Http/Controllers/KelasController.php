<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KelasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth()->user()->level !== 'admin') {
            Auth::logout();
            return redirect('/')->with('status',[
                'title' => "Doesn't have access",
                'type' => 'danger'
            ]);

        } else {
            $kelas = Kelas::all();
            return view('Kelas.index', compact(['kelas']));
        }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Kelas.create');
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
            'keterangan' => 'required|min:4|max:11',
            'kompetensi_keahlian' => 'required|min:15|max:40'
        ]);

        try {
            Kelas::create([
                'keterangan' => $request->keterangan,
                'kompetensi_keahlian' => $request->kompetensi_keahlian,
                $request->except(['_token'])
            ]);         
            
            return redirect('/kelas')->with('status',[
                'title' => 'Data Successfully Created',
                'type' => 'success'
            ]);

        } catch (\Throwable $th) {
            return redirect('/kelas')->with('status',[
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
        $kelas = Kelas::find($id);

        if ($kelas === null) {
            return redirect('/kelas')->with('status',[
                'title' => 'Error Invalid Target Data',
                'type' => 'danger'
            ]);       

        } else {
            return view('Kelas.show', compact(['kelas']));
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
        $kelas = Kelas::find($id);

        if ($kelas === null) {
            return redirect('/kelas')->with('status',[
                'title' => 'Error Invalid Target Data',
                'type' => 'danger'
            ]);       

        } else {
            $request->validate([
                'keterangan' => 'required|min:4|max:11',
                'kompetensi_keahlian' => 'required|min:15|max:40'
            ]);

            try {
                $kelas->update([
                    'keterangan' => $request->keterangan,
                    'kompetensi_keahlian' => $request->kompetensi_keahlian
                ]);

                return redirect('/kelas')->with('status',[
                    'title' => 'Data Successfully Updated',
                    'type' => 'success'
                ]);

            } catch (\Throwable $th) {
                return redirect('/kelas')->with('status',[
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
        $kelas = Kelas::find($id);

        if ($kelas === null) {
            return redirect('/kelas')->with('status',[
                'title' => 'Error Invalid Target Data',
                'type' => 'danger'
            ]);       

        } else {
            try {
                $kelas->delete();
                return redirect('/siswa')->with('status',[
                    'title' => 'Data Successfully Deleted',
                    'type' => 'warning'
                ]);

            } catch (\Throwable $th) {
                return redirect('/kelas')->with('status',[
                    'title' => 'Error Destroy Data',
                    'type' => 'danger'
                ]);
            }
        }
    }
}
