<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\TagCreateRequest;
use App\Models\Tag;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TagController extends Controller
{

    protected $fields =[
    'tag' => '',
    'title' => '',
    'subtitle' => '',
    'meta_description' => '',
    'page_image' => '',
    'layout' => 'blog.layouts.index',
    'reverse_direction' => '',
];

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tags = Tag::all();

        return view('admin.tag.index')->withTags($tags);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data =[];

        foreach ($this->fields as $field => $default) {
            $data[$field] = old($field,$default);
        }

        return view('admin.tag.create',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TagCreateRequest $request)
    {
        $tag = new Tag();
        foreach (array_keys($this->fields) as $field){
            $tag->$field = $request->get($field);
        }
        $tag->save();

        return redirect('/admin/tag')->with('success','标签「' . $tag->tag . '」创建成功.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
