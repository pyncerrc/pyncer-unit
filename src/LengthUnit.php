<?php
namespace Pyncer\Unit;

use Pyncer\Unit\System;
use Pyncer\Unit\SystemUnitInterface;

enum LengthUnit: string implements SystemUnitInterface {
    case PICOMETER = 'picometer';
    case NANOMETER = 'nanometer';
    case MICROMETER = 'micrometer';
    case MILIMETER = 'milimeter';
    case CENTIMETER = 'centimeter';
    case DECIMETER = 'decimeter';
    case METER = 'meter';
    case KILOMETER = 'kilometer';
    case INCH = 'inch';
    case FOOT = 'foot';
    case YARD = 'yard';
    case CHAIN = 'chain';
    case FURLONG = 'furlong';
    case MILE = 'mile';

    public function getType(): string
    {
        return 'length';
    }

    public function getName(): string
    {
        return $this->value;
    }

    public function getSystem(): System
    {
        switch ($this) {
            case static::INCH:
            case static::FOOT:
            case static::YARD:
            case static::CHAIN:
            case static::FURLONG:
            case static::MILE:
                return System::IMPERIAL;
        }

        return System::METRIC;
    }

    public function isImperial(): bool
    {
        return ($this->getSystem() === System::IMPERIAL);
    }

    public function isMetric(): bool
    {
        return ($this->getSystem() === System::METRIC);
    }

    public function getUnitConversionMultiplier():int|float
    {
        switch ($this) {
            case static::PICOMETER:
                return 0.000000001;
            case static::NANOMETER:
                return 0.000001;
            case static::MICROMETER:
                return 0.001;
            case static::MILIMETER:
                return 1;
            case static::CENTIMETER:
                return 10;
            case static::DECIMETER:
                return 100;
            case static::METER:
                return 1000;
            case static::KILOMETER:
                return 1000000;
            case static::INCH:
                return 25.4;
            case static::FOOT:
                return 304.8;
            case static::YARD:
                return 914.4;
            case static::CHAIN:
                return 20116.8;
            case static::FURLONG:
                return 201168;
            case static::MILE:
                return 1609344;
        }
    }

    public function getBaseUnit(): static
    {
        return static::MILIMETER;
    }
}
