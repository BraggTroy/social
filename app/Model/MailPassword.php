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
            $mail = self::getByEmail($email);
            if ($mail) {
                if (time() - $mail['time'] > 7200) {
                    $mail->state = 2;
                    $mail->save();

                    $mailpass = new MailPassword();
                    $mailpass->email = $email;
                    $mailpass->state = $state;
                    $mailpass->time = $time;
                    $mailpass->save();
                }else {
                    $mail->time = $time;
                    $mail->save();
                }
            }else {
                $mailpass = new MailPassword();
                $mailpass->email = $email;
                $mailpass->state = $state;
                $mailpass->time = $time;
                $mailpass->save();
            }
        }

        public static function getByEmail($email)
        {
            return MailPassword::where('email', $email)->where('state', 0)->first();
        }

    }