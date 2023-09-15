<?php

namespace App\Http\Controllers;

use App\Models\SPP;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SPPController extends Controller
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
            $spp = SPP::all();
            return view('SPP.index', compact(['spp']));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('SPP.create');
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
            'bulan' => 'required|min:2|max:10',
            'tahun' => 'required|min:4|max:4',
            'nominal' => 'required|integer',
            $request->except(['_token'])
        ]);
        
        try {
            SPP::create([
                'bulan' => $request->bulan,
                'tahun' => $request->tahun,
                'nominal' => $request->nominal,
                $request->except(['_token'])
            ]);

            return redirect('/spp')->with('status',[
                'title' => 'Data Successfully Created',
                'type' => 'success'
            ]);

        } catch (\Throwable $th) {
            return redirect('/spp')->with('status',[
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
        $spp = SPP::find($id);

        if ($spp === null) {
            return redirect('/spp')->with('status',[
                'title' => 'Error Invalid Target Data',
                'type' => 'danger'
            ]);
        
        } else {
            return view('SPP.show', compact(['spp']));
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
        $spp = SPP::find($id);

        if ($spp === null) {
            return redirect('/spp')->with('status',[
                'title' => 'Error Invalid Target Data',
                'type' => 'danger'
            ]);

        } else {
            $request->validate([
                'bulan' => 'required|min:2|max:10',
                'tahun' => 'required|min:4|max:4',
                'nominal' => 'required|integer',
                $request->except(['_token'])
            ]);
    
            try {
                $spp->update([
                    'bulan' => $request->bulan,
                    'tahun' => $request->tahun,
                    'nominal' => $request->nominal,
                    $request->except(['_token'])
                ]);

                return redirect('/spp')->with('status',[
                    'title' => 'Data Successfully Updated',
                    'type' => 'success'
                ]);
    
            } catch (\Throwable $th) {
                return redirect('/spp')->with('status',[
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
        $spp = SPP::find($id);

        if ($spp === null) {
            return redirect('/spp')->with('status',[
                'title' => 'Error Invalid Target Data',
                'type' => 'danger'
            ]);

        } else {
            $spp->delete();
            return redirect('/spp')->with('status',[
                'title' => 'Data Successfully Deleted',
                'type' => 'warning'
            ]);
        }
    }
}
