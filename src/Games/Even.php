<?php

namespace BrainGames\Even;

use function BrainGames\Engine\getNumber;

function even(): array
{
    $number = getNumber(0, 100);
    $expression = "$number";

    return [
        'number' => $number,
        'expression' => $expression,
    ];
}
