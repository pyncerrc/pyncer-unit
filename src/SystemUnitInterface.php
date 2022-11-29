<?php
namespace Pyncer\Unit;

use Pyncer\Unit\System;
use Pyncer\Unit\UnitInterface;

interface SystemUnitInterface extends UnitInterface
{
    public function getSystem(): System;
    public function isImperial(): bool;
    public function isMetric(): bool;
}
