<?php

use Illuminate\Database\Eloquent\Model as Eloquent;

class Fact extends Eloquent
{
    public $table = "fact";
    public $ID;
    public $Title;
    public $Text;
    public $Author;
    public $Image;
    public $timestamps = false;
    protected $primaryKey = 'ID';
    protected $fillable = ['Title', 'Text', 'Author', 'Image'];
}