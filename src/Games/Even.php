<?php

namespace BrainGames\Even;

use function cli\line;
use function BrainGames\Engine\getNumber;
use function BrainGames\Engine\gameRound;
use function BrainGames\Engine\validateAnswer;

use const BrainGames\Engine\ROUND;

function gameEven(string $name): void
{
    $count_answer = 0;

    line('Answer "yes" if the number is even, otherwise answer "no".');

    while ($count_answer < ROUND) {
        $number = getNumber(0, 100);
        $true_answer = ($number % 2) === 0 ? 'yes' : 'no';
        $user_answer = gameRound((string) $number);
        validateAnswer($true_answer, $user_answer, $name);
        line('Correct!');
        $count_answer++;
    }

    line("Congratulations, $name!");
}

    line('Answer "yes" if the number is even, otherwise answer "no".');

    while ($count_answer < ROUND) {
        $number = get_number(0, 100);
        $true_answer = ($number % 2) === 0 ? 'yes' : 'no';
        $user_answer = game_round((string) $number);
        validate_answer($true_answer, $user_answer, $name);
        line('Correct!');
        $count_answer++;
    }

    line("Congratulations, $name!");
}
