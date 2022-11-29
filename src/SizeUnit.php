<?php
namespace Pyncer\Unit;

use Pyncer\Unit\UnitInterface;

enum SizeUnit: string implements UnitInterface {
    case BYTE = 'byte';

    case KILOBYTE = 'kilobyte';
    case MEGABYTE = 'megabyte';
    case GIGABYTE = 'gigabyte';
    case TERABYTE = 'terabyte';
    case PETABYTE = 'petabyte';
    case EXABYTE = 'exabyte';
    case ZETTABYTE = 'zettabyte';
    case YOTTABYTE = 'yottabyte';

    case KIBIBYTE = 'kibibyte';
    case MEBIBYTE = 'mebibyte';
    case GIBIBYTE = 'gibibyte';
    case TEBIABYTE = 'tebibyte';
    case PEBIBYTE = 'pebibyte';
    case EXBIBYTE = 'exbibyte';
    case ZEBIBYTE = 'zebibyte';
    case YOBIBYTE = 'yobibyte';

    public function getType(): string
    {
        return 'size';
    }
    public function getName(): string
    {
        return $this->value;
    }

    public function getUnitConversionMultiplier(): int|float
    {
        switch ($this) {
            case static::BYTE;
                return 1;

            case static::KILOBYTE;
                return 1000;
            case static::MEGABYTE;
                return 1000000;
            case static::GIGABYTE;
                return 1000000000;
            case static::TERABYTE;
                return 1000000000000;
            case static::PETABYTE;
                return 1000000000000000;
            case static::EXABYTE;
                return 1000000000000000000;
            case static::ZETTABYTE;
                return 1000000000000000000000;
            case static::YOTTABYTE;
                return 1000000000000000000000000;

            case static::KIBIBYTE;
                return 1024;
            case static::MEBIBYTE;
                return 1048576;
            case static::GIBIBYTE;
                return 1073741824;
            case static::TEBIABYTE;
                return 1099511627776;
            case static::PEBIBYTE;
                return 1125899906842624;
            case static::EXBIBYTE;
                return 1152921504606846976;
            case static::ZEBIBYTE;
                return 1180591620717411303424;
            case static::YOBIBYTE;
                return 1208925819614629174706176;
        }
    }

    public function getBaseUnit(): static
    {
        return static::BYTE;
    }
}
