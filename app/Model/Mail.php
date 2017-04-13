<?php
    namespace App\Model;

    use Illuminate\Database\Eloquent\Model;

    class Mail extends Model
    {
        protected $table = 'mail';
        public $timestamps = false;

        public $fillable = ['userId', 'content', 'time'];

        public static function storeMail($arr)
        {
            $mail = new Mail();
            $mail->userId = $arr['userId'];
            $mail->content = $arr['content'];
            $mail->time = $arr['time'];
            $mail->save();
        }
    }