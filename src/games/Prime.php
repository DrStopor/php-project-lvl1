<?php

namespace Brain\Games\games;

use Brain\Games\Engine;

use function cli\line;
use function cli\prompt;

class Prime extends Engine
{
    public function game(): void
    {
        $count = 0;
        line('Answer "yes" if given number is prime. Otherwise answer "no".');
        do {
            $numberValueOne = random_int(0, 200);
            line('Question: %s', $numberValueOne);
            $answer =  prompt('Your answer');
            $answerArray['yes'] = 2;
            $answerArray['no'] = 0;
            $result = (int)gmp_prob_prime($numberValueOne) === 2 ? 2 : 0;
            if ($result === $answerArray[$answer]) {
                $count++;
                line('Correct!');
            } else {
                break;
            }
        } while ($count < self::COUNT_ROUNDS);

        if ($count === self::COUNT_ROUNDS) {
            line('Congratulations, %s!', $this->name);
        } else {
            $waitedAnswer = array_search($result, $answerArray, true);
            line('\'%s\' is wrong answer ;(. Correct answer was \'%s\'.', $answer, $waitedAnswer);
            line('Let\'s try again, %s!', $this->name);
        }
    }
}
