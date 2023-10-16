<?php

namespace BrainGames\Progression;

use function cli\line;
use function BrainGames\Engine\getNumber;
use function BrainGames\Engine\gameRound;
use function BrainGames\Engine\validateAnswer;

use const BrainGames\Engine\ROUND;

function gameProgr(string $name): void
{
    $count_answer = 0;
    line('What number is missing in the progression?');

    while ($count_answer < ROUND) {
        $number_first = getNumber(0, 100);
        $progressive_step = getNumber(1, 10);
        $progressive_length = getNumber(5, rand(5, 25));
        $progressive = [$number_first];

        for ($i = 0; $i < $progressive_length - 1; $i++) {
            $progressive[] = $number_first + $progressive_step;
            $number_first = $progressive[$i + 1];
        }

        $hint_el = rand(0, $progressive_length - 1);
        $true_answer = $progressive[$hint_el];
        $progressive[$hint_el] = '..';

        $user_answer = gameRound(implode(' ', $progressive));
        validateAnswer((string) $true_answer, $user_answer, $name);
        line('Correct!');
        $count_answer++;
    }

    line("Congratulations, $name!");
}

function progression(): array
{
    $count_answer = 0;
    line('What number is missing in the progression?');

    while ($count_answer < ROUND) {
        $number_first = get_number(0, 100);
        $progressive_step = get_number(1, 10);
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
        validate_answer((string) $true_answer, $user_answer, $name);
        line('Correct!');
        $count_answer++;
    }

    line("Congratulations, $name!");
}
