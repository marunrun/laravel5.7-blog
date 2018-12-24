<div class="form-group row">
    <label for="title" class="col-md-3 col-form-label">
        标题
    </label>
    <div class="col-md-8">
        <input type="text" name="title" id="title" class="form-control" value="{{ $title }}">
    </div>
</div>

<div class="form-group row">
    <label for="subtitle" class="col-md-3 col-form-label">
        副标题
    </label>
    <div class="col-md-8">
        <input type="text" name="subtitle" id="subtitle" class="form-control" value="{{ $subtitle }}">
    </div>
</div>

<div class="form-group row">
    <label for="meta_description" class="col-md-3 col-form-label">
        描述信息
    </label>
    <div class="col-md-8">
        <textarea  class="form-control" name="meta_description" id="meta_description" rows="3">{{ $meta_description }}</textarea>
    </div>
</div>

<div class="form-group row">
    <label for="page_image" class="col-md-3 col-form-label">
        图片
    </label>
    <div class="col-md-8">
        <input type="text" name="page_image" id="page_image" class="form-control" value="{{ $page_image }}">
    </div>
</div>

<div class="form-group row">
    <label for="layout" class="col-md-3 col-form-label">
        布局
    </label>
    <div class="col-md-4">
        <input type="text" class="form-control" name="layout" id="layout" value="{{ $layout }}">
    </div>
</div>

<div class="form-group row">
    <label  class="col-md-3 col-form-label">
        排序
    </label>
    <div class="col-md-7">
        <label class="radio-inline">
            <input type="radio" name="reverse_direction" id="reverse_direction"
                @if(! $reverse_direction)
                    checked ="checked"
               @endif
                value="0"
            >
            升序
        </label>
        <label class="radio-inline">
            <input type="radio" name="reverse_direction" id="reverse_direction"
                @if($reverse_direction)
                        checked="checked"
                @endif
            value="1">
            逆序
        </label>
    </div>
</div>

