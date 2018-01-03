<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class PhotosController extends Controller
{
    public function store(Request $request)
    {
        if (!$request->hasFile('file')) {
            return response()->json(['message' => '没有上传文件'], 422);
        }

        if (!$request->file->isValid()) {
            return response()->json(['message' => '文件上传过程中出错了'], 422);
        }

        //上传格式验证
        $allow = ['image/jpeg', 'image/png', 'image/gif'];
        $type = $request->file->getMimeType();
        if (!in_array($type, $allow)) {
            return response()->json(['message' => '文件类型错误，只能上传图片'], 422);
        }

        //文件大小验证
        $max_size = 1024 * 1024 * 2;
        $size = $request->file->getClientSize();
        if ($size > $max_size) {
            return response()->json(['message' => '文件大小不能超过2M'], 422);
        }

        $path = $request->file->store('public/images');
        $url = Storage::url($path);
        return response()->json(['message' => 'success', 'data' => $url], 200);
    }
}
