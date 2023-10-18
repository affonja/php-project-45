<?php

namespace BrainGames\Engine;

use function BrainGames\Gcd\getGcd;
use function cli\line;
use function cli\prompt;

const ROUND = 3;
const MESSAGES =
[
    'calc' => 'What is the result of the expression?',
    'even' => 'Answer "yes" if the number is even, otherwise answer "no".',
    'gcd' => 'Find the greatest common divisor of given numbers.',
    'prime' => 'Answer "yes" if given number is prime. Otherwise answer "no".',
    'progression' => 'What number is missing in the progression?',
];

function welcome(string $game_name): string
{
    line('Welcome to the Brain Games!');
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
    line(MESSAGES[$game_name]);

    return $name;
}

function getNumber(int $min, int $max): int
{
    return rand($min, $max);
}

function gameRound(string $args): string
{
    line("Question: $args");
    $answer = prompt('Your answer: ');

    return $answer;
}

function validateAnswer(string $true_answer, string $user_answer, string $name): void
{
    if ($user_answer != $true_answer) {
        line("'$user_answer' is wrong answer ;(. Correct answer was '$true_answer'.");
        line("Let's try again, $name!");
        die();
    }
}

function getAction(): string
{
    $action_list = ['+', '-', '*'];
    $random = rand(0, 2);
    return $action_list[$random];
}

function getDividers(int $number): array
{
    $min_divider = 1;
    $dividers = [];
    while ($min_divider <= $number) {
        if ($number % $min_divider === 0) {
            $dividers[] = $min_divider;
        }
        $min_divider++;
    }

    return $dividers;
}

function runGame(string $game_name): void
{
    $name = welcome($game_name);
    $count_answer = 0;

    while ($count_answer < ROUND) {
        $function = "BrainGames\\$game_name\\$game_name";
        is_callable($function) ? $game_param = $function() : die();
        $true_answer = getTrueAnswer($game_name, $game_param);
        $user_answer = gameRound((string)$game_param['expression']);
        validateAnswer((string)$true_answer, $user_answer, $name);
        line('Correct!');
        $count_answer++;
    }
    line("Congratulations, $name!");
}
function getTrueAnswer(string $game, array $param): mixed
{
    return match ($game) {
        'even' => ($param['number'] % 2) === 0 ? 'yes' : 'no',
        'calc' => match ($param['action']) {
            '+' => $param['number1'] + $param['number2'],
            '-' => $param['number1'] - $param['number2'],
            '*' => $param['number1'] * $param['number2'],
        },
        'gcd' => getGcd($param['number1'], $param['number2']),
        'prime' => count($param['dividers']) > 2 ? 'no' : 'yes',
        'progression' => $param['hid'],
        default => throw new Error(`Unknown game_param: '{$param}'!`)
    };
}
