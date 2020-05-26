<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\UserSocialRepository;
use App\Entities\UserSocial;
use App\Validators\UserSocialValidator;

/**
 * Class UserSocialRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class UserSocialRepositoryEloquent extends BaseRepository implements UserSocialRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return UserSocial::class;
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {

        return UserSocialValidator::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
