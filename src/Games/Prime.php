<?php

namespace BrainGames\Games\Prime;

use function BrainGames\Engine\getDividers;
use function BrainGames\Engine\getNumber;
use function BrainGames\Engine\runGame;

const GAME_DESCRIPTION = 'Answer "yes" if given number is prime. Otherwise answer "no".';
function start(): void
{
    runGame(GAME_DESCRIPTION, '\BrainGames\Games\Prime\getParam');
}

function getParam(): array
{
    $number = getNumber(2, 100);
    $expression = "$number";
    $true_answer = getPrime($number) ? 'no' : 'yes';

    return [
        'expression' => $expression,
        'true_answer' => $true_answer
    ];
}

function getPrime(int $number): bool
{
    $dividers = getDividers($number);
    return count($dividers) > 2;
}
