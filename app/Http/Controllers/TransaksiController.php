<?php

namespace App\Http\Controllers;

use App\Transaksi;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    public function index() {
        $data_transaksis = Transaksi::all();
        return view('transaksi.index', compact('data_transaksis'));
    }
}
