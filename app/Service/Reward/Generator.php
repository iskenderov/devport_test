<?php

namespace App\Service\Reward;

use App\Service\Reward\Enums\StatusEnum;

class Generator
{
    private StatusEnum $status;

    private float $rewards = 0;

    public function __construct(private readonly int $number)
    {
        $this->run();
    }

    public function run(): void
    {
        $this->setStatus();

        if ($this->status == StatusEnum::WIN) {
            $this->setReward();
        }
    }

    private function setStatus(): void
    {
        $this->status = $this->number % 2 === 0
            ? StatusEnum::WIN
            : StatusEnum::LOOSE;
    }

    private function setReward(): void
    {
        $this->rewards =  match (true) {
            $this->number > 900 => $this->number * 0.7,
            $this->number > 600 => $this->number * 0.5,
            $this->number > 300 => $this->number * 0.3,
            $this->number <= 300 => $this->number * 0.1,
            default => 0,
        };
    }

    public function getStatus(): StatusEnum
    {
        return $this->status;
    }

    public function getReward(): float
    {
        return $this->rewards;
    }

    public function getNumber(): int
    {
        return $this->number;
    }
}
