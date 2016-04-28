<?php 

use Illuminate\Database\Eloquent\Model as Eloquent;

class Fact extends Eloquent {
    public $table = "fact";

    public $id;
    public $title;
    public $text;
    public $author;
    public $image;

    public $timestamps = [];

    protected $fillable = ['title', 'text', 'author', 'image'];
}