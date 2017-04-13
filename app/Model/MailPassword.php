<?php
    namespace App\Model;
    
    use Illuminate\Database\Eloquent\Model;

    class MailPassword extends  Model
    {
        protected $table = 'mail-password';
        public $timestamps = false;

        public $fillable = ['email', 'state', 'content', 'time'];

        public static function storeMailPassword($arr)
        {
            $mailpass = new MailPassword();
            $mailpass->email = $arr['email'];
            $mailpass->state = $arr['state'];
            $mailpass->content = $arr['content'];
            $mailpass->time = $arr['time'];
            $mailpass->save();
        }

    }