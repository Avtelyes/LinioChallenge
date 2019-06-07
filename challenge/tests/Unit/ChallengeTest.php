<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ChallengeTest extends TestCase
{
    /**
     * The response is an array.
     *
     * @test
     */
    public function gives_array()
    {
        $controller = new \App\Http\Controllers\ChallengeController();
        $test_arr = $controller->numberGenerator();
        $this->assertIsArray($test_arr);
    }

    /**
     * Test a multiple of five.
     *
     * @test
     */
    public function should_give_it_word()
    {
        $controller = new \App\Http\Controllers\ChallengeController();
        $test_value = $controller->calculateFactor(5);
        $this->assertEquals('IT',$test_value);
    }

    /**
     * Test a multiple of three.
     *
     * @test
     */
    public function should_give_linio_word()
    {
        $controller = new \App\Http\Controllers\ChallengeController();
        $test_value = $controller->calculateFactor(3);
        $this->assertEquals('Linio',$test_value);
    }

    /**
     * Test a multiple of five and three.
     *
     * @test
     */
    public function should_give_linianos_word()
    {
        $controller = new \App\Http\Controllers\ChallengeController();
        $test_value = $controller->calculateFactor(15);
        $this->assertEquals('Linianos',$test_value);
    }

    /**
     * Test a non multiple of three and five.
     *
     * @test
     */
    public function should_give_number()
    {
        $controller = new \App\Http\Controllers\ChallengeController();
        $test_value = $controller->calculateFactor(4);
        $this->assertEquals(4,$test_value);
    }

    /**
     * Test the multiples container.
     *
     * @test
     */
    public function should_give_multiples()
    {
        $controller = new \App\Http\Controllers\ChallengeController();
        $test_arr = $controller->numberGenerator();
        $this->assertEquals('IT',$test_arr[100-1]);
        $this->assertEquals('Linianos',$test_arr[30-1]);
        $this->assertEquals('Linio',$test_arr[33-1]);
    }
}
