<?php
/**
 * Created by PhpStorm.
 * User: marun
 * Date: 2018/12/19
 * Time: 9:22
 */

/**
 * 更好的显示文件大小
 */
function human_filesize($bytes, $decimals = 2)
{
    $size= ['B','KB','MB','GB','TB','PB'];
    $factor = floor((strlen($bytes) -1) / 3 ) ;

    return sprintf("%.{$decimals}f",$bytes / pow(1024,$factor)) . @$size[$factor];
}

/**
 * 判断文件是否是图片
 */
function is_image($mimeType)
{
    return starts_with($mimeType,'image/');
}

/**
 * 是否选中
 */
function checked($value)
{
    return $value ? 'checked' : '';
}

/**
 *返回图片路径
 */
function page_image($value = null)
{
    if (empty($value)) {
        $value = config('blog.page_image');
    }
    if (! starts_with($value, 'http') && $value[0] !== '/') {
        $value = config('blog.uploads.webpath') . '/' . $value;
    }

    return $value;
}