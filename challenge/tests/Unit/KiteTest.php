<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class KiteTest extends TestCase
{
    /**
     * The types match with the declared.
     *
     * @test
     */
    public function gives_correct_type()
    {
        $sled = new \App\Http\Controllers\KiteController('Sled');
        $delta = new \App\Http\Controllers\KiteController('Delta');
        $diamond = new \App\Http\Controllers\KiteController('Diamond');
        $box = new \App\Http\Controllers\KiteController('Box');
        $winged_box = new \App\Http\Controllers\KiteController('Winged Box');
        $type = $sled->getType();
        $this->assertEquals('Sled',$type);
        $type = $delta->getType();
        $this->assertEquals('Delta',$type);
        $type = $diamond->getType();
        $this->assertEquals('Diamond',$type);
        $type = $box->getType();
        $this->assertEquals('Box',$type);
        $type = $winged_box->getType();
        $this->assertEquals('Winged Box',$type);
    }

    /**
     * The response is an array with the options for box types.
     *
     * @test
     */
    public function gives_options_array_box_type()
    {
        /**
         * INDEXES
         * 0 -> one_color
         * 1 -> two_color
         * 2 -> four_color
         * 3 -> pattern
         * 4 -> custom_image
         * 5 -> tail
         */
        $options = [1,1,1,1,0,0];
        $winged_box = new \App\Http\Controllers\KiteController('Winged Box');
        $winged_box->setOptions($options);
        $result_options = $winged_box->getOptions();
        $this->assertIsArray($result_options);
        $this->assertCount(4, $result_options);
        $this->assertEquals(['one_color','two_color','four_color','pattern'],$result_options);
    }

    /**
     * The response is an array with the options for normal types.
     *
     * @test
     */
    public function gives_options_array_normal_type()
    {
        /**
         * INDEXES
         * 0 -> one_color
         * 1 -> two_color
         * 2 -> four_color
         * 3 -> pattern
         * 4 -> custom_image
         * 5 -> tail
         */
        $options = [1,1,0,1,1,1];
        $sled = new \App\Http\Controllers\KiteController('Sled');
        $sled->setOptions($options);
        $result_options = $sled->getOptions();
        $this->assertIsArray($result_options);
        $this->assertCount(5, $result_options);
        $this->assertEquals(['one_color','two_color','pattern','custom_image','tail'],$result_options);
    }

    /**
     * The response is an array with the options for normal types declared with the additional
     * param in constructor.
     *
     * @test
     */
    public function gives_options_array_normal_type_clean()
    {
        $sled = new \App\Http\Controllers\KiteController('Sled','normal');
        $result_options = $sled->getOptions();
        $this->assertIsArray($result_options);
        $this->assertCount(5, $result_options);
        $this->assertEquals(['one_color','two_color','pattern','custom_image','tail'],$result_options);
    }

    /**
     * The response is an array with the options for normal types declared with the additional
     * param in constructor.
     *
     * @test
     */
    public function gives_options_array_box_type_clean()
    {
        $sled = new \App\Http\Controllers\KiteController('Box','box');
        $result_options = $sled->getOptions();
        $this->assertIsArray($result_options);
        $this->assertCount(4, $result_options);
        $this->assertEquals(['one_color','two_color','four_color','pattern'],$result_options);
    }
}
