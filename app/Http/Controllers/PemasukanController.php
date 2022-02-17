<?php

namespace App\Http\Controllers;

use App\Models\Pemasukan;
use App\Enum\GlobalVariable;
use Illuminate\Http\Request;
use App\Models\Trtransactions;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\StorePemasukanRequest;
use App\Http\Requests\UpdatePemasukanRequest;

class PemasukanController extends Controller
{
    public function __construct() {
        $this->model = new Pemasukan();
        $this->trxModel = new Trtransactions();
        $this->module = 'pemasukan';
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = $this->trxModel::whereFlag(GlobalVariable::KATEGORI['PEMASUKAN'])->get();
        return view('pages.pemasukan.index', [
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
     * @param  \App\Http\Requests\StorePemasukanRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePemasukanRequest $request)
    {
        $this->trxModel::create($request->except('_token'));
        return $this->successStore($this->module);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pemasukan  $pemasukan
     * @return \Illuminate\Http\Response
     */
    public function show(Pemasukan $pemasukan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pemasukan  $pemasukan
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('pages.pemasukan.edit', [
            'model' => $this->trxModel,
            'transaction' => $this->model->whereTransactionId($id)->first(),
            'data' => $this->trxModel::whereFlag(GlobalVariable::KATEGORI['PEMASUKAN'])->get()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePemasukanRequest  $request
     * @param  \App\Models\Pemasukan  $pemasukan
     * @return \Illuminate\Http\Response
     */
    public function update(StorePemasukanRequest $request, Pemasukan $pemasukan)
    {
        try {
            DB::beginTransaction();
            $pemasukan->Transaction()->update([
                'jenis_id' => $request->jenis_id,
                'amount' => $request->amount
            ]);
            $pemasukan->deskripsi_pemasukan = $request->deskripsi_pemasukan;
            $pemasukan->save();
            DB::commit();   
            return $this->successUpdate($this->module.'.index', $this->module);
        } catch (\Throwable $th) {
            DB::rollback();
            \Log::info($th->getMessage());
            return $this->failUpdate('Gagal Update');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pemasukan  $pemasukan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Trtransactions $transaction)
    {
        $transaction = $transaction::find(request()->id);
        $transaction->delete();
        return $this->successDelete($this->module.'.index', $this->module);
    }
}
