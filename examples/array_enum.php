<?php
setlocale(LC_ALL, 'cs_CZ');
mb_internal_encoding("UTF-8");

require('../src/MissingEnumValueException.php');
require('../src/Enum.php');
require('../src/ArrayEnum.php');

use AlexKratky\Enum\ArrayEnum;
use AlexKratky\Enum\MissingEnumValueException;

class TestEnum extends ArrayEnum {
    public const CZ = ['Czech Republic', 'Česká Republika'];
    public const SK = ['Slovakia Republic'];
}

$enum = new TestEnum('Česká Republika');

echo $enum->key() . ': ' . $enum->value() . "\n";

var_dump(TestEnum::toArray());

var_dump(TestEnum::toArrayWithKeys());

try {
    new TestEnum('Česká Republikaaaaa');
} catch (MissingEnumValueException $err) {
    echo $err->getMessage();
}