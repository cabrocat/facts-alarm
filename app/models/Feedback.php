<?php

use Illuminate\Database\Eloquent\Model as Eloquent;

class Feedback extends Eloquent
{
    public $table = "feedback";
    public $ID;
    public $FeedbackText;
    public $Category;
    public $DeviceFamily;
    public $OsVersion;
    public $SystemSku;
    public $SystemArchitecture;
    public $AppVersion;
    public $timestamps = false;
    protected $primaryKey = 'ID';
    protected $fillable = ['FeedbackText', 'Category', 'DeviceFamily', 'OsVersion', 'SystemSku', 'SystemArchitecture', 'AppVersion'];
}