<?php

namespace App\Http\Controllers;

use App\Models\Pelajaran;
use Illuminate\Http\Request;
use App\Models\Kategori;

class DashboardPelajaransController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('dashboard.pelajaran.index', [
            'pelajarans' => Pelajaran::get()
        ]); 

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.pelajaran.create', [
            'kategoris'=>Kategori::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama' => 'required|max:255',
            'id_kategori' => 'required'
        ]);

        Pelajaran::create($validatedData);

        return redirect('/dashboard/pelajarans')->with('success', 'Pelajaran berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pelajaran  $pelajaran
     * @return \Illuminate\Http\Response
     */
    public function show(Pelajaran $pelajaran)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pelajaran  $pelajaran
     * @return \Illuminate\Http\Response
     */
    public function edit(Pelajaran $pelajaran)
    {
        return view('dashboard.pelajaran.edit', [
            'kategoris'=>Kategori::all(),
            'pelajaran' => $pelajaran
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pelajaran  $pelajaran
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pelajaran $pelajaran)
    {
        $validatedData = $request->validate([
            'nama' => 'required|max:255',
            'id_kategori' => 'required'
        ]);

        Pelajaran::where('id_kategori', $pelajaran->id_kategori)->update($validatedData);

        return redirect('/dashboard/pelajarans')->with('success', 'Pelajaran berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pelajaran  $pelajaran
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pelajaran $pelajaran)
    {
        Pelajaran::destroy($pelajaran -> id);
        return redirect('dashboard/pelajarans')->with('success', 'Pelajaran terhapus!');
    }
}
