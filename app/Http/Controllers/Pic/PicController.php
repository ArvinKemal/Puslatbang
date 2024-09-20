<?php

namespace App\Http\Controllers\Pic;

use App\Http\Controllers\Controller;
use App\Models\Pic;
use Illuminate\Http\Request;

class PicController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_pic' => 'required|string|max:255', 
            'email_pic' => 'required|email|max:255',
            'no_telepon' => 'required|digits_between:10,15'
        ],[
            'nama_pic.required' => 'Nama wajib diisi',
            'nama_pic.string' => 'Nama harus berupa teks',
            'nama_pic.max' => 'Nama tidak boleh lebih dari 255 karakter',

            'email_pic.required' => 'Email wajib diisi',
            'email_pic.email' => 'Email harus dalam format yang benar',
            'email_pic.max' => 'Email tidak boleh lebih dari 255 karakter',

            'no_telepon.required' => 'Nomor telepon wajib diisi',
            'no_telepon.digits_between' => 'Nomor telepon harus terdiri dari 10 hingga 15 digit angka'
        ]);

         // Simpan data ke database
        $pic = new Pic();
        $pic->nama_pic = $request->nama_pic;
        $pic->email_pic = $request->email_pic;
        $pic->no_telepon = $request->no_telepon;
        $pic->save();

        return redirect()->route('pic')->with('success', 'data berhasil disimpan!');
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
