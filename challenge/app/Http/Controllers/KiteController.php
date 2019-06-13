<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KiteController extends Controller
{
    /**
     * Summary Description
     * 
     * Types:
     *  Sled
     *  Delta
     *  Diamond
     *  Box
     *  Winged Box 
     * 
     * Aesthetic options:
     *  one solid color
     *  two solid colors
     *  four solid colors
     *  pattern (camouflage, leopard, etc)
     *  custom image
     *  tail
     * 
     * Sled, Delta, Diamond SUPPORTS
     *  tails
     *  custom image
     *  one solid color
     *  two solid color
     *  pattern
     * 
     * Winged Box, Box SUPPORTS
     *  one solid color
     *  two solid color
     *  four solid color
     *  pattern
     * 
     * All kites have their own description, and of course different prices.
     */


    /**
     * Variables that manage the attributes for a kite
     */
    protected $type;
    protected $one_color = ['activated' => 0, 'value' => 'one_color'];
    protected $two_color = ['activated' => 0, 'value' => 'two_color'];
    protected $four_color = ['activated' => 0, 'value' => 'four_color'];
    protected $pattern = ['activated' => 0, 'value' => 'pattern'];
    protected $custom_image = ['activated' => 0, 'value' => 'custom_image'];
    protected $tail = ['activated' => 0, 'value' => 'tail'];
    protected $description;
    protected $price;


    /**
     * Constructor that assign the type and has an optional parameter
     * if its defined with options at the beginning
     */
    public function __construct($type, $option = null){
        $this->type = $type;

        if(!empty($option)){
            switch($option){
                case 'normal':
                    $this->setOptions([1,1,0,1,1,1]);
                    break;
                case 'box':
                    $this->setOptions([1,1,1,1,0,0]);
                    break;
            }
        }
    }

    /**
     * Obtain the type declared
     */
    public function getType(){
        return $this->type;
    }

    /**
     * Set the price
     */
    public function setPrice($price){
        $this->price = $price;
    }

    /**
     * Set the description
     */
    public function setDescription($description){
        $this->description = $description;
    }

    /**
     * Set the options in array format with 1s and 0s, this change the 
     * activated attribute of each option
     */
    public function setOptions($arr_options){
        $list_options = [&$this->one_color,&$this->two_color,&$this->four_color,
                    &$this->pattern,&$this->custom_image,&$this->tail];
        $index = 0;
        foreach($list_options as $key => $option){
            $list_options[$key]['activated'] = $arr_options[$index];
            $index++;
        }
    }

    /**
     * Get the options declared, filter the active ones and map the values
     */
    public function getOptions(){
        $list_options = [$this->one_color,$this->two_color,$this->four_color,
                    $this->pattern,$this->custom_image,$this->tail];
        $list_options = array_filter($list_options, function($option){
            return $option['activated'] === 1;
        });

        $list_options = array_map(function($option){
            return $option['value'];
        },$list_options);

        return array_values($list_options);
    }

    /**
     * Return all the attributes with their respective values
     */
    public function getAllInfo(){
        $info = ['type' => $this->type, 'description' => $this->description, 'price' => $this->price,
                'options' => $this->getOptions()];

        return $info;
    }
}
