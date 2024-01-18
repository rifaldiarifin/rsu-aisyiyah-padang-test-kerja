<?php

namespace App\Http\Controllers;

use App\Models\Dokter;
use App\Models\Pasien;
use Illuminate\Http\Request;

class DokterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dokter = Dokter::all();
        return view("dokter.index", [
            "title" => "Dokter",
            "dokter" => $dokter
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("dokter.create", [
            "title" => "Dokter"
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // return $request;
        $vaildateData = $request->validate([
            'pasien_id' => [],
            'name' => ['required', 'max:255'],
        ]);

        try {
            Dokter::create($vaildateData);

            return redirect("/dokter");
        } catch (\Throwable $th) {
            return $th;
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Dokter $dokter)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Dokter $dokter)
    {
        return view("dokter.edit", [
            "title" => "Dokter",
            "dokter" => $dokter
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Dokter $dokter)
    {
        // return $request;
        $vaildateData = $request->validate([
            'pasien_id' => [],
            'name' => ['required', 'max:255'],
        ]);

        try {
            Dokter::where('id', $dokter->id)
            ->update($vaildateData);

            return redirect("/dokter");
        } catch (\Throwable $th) {
            return $th;
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Dokter $dokter)
    {
        try {
            Dokter::destroy($dokter->id);

            return redirect("/dokter");
        } catch (\Throwable $th) {
            return $th;
        }

    }
}
