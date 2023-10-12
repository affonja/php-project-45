<?php

namespace BrainGames\Calc;

use function cli\line;
use function BrainGames\Engine\get_number;
use function BrainGames\Engine\game_round;
use function BrainGames\Engine\validate_answer;
use function BrainGames\Engine\get_action;

use const BrainGames\Engine\ROUND;

function game_calc(string $name): void
{
    $count_answer = 0;
    line('What is the result of the expression?');
    $true_answer = '';

    while ($count_answer < ROUND) {
        $number1 = get_number(0, 100);
        $number2 = get_number(0, 100);
        $action = get_action();

        $math_string = $number1 . ' ' . $action . ' ' . $number2;
        eval('$true_answer = ' . $math_string . ';');
        $user_answer = game_round($math_string);
        validate_answer($true_answer, $user_answer, $name);
        line('Correct!');
        $count_answer++;
    }

    line("Congratulations, $name!");
}
