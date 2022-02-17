<?php

namespace App\Http\Controllers;

use App\Http\Requests\JenisRequest;
use App\Models\Jenis;
use Illuminate\Http\Request;

class JenisController extends Controller
{
    public function __construct() {
        $this->model = new Jenis();
        $this->module = 'jenis';
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.jenis.index', [
            'data' => Jenis::get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(JenisRequest $request)
    {
        $data = $this->model::create($request->except('_token'));
        return $this->successStore('Jenis');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Jenis  $jenis
     * @return \Illuminate\Http\Response
     */
    public function show(Jenis $jenis)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Jenis  $jenis
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $jenis = $this->model::find($id);
        return view('pages.jenis.edit', [
            'data' => Jenis::get(),
            'model' => $this->model,
            'jenis' => $jenis
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Jenis  $jenis
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Jenis $jenis)
    {
        $jenis = $jenis::find($request->segment(2));
        $jenis->nama_jenis = $request->nama_jenis;
        $jenis->kategori = $request->kategori;
        $jenis->save();
        return $this->successUpdate($this->module.'.index', $this->module);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Jenis  $jenis
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $jenis = $this->model::find($id);
        $jenis->delete();
        return $this->successDelete($this->module.'.index', $this->module);
    }
}
