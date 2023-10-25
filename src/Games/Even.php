<?php

namespace BrainGames\Even;

use function BrainGames\Engine\getNumber;
use function BrainGames\Engine\runGame;

function even(): void
{
    runGame('Answer "yes" if the number is even, otherwise answer "no".', '\BrainGames\Even\getParam');
}

function getParam(): array
{
    $number = getNumber(1, 100);
    $expression = "$number";
    $true_answer = ($number % 2) === 0 ? 'yes' : 'no';

    return [
        'number' => $number,
        'expression' => $expression,
        'true_answer' => $true_answer
    ];
}
