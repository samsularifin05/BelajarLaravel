<?php

namespace App\Http\Controllers;

use App\Models\MemberBank;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $query = MemberBank::all();

        return response()->json([
            'status' => 200,
            'result' => $query,
            'message' => count($query) > 0 ? 'Data tersedia' : "Data Kosong",
        ], 200);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {


        // $check_data = MemberBank::where('nama_member', $request->get())
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validaatedData = request()->validate([
            'nama_member' => 'required',
            'email_member'  => 'required',
            'no_telp_member'  => 'required',
            'alamat_member'  => 'required',
        ]);
        $member = MemberBank::create($validaatedData);
        return response()->json($member, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}