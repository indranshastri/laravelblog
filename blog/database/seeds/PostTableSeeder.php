<?php

use Illuminate\Database\Seeder;
use Faker\Factory;
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
      for ($i=0; $i <10 ; $i++) {
        $image = "Post_image_". rand(1,5).".jpg";
        $date = date("Y-m-d H:i:s",strtotime("2017-05-05 00:00:00 +$i days"));
        $post[] = [
          "author_id"=>rand(1,3),
          "title"=> $facker->sentence(rand(8,12)),
          "expert"=> $facker->text(rand(250,300)),
          "body"=> $facker->paragraphs(rand(10,15),true),
          "sulg"=> $facker->slug(),
          "image"=> rand(0,1)==1?$image:Null,
          "created_at"=> $date,
          "updated_at"=> $date,
        ];
      }
      //insertdata
        DB::table("posts")->insert($post);
    }
}
