<?php

namespace News\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Settings extends Model
{
    use HasFactory;

    protected $table = 'news_settings';
    protected $fillable = [
        'title','url','seoKeywords','seoTitle','seoDescription','id'
    ];
}
