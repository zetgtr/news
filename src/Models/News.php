<?php

namespace News\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class News extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'url',
        'description',
        'images',
        'content',
        'show',
        'seoKeywords',
        'seoTitle',
        'seoDescription',
        'created_at',
        'access'
    ];

    protected $casts = [
        'category_id' => 'integer',
    ];

    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(Category::class, 'categories_has_news',
            'news_id', 'category_id', 'id', 'id');
    }

    public function getBredcrambs()
    {
        $bredcrambs = [
            ['title'=>'Главная','url'=>'home'],
            ['title'=>'Новости','url'=>'news']];
        $bredcrambsSecond = [...$bredcrambs, ['title'=>$this->title,'url'=>$this->url]];

        return $bredcrambsSecond;
    }

    public function getOther()
    {
        return $this::where('id','!=',$this->id)->limit(6)->inRandomOrder()->get();
    }
    public function setCountShow()
    {
        ++$this->show;
        $this->save();
    }

}
