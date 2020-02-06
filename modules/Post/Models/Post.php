<?php

namespace Modules\Post\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use Filterable;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'posts';

    /**
     * @var array
     */
    protected $fillable = [
        'lang',
        'category_id',
        'title',
        'slug',
        'image',
        'description',
        'content',
        'source',
        'attachments',
        'tags',
        'author',
        'featured',
        'created_by',
        'public_at',
        'totalhits',
        'status',
        'created_at'
    ];

    protected $filterable = [
        'title',
        'categoryId' => 'categoryid',
        'created_at'
    ];
    public $dates = ['created_at', 'updated_at', 'public_at', 'deleted_at'];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function filterTitle($query, $value)
    {

        return $query->where('title', 'LIKE', '%' . $value . '%');
    }

    public function filterDocumentType($query, $value)
    {

        return $query->where('document_type', $value);
    }

    public function filterCategoryId($query, $value)
    {

        return $query->where('category_id', $value);
    }

    public function filterStartDate($query, $value)
    {
        if ($value)
            return $query->where('created_at', '>=', Carbon::parse($value));
    }
    public function filterCreatedAt($query, $value)
    {
        if ($value) {
            $value = urldecode($value);
            $arr_time = explode(" - ", $value);
            $begintime = Carbon::createFromFormat('d/m/Y H:i', $arr_time[0] . ' 00:00')->format('Y-m-d H:i:s');
            $endtime = Carbon::createFromFormat('d/m/Y H:i', $arr_time[1] . '23:59')->format('Y-m-d H:i:s');
            return $query->where('created_at', '>=', $begintime)->where('created_at', '<=', $endtime);
        }
    }
}
