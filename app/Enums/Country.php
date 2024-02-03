<?php

namespace App\Enums;

enum Country: string
{
    case United_States = 'US';
    case Canada = 'CA';
    case United_Kingdom = 'UK';

    public function label()
    {
        // underbar to space and capitalize
        return (string) str($this->name)->replace('_', ' ')->title();
    }
}

