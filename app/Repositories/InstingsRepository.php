<?php

namespace App\Repositories;

use App\Models\Instings;
use App\Repositories\BaseRepository;

/**
 * Class InstingsRepository
 * @package App\Repositories
 * @version May 13, 2020, 2:52 am UTC
*/

class InstingsRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id',
        'judul',
        'materi',
        'status'
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
        return Instings::class;
    }
}
