<?php

namespace BrainGames\Games\Progression;

use function BrainGames\Engine\getNumber;
use function BrainGames\Engine\runGame;

const GAME_DESCRIPTION = 'What number is missing in the progression?';
function start(): void
{
    runGame(GAME_DESCRIPTION, '\BrainGames\Games\Progression\getParam');
}

function getParam(): array
{
    $number_first = getNumber(0, 100);
    $progression_step = getNumber(1, 10);
    $progression_length = getNumber(5, rand(5, 25));
    $progression = [];

    for ($i = 0; $i < $progression_length; $i++) {
        $progression[] = $number_first + $progression_step * $i;
    }
    $hidden_element = rand(0, $progression_length - 1);
    $true_answer = $progression[$hidden_element];
    $progression[$hidden_element] = '..';

    $expression = implode(' ', $progression);

    return [
        'expression' => $expression,
        'true_answer' => $true_answer
    ];
}
