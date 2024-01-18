<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SoalController extends Controller
{
    public function index() {
        $main_number = [];
        for ($i=1; $i <= 100; $i++) { 
            array_push($main_number, $i);
        }

        // Soal 1
        $soal_1 = [];
        for ($i=1; $i <= 100; $i++) { 
            array_push($soal_1, $i);
        }
        $soal_1 = join(", ", $soal_1);

        // Soal 2
        $soal_2 = [];
        for ($i=1; $i <= 100; $i++) {
            if($i % 5 === 0) array_push($soal_2, $i);
        }
        $soal_2 = join(", ", $soal_2);

        // Soal 3
        $soal_3 = [];
        for ($i=1; $i <= 100; $i++) { 
            if($i % 2 === 0) array_push($soal_3, $i);
        }
        $soal_3 = join(", ", $soal_3);

        // var_dump([$soal_1, $soal_2, $soal_3]);

        return view("soal.index", [
            "title" => "Soal Praktek",
            "soal_1" => $soal_1,
            "soal_2" => $soal_2,
            "soal_3" => $soal_3,
        ]);
    }
}
