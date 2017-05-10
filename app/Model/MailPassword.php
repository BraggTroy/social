<?php
    namespace App\Model;
    
    use Illuminate\Database\Eloquent\Model;

    class MailPassword extends  Model
    {
        protected $table = 'mail-password';
        public $timestamps = false;

        public $fillable = ['email', 'state', 'content', 'time'];

        public static function storeMailPassword($email, $state, $time)
        {
            $mailpass = new MailPassword();
            $mailpass->email = $email;
            $mailpass->state = $state;
            $mailpass->time = $time;
            $mailpass->save();
        }

    }