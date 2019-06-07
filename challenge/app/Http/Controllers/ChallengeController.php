<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ChallengeController extends Controller
{
    //
    public function index(){
        $response = $this->numberGenerator();

        return view('welcome',compact('response'));
    }

    public function numberGenerator(){
        $ans_arr = [];
        for($i = 1; $i<=100; $i++){
            $new_item = $this->calculateFactor($i);
            array_push($ans_arr, $new_item);
        }

        return $ans_arr;
    }

    public function calculateFactor($number){
        $ofThree = $number%3 === 0;
        $ofFive = $number%5 === 0;
        $ofBoth = $ofThree && $ofFive;

        $container = [];
        array_push($container, $ofThree, $ofFive, $ofBoth, false);
        // array_filter($container,'strlen');
        $size = 3;
        
        $count = 0;
        $count_true = 0;
        $index = 0;

        // foreach($container){
        //     $count++;
        // }
        // dd($size);
        
        while($container[$index] !== true && $index < $size){
            $index++;
        }
        $index++;

        while($count < $size){
            $count_true += $container[$count];
            $count++;
        }


        $arr_values = [0 => $number, 1 => 'Linio', 2 => 'IT', 3 => 'Linianos'];

        if($count_true == 1){
            return $arr_values[$index];
        }

        return $arr_values[$count_true];

        // return [$ofThree, $ofFive];

        // return $count_true;
    }
}
