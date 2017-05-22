<?php
namespace App\Http\Controllers\Action;

use App\Http\Controllers\Controller;
use App\Model\Article;
use App\Model\Image;
use App\Model\User;
use App\Model\Write;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function login(Request $request)
    {
        $name = $request->input('name');
        $pass = $request->input('pass');
        if ($name != 'admin') {
            return 0;
        }
        if ($pass != '111111') {
            return 1;
        }
        \Session::put('admin','admin');
        return 2;
    }

    public function index()
    {
        return view('admin.index');
    }

    public function book()
    {
        $user = User::adminGetUser();
        return view('admin.book', [
            'user' => $user
        ]);
    }

    public function column()
    {
        $article = Article::adminGet();
        return view('admin.column', ['article'=>$article]);
    }

    public function showArticle($id)
    {
        $article = Article::getArticleById($id);
        return view('myapp.admin_a', ['article'=>$article]);
    }

    public function list()
    {
        $image = Image::adminGetImage();
        return view('admin.list',['image'=>$image]);
    }

    public function cate()
    {
        $fen = Write::admingetFem();
        return view('admin.cate', ['fen'=>$fen]);
    }

    public function writeShow($writeId)
    {
        $write = Write::getWriteById($writeId);
        return view('myapp.admin_w', ['v' => $write]);
    }

    public function logout()
    {
        return view('admin.cate');
    }

    public function imageFj(Request $request)
    {
        $id = $request->input('id');
        Image::fj($id);
    }

    public function userFj(Request $request)
    {
        $id = $request->input('id');
        User::fj($id);
    }

    public function writeFj(Request $request)
    {
        $id = $request->input('id');
        Write::fj($id);
    }

    public function articleFj(Request $request)
    {
        $id = $request->input('id');
        Article::fj($id);
    }
}