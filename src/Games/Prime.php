<?php

namespace BrainGames\Prime;

use function BrainGames\Engine\getDividers;
use function BrainGames\Engine\getNumber;
use function BrainGames\Engine\runGame;

function prime(): void
{
    runGame('Answer "yes" if given number is prime. Otherwise answer "no".', '\BrainGames\Prime\getParam');
}

function getParam(): array
{
    $number = getNumber(2, 100);
    $expression = "$number";
    $true_answer = getTrueAnswer($number);

    return [
        'expression' => $expression,
        'true_answer' => $true_answer
    ];
}

function getTrueAnswer(int $number): string
{
    $dividers = getDividers($number);
    return count($dividers) > 2 ? 'no' : 'yes';
}
