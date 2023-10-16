<?php

namespace BrainGames\Engine;

use function cli\line;
use function cli\prompt;

const ROUND = 3;

function welcome(): string
{
    line('Welcome to the Brain Games!');
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);

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
