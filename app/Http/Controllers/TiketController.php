<?php

namespace App\Http\Controllers;

use App\Models\Tiket;
use Illuminate\Http\Request;

class TiketController extends Controller
{
    public function index()
    {
        $tikets = Tiket::orderBy('id_tiket', 'desc')->get();
        return view('daftar_tiket', compact('tikets'));
    }

    public function create()
    {
        return view('form_tiket');
    }

    public function store(Request $request)
    {
        Tiket::create($request->all());
        return redirect()->route('tiket.index');
    }

    public function edit($id)
    {
        $tiket = Tiket::findOrFail($id);
        return view('form_tiket', compact('tiket'));
    }

    public function update(Request $request, $id)
    {
        $tiket = Tiket::findOrFail($id);
        $tiket->update($request->all());
        return redirect()->route('tiket.index');
    }

    public function destroy($id)
    {
        Tiket::findOrFail($id)->delete();
        return redirect()->route('tiket.index');
    }
}