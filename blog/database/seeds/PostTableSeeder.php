<?php

use Illuminate\Database\Seeder;
use Faker\Factory;
use Carbon\carbon;
use App\Post;
class PostTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      // rest the user table

      DB::table('posts')->truncate();
      //
      $posts = [];

      $facker = Factory::create();
      $date = Carbon::create(2017,5,1,9);
      for ($i=0; $i <10 ; $i++) {
        $image = "Post_image_". rand(1,5).".jpg";
        $date = $date->addDays($i);
        $published_at = clone($date);
        $created_at = clone($date);
        $post[] = [
          "author_id"=>rand(1,3),
          "title"=> $facker->sentence(rand(8,12)),
          "expert"=> $facker->text(rand(250,300)),
          "body"=> $facker->paragraphs(rand(10,15),true),
          "sulg"=> $facker->slug(),
          "image"=> rand(0,1)==1?$image:Null,
          "created_at"=> $created_at,
          "updated_at"=> $created_at,
          "published_at" => $i < 5 ? $published_at : (rand(0,1)==0?null:$published_at->addDays(4))
        ];
      }
      //insertdata
        DB::table("posts")->insert($post);
    }
}
