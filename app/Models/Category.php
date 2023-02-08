<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Collection;

class Category extends Model
{
    use HasFactory;

    protected $table = 'categories';

    protected $fillable = [
        'title',
        'description',
    ];

    protected $casts = [
        'news_id' => 'array',
    ];

    public function news(): BelongsToMany
    {
        return $this->belongsToMany(News::class, 'category_has_news',
            'category_id', 'news_id',
            'id', 'id');
    }

    public function getCategories(): Collection
    {
       return DB::table($this->table)->select(['id', 'title', 'description', 'created_at', 'updated_at'])->get();
    }
}
