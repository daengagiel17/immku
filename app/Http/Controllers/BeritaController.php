<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Berita;

class BeritaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $beritas = Berita::all()->sortByDesc('created_at');
        return view('berita.index', compact(['beritas']));
    }

    public function show($id)
    {
        $berita = Berita::findOrFail($id);

        return view('berita.show', compact(['berita']));
    }

    public function create()
    {
        return view('berita.create');
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
            'judul' => 'required',
            'detail' => 'required',
            'star_name' => 'required',
            'url' => 'required',
            'sumber' => 'required',
            'foto' => 'required',
        ]);

        $berita = Berita::create([
            'judul' => $request->judul,
            'detail' => $request->detail,
            'star_name' => $request->star_name,
            'url' => $request->url,
            'sumber' => $request->sumber,
            'foto' => $request->foto,
        ]);

        return redirect()->route('berita.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $berita = Berita::findOrFail($id);

        return view('berita.edit', compact(['berita']));
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
        $request->validate([
            'judul' => 'required',
            'detail' => 'required',
            'star_name' => 'required',
            'url' => 'required',
            'sumber' => 'required',
            'foto' => 'required',
        ]);

        $berita = Berita::findOrFail($id);
        $berita->judul = $request->judul;
        $berita->detail = $request->detail;
        $berita->star_name = $request->star_name;
        $berita->url = $request->url;
        $berita->sumber = $request->sumber;
        $berita->foto = $request->foto;
        $berita->save();

        return redirect()->route('berita.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $berita = Berita::findOrFail($id);
        $berita->delete();

        return redirect()->route('berita.index');
    }
}
