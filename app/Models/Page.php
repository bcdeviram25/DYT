<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    use HasFactory;

    protected $fillable = [
        'page_name',
        'banner_image',
        'page_title',
        'page_type',
        'related_page',
        'page_style',
        'link',
        'description',
        'order_number',
        'is_visible',
    ];

    public function related()
    {
        return $this->belongsTo(Page::class, 'related_page');
    }
}
