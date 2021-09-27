<?php

  

namespace App\Http\Controllers;

  

use BotMan\BotMan\BotMan;

use Illuminate\Http\Request;

use BotMan\BotMan\Messages\Incoming\Answer;

  

class BotManController extends Controller

{

    /**

     * Place your BotMan logic here.

     */

    public function handle()

    {

        $botman = app('botman');
        $botman->hears('{message}', function($botman, $message) {
            if ($message == 'hi' OR $message == 'hey' OR $message == 'hello') {
                $this->askName($botman);
            }
            elseif($message == 'hello their'){
                $botman->reply("hello");
            }

            elseif($message == 'product' OR $message == 'is that product available'){
                $botman->reply("yes sir");
            }

            elseif($message == 'deliverytime' OR $message == 'delivery'){
                $botman->reply("you will get your product with in 24 hours");
            }

            else {
                $botman->reply("How can I help you");
            }
  

        };

  

        $botman->listen();

    }

  

    /**

     * Place your BotMan logic here.

     */

    public function askName($botman)

    {

        $botman->ask('Hello! What is your Name?', function(Answer $answer) {

  

            $name = $answer->getText();

  

            $this->say('Nice to meet you '.$name);

        });

    }

}