<?php

namespace BrainGames\Games\Even;

use function BrainGames\Engine\getNumber;
use function BrainGames\Engine\runGame;

const GAME_DESCRIPTION = 'Answer "yes" if the number is even, otherwise answer "no".';
function start(): void
{
    runGame(GAME_DESCRIPTION, '\BrainGames\Games\Even\getParam');
}

function getParam(): array
{
    $number = getNumber(1, 100);
    $expression = "$number";
    $true_answer = ($number % 2) === 0 ? 'yes' : 'no';

    return [
        'expression' => $expression,
        'true_answer' => $true_answer
    ];
}
