<?php

namespace BrainGames\Prime;

use function BrainGames\Engine\getDividers;
use function BrainGames\Engine\getNumber;
use function BrainGames\Engine\runGame;

function prime(): void
{
    runGame('Answer "yes" if given number is prime. Otherwise answer "no".', 'prime');
}

function getParam(): array
{
    $number = getNumber(2, 100);
    $dividers = getDividers($number);
    $expression = "$number";
    $true_answer = count($dividers) > 2 ? 'no' : 'yes';

    return [
        'dividers' => $dividers,
        'expression' => $expression,
        'true_answer' => $true_answer
    ];
}
