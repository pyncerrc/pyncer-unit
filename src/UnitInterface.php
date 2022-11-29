<?php
namespace Pyncer\Unit;

interface UnitInterface
{
    public function getType(): string;
    public function getName(): string;

    public function getUnitConversionMultiplier(): int|float;
    public function getBaseUnit(): static;
}
