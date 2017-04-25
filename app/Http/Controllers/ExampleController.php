<?php

namespace App\Http\Controllers;


class ExampleController extends Controller
{
    public function uppercased($word)
    {
        $data = [
            'word' => $word,
            'uppercased' => strtoupper($word),
        ];
        return view('uppercase', $data);
    }

    public function rollDice($guess)
    {
        $random = mt_rand(1, 6);

        if ($guess == $random) {
            $message = 'You guessed it!';
        } else if ($guess > $random) {
            $message = 'You guessed too high!';
        } else {
            $message = 'You guessed too low, yo!';
        }

        if(!is_numeric($guess) || ($guess > 6 || $guess < 1)) {
            $message = 'Your guess must be a number between 1 and 6';
        }

        $data = [
            'guess' => $guess,
            'random' => $random,
            'message' => $message
        ];

        return view('roll-dice', $data);
    }

    public function increment($number = 0) {
        $data = [];
        if(is_numeric($number)) {
            $data['number'] = $number + 1;
        } else {
            $data['number'] = "$number is not a number and cannot be incremented.";
        }

        return view('increment', $data);
    }

    public function addition($num1, $num2)
    {
        if(is_numeric($num1) && is_numeric($num2)) {
            return $num1 + $num2;
        }
        return 'Both parameters must be numeric.';
    }
}
