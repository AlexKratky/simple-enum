<?php

declare(strict_types=1);

namespace AlexKratky\Enum;

class MissingEnumValueException extends \Exception {
    public function __construct($message)
    {
        parent::__construct($message);
    }
}