<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\Kategori;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;



class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kategori = Kategori::latest()->get();
        return view('kategori.index', compact('kategori'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('create.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request);
        Validator::make($request->all(), [
            'name' => 'required',
            'description' => 'required',
            'photo' => 'mimes:png,jpeg,jpg|max:2048'
        ])->validate();

        $filePath = public_path('uploads');
        $insert = new Kategori();
        $insert->name = $request->name;
        $insert->description = $request->description;

        if ($request->hasfile('photo')) {
            $file = $request->file('photo');
            $file_name = time() . $file->getClientOriginalName();

            $file->move($filePath, $file_name);
            $insert->photo = $file_name;
        }

        $result = $insert->save();
        Session::flash('success', 'User registered succesfully');
        return redirect()->route('kategori/index');
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
        // $title = "Update Kategori";
        // $kategori = Kategori::latest($id);
        // return view('kategori.edit', compact('kategori', 'id'));
        return view('kategori.edit',[
            'kategori' => $id,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $kategori = Kategori::findOrFail($id);
        $kategori->update($request->all());
        // return redirect('admin/kategori')->with('success','kategori updated successfully');
        return redirect()->route('kategori/index');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // $kategori->delete();
        // return redirect()->route('kategori/index');
        // kategori::where('kategori', $id)->delete();
        // return redirect()->to('admin/kategori/index');
        $kategori = kategori::findOrFail($id);
        $kategori->delete();
        return redirect()->route('kategori/index');
        

    }
}
