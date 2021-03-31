<?php


namespace Brain\Games\games;


use Brain\Games\Engine;
use function cli\line;
use function cli\prompt;

class Gcd extends Engine
{
    public function game(): void
    {
        $count = 0;
        line('Find the greatest common divisor of given numbers.');
        do {
            $numberValueOne = random_int(0, 99);
            $numberValueTwo = random_int(0, 99);
            line('Question: %s %s', $numberValueOne,$numberValueTwo);
            $answer =  prompt('Your answer');
            $result = (int)gmp_gcd($numberValueOne, $numberValueTwo);
            if ((int)$answer === $result) {
                $count++;
                line('Correct!');
            } else {
                break;
            }
        } while ($count < self::COUNT_ROUNDS);

        if ($count === self::COUNT_ROUNDS) {
            line('Congratulations, %s!', $this->name);
        } else {
            line('\'%s\' is wrong answer ;(. Correct answer was \'%s\'.', $answer, $result);
            line('Let\'s try again, $s!', $this->name);
        }
    }
}