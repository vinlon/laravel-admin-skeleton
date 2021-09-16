<?php

namespace App;

use Illuminate\Support\Arr;
use Vinlon\Laravel\LayAdmin\AdminRole;

class AdminRoleExtend extends AdminRole
{
    //const TEST = '新角色测试';

    /**
     * @return string[]
     */
    public function getMenuIds()
    {
        $roleMenus = [
            //self::TEST => ['_my.profile', 'ops.setting', '_user'],
        ];

        return Arr::get($roleMenus, $this->value, []);
    }

    /**
     * @return string[]
     */
    public function getPrivileges()
    {
        $rolePrivileges = [
            //self::TEST => [1, 2, 3],
        ];

        return Arr::get($rolePrivileges, $this->value, []);
    }
}
