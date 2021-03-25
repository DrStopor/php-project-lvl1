<?php

namespace Brain\Games\Cli;

use function cli\line;
use function cli\prompt;

class BrainGame {

    private $name;

    /**
     * Initialization
     */
    public function run() : void
    {
        line('Welcome ti the Brain Games!');
        $this->name = prompt('May I have your name');
        line('Hello, %s!', $this->name);
    }

    /**
     * Start game of even
     */
    public function evenGame() : void
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
            if (array_key_exists($answer,$reference) && ($reference[$answer] === $isEven)) {
                $count++;
                line('Correct!');
            } else {
                break;
            }
        } while ($count < 3);

        if ($count === 3) {
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
    private function isEven($value) : bool
    {
        if ($value & 1) {
            return false;
        }
        return true;
    }
}
