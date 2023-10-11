<?php

namespace BrainGames\Prime;

use function BrainGames\Engine\get_dividers;
use function BrainGames\Engine\get_number;
use function BrainGames\Engine\game_round;
use function BrainGames\Engine\validate_answer;
use function cli\line;
use function cli\prompt;
use function BrainGames\Engine\welcome;
use const BrainGames\Engine\ROUND;


function game_prime($name): void
{
    $count_answer = 0;
    line('Answer "yes" if given number is prime. Otherwise answer "no".');

    while ($count_answer < ROUND) {
        $number = get_number(2, 100);
        $dividers = get_dividers($number);
        $true_answer = count($dividers) > 2 ? 'no' : 'yes';
        $user_answer = game_round($number);
        validate_answer($true_answer, $user_answer, $name);
        line('Correct!');
        $count_answer++;
    }

    line("Congratulations, $name!");
}
