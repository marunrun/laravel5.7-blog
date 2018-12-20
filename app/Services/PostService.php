<?php
/**
 * Created by PhpStorm.
 * User: marun
 * Date: 2018/12/20
 * Time: 10:03
 */

namespace App\Services;


use App\Models\Post;
use Carbon\Carbon;

class PostService
{
    protected $tag;

    public function __construct($tag)
    {
        $this->tag = $tag;
    }

    public function lists()
    {
        if ($this->tag) {
            return $this->tagIndexData($this->tag);
        }
        return $this->normalIndexData();
    }

    public function normalIndexData()
    {
        $posts = Post::with('tags')
            ->where('published_at','<=',Carbon::now())
            ->where('is_draft',0);
    }

    public function tagIndexData()
    {
        
    }
}