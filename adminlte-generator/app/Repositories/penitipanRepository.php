<?php

namespace App\Repositories;

use App\Models\penitipan;
use App\Repositories\BaseRepository;

/**
 * Class penitipanRepository
 * @package App\Repositories
 * @version September 30, 2021, 2:09 am UTC
*/

class penitipanRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'jenis'
    ];

    /**
     * Return searchable fields
     *
     * @return array
     */
    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }

    /**
     * Configure the Model
     **/
    public function model()
    {
        return penitipan::class;
    }
}
