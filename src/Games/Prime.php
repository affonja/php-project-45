<?php

namespace BrainGames\Prime;

use function BrainGames\Engine\getDividers;
use function BrainGames\Engine\getNumber;

function prime(): array
{
    $number = getNumber(2, 100);
    $dividers = getDividers($number);
    $expression = "$number";

    return [
        'dividers' => $dividers,
        'expression' => $expression,
    ];
}
