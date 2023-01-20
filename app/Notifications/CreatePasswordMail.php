<?php

namespace App\Notifications;
use Illuminate\Bus\Queueable;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Lang;
use Illuminate\Queue\SerializesModels;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class CreatePasswordMail extends Notification implements ShouldQueue
{
    use Queueable, SerializesModels;

    public $user;
    public $token;

    public function __construct($user,$token)
    {
        // The $notifiable is already a User instance so not really necessary to pass it here
        $this->user = $user;
        $this->token = $token;
    }

    public function via($notifiable)
    {
        return ['mail'];
    }

    public function toMail($notifiable)
    {
        $email = str_replace("'",'',$this->user->email);
        $url = URL::to('/createpassword?email='.$email.'&'.'token='.$this->token);
        return (new MailMessage)
            ->subject(Lang::get('Create Password Notification'))
            ->greeting(Lang::get('Hi '.$this->user->user_name.','))
            ->line(Lang::get('You are receiving this email To Create a password for your account and to verify your email.'))
            ->action(Lang::get('Create Password'), $url)
            ->line(Lang::get('This password reset link will expire in :count minutes.', ['count' => config('auth.passwords.'.config('auth.defaults.passwords').'.expire')]));
    }

}