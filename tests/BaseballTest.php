<?php
/**
 * Created by PhpStorm.
 * User: coqmo
 * Date: 4/15/2017
 * Time: 3:36 PM
 */

use stats\Baseball;

class BaseballTest extends PHPUnit_Framework_TestCase
{

    public function setUp()
    {
        parent::setUp();
        require_once ('stats/Baseball.php');
        $this->instance = new Baseball();
    }

    public function tearDown()
    {
        parent::tearDown();
        unset($this->instance);
    }

    /**
     * @param $atbats
     * @param $hits
     * @covers Baseball::calc_avg()
     * @dataProvider providerCalcArgs
     */
    public function testCalc($atbats, $hits){
        $reult = $this->instance->calc_avg($atbats, $hits);
        if(is_int($atbats) && is_int($hits)){

            $formatexpectedresult = number_format($hits/$atbats,3);
        }else
            $formatexpectedresult =  0.00;


        $this->assertEquals($reult, $formatexpectedresult);
    }


    //Creates Data Providers to the test function
    public function providerCalcArgs(){
        return array(
            array('389', '129'),
            array('something', 129),
            array(365,'something'),
            array('someting', 'somestring')
        );
    }

    /**
     * @param $val1
     * @param $val2
     * @dataProvider providerSubArgs
     */
    public function testSub($val1, $val2){
        $ans = $val1 - $val2;
        $this->assertEquals($ans, $this->invokeMethod($this->instance, 'sub', array($val1, $val2)));
    }

    public function providerSubArgs(){
        return array(
            array('389', '129'),
            array('something', 129),
            array(365,'something'),
            array('someting', 'somestring')
        );
    }



    //Acessing a private method with a reflection class

    /**
     * @param $object
     * @param $methodName
     * @param array $parameters
     * @return  object
     */
    public function invokeMethod(&$object, $methodName, array $parameters = array()){
        $reflection = new \ReflectionClass(get_class($object));
        $method = $reflection->getMethod($methodName);
        $method->setAccessible(true);
        return $method->invokeArgs($object, $parameters);
    }

}
