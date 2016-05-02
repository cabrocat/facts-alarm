<?php 

use Illuminate\Database\Eloquent\Model as Eloquent;

class Fact extends Eloquent {
    public $table = "fact";
    protected $primaryKey = 'ID';

    public $ID;
    public $Title;
    public $Text;
    public $Author;
    public $Image;

    public $timestamps = false;

    protected $fillable = ['Title', 'Text', 'Author', 'Image'];
}