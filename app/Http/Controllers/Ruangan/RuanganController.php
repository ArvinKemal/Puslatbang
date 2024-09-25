<?php

namespace App\Http\Controllers\Ruangan;

use App\Http\Controllers\Controller;
use App\Models\Pic;
use App\Models\Ruangan;
use Illuminate\Http\Request;

class RuanganController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ruangans = Ruangan::orderBy('lantai', 'asc')->get();
        $pics = Pic::all();

        return view('ruangan.ruangan', compact('ruangans', 'pics'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $pics = Pic::all(); 
        return view('ruangan.ruangan-add', compact('pics')); 
    }
    
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_ruangan' => 'required|string|max:255', 
            'lantai' => 'required|integer',
            'kapasitas_ruangan' => 'required',
            'pic' => 'required'
        ],[
            'nama_ruangan.required' => 'Nama wajib diisi',
            'nama_ruangan.string' => 'Nama harus berupa teks',
            'nama_ruangan.max' => 'Nama tidak boleh lebih dari 255 karakter',

            'lantai.required' => 'lantai wajib diisi',
            'lantai.integer' => 'lantai harus berupa angka',

            'kapasitas_ruangan.required' => 'kapasitas ruangan wajib diisi',
            
            'pic.required' => 'pic wajib diisi',
        ]);

         // Simpan data ke database

        $ruangan = new Ruangan();
        $ruangan->pic = $request->pic;
        $ruangan->lantai = $request->lantai;
        $ruangan->nama_ruangan = $request->nama_ruangan;
        $ruangan->kapasitas_ruangan = $request->kapasitas_ruangan;

        $ruangan->save();

        return redirect()->route('ruangan.index')->with('success', 'data berhasil disimpan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $ruangan = Ruangan::findOrFail($id);
        $pics = Pic::all(); 
        return view('ruangan.ruangan-edit', compact('ruangan', 'pics')); // Mengirim data ruangan ke view 'ruangan.edit'
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nama_ruangan' => 'required|string|max:255', 
            'lantai' => 'required|integer',
            'kapasitas_ruangan' => 'required',
            'pic' => 'required'
        ],[
            'nama_ruangan.required' => 'Nama wajib diisi',
            'nama_ruangan.string' => 'Nama harus berupa teks',
            'nama_ruangan.max' => 'Nama tidak boleh lebih dari 255 karakter',

            'lantai.required' => 'lantai wajib diisi',
            'lantai.integer' => 'lantai harus berupa angka',

            'kapasitas_ruangan.required' => 'kapasitas ruangan wajib diisi',

            'pic.required' => 'pic wajib diisi',
        ]);

         // Simpan data ke database

        $ruangan = Ruangan::findOrFail($id);
        $ruangan->pic = $request->pic;
        $ruangan->lantai = $request->lantai;
        $ruangan->nama_ruangan = $request->nama_ruangan;
        $ruangan->kapasitas_ruangan = $request->kapasitas_ruangan;

        $ruangan->save();

        return redirect()->route('ruangan.index')->with('success', 'data berhasil disimpan!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $ruangan = Ruangan::findOrFail($id);
        $ruangan->delete();

        return redirect()->route('ruangan.index')->with('success', 'Data Ruangan berhasil dihapus!');
    }
}
