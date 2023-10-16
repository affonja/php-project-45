<?php

namespace BrainGames\Prime;

use function BrainGames\Engine\getDividers;
use function BrainGames\Engine\getNumber;
use function BrainGames\Engine\gameRound;
use function BrainGames\Engine\validateAnswer;
use function cli\line;

use const BrainGames\Engine\ROUND;

function gamePrime(string $name): void
{
    $count_answer = 0;
    line('Answer "yes" if given number is prime. Otherwise answer "no".');

    while ($count_answer < ROUND) {
        $number = getNumber(2, 100);
        $dividers = getDividers($number);
        $true_answer = count($dividers) > 2 ? 'no' : 'yes';
        $user_answer = gameRound((string) $number);
        validateAnswer($true_answer, $user_answer, $name);
        line('Correct!');
        $count_answer++;
    }

    line("Congratulations, $name!");
}

function prime(): array
{
    $count_answer = 0;
    line('Answer "yes" if given number is prime. Otherwise answer "no".');

    while ($count_answer < ROUND) {
        $number = get_number(2, 100);
        $dividers = get_dividers($number);
        $true_answer = count($dividers) > 2 ? 'no' : 'yes';
        $user_answer = game_round((string) $number);
        validate_answer($true_answer, $user_answer, $name);
        line('Correct!');
        $count_answer++;
    }

    line("Congratulations, $name!");
}
