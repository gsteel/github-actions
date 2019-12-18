<?php
declare(strict_types=1);

namespace App;

class Something
{
    /** @var int */
    private $something;

    public function __construct(int $something)
    {
        $this->something = $something;
    }

    public function something() : int
    {
        return $this->something;
    }

    public function somethingElse() : int
    {
        return $this->something * 10;
    }
}
