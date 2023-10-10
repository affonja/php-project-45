<?php

namespace BrainGames\Gcd;

use function cli\line;
use function cli\prompt;
use function BrainGames\Engine\welcome;
use function BrainGames\Engine\get_number;
use function BrainGames\Engine\game_round;
use function BrainGames\Engine\validate_answer;
use const BrainGames\Engine\ROUND;
use function BrainGames\Engine\get_action;


function game_gcd($name): void
{
    $count_answer = 0;
    line('Find the greatest common divisor of given numbers.');

    while ($count_answer < ROUND) {
        $number1 = get_number(1,100);
        $number2 = get_number(1,100);

        $true_answer = get_gcd($number1, $number2);
        $user_answer = game_round($number1 . ' ' . $number2);
        validate_answer($true_answer, $user_answer, $name);
        line('Correct!');
        $count_answer++;
    }

    line("Congratulations, $name!");
}

function get_gcd(int $number1, int $number2)
{
    $i = 1;
    $dividers_for_number1 = [];
    while ($i <= $number1) {
        if ($number1 % $i === 0) {
            $dividers_for_number1[] = $i;
        }
        $i++;
    }

    $i = 1;
    $dividers_for_number2 = [];
    while ($i <= $number2) {
        if ($number2 % $i === 0) {
            $dividers_for_number2[] = $i;
        }
        $i++;
    }

    $dividers_general = array_intersect($dividers_for_number1,$dividers_for_number2);
    return array_pop($dividers_general);
}