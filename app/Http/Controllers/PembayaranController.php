<?php

namespace App\Http\Controllers;

use App\Models\Pembayaran;
use App\Models\Siswa;
use App\Models\SPP;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PembayaranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pembayaran = Pembayaran::all();
        return view('Pembayaran.index', compact(['pembayaran']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $siswa = Siswa::all();
        $spp = SPP::all();
        $user = User::all();

        if ($siswa->first() === null||$spp->first() === null||$user->first() === null) {
            return redirect('/pembayaran')->with('status',[
                'title' => 'Error Query Data',
                'type' => 'danger'
            ]);

        } else {
            return view('Pembayaran.create', compact(['siswa','spp','user']));
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
            'nis' => 'required',
            'id_spp' => 'required',
            'id_petugas' => 'required',
            'jumlah_bayar' => 'required|integer|max:250000|min:1000',
            'keterangan' => 'max:100',
        ]);

        try {
            Pembayaran::create([
                'nis' => $request->nis,
                'id_spp' => $request->id_spp,
                'id_petugas' => $request->id_petugas,
                'jumlah_bayar' => $request->jumlah_bayar,
                'tanggal_bayar' => Carbon::today(),
                'keterangan' => $request->keterangan,
                $request->except(['_token'])
            ]);

            return redirect('/pembayaran')->with('status',[
                'title' => 'Data Successfully Created',
                'type' => 'success'
            ]);

        } catch (\Throwable $th) {
            return redirect('/pembayaran')->with('status',[
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
        $pembayaran = Pembayaran::find($id);
        $siswa = Siswa::all();
        $spp = SPP::all();
        $user = User::all();

        if ($pembayaran === null) {
            return redirect('/pembayaran')->with('status',[
                'title' => 'Error Invalid Target Data',
                'type' => 'danger'
            ]);

        } else if ($siswa === null||$spp === null||$user === null) {
            return redirect('/pembayaran')->with('status',[
                'title' => 'Error Query Data',
                'type' => 'danger'
            ]);

        } else {
            return view('Pembayaran.show', compact(['pembayaran','siswa','spp','user']));
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
        $pembayaran = Pembayaran::find($id);

        if ($pembayaran === null) {
            return redirect('/pembayaran')->with('status',[
                'title' => 'Error Invalid Target Data',
                'type' => 'danger'
            ]);

        } else {
            $request->validate([
                'nis' => 'required',
                'id_spp' => 'required',
                'id_petugas' => 'required',
                'jumlah_bayar' => 'required|integer|max:250000|min:1000',
                'tanggal_bayar' => 'required|date',
                'keterangan' => 'max:100',
            ]);

            try {
                $pembayaran->update([
                    'nis' => $request->nis,
                    'id_spp' => $request->id_spp,
                    'id_petugas' => $request->id_petugas,
                    'jumlah_bayar' => $request->jumlah_bayar,
                    'tanggal_bayar' => $request->tanggal_bayar,
                    'keterangan' => $request->keterangan,
                    $request->except(['_token'])
                ]);

                return redirect('/pembayaran')->with('status',[
                    'title' => 'Data Successfully Updated',
                    'type' => 'success'
                ]);

            } catch (\Throwable $th) {
                return redirect('/pembayaran')->with('status',[
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
        $pembayaran = Pembayaran::find($id);

        if ($pembayaran === null) {
            return redirect('/pembayaran')->with('status',[
                'title' => 'Error Invalid Target Data',
                'type' => 'danger'
            ]);

        } else {
            try {
                $pembayaran->delete();
                return redirect('/pembayaran')->with('status',[
                    'title' => 'Data Successfully Deleted',
                    'type' => 'warning'
                ]);
            } catch (\Throwable $th) {
                return redirect('/pembayaran')->with('status',[
                    'title' => 'Error Destroy Data',
                    'type' => 'danger'
                ]);
            }
        }
    }

    public function print () {
        $year = Carbon::today();
        $pembayaran = Pembayaran::all();
        return view('Pembayaran.print', compact(['pembayaran']));
    }

    public function receipt ($id) {
        $pembayaran = Pembayaran::find($id);
        return view('Pembayaran.receipt', compact(['pembayaran']));
    }
}
