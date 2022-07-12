<?php

use Illuminate\Database\Seeder;
use App\Tag;
use illuminate\Support\Str;

class TagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data =['FRONT END', 'BACK END', 'UX', 'DESING', 'UPDATE'];

        foreach($data as $tag){
            $new_tag = new Tag;
            $new_tag->name = $tag;
            $new_tag->slug = Str::slug($tag, '-');
            $new_tag->save();

        }
    }
}
