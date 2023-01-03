<?php

namespace App\Http\Controllers;

use App\Models\Materi;
use Illuminate\Http\Request;
use App\Models\Pelajaran;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Response;

class DashboardMaterisController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         return view('dashboard.materi.index', [
            'materis' => Materi::get()
         ]);

        // $materis = Materi::get();
        
        // if($request->has('search')){
        //     $materi = Materi::where($materis->pelajaran->{'nama pelajaran'} , 'like', '%' .$request->search. '%' )->paginate(5);
        // }else{
        //     $materi = Materi::paginate(5);
        // }

        // return view('dashboard.materi.index', compact('materi'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.materi.create', [
            'pelajarans'=>Pelajaran::get()
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
            'id_pelajaran' => 'required',
            'file' => 'required|mimes:csv,txt,xlx,xls,pdf|max:20480'
        ]);
 
 
        $save = new Materi;
        
        $save->nama = request('nama');
        $save->id_pelajaran = request('id_pelajaran');
        $fileName = time().'_'.$request->file->getClientOriginalName();
        $filePath = $request->file('file')->storeAs('uploads', $fileName);
        // $save->file_path = '/storage/' . $filePath;
        $save->file_path =  $filePath;
        $save->save();



        return redirect('/dashboard/materis')->with('success', 'materi baru berhasil ditambahkan!');
        // return $request->file('file');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Materi  $materi
     * @return \Illuminate\Http\Response
     */
    public function show(Materi $materi)
    {
        // return view('dashboard.materi.show', [
        //     'materi' => $materi,
        //     'url' => storage_path('app\\'. $materi->file_path)
        // ]);
        
        // return response()->file('storage/' . $materi->file_path);
        // return response()->download(storage_path($materi->file_path));
        return response()->file(storage_path('app\\'. $materi->file_path));
            
            
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Materi  $materi
     * @return \Illuminate\Http\Response
     */
    public function edit(Materi $materi)
    {
        return view('dashboard.materi.edit', [
            'pelajarans'=>Pelajaran::all(),
            'materi' => $materi
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Materi  $materi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Materi $materi)
    {
        $validatedData = $request->validate([
            'nama' => 'required|max:255',
            'id_pelajaran' => 'required',
            'file' => 'required|mimes:csv,txt,xlx,xls,pdf|max:20480'
        ]);

        $path = $request->file->store('/public/files');
 
 
        $save = Materi::find($materi->id);
        
        $save->nama = request('nama');
        $save->id_pelajaran = request('id_pelajaran');
        $fileName = time().'_'.$request->file->getClientOriginalName();
        // $filePath = $request->file('file')->storeAs('uploads', $fileName, 'public');
        $filePath = $request->file('file')->storeAs('uploads', $fileName);
        $save->file_path = $filePath;
        $save->save();
        



        return redirect('/dashboard/materis')->with('success', 'materi berhasil diedit!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Materi  $materi
     * @return \Illuminate\Http\Response
     */
    public function destroy(Materi $materi)
    {
        Materi::destroy($materi -> id);
        return redirect('dashboard/materis')->with('success', 'Materi terhapus!');
    }
}
