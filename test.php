<?php

$ar = [1,2,3,4,'x'=>'y'];

$str =  serialize($ar);

$ar2 = unserialize($str);

var_dump($ar2);