{{-- 创建目录 --}}
<div class="modal fade" id="modal-folder-create">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="/admin/upload/folder" method="post" class="form-horizontal">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" name="folder" value="{{ $folder }}">
                <div class="modal-header">
                    <h4 class="modal-title">创建新目录</h4>
                    <button type="button" class="close" data-dismiss="modal">
                        x
                    </button>
                </div>

                <div class="modal-body">
                    <div class="form-group row">
                        <label for="new_folder_name" class="col-sm-3 col-form-label">
                            目录名
                        </label>
                        <div class="col-sm-8">
                            <input type="text" name="new_folder" id="new_folder_name" class="form-control">
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">
                        取消
                    </button>
                    <button type="submit" class="btn btn-primary">
                        创建新目录
                    </button>
                </div>

            </form>
        </div>

    </div>
</div>


{{-- 删除文件 --}}
<div class="modal fade" id="modal-file-delete">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">请确认</h4>
                <button class="close" data-dismiss="modal">x</button>
            </div>
            <div class="modal-body">
                <p class="lead">
                    <i class="fa fa-question-circle fa-lg"></i>
                    确定要删除
                    <kbd><span id="delete-file-name1">file</span></kbd>
                    这个文件吗?
                </p>
            </div>
            <div class="modal-footer">
                <form role="form" action="/admin/upload/file" method="post">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="hidden" name="_method" value="DELETE">
                    <input type="hidden" name="folder" value="{{ $folder }}">
                    <input type="hidden" name="del_file" id="delete-file-name2">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">
                        取消
                    </button>
                    <button type="submit" class="btn btn-danger">删除文件</button>
                </form>
            </div>

        </div>

    </div>
</div>

{{-- 删除目录 --}}
<div class="modal fade" id="modal-folder-delete">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">请确认</h4>
                <button class="close" data-dismiss="modal">x</button>
            </div>
            <div class="modal-body">
                <p class="lead">
                    <i class="fa fa-question-circle fa-lg"></i>
                    确定要删除
                    <kbd><span id="delete-folder-name1">file</span></kbd>
                    这个目录吗?
                </p>
            </div>
            <div class="modal-footer">
                <form role="form" action="/admin/upload/folder" method="post">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="hidden" name="_method" value="DELETE">
                    <input type="hidden" name="folder" value="{{ $folder }}">
                    <input type="hidden" name="del_folder" id="delete-folder-name2">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">
                        取消
                    </button>
                    <button type="submit" class="btn btn-danger">删除目录</button>
                </form>
            </div>

        </div>

    </div>
</div>


{{-- 上传文件 --}}
<div class="modal fade" id="modal-file-upload">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="/admin/upload/file" method="post" enctype="multipart/form-data">

                <div class="modal-header">
                    <h4 class="modal-title">上传新文件</h4>
                    <button class="close" type="button" data-dismiss="modal">x</button>
                </div>

                <div class="modal-body">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="hidden" name="folder" value="{{ $folder }}">
                    <div class="form-group row">
                        <label for="file" class="col-sm-3 col-form-label">
                            文件
                        </label>
                        <div class="col-sm-8">
                            <input type="file" name="file" id="file">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="file_name" class="col-sm-3 col-form-label">
                            文件名(可选)
                        </label>
                        <div class="col-sm-8">
                            <input type="text" name="file_name" id="file_name" class="form-control">
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">
                        取消
                    </button>
                    <button type="submit" class="btn btn-primary">
                        上传文件
                    </button>
                </div>

            </form>

        </div>
    </div>

</div>


{{-- 浏览图片 --}}
<div class="modal fade" id="modal-image-view">
    <div class="modal-dialog">

        <div class="modal-content">

            <div class="modal-header">
                <h4 class="modal-title">图片预览</h4>
                <button class="close" data-dismiss="modal" type="button">x</button>
            </div>

            <div class="modal-body">
                <img src="x" class="image-responsive center-block" id="preview-image" alt="">
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">
                    取消
                </button>

            </div>
        </div>

    </div>
</div>