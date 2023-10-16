<?php

namespace BrainGames\Progression;

use function BrainGames\Engine\getNumber;

function progression(): array
{
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

    $expression = implode(' ', $progressive);

    return [
        'hid' => (string)$true_answer,
        'expression' => $expression,
    ];
}
