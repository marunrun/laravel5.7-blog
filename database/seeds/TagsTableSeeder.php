<?php
/**
 * Created by PhpStorm.
 * User: marun
 * Date: 2018/12/21
 * Time: 16:25
 */

use Illuminate\Database\Seeder;
use App\Models\Tag;


class TagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Tag::truncate();

        factory(Tag::class, 5)->create();
    }
}