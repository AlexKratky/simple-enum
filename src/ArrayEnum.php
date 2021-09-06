<?php

declare(strict_types=1);

namespace AlexKratky\Enum;

class ArrayEnum extends Enum {

    public function __construct(string $value) {
        $class = new \ReflectionClass(get_called_class());
        $contants = $class->getConstants();
        
        foreach ($contants as $k => $v) {
            if (in_array($value, $v)) {
                $this->key = $k;
                break;
            }
        }

        if ( ! isset($this->key)) {
            throw new MissingEnumValueException('Unkown value: "' . $value. '" in class ' . get_called_class());
        }

        $this->value = $value;
    }
}