@extends('admin.layout')

@section('styles')
    <link href="{{ asset('css/pickadate.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/selectize.default.css') }}" rel="stylesheet">
@stop


@section('content')
    <div class="container">
        <div class="row page-title-row">
            <div class="col-md-12">
                <h3>文章 <small>» 编辑文章</small></h3>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">文章编辑表单</h3>
                    </div>
                    <div class="card-body">
                        @include('admin.partials.success')
                        @include('admin.partials.errors')

                        <form action="{{ route('post.update',$id) }}" method="post" role="form">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <input type="hidden" name="_method" value="put">

                            @include('admin.post._form')

                            <div class="row">
                                <div class="col-md-8">
                                    <div class="form-group row">
                                        <div class="col-md-10 offset-md-2">
                                            <button type="submit" class="btn btn-primary" name="action" value="continue">
                                                <i class="fa fa-floppy-o"></i>
                                                保存-继续
                                            </button>
                                            <button type="submit" class="btn btn-success" name="action" value="finished">
                                                <i class="fa fa-floppy-o"></i>
                                                保存 - 完成
                                            </button>
                                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal-delete">
                                                <i class="fa fa-times-circle"></i>
                                                删除
                                            </button>
                                        </div>

                                    </div>

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
                <button class="close" type="button" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <p class="lead">
                    <i class="fa fa-question-circle fa-lg"></i>
                    确认要删除这篇文章吗?
                </p>
            </div>
            <div class="modal-footer">
                <form action="{{ route('post.destroy',$id) }}" method="post"></form>
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" name="_method" value="delete">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">取消</button>
                <button type="submit" class="btn btn-danger"><i class="fa fa-times-circle"></i>确定</button>

            </div>
        </div>
    </div>

</div>

@stop

@section('script')
    <script src="{{ asset('js/pickadate.min.js') }}"></script>
    <script src="{{ asset('js/selectize.min.js') }}"></script>
    <script>
        $(function() {
            $("#publish_date").pickadate({
                format: "mmm-d-yyyy"
            });
            $("#publish_time").pickatime({
                format: "h:i A"
            });
            $("#tags").selectize({
                create: true
            });
        });
    </script>
@stop