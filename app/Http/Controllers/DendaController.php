<?php

namespace App\Http\Controllers;

use App\Models\Peminjaman;
use Illuminate\Http\Request;

class DendaController extends Controller
{
    public function index()
    {
        $data = Peminjaman::where('total_denda', ">", 0)->paginate(10);

        return view('denda', compact('data'));
    }
}
