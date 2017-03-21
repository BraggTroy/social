<?php
    namespace App\Http\Controllers\Upload;

    use App\Http\Controllers\Controller;
    use App\Http\Controllers\Exception\ErrorHandle;
    use App\Http\Controllers\Exception\TMException;
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Storage;
    use League\Flysystem\Exception;

    class imageUpload extends Controller
    {
        private $disk;

        public function __construct()
        {
            $this->disk = Storage::disk(config('upload.storage'));
        }

        public function upload(Request $request)
        {
            if ($request->hasFile('file')) {
                $file = $request->file('file');

                // 文件是否上传成功
                if ($file->isValid()) {

                    // 获取文件相关信息
                    $originalName = $file->getClientOriginalName(); // 文件原名
                    $ext = $file->getClientOriginalExtension();     // 扩展名
                    $realPath = $file->getRealPath();   //临时文件的绝对路径

                    // 上传文件
                    $filename = date('Y-m-d-H-i-s') . '-' . uniqid() . '.' . $ext;
                    // 使用我们新建的uploads本地存储空间（目录）
                    $bool = $this->disk->put($filename, file_get_contents($realPath));

                    if ($bool === true) {
                        $data = [];
                        $data['code'] = 1;
                        $data['filename'] = $filename;
                        return json_encode($data);
                    }
                    throw new TMException('4041');
                }
                throw new TMException('40411');
            }
        }

        public function delete(Request $request)
        {
            $name = $request->input('name');
            $bool = $this->disk->delete($name);
            if ($bool === true) {
                echo 1;
            }
//            throw new TMException('40412');
        }

    }