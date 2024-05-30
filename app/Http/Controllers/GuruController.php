<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use Illuminate\Http\Request;
use Storage;
use Validator;

class GuruController extends Controller
{

    public function index()
    {
        //index
        $guru = Guru::latest()->get();
        return view('guru.index', compact('guru'));
    }


    public function create()
    {
        //create
        return view ('guru.create');
    }

    public function store(Request $request)
    {
        //validate form
        $this->validate($request, [
            'nip' => 'required|min:5',
            'nama_guru' => 'required|min:5',
            'jk' => 'required',
            'agama' => 'required',
            'tgl' => 'required',
            'tmpt' => 'required',
            'image' => 'required|image|mimes:jpeg,jpg,png|max:2048',
        ]);

        $guru = new Guru();
        $guru->nip = $request->nip;
        $guru->nama_guru = $request->nama_guru;
        $guru->jk = $request->jk;
        $guru->agama = $request->agama;
        $guru->tgl = $request->tgl;
        $guru->tmpt = $request->tmpt;
        // image
        $image = $request->file('image');
        $image->storeAs('public/gurus', $image->hashName());
        $guru->image = $image->hashName();
        $guru->save();
        return redirect()->route('guru.index');
    }

    public function show($id)
    {
        //show
        $guru = Guru::findOrFail($id);
        return view('guru.show', compact('guru'));
    }

    public function edit($id)
    {
        //edit
        $guru = guru::findOrFail($id);
        return view('guru.edit', compact('guru'));
    }

    public function update(Request $request, $id)
{
    // Validate form
    $request->validate([
        'nip' => 'required',
        'nama_guru' => 'required',
        'jk' => 'required',
        'agama' => 'required',
        'tgl' => 'required|date',
        'tmpt' => 'required',
        'image' => 'image|file|max:1024'
    ]);

    $guru=Guru::findOrFail($id);
        $guru->nip = $request->nip;
        $guru->nama_guru = $request->nama_guru;
        $guru->jk = $request->jk;
        $guru->agama = $request->agama;
        $guru->tmpt = $request->tmpt;
        $guru->tgl = $request->tgl;

        //upload guru
            $image=$request->file('image');
            $image->storeAs('public/gurus', $image->hashName());

        // delete guru
        Storage::delete('public/gurus/'. $guru->image);

        $guru->image=$image->hashName();
        $guru->save();
        return redirect()->route('guru.index');
    }



    public function destroy($id)
    {
        //delete
        $guru = Guru::findOrFail($id);
        Storage::delete('public/gurus/' . $guru->image);
        $guru->delete();
        return redirect()->route('guru.index');

    }
}
