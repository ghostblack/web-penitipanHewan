<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class penitipan
 * @package App\Models
 * @version September 30, 2021, 2:09 am UTC
 *
 * @property string $jenis
 */
class penitipan extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'penitipans';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'jenis'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'jenis' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    
}
