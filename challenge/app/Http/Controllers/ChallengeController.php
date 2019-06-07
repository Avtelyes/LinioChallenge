<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ChallengeController extends Controller
{
    /**
     * Handle the index page and return the array with the response
     */
    public function index(){
        $response = $this->numberGenerator();

        return view('welcome',compact('response'));
    }

    /**
     * Handle the loop of numbers
     */
    public function numberGenerator(){
        $ans_arr = [];
        for($i = 1; $i<=100; $i++){
            $new_item = $this->calculateFactor($i);
            array_push($ans_arr, $new_item);
        }

        return $ans_arr;
    }

    /**
     * Handle the convertion of multiples
     */
    public function calculateFactor($number){

        //Variables that define the multiples of three and five
        $ofThree = $number%3 === 0;
        $ofFive = $number%5 === 0;
        $ofBoth = $ofThree && $ofFive;

        //Push all the answers to the container
        $container = [];
        array_push($container, $ofThree, $ofFive, $ofBoth, false);
        $size = 3;
        
        $count = 0;
        $count_true = 0;
        $index = 0;
        
        //Finds the first true, add 1 to the end to match the values later
        while($container[$index] !== true && $index < $size){
            $index++;
        }
        $index++;

        //Counts the total number of trues
        while($count < $size){
            $count_true += $container[$count];
            $count++;
        }

        //Array that contains the map for the answer
        $arr_values = [0 => $number, 1 => 'Linio', 2 => 'IT', 3 => 'Linianos'];

        //Only if that evaluate if there is one true and gives the value with $index
        if($count_true == 1){
            return $arr_values[$index];
        }

        //Return the arr value in case there is less or more than one true
        return $arr_values[$count_true];
    }
}
