<?php


namespace Brain\Games\games;


use Brain\Games\Engine;
use function cli\line;
use function cli\prompt;

class Even extends Engine
{
    /**
     * Start game of even
     */
    public function Game(): void
    {
        $count = 0;
        line('Answer "yes" if the number is even, otherwise answer "no".');
        $reference = [
            'yes' => true,
            'no' => false
        ];
        do {
            $numberValue = random_int(1, 99);
            $isEven = $this->isEven($numberValue);
            line('Question: %s', $numberValue);
            $answer =  prompt('Your answer');
            if (array_key_exists($answer, $reference) && ($reference[$answer] === $isEven)) {
                $count++;
                line('Correct!');
            } else {
                break;
            }
        } while ($count < self::COUNT_ROUNDS);

        if ($count === self::COUNT_ROUNDS) {
            line('Congratulations, %s!', $this->name);
        } else {
            line('Let\'s try again, %s!', $this->name);
        }
    }

    /**
     * Check to Even
     * @param $value
     * @return bool
     */
    private function isEven($value): bool
    {
        if ($value & 1) {
            return false;
        }
        return true;
    }
}