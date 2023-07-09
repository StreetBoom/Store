<?php

namespace App\Models;

use App\Filters\QueryFilter;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Orchid\Attachment\Attachable;
use Orchid\Filters\Filterable;
use Orchid\Metrics\Chartable;
use Orchid\Screen\AsSource;


class Product extends Model
{
    use HasFactory;
    use AsSource;
    use Filterable;
    use Attachable;
    use Chartable;


    protected $guarded = false;

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }


    public function orders()
    {
        return $this->belongsToMany(Order::class);
    }

    public function comments()
    {
        return $this->belongsTo(Comment::class);
    }


}
