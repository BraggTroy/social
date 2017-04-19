<?php
    namespace App\Model;

    use App\Http\Controllers\Exception\TMException;
    use Illuminate\Database\Eloquent\Model;

    class WriteZan extends Model
    {
        protected $table = 'write-zan';
        public $timestamps = false;
        public $fillable = ['writeId', 'userId'];

        public static function add($writeId, $userId)
        {
            $zan = new WriteZan();
            $zan->writeId = $writeId;
            $zan->userId = $userId;
            if ($zan->save()){
                return $zan;
            }else {
                throw  new TMException('5009');
            }
        }

        public static function getZan($writeId)
        {
            return WriteZan::where('writeId', $writeId)->get();
        }

        public function user()
        {
            return $this->belongsTo('App\Model\User', 'userId', 'id');
        }
    }