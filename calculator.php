<?php

class Sum
{
    public $a, $b;

    function getResult()
    {
        return $this->a + $this->b;
    }
}

$s = new Sum();


$s->a = 5;
$s->b = 10;

echo $s->getResult();