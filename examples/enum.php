<?php
require('../src/MissingEnumValueException.php');
require('../src/Enum.php');

use AlexKratky\Enum\Enum;

class TestEnum extends Enum {
    public const CZ = 'Czech Republic';
    public const SK = 'Slovakia Republic';
}

$enum = new TestEnum('Czech Republic');

echo $enum->key() . ': ' . $enum->value() . "\n";

var_dump(TestEnum::toArray());

var_dump(TestEnum::toArrayWithKeys());