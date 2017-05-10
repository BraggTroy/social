<?php
namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ArticleZF extends Model
{
    protected $table = 'article-zf';
    public $timestamps = false;
    public $fillable = ['userId', 'z', 'f'];

    public function user()
    {
        return $this->hasOne('App\Model\User', 'id', 'userId');
    }

    public static function addOne($z = 0, $f = 0, $articleId)
    {
        $azf = new ArticleZF();
        $azf->userId = session('user');
        $azf->z = $z;
        $azf->f = $f;
        $azf->articleId = $articleId;
        $azf->time = time();
        $azf->save();
    }

    public static function getByUserId($articleId)
    {
        return ArticleZF::where('articleId', $articleId)->where('userId', session('user'))->first();
    }
}