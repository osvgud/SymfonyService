<?php

namespace App\Age;

class AgeCalculateService
{
    public function calculate($date){
        $birthdate = new \DateTime($date);
        $now = new \DateTime();

        $diff = $birthdate->diff($now);

        return trim($diff->format('%R%y'),"+");
    }

}