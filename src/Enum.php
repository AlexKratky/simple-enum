<?php

declare(strict_types=1);

namespace AlexKratky\Enum;

class Enum {

    protected string $value;
    protected string $key;

    public function __construct(string $value) {
        $contants = self::getConstants();
        $contantsValues = array_values($contants);
        if (!in_array($value, $contantsValues)) {
            throw new MissingEnumValueException('Unkown value: "' . $value. '" in class ' . get_called_class());
        }
        
        foreach ($contants as $k => $v) {
            if ($value == $v) {
                $this->key = $k;
                break;
            }
        }

        $this->value = $value;
    }

    public static function init(string $value) {
        return new Enum($value);
    }

    public static function toArray(): array {
        return array_values(self::getConstants());
    }

    public static function toArrayWithKeys(): array {
        return self::getConstants();
    }

    public function value(): string {
        return $this->value;
    }

    public function key(): string {
        return $this->key;
    }

    public function __toString() {
        return $this->value;
    }

    protected static function getConstants(): array {
        $class = new \ReflectionClass(get_called_class());
        return $class->getConstants();
    }
}