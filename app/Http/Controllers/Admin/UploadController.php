<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\UploadFileRequest;
use App\Http\Requests\UploadNewFolderRequest;
use App\Services\UploadsManager;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UploadController extends Controller
{
    protected $manager;

    public function __construct(UploadsManager $manager)
    {
        $this->manager = $manager;
    }

    public function index(Request $request)
    {
        $folder = $request->get('folder');

        $data = $this->manager->folderInfo($folder);

        return view('admin.upload.index', $data);
    }

    /**
     * 上传文件
     */
    public function uploadFile(UploadFileRequest $request)
    {
        $file = $request->file('file');
        $file_name = $request->get('file_name');
        $file_name = $file_name ? $file_name . '.' . $file->extension() : $file->getClientOriginalName();
        $path = str_finish($request->get('folder'), '/') . $file_name;
        $content = $file->get();

        $res = $this->manager->uploadFile($path, $content);

        if ($res === true) {
            return redirect()
                ->back()
                ->with('success', '文件「' . $file_name . '」已上传.');
        }

        $error = $res ?: '文件上传失败';
        return redirect()
            ->back()
            ->withErrors([$error]);
    }

    /**
     * 删除文件
     */
    public function deleteFile(Request $request)
    {
        $del_file = $request->get('del_file');

        $path = $request->get('folder') . '/' . $del_file;

        $res = $this->manager->deleteFile($path);

        if ($res === true) {
            return redirect()
                ->back()
                ->with('success', '文件「' . $del_file . '」已删除.');
        }

        $error = $res ?: '文件删除失败';
        return redirect()
            ->back()
            ->withErrors([$error]);
    }


    /**
     * 新建文件夹
     */
    public function createFolder(UploadNewFolderRequest $request)
    {
        $new_folder = $request->get('new_folder');
        $folder = $request->get('folder') . '/' . $new_folder;

        $result = $this->manager->createDirectory($folder);

        if ($result === true) {
            return redirect()
                ->back()
                ->with('success', '目录「' . $new_folder . '」创建成功.');
        }

        $error = $result ?: "创建目录出错.";
        return redirect()
            ->back()
            ->withErrors([$error]);
    }

    /**
     * 删除文件夹
     */
    public function deleteFolder(Request $request)
    {
        $del_folder = $request->get('del_folder');

        $folder = $request->get('folder') . '/' . $del_folder;
        $res = $this->manager->deleteDirectory($folder);

        if ($res === true) {
            return redirect()
                ->back()
                ->with('success', '目录「' . $del_folder . '」删除成功.');
        }

        $error = $res ?: '目录删除失败';
        return redirect()
            ->back()
            ->withErrors([$error]);
    }

}
