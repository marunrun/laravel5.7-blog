<?php
/**
 * Created by PhpStorm.
 * User: marun
 * Date: 2018/12/20
 * Time: 10:21
 */

namespace App\Services;


use Michelf\MarkdownExtra;
use Michelf\SmartyPants;

class Markdowner
{
    public function toHTML($text)
    {
        $text = $this->preTransformText($text);
        $text = MarkdownExtra::defaultTransform($text);
        $text = SmartyPants::defaultTransform($text);
        $text = $this->postTransformText($text);

        return $text;
    }


    protected function preTransformText ($text)
    {
        return $text;
    }

    protected function postTransformText($text)
    {
        return $text;
    }
}