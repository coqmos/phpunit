<?php
/**
 * Created by PhpStorm.
 * User: coqmo
 * Date: 4/15/2017
 * Time: 10:19 PM
 */

namespace stats;


class BaseballApi
{
    /**
     * @param $playerid
     * @param $reult
     * @return bool
     */
    public function submitAtBat($playerid, $reult){
        //inser at bat in db
        return true;
    }


    /**
     * @param $playerid
     * @return bool
     */
    public function showAllStats($playerid){
        $avg = .234;
        return true;
    }

}