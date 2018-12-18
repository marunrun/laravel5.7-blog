<?php

use Illuminate\Database\Seeder;
use App\Models\Post;

class PostTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Post::truncate(); // 清理表数据
        factory(Post::class, 20)->create();  // 一次填充20篇文章

    }
}
