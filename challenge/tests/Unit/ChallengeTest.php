<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ChallengeTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @test
     */
    public function gives_array()
    {
        $test_arr = $this->get('/challenge')->baseResponse->original;
        $this->assertIsArray($test_arr);
    }

    /**
     * A basic unit test example.
     *
     * @test
     */
    public function gives_multiples()
    {
        $controller = new \App\Http\Controllers\ChallengeController();
        $test_arr = $controller->calculateFactor(5);
        print_r($test_arr);
        $this->assertIsArray($test_arr);
    }
}
