<?php

class A
{

    public function abc()
    {
        $this->xyz();
        return "hello from ABC";
    }


    private function xyz()
    {
        return "hello from XYZ";
    }

    protected function lmn()
    {
        return "hello from LMN";
    }
}

class B extends A
{
    function ijk()
    {
        return "hello from IJK";
    }
}

$o = new A;

echo $o->ijk();