<?php

namespace BrainGames\Calc;

use function BrainGames\Engine\getNumber;
use function BrainGames\Engine\getAction;

function calc(): array
{
    $number1 = getNumber(0, 100);
    $number2 = getNumber(0, 100);
    $action = getAction();
    $expression = "$number1 $action $number2";

    return [
        'number1' => $number1,
        'number2' => $number2,
        'action' => $action,
        'expression' => $expression,
    ];
}
