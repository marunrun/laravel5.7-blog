<?php
/**
 * Created by PhpStorm.
 * User: marun
 * Date: 2018/12/19
 * Time: 9:22
 */

function human_filesize($bytes, $decimals = 2)
{
    $size= ['B','KB','MB','GB','TB','PB'];
    $factor = floor((strlen($bytes) -1) / 3 ) ;

    return sprintf("%.{$decimals}f",$bytes / pow(1024,$factor)) . @$size[$factor];
}

function is_image($mimeType)
{
    return starts_with($mimeType,'image/');
}