<?php

namespace BrainGames\Even;

use function cli\line;
use function cli\prompt;

function welcome(): string
{
    line('Welcome to the Brain Games!');
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);

    return $name;
}
function get_number(): int
{
    return rand(0, 100);
}
function start_game_even($name)
{
    $count_answer = 0;

    line('Answer "yes" if the number is even, otherwise answer "no".');

    while ($count_answer < 3) {
        $number = get_number();
        $true_answer = ($number % 2) === 0 ? 'yes' : 'no';

        line('Question: ' . $number);
        $answer = prompt('Your answer: ');
        if ($answer !== $true_answer) {
            line("'$answer' is wrong answer ;(. Correct answer was '$true_answer'.");
            line("Let's try again, $name!");
            die();
        }
        line('Correct!');
        $count_answer++;
    }

    line("Congratulations, $name!");
}