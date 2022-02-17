<?php

use App\Enum\GlobalVariable;
use App\Models\Jenis;
use App\Models\Trtransactions;

if (!function_exists('GetJenisForSelect')) {

    /**
     * Get Jenis Data For Select
     *
     * @param
     * @return
     */
    function GetJenisForSelect()
    {
        $data = array_flip(GlobalVariable::KATEGORI);
        $data[null] = 'Pilih Jenis';
        return $data;
    }
}

if (!function_exists('GetKategoriForSelect')) {

    /**
     * Get Kategori Data For Select
     *
     * @param
     * @return
     */
    function GetKategoriForSelect($jenis)
    {
        $data = Jenis::whereKategori($jenis)->pluck('nama_jenis', 'id')->toArray();
        $data[null] = 'Pilih Jenis';
        return $data;
    }
}

if (!function_exists('FlagTransactions')) {

    /**
     * Get Jenis Data For Select
     *
     * @param
     * @return
     */
    function FlagTransactions($params)
    {
        return Form::hidden('flag', $params, [null]);
    }
}

if (!function_exists('CountAmount')) {

    /**
     * Get Jenis Data For Select
     *
     * @param
     * @return
     */
    function CountAmount($from = null, $to = null)
    {
        $data['pemasukan'] = Trtransactions::whereFlag(GlobalVariable::KATEGORI['PEMASUKAN'])->whereBetween('created_at', [$from, $to]);
        $data['pengeluaran'] = Trtransactions::whereFlag(GlobalVariable::KATEGORI['PENGELUARAN'])->whereBetween('created_at', [$from, $to]);
        $data['transaksi'] = Trtransactions::whereBetween('created_at', [$from, $to]);
        return $data;
    }
}

if (!function_exists('CountPemasukan')) {

    /**
     * Get Jenis Data For Select
     *
     * @param
     * @return
     */
    function CountPemasukan($from = null, $to = null)
    {
        $pemasukan = Trtransactions::whereFlag(GlobalVariable::KATEGORI['PEMASUKAN']);
        return (($from || $to) != null) ? $pemasukan->whereBetween('created_at', [$from, $to]) : $pemasukan->sum('amount');
    }
}

if (!function_exists('CountPengeluaran')) {

    /**
     * Get Jenis Data For Select
     *
     * @param
     * @return
     */
    function CountPengeluaran($from = null, $to = null)
    {
        $pengeluaran = Trtransactions::whereFlag(GlobalVariable::KATEGORI['PENGELUARAN']);
        return (($from || $to) != null) ? $pengeluaran->whereBetween('created_at', [$from, $to]) : $pengeluaran->sum('amount');
    }
}

if (!function_exists('GetTable')) {

    /**
     * Get Jenis Data For Select
     *
     * @param
     * @return
     */
    function GetTable($row, $item)
    {
        switch ($row) {
            case 'tanggal':
                return date('d F Y', strtotime($item->created_at));
                break;

            case 'keterangan':
                if ($item->flag == GlobalVariable::KATEGORI['PEMASUKAN'])
                    return $item->Pemasukan->deskripsi_pemasukan;
                else return $item->Pengeluaran->deskripsi_pengeluaran;
                break;

            case 'debit':
                return $item->flag == GlobalVariable::KATEGORI['PEMASUKAN'] ? 'Rp. '.number_format($item->amount, 2, ',', '.') : '-';
                break;

            case 'kredit':
                return $item->flag == GlobalVariable::KATEGORI['PENGELUARAN'] ? 'Rp. '.number_format($item->amount, 2, ',', '.') : '-';
                break;
            
            default:
                
                break;
        }

        
    }
}


