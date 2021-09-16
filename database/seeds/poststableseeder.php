<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Post;
class poststableseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i = 0 ;$i < 10; $i++){
            $newpost = new Post();
            $newpost->title = 'post numero' . ($i + 1);
            $newpost->slug = Str::slug( $newpost->title,'-');
            $newpost->content = 'lorem ipsum dolor bla bla bla bla';

            $newpost->save();
        }
    }
}
