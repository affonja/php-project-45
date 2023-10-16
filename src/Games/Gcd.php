<?php

namespace BrainGames\Gcd;

use function BrainGames\Engine\get_dividers;
use function cli\line;
use function BrainGames\Engine\getNumber;
use function BrainGames\Engine\gameRound;
use function BrainGames\Engine\validateAnswer;

use const BrainGames\Engine\ROUND;

function gameGcd(string $name): void
{
    $count_answer = 0;
    line('Find the greatest common divisor of given numbers.');

    while ($count_answer < ROUND) {
        $number1 = getNumber(1, 100);
        $number2 = getNumber(1, 100);

        $true_answer = getGcd($number1, $number2);
        $user_answer = gameRound("$number1 $number2");
        validateAnswer($true_answer, $user_answer, $name);
        line('Correct!');
        $count_answer++;
    }

    line("Congratulations, $name!");
}

function getGcd(int $number1, int $number2)
{
    $dividers_for_number1 = getDividers($number1);
    $dividers_for_number2 = getDividers($number2);

    $dividers_general = array_intersect($dividers_for_number1, $dividers_for_number2);
    return array_pop($dividers_general);
}
