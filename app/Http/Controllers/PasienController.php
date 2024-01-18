<?php

namespace App\Http\Controllers;

use App\Models\Dokter;
use App\Models\Pasien;
use Error;
use Illuminate\Http\Request;

class PasienController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view("pasien.index", [
            "title" => "Pasien",
            "pasien" => Pasien::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("pasien.create", [
            "title" => "Pasien"
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            "dokter_id" => [],
            "name" => ["string", "max:255"]
        ]);

        try {
            Pasien::create($validateData);

            return redirect("/pasien");
        } catch (\Throwable $th) {
            throw new Error($th->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Pasien $pasien)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pasien $pasien)
    {
        return view("pasien.edit", [
            "title" => "Pasien",
            "pasien" => $pasien
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pasien $pasien)
    {
        $validateData = $request->validate([
            "dokter_id" => [],
            "name" => ["string", "max:255"]
        ]);

        try {
            Pasien::where("id", $pasien->id)->update($validateData);

            return redirect("/pasien");
        } catch (\Throwable $th) {
            throw new Error($th->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pasien $pasien)
    {
        try {
            Pasien::destroy($pasien->id);

            return redirect("/pasien");
        } catch (\Throwable $th) {
            throw new Error($th->getMessage());
        }
    }
}
