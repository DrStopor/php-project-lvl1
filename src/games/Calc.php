<?php


namespace Brain\Games\games;


use Brain\Games\Engine;
use function cli\line;
use function cli\prompt;

class Calc extends Engine
{
    /**
     * Start game of Calc
     */
    public function Game(): void
    {
        $count = 0;
        line('What is the result of the expression?');
        $reference = [
            'yes' => true,
            'no' => false
        ];
        do {
            $numberValueOne = random_int(0, 99);
            $numberValueTwo = random_int(0, 99);
            $operation = $this->getRandomOperation();
            line('Question: %s %s %s', $numberValueOne, $operation, $numberValueTwo);
            $answer =  prompt('Your answer');
            $result = $this->mathResult($numberValueOne, $numberValueTwo, $operation);
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
            line('\'%s\' is wrong answer ;(. Correct answer was \'%s\'.', $result, $result);
            line('Let\'s try again, $s!', $this->name);
        }
    }

    private function mathResult(int $a, int $b, string $operation): int
    {
        $result = 0;
        switch ($operation) {
            case '-':
                $result = $a - $b;
                break;
            case '+':
                $result = $a + $b;
                break;
            case '*':
                $result = $a * $b;
                break;
        }
        return $result;
    }

    private function getRandomOperation(): string
    {
        $range = random_int(0,2);
        switch ($range) {
            case 0:
                return '-';
            case 1:
                return '+';
            case 2:
                return '*';
        }
    }
}