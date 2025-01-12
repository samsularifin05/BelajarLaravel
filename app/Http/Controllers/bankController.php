<?php

namespace App\Http\Controllers;

use App\Models\BankModel;
use Illuminate\Http\Request;

class BankController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $query = BankModel::query()->get();
        return response()->json($query, 200);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'kode_bank' => 'required|string|max:255',
            'nama_bank' => 'required|string|max:255',
            'no_rekening' => 'required|string',
        ]);
        $check_kode = BankModel::where('kode_bank', $request->get('kode_bank'))->exists();
        $check_noRek = BankModel::where('no_rekening', $request->get('no_rekening'))->exists();

        if ($check_kode) {
            return response()->json(['message' => 'kode bank sudah tersedia'], 404);
        } else if ($check_noRek) {
            return response()->json(['massage' => 'no rekening sudah tersedia'], 404);
        } else {
            $bank = BankModel::create($validatedData);
            return response()->json($bank, 201);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $bank = BankModel::where('kode_bank', $id)->first();
        if (!$bank) {
            return response()->json(['message' => 'Bank not found'], 404);
        }
        return response()->json($bank, 201);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $bank = BankModel::where('kode_bank', $id)->first();

        if (!$bank) {
            return response()->json(['message' => 'kode bank tidak tersedia'], 404);
        }

        $validatedData = $request->validate([
            'nama_bank' => 'required|string|max:255',
            'no_rekening' => 'required|string',
        ]);

        $bank->update($validatedData);
        return response()->json($bank, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $bank = BankModel::where('kode_bank', $id)->first();

        if (!$bank) {
            return response()->json(['message' => 'kode bank tidak tersedia'], 404);
        }
        $bank->delete();
        return response()->json(['message' => 'Bank deleted successfully'], 200);
    }
}