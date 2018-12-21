<?php

namespace App\Models;

use App\Services\Markdowner;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Michelf\Markdown;

class Post extends Model
{
    protected $fillable = ['title', 'subtitle', 'content_raw', 'page_image', 'meta_description','layout', 'is_draft', 'published_at'];
    protected $dates =['published_at','created_at','updated_at','deleted_at'];
    
    
    /**
     * 与标签之间的多对多模型关联
     */
    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'post_tag_pivot');
    }

    /**
     * 增加一个唯一的slug
     */
    public function setTitleAttribute($value)
    {
        $this->attributes['title'] = $value;

        if (!$this->exists) {
            $value = uniqid(str_random(8));
            $this->setUniqueSlug($value,0);
        }
    }

    /**
     * 设置唯一的slug
     */
    protected function setUniqueSlug($title ,$extra)
    {
        $slug = str_slug($title.'-'.$extra);

        if (static::where('slug',$slug)->exists()) {
            $this->setUniqueSlug($title,$extra + 1);
            return;
        }

        $this->attributes['slug'] = $slug;
    }

    /**
     * 获取器 日期部分
     */
    public function getPublishDateAttribute($value)
    {
        return $this->published_at->format('Y-m-d');
    }

    /**
     * 获取器 时间部分
     */
    public function getPublishTimeAttribute($value)
    {
        return $this->published_at->format('g:i A');
    }

    /**
     * content_raw别名
     */
    public function getContentAttribute($value)
    {
        return $this->content_raw;
    }

    /**
     *  content_raw 是普通的文本,content_html是markdown的文本
     */
    public function setContentRawAttribute($value)
    {
        $markdown = new Markdowner();

        $this->attributes['content_raw'] = $value;
        $this->attributes['content_html'] = $markdown->toHTML($value);
    }


    /**
     * 同步标记关系根据需要添加新标记
     */
    public function syncTag(array $tags)
    {
        Tag::addNeededTags($tags);

        if (count($tags)) {
            $this->tags()->sync(
                Tag::whereIn('tag',$tags)->get()->pluck('id')->all()
            );
            return;
        }
        $this->tags()->detach();
    }

    public function url(Tag $tag = null)
    {
        $url = url('blog/' . $this->slug);

        if ($tag) {
            $url .= '?tag=' . urlencode($tag->tag);
        }

        return $url;
    }

    public function tagLinks($base = '/blog?tag=%TAG%')
    {
        $tags = $this->tags()->get()->pluck('tag')->all();
        $return = [];
        foreach ($tags as $tag) {
            $url = str_replace('%TAG%', urlencode($tag), $base);
            $return[] = '<a href="' . $url . '">' . e($tag) . '</a>';
        }
        return $return;
    }

    public function newerPost(Tag $tag = null)
    {
        $query =
            static::where('published_at','>',$this->published_at)
                ->where('published_at','<=',Carbon::now())
                ->where('is_draft',0)
                ->orderBy('published_at','asc');
        if ($tag){
            $query = $query->whereHas('tags',function ($q) use($tag){
                 $q->where('tag','=',$tag->tag);
            });
        }

        return $query->first();
    }

    public function olderPost(Tag $tag = null)
    {
        $query =
            static::where('published_at', '<', $this->published_at)
                ->where('is_draft', 0)
                ->orderBy('published_at', 'desc');
        if ($tag) {
            $query = $query->whereHas('tags', function ($q) use ($tag) {
                $q->where('tag', '=', $tag->tag);
            });
        }

        return $query->first();
    }
}
