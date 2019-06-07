<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ChallengeController extends Controller
{
    //
    public function numberGenerator(){
        $ans_arr = [];
        for($i = 1; $i<=100; $i++){
            array_push($ans_arr, $i);
        }

        return response()->json($ans_arr);
    }

    public function calculateFactor($number){
        $ofThree = $number%3 === 0;
        $ofFive = $number%5 === 0;

        return [$ofThree, $ofFive];
    }
}
