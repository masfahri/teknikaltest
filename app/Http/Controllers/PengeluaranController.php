<?php

namespace App\Http\Controllers;

use App\Enum\GlobalVariable;
use App\Models\Pengeluaran;
use App\Models\Trtransactions;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\StorePengeluaranRequest;
use App\Http\Requests\UpdatePengeluaranRequest;

class PengeluaranController extends Controller
{
    public function __construct() {
        $this->model = new Pengeluaran();
        $this->trxModel = new Trtransactions();
        $this->module = 'pengeluaran';
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = $this->trxModel::whereFlag(GlobalVariable::KATEGORI['PENGELUARAN'])->get();
        return view('pages.pengeluaran.index', [
            'data' => $data
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
     * @param  \App\Http\Requests\StorePengeluaranRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePengeluaranRequest $request)
    {
        $this->trxModel::create($request->except('_token'));
        return $this->successStore($this->module);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pengeluaran  $pengeluaran
     * @return \Illuminate\Http\Response
     */
    public function show(Pengeluaran $pengeluaran)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pengeluaran  $pengeluaran
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('pages.pengeluaran.edit', [
            'model' => $this->trxModel,
            'transaction' => $this->model->whereTransactionId($id)->first(),
            'data' => $this->trxModel::whereFlag(GlobalVariable::KATEGORI['PENGELUARAN'])->get()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePengeluaranRequest  $request
     * @param  \App\Models\Pengeluaran  $pengeluaran
     * @return \Illuminate\Http\Response
     */
    public function update(StorePengeluaranRequest $request, Pengeluaran $pengeluaran)
    {
        try {
            DB::beginTransaction();
            $pengeluaran->Transaction()->update([
                'jenis_id' => $request->jenis_id,
                'amount' => $request->amount
            ]);
            $pengeluaran->deskripsi_pengeluaran = $request->deskripsi_pengeluaran;
            $pengeluaran->save();
            DB::commit();   
            return $this->successUpdate($this->module.'.index', $this->module);
        } catch (\Throwable $th) {
            DB::rollback();
            return $this->failUpdate('Gagal Update');
        }
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pengeluaran  $pengeluaran
     * @return \Illuminate\Http\Response
     */
    public function destroy(Trtransactions $transaction)
    {
        $transaction = $transaction::find(request()->id);
        $transaction->delete();
        return $this->successDelete($this->module.'.index', $this->module);
    }
}
