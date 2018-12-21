<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $fillable =[
        'tag','title','subtitle','page_image','meta_description','reverse_direction'
    ];

    /**
     *  多对多模型关联
     */
    public function posts()
    {
        return $this->belongsToMany('App\Models\Post','post_tag_pivot');
    }


    /**
     *  从列表中添加所需的任何标签
     */
    public static function addNeededTags(array $tags)
    {
        if (count($tags) === 0) {
            return;
        }

        $found = static::whereIn('tag',$tags)->get()->pluck('tag')->all();

        foreach (array_diff($tags,$found) as $tag) {
            static::create([
                'tag' => $tag,
                'title' => $tag,
                'subtitle' => 'Subtitle for '.$tag,
                'page_image' => '',
                'meta_description' => '',
                'reverse_direction' => false,
            ]);
        }

    }
}
