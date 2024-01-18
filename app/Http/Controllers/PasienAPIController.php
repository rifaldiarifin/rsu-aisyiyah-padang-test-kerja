<?php

namespace App\Http\Controllers;

use App\Models\Pasien;
use Illuminate\Http\Request;

class PasienAPIController extends Controller
{
    public function findOne(Request $request) {
        try {
            $pasien = Pasien::firstWhere("id", $request->id);
            return response()->json([
                "status" => "OK",
                "statusCode" => 200,
                "body" => $pasien
            ]);
        } catch (\Throwable $th) {
            return response()->json([[
                "status" => false,
                "statusCode" => 503,
                "body" => $th->getMessage()
            ]]);
        }   
    }
}
