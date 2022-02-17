<?php

namespace App\Observers;

use App\Enum\GlobalVariable;
use App\Models\Pemasukan;
use App\Models\Pengeluaran;
use App\Models\Trtransactions;

class TransactionObserver
{
    /**
     * Handle the Trtransactions "created" event.
     *
     * @param  \App\Models\Trtransactions  $trtransactions
     * @return void
     */
    public function created(Trtransactions $trtransactions)
    {
        if(request()->flag == GlobalVariable::KATEGORI['PENGELUARAN']) {
            Pengeluaran::create([
                'transaction_id' => $trtransactions->id,
                'deskripsi_pengeluaran' => request()->deskripsi_pengeluaran
            ]);
        }else{
            Pemasukan::create([
                'transaction_id' => $trtransactions->id,
                'deskripsi_pemasukan' => request()->deskripsi_pemasukan
            ]);
        }
    }

    /**
     * Handle the Trtransactions "updated" event.
     *
     * @param  \App\Models\Trtransactions  $trtransactions
     * @return void
     */
    public function updated(Trtransactions $trtransactions)
    {
        //
    }

    /**
     * Handle the Trtransactions "deleted" event.
     *
     * @param  \App\Models\Trtransactions  $trtransactions
     * @return void
     */
    public function deleted(Trtransactions $trtransactions)
    {
        //
    }

    /**
     * Handle the Trtransactions "restored" event.
     *
     * @param  \App\Models\Trtransactions  $trtransactions
     * @return void
     */
    public function restored(Trtransactions $trtransactions)
    {
        //
    }

    /**
     * Handle the Trtransactions "force deleted" event.
     *
     * @param  \App\Models\Trtransactions  $trtransactions
     * @return void
     */
    public function forceDeleted(Trtransactions $trtransactions)
    {
        //
    }
}
