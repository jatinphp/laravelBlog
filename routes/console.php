<?php

use Illuminate\Foundation\Inspiring;

/*
|--------------------------------------------------------------------------
| Console Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of your Closure based console
| commands. Each Closure is bound to a command instance allowing a
| simple approach to interacting with each command's IO methods.
|
*/
use App\Mail\WelcomeAgain;

use App\User;

use Illuminate\Support\Facades\Mail;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->describe('Display an inspiring quote');

Artisan::command('sendmail', function () {
    $user = User::find('1');
    \Mail::to($user)->send(new WelcomeAgain($user));
    $this->comment('Mail Send Successfully to '.$user->email);
})->describe('Display an inspiring quote');
