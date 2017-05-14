<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\carbon;
use GrahamCampbell\Markdown\Facades\Markdown;

class Post extends Model
{
      public $dates = ["published_at"];
    public function getImageUrlAttribute($value){
        $imageurl = "";

        if (!is_null($this->image)) {
            $imagePath = public_path()."/img/".$this->image;
            if (file_exists($imagePath)) {
              $imageurl = asset("img/".$this->image);
            }
        }

        return $imageurl;
    }

    public function author(){
       return $this->belongsTo(User::class);
    }

    public function getDateAttribute(){
    return (is_null($this->published_at)) ? "" : $this->published_at->diffForHumans();

    }
    public function scopeLastestFirst(){
      return $this->orderBy("published_at","desc");
    }
    public function scopePublished(){
      return $this->where("published_at","<=",Carbon::now());
    }


    public function getExpertHtmlAttribute(){
      return  ($this->expert) ? Markdown::convertToHtml(e($this->expert)) : "" ;
    }

    public function getBodyHtmlAttribute(){
      return  ($this->body) ? Markdown::convertToHtml(e($this->body)) : "" ;
    }
}
