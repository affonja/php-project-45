<?php

namespace BrainGames\Games\Gcd;

use function BrainGames\Engine\getDividers;
use function BrainGames\Engine\getNumber;
use function BrainGames\Engine\runGame;

const GAME_DESCRIPTION = 'Find the greatest common divisor of given numbers.';
function start(): void
{
    runGame(GAME_DESCRIPTION, '\BrainGames\Games\Gcd\getParam');
}

function getParam(): array
{
    $number1 = getNumber(1, 100);
    $number2 = getNumber(1, 100);
    $expression = "$number1 $number2";
    $true_answer = getGcd($number1, $number2);

    return [
        'expression' => $expression,
        'true_answer' => $true_answer
    ];
}

function getGcd(int $number1, int $number2): int
{
    $dividers_for_number1 = getDividers($number1);
    $dividers_for_number2 = getDividers($number2);

    $dividers_general = array_intersect($dividers_for_number1, $dividers_for_number2);
    return array_pop($dividers_general);
}
