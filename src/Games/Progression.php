<?php

namespace BrainGames\Progression;

use function cli\line;
use function cli\prompt;
use function BrainGames\Engine\welcome;
use const BrainGames\Engine\ROUND;
use function BrainGames\Engine\get_number;
use function BrainGames\Engine\game_round;
use function BrainGames\Engine\validate_answer;

function game_progr($name): void
{
    $count_answer = 0;
    line('What number is missing in the progression?');

    while ($count_answer < ROUND) {
        $number_first = get_number(0, 100);
        $progressive_step = get_number(0, 10);
        $progressive_length = get_number(5, rand(5, 25));
        $progressive = [$number_first];

        for ($i = 0; $i < $progressive_length - 1; $i++) {
            $progressive[] = $number_first + $progressive_step;
            $number_first = $progressive[$i + 1];
        }

        $hint_el = rand(0, $progressive_length - 1);
        $true_answer = $progressive[$hint_el];
        $progressive[$hint_el] = '..';

        $user_answer = game_round(implode(' ', $progressive));
        validate_answer($true_answer, $user_answer, $name);
        line('Correct!');
        $count_answer++;
    }

    line("Congratulations, $name!");
}