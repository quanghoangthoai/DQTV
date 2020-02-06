<?php

namespace Modules\Page\Models;

use Illuminate\Database\Eloquent\Model;
use System\Core\Traits\Filterable;

class Page extends Model
{
    protected $table = 'pages';
    use Filterable;
    protected $fillable = [
        'title',
        'slug',
        'description',
        'content',
        'image',
        'status',
        'order',
        'created_at'
    ];

    protected $filterable = [
        'title',
        'status'
    ];
    
    public function filterTitle($query, $value)
    {
        return $query->where('title', 'LIKE', '%' . $value . '%');
    }

    public function filterStatus($query, $value)
    {
        return $query->where('status', '=',  $value);
    }
}