<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Instings
 * @package App\Models
 * @version May 13, 2020, 2:52 am UTC
 *
 * @property string $judul
 * @property string $materi
 * @property string $status
 */
class Instings extends Model
{
    public $table = 'insting';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    public $fillable = [
        'judul',
        'materi',
        'status'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id_insting' => 'string',
        'judul' => 'string',
        'materi' => 'string',
        'status' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    
}
