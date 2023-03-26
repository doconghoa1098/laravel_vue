<?php

namespace App\Services;

use App\Repositories\UserRepository;

/**
 * Class UserServices
 * @package App\Services
 * @version July 28, 2022, 9:32 am UTC
 * @author TIMESHEET
 */

class UserService extends BaseService
{
    /**
     * Configure the getRepository
     **/
    public function getRepository()
    {
        return UserRepository::class;
    }

    public function listUser($request)
    {
        return $this->_repository->listUser($request);
    }
}
