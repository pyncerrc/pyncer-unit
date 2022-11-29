<?php
namespace Pyncer\Unit;

use Pyncer\Unit\System;
use Pyncer\Unit\SystemUnitInterface;

enum MassUnit: string implements SystemUnitInterface {
    case MICROGRAM = 'microgram';
    case MILIGRAM = 'miligram';
    case GRAM = 'gram';
    case KILOGRAM = 'kilogram';
    case TONNE = 'tonne';
    case GRAIN = 'grain';
    case CARAT = 'carat';
    case OUNCE = 'ounce';
    case TROY_OUNCE = 'troy_ounce';
    case POUND = 'pound';
    case STONE = 'stone';
    case TON = 'ton';
    case LONG_TON = 'long_ton';

    public function getType(): string
    {
        return 'mass';
    }

    public function getName(): string
    {
        return $this->value;
    }

    public function getSystem(): System
    {
        switch ($this) {
            case static::MICROGRAM:
            case static::MILIGRAM:
            case static::GRAM:
            case static::KILOGRAM:
            case static::TONNE:
                return System::METRIC;
        }

        return System::IMPERIAL;
    }

    public function isImperial(): bool
    {
        return ($this->getSystem() === System::IMPERIAL);
    }

    public function isMetric(): bool
    {
        return ($this->getSystem() === System::METRIC);
    }

    public function getUnitConversionMultiplier(): int|float
    {
        switch ($this) {
            case static::MICROGRAM:
                return 0.000001;
            case static::MILIGRAM:
                return 0.001;
            case static::GRAM:
                return 1;
            case static::KILOGRAM:
                return 1000;
            case static::TONNE:
                return 1000000;
            case static::GRAIN:
                return 0.0647989891;
            case static::CARAT:
                return 0.2;
            case static::OUNCE:
                return 28.34952;
            case static::TROY_OUNCE:
                return 31.10348;
            case static::POUND:
                return 453.5924;
            case static::STONE:
                return 6350.293;
            case static::TON:
                return 907184.74;
            case static::LONG_TON:
                return 1016046.9088;
        }
    }

    public function getBaseUnit(): static
    {
        return static::GRAM;
    }
}
