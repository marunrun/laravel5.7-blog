@extends('admin.layout')


@section('content')

    <div class="container">
        <div class="row page-title-row">
            <div class="col-md-12">
                <h3>标签
                    <small>>>编辑标签 </small>
                </h3>
            </div>
        </div>

        <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">编辑标签表单</h3>
                        </div>
                        <div class="card-body">
                            @include('admin.partials.errors')
                            @include('admin.partials.success')

                            <form action="/admin/tag/{{ $id }}" method="post" role="form">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <input type="hidden" name="_method" value="PUT">
                                <input type="hidden" name="id" value="{{ $id }}">

                                <div class="form-group row">
                                    <label for="tag" class="col-md-3 col-form-label">标签</label>
                                    <div class="col-md-3">
                                        <p class="form-control-plaintext"> {{ $tag }}</p>
                                    </div>
                                </div>

                                @include('admin.tag._form')
                                <div class="form-group row">
                                    <div class="col-md-7 col-md-offset-3">
                                        <button type="submit" class="btn btn-primary btn-md">
                                            <i class="fa fa-save"></i>
                                            保存修改
                                        </button>
                                        <button type="button" class="btn btn-danger btn-md" data-toggle="modal"
                                        data-target="#modal-delete">
                                            <i class="fa fa-times-circle"></i>
                                            删除
                                        </button>
                                    </div>
                                </div>

                            </form>
                            
                        </div>
                    </div>
                </div>
        </div>

    </div>

    {{-- 确认删除 --}}
        <div class="modal fade" id="modal-delete" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">请确认</h4>
                        <button type="button" class="close" data-dismiss="modal">
                            x
                        </button>
                    </div>
                    <div class="modal-body">
                        <p class="lead">
                            <i class="fa fa-question-circle fa-lg"></i>
                            确定要删除这个标签吗?
                        </p>
                        <div class="modal-footer">
                            <form action="/admin/tag/{{ $id }}" method="post">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <input type="hidden" name="_method" value="delete">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">取消</button>
                                <button type="submit" class="btn btn-danger">
                                    <i class="fa fa-times-circle"></i>确认
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@stop