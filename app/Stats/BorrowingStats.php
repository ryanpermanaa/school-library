<?php

namespace App\Stats;

use Spatie\Stats\BaseStats;

class BorrowingStats extends BaseStats
{
    public function getName(): string
    {
        return 'borrowing-stats';
    }
}
