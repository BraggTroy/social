<?php
    namespace App\Http\Controllers\Action;

    use App\Http\Controllers\Controller;
    use App\Http\Controllers\Exception\TMException;
    use App\Model\Album;
    use App\Model\Image;
    use App\Model\User;
    use Illuminate\Http\Request;

    class PhotoController extends Controller
    {

        public function show($albumId = 0)
        {
            if ($albumId == 0) {
                $image = Image::getImagesByUser(session('user'));
            }else {
                $image = $this->getImageByAlbum($albumId);
            }
            $user = User::getUserById(session('user'));
            return view('myapp.photo', ['image'=>$image, 'user'=>$user]);
        }

        public function getAlbum($userId)
        {
            return Album::getAlbumByUser($userId);
        }

        public function getImageByAlbum($albumId)
        {
            return Image::getImagesByAlbumId($albumId);
        }

        public function getImageByTag()
        {

        }

        public function addAlbum(Request $request) {
            $album = Album::addAlbum($request->input('content'));
            echo $album['id'];
        }

        public function delAlbum(Request $request)
        {
            $image = Image::getImagesByAlbumId($request->input('id'));
            if (isset($image[0])) {
                throw new TMException('5004');
            }
            Album::delAlbum($request->input('id'));
        }

    }