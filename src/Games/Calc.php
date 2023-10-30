<?php

namespace BrainGames\Games\Calc;

use function BrainGames\Engine\getNumber;
use function BrainGames\Engine\runGame;

const GAME_DESCRIPTION = 'What is the result of the expression?';
function start(): void
{
    runGame(GAME_DESCRIPTION, "\BrainGames\Games\Calc\getParam");
}

function getParam(): array
{
    $number1 = getNumber(0, 100);
    $number2 = getNumber(0, 100);
    $action = getAction();
    $expression = "$number1 $action $number2";
    $true_answer = match ($action) {
        '+' => $number1 + $number2,
        '-' => $number1 - $number2,
        '*' => $number1 * $number2,
        default => throw new \Exception('Unknown game_param')
    };

    return [
        'expression' => $expression,
        'true_answer' => $true_answer
    ];
}

function getAction(): string
{
    $action_list = ['+', '-', '*'];
    $random = rand(0, 2);

    return $action_list[$random];
}
