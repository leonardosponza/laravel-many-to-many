<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Tag;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tags = ['frontend','backend','laravel','vue'];

        foreach($tags as $tag){
            //istanza
            $newTag = new Tag();
            //popoliamo i dati
            $newTag->name = $tag;
            $newTag->slug = Str::slug($tag,'-');
            //salviamo
            $newTag->save();
        }
    }
}
