<?php
/**
 * Created by PhpStorm.
 * User: coqmo
 * Date: 4/15/2017
 * Time: 3:14 PM
 */

namespace stats;


class Baseball
{
    public function calc_avg($ab, $hits){
        $avg = 0.00;
        if(is_int($ab) && is_int($hits)){
            $avg = $this/$hits;
        }
        return $avg;
    }

    private function sub($val1, $val2){
        return $val1-$val2;
    }

}