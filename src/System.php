<?php
namespace Pyncer\Unit;

enum System: string {
    case IMPERIAL = 'imperial';
    case METRIC = 'metric';

    public function getName()
    {
        return $this->value;
    }
}
