<?php

namespace App\Http\Controllers;

use App\Models\Dokter;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class DokterAPIController extends Controller
{
    public function findOne(Request $request)
    {
        try {
            $dokter = Dokter::firstWhere("id", $request->id);
            return response()->json([
                "status" => "OK",
                "statusCode" => 200,
                "body" => $dokter
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                "status" => false,
                "statusCode" => 503,
                "body" => $th->getMessage()
            ]);
        }
    }
}
