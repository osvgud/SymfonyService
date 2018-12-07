<?php
/**
 * Created by PhpStorm.
 * User: osvaldas
 * Date: 18.12.7
 * Time: 21.14
 */

namespace App\Age;


class AdultCheckService
{
    public function isAdult($age)
    {
        return $age >= 18;
    }
}