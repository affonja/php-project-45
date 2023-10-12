<?php

namespace BrainGames\Even;

use function cli\line;
use function cli\prompt;
use function BrainGames\Engine\welcome;
use function BrainGames\Engine\get_number;
use function BrainGames\Engine\game_round;
use function BrainGames\Engine\validate_answer;

use const BrainGames\Engine\ROUND;

function game_even(string $name): void
{
    $count_answer = 0;

    line('Answer "yes" if the number is even, otherwise answer "no".');

    while ($count_answer < ROUND) {
        $number = get_number(0, 100);
        $true_answer = ($number % 2) === 0 ? 'yes' : 'no';
        $user_answer = game_round($number);
        validate_answer($true_answer, $user_answer, $name);
        line('Correct!');
        $count_answer++;
    }

    line("Congratulations, $name!");
}
