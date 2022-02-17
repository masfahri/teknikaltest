<?php

namespace App\Http\Controllers;

use App\Helpers\API;
use App\Models\Trtransactions;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $data = Trtransactions::get();
        return view('home', [
            'pageTitle' => 'Keseluruhan',
            'data' => $data
        ]);
    }

    public function cari(Request $request)
    {
        return redirect('/cari/'.$request->dari.'/'.$request->sampai);
    }

    public function cariDate(Request $request)
    {
        $data = CountAmount($request->from, $request->to);
        $pengeluaran = CountPengeluaran($request->from, $request->to);
        $pemasukan = CountPemasukan($request->from, $request->to);
        return view('cari', [
            'data' => $data['transaksi']->get(),
            'pengeluaran' => $pengeluaran,
            'pemasukan' => $pemasukan,
        ]);
    }

    public function transaksi()
    {
        $data = Trtransactions::whereMonth('created_at', date('m'))->get();
        return view('home', [
            'pageTitle' => 'Bulan Ini',
            'data' => $data
        ]);
    }
}
