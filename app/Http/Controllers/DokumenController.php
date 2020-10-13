<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Dokumen;
use File;

class DokumenController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $dokumens = Dokumen::all()->sortByDesc('created_at');
        return view('dokumen.index', compact(['dokumens']));
    }

    public function create()
    {
        return view('dokumen.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'foto' => 'required',
            'url_pdf' => 'required',
        ]);

        $dirFoto = 'file/foto/';
        $extension = strtolower($request->file('foto')->getClientOriginalExtension()); // get image extension
        $fileNameFoto = str_random() . '.' . $extension; // rename image
        $request->file('foto')->move($dirFoto, $fileNameFoto);

        $dirPdf = 'file/doc/';
        $extension = strtolower($request->file('url_pdf')->getClientOriginalExtension()); // get image extension
        $fileNamePdf = str_random() . '.' . $extension; // rename image
        $request->file('url_pdf')->move($dirPdf, $fileNamePdf);

        $dokumen = new Dokumen;
        $dokumen->judul = $request->judul;
        $dokumen->foto = $dirFoto . $fileNameFoto;
        $dokumen->url_pdf = $dirPdf . $fileNamePdf;
        $dokumen->url_pdf_widget = url('/') . '/' . $dirPdf . $fileNamePdf;
        $dokumen->url_foto_widget = url('/') . '/' . $dirFoto . $fileNameFoto;
        $dokumen->save();


        return redirect()->route('dokumen.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $dokumen = Dokumen::findOrFail($id);

        return view('dokumen.edit', compact(['dokumen']));
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
        ]);


        
        $dokumen = Dokumen::findOrFail($id);
        if ($request->hasFile('foto')) {
            $dirFoto = 'file/foto/';
            if (($dokumen->foto != '') && (File::exists($dokumen->foto))){
                File::delete($dokumen->foto);
            }
            $extension = strtolower($request->file('foto')->getClientOriginalExtension()); // get image extension
            $fileNameFoto = str_random() . '.' . $extension; // rename image
            $request->file('foto')->move($dirFoto, $fileNameFoto);
            $dokumen->foto = $dirFoto . $fileNameFoto;
            $dokumen->url_foto_widget = url('/') . '/' . $dirFoto . $fileNameFoto;
        }

        if ($request->hasFile('url_pdf')) {
            $dirPdf = 'file/doc/';
            if (($dokumen->url_pdf != '') && (File::exists($dokumen->url_pdf))){
                File::delete($dokumen->url_pdf);
            }
            $extension = strtolower($request->file('url_pdf')->getClientOriginalExtension()); // get image extension
            $fileNamePdf = str_random() . '.' . $extension; // rename image
            $request->file('url_pdf')->move($dirPdf, $fileNamePdf);
            $dokumen->url_pdf = $dirPdf . $fileNamePdf;
            $dokumen->url_pdf_widget = url('/') . '/' . $dirPdf . $fileNamePdf;

        }

        $dokumen->judul = $request->judul;
        $dokumen->save();

        return redirect()->route('dokumen.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $dokumen = Dokumen::findOrFail($id);
        File::delete($dokumen->foto);
        File::delete($dokumen->url_pdf);
        $dokumen->delete();

        return redirect()->route('dokumen.index');
    }
}
