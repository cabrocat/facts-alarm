<?php

use Illuminate\Database\Eloquent\Model as Eloquent;

class PendingFact extends Eloquent
{
    public $table = "pendingfact";
    public $ID;
    public $Title;
    public $Text;
    public $Author;
    public $Image;
    public $Language;
    public $timestamps = false;
    protected $primaryKey = 'ID';
    protected $fillable = ['Title', 'Text', 'Author', 'Image', 'Language'];
}