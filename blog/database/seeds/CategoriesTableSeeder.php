<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      // rest the user table
    //  DB::statement("set FOREIGN_KEY_CHECKS = 0");
      DB::table('categories')->truncate();
      $date = date("Y-m-d H:i:s",strtotime("2017-07-18 00:00:00 "));
      //generate 3 user authot
      DB::table('categories')->insert([
        [
          "title"=>"Web Development",
          "slug"=>"web_development",
          "created_at"=> $date,
          "updated_at"=> $date,
        ],[
          "title"=>"Web Design",
          "slug"=>"web_design",
          "created_at"=> $date,
          "updated_at"=> $date,
        ],[
          "title"=>"General",
          "slug"=>"general",
          "created_at"=> $date,
          "updated_at"=> $date,
        ],
        [
          "title"=>"DIY",
          "slug"=>"diy",
          "created_at"=> $date,
          "updated_at"=> $date,
        ],[
          "title"=>"Facebook Development",
          "slug"=>"facebook_development",
          "created_at"=> $date,
          "updated_at"=> $date,
        ]
      ]);

      for ($post_id=1; $post_id <= 10; $post_id++) {
          $category_id =rand(1,5);
          DB::table("posts")
            ->where("id",$post_id)
            ->update(["category_id"=>$category_id]);
      }

    }
}
