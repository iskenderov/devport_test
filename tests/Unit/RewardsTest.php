<?php

namespace Tests\Unit;

use App\Service\Reward\Enums\StatusEnum;
use App\Service\Reward\Generator;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use PHPUnit\Framework\TestCase;

class RewardsTest extends TestCase
{
    use DatabaseTransactions;

    public function test_win_number()
    {
        $generator = new Generator(456);
        $generator->run();
        $this->assertEquals(StatusEnum::WIN, $generator->getStatus());
    }

    public function test_loose_number()
    {
        $generator = new Generator(385);
        $generator->run();
        $this->assertEquals(StatusEnum::LOOSE, $generator->getStatus());
    }

    public function test_when_number_over_900()
    {
        $number = 948;
        $generator = new Generator($number);
        $generator->run();
        $this->assertEquals($number * 0.7, $generator->getReward());
    }

    public function test_when_number_equal_900()
    {
        $number = 900;
        $generator = new Generator($number);
        $generator->run();
        $this->assertEquals($number * 0.5, $generator->getReward());
    }

    public function test_when_number_over_600()
    {
        $number = 648;
        $generator = new Generator($number);
        $generator->run();
        $this->assertEquals($number * 0.5, $generator->getReward());
    }

    public function test_when_number_equal_600()
    {
        $number = 600;
        $generator = new Generator($number);
        $generator->run();
        $this->assertEquals($number * 0.3, $generator->getReward());
    }

    public function test_when_number_over_300()
    {
        $number = 302;
        $generator = new Generator($number);
        $generator->run();
        $this->assertEquals($number * 0.3, $generator->getReward());
    }

    public function test_when_number_equal_300()
    {
        $number = 300;
        $generator = new Generator($number);
        $generator->run();
        $this->assertEquals($number * 0.1, $generator->getReward());
    }

    public function test_when_number_less_300()
    {
        $number = 156;
        $generator = new Generator($number);
        $generator->run();
        $this->assertEquals($number * 0.1, $generator->getReward());
    }
}
