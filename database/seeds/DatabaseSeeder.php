<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();  // 关闭模型保护
        // $this->call(UsersTableSeeder::class);
        $this->call(TagsTableSeeder::class);
        $this->call(PostTableSeeder::class);

        Model::reguard();
    }
}
