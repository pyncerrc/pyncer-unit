<?php
namespace Pyncer\Unit;

use Pyncer\Exception\InvalidArgumentException;
use Pyncer\Unit\UnitInterface;

class UnitConverter
{
    public function __construct(
        protected int|float $value,
        protected UnitInterface $unit,
    ) {}

    public function getValue(): int|float
    {
        return $this->value;
    }
    public function setValue(int|float $value): static
    {
        $this->value = $value;
        return $this;
    }

    public function getUnit(): UnitInterface
    {
        return $this->unit;
    }
    public function setUnit(UnitInterface $unit): static
    {
        return $this;
    }

    public function toUnit(UnitInterface $unit): static
    {
        if ($this->unit->getType() !== $unit->getType()) {
            throw new InvalidArgumentException(
                'Cannot convert to a unit of a different type.'
            );
        }

        // Normalize value to base unit
        $value = $this->value * $this->unit->getUnitConversionMultiplier();

        // Multiply base unit value by conversion multiplier of new unit
        $value /= $unit->getUnitConversionMultiplier();

        $this->setValue($value);
        $this->setUnit($unit);

        return $this;
    }

    public function toOptimalUnit(?array $units = null): static
    {
        $value = $this->value * $this->unit->getUnitConversionMultiplier();

        if ($units = null) {
            $units = $this->unit::cases();
        }

        if (!$units) {
            throw InvalidArgumentException(
                'Units array is empty.'
            );
        }

        foreach ($units as $unit) {
            if (!($unit instanceof UnitInterface)) {
                throw new InvalidArgumentException(
                    'Units array must contain \Pyncer\Unit\UnitInterface implementations only.'
                );
            }

            if ($this->unit->getType() !== $unit->getType()) {
                throw new InvalidArgumentException(
                    'Units array cannot contain a unit of a different type.'
                );
            }
        }

        $currentConversionValue = $this->unit->getUnitConversionMultiplier();

        $currentUnit = $this->unit;

        foreach ($units as $unit) {
            $conversionValue = $unit->getUnitConversionMultiplier();
            if ($value <= $conversionValue) {
                if ($currentConversionValue < $conversionValue) {
                    $currentUnit = $unit;
                }
            }
        }

        // No change
        if ($this->unit === $currentUnit) {
            return $this;
        }

        return $this->toUnit($currentUnit);
    }
}
