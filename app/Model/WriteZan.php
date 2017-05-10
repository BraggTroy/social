<?php
    namespace App\Model;

    use App\Http\Controllers\Exception\TMException;
    use Illuminate\Database\Eloquent\Model;

    class WriteZan extends Model
    {
        protected $table = 'write-zan';
        public $timestamps = false;
        public $fillable = ['writeId', 'userId'];

        public static function add($writeId, $time)
        {
            $zan = new WriteZan();
            $zan->writeId = $writeId;
            $zan->userId = session('user');
            $zan->time = $time;
            $zan->state = 0;
            if ($zan->save()){
                return $zan;
            }else {
                throw  new TMException('5009');
            }
        }

        public static function getZan($writeId)
        {
            return WriteZan::where('writeId', $writeId)->where('state', '<>', 0)->get();
        }

        public function user()
        {
            return $this->belongsTo('App\Model\User', 'userId', 'id');
        }

        public static function getZanByUser($writeId)
        {
            return WriteZan::where('userId', session('user'))->where('writeId', $writeId)->first();
        }
    }