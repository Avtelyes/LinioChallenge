<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FactoryController extends Controller
{
    /**
     * Handle the generation of the different types of kites
     */
    public function index(){
        $sled = new KiteController('Sled','normal');
        $sled->setDescription('The Basic one');
        $sled->setPrice(23.90);

        $delta = new KiteController('Delta','normal');
        $delta->setDescription('The basic but better quality');
        $delta->setPrice(26.50);

        $diamond = new KiteController('Diamond','normal');
        $diamond->setDescription('The basic but fancy');
        $diamond->setPrice(29.99);

        $box = new KiteController('Box','box');
        $box->setDescription('A box kite');
        $box->setPrice(24.99);

        $winged_box = new KiteController('Winged Box','box');
        $winged_box->setDescription('The marvelous box kite');
        $winged_box->setPrice(28.49);

        $arr_info = [$sled->getAllInfo(),$delta->getAllInfo(),$diamond->getAllInfo(),
                    $box->getAllInfo(),$winged_box->getAllInfo()];

        return view('layouts/kites',compact('arr_info'));
    }
}
