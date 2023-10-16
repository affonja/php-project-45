<?php

namespace BrainGames\Calc;

use function cli\line;
use function BrainGames\Engine\getNumber;
use function BrainGames\Engine\gameRound;
use function BrainGames\Engine\validateAnswer;
use function BrainGames\Engine\getAction;

use const BrainGames\Engine\ROUND;

function gameCalc(string $name): void
{
    $count_answer = 0;
    line('What is the result of the expression?');
    $true_answer = '';

    while ($count_answer < ROUND) {
        $number1 = getNumber(0, 100);
        $number2 = getNumber(0, 100);
        $action = getAction();

        $math_string = "$number1 $action $number2";
        $true_answer = match ($action) {
            '+' => $number1 + $number2,
            '-' => $number1 - $number2,
            '*' => $number1 * $number2,
        };

        $user_answer = gameRound($math_string);
        validateAnswer($true_answer, $user_answer, $name);
        line('Correct!');
        $count_answer++;
    }

    line("Congratulations, $name!");
}
