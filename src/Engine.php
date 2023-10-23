<?php

namespace BrainGames\Engine;

use function cli\line;
use function cli\prompt;

const ROUND = 3;

function welcome(string $game_phrase): string
{
    line('Welcome to the Brain Games!');
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
    line($game_phrase);

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

function validateAnswer(string $true_answer, string $user_answer, string $name): bool
{
    if ($user_answer != $true_answer) {
        line("'$user_answer' is wrong answer ;(. Correct answer was '$true_answer'.");
        line("Let's try again, $name!");
        return false;
    }
    return true;
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

function runGame(string $phrase, string $game_name): bool
{
    $name = welcome($phrase);
    $count_answer = 0;

    while ($count_answer < ROUND) {
        $game_param = match ($game_name) {
            'calc' => \BrainGames\Calc\getParam(),
            'even' => \BrainGames\Even\getParam(),
            'gcd' => \BrainGames\Gcd\getParam(),
            'prime' => \BrainGames\Prime\getParam(),
            'progression' => \BrainGames\Progression\getParam(),
            default => throw new \Exception('Unknown game')
        };
        $true_answer = $game_param['true_answer'];
        $user_answer = gameRound((string)$game_param['expression']);
        $is_valid_answer = validateAnswer((string)$true_answer, $user_answer, $name);
        if ($is_valid_answer) {
            line('Correct!');
            $count_answer++;
        } else {
            return false;
        }
    }
    line("Congratulations, $name!");
    return true;
}
