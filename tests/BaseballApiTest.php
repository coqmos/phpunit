<?php
/**
 * Created by PhpStorm.
 * User: coqmo
 * Date: 4/15/2017
 * Time: 10:28 PM
 */

use stats\BaseballApi;

class BaseballApiTest extends PHPUnit_Framework_TestCase
{
    public function setUp()
    {
        parent::setUp();
        $this->instance = BaseballApi::class;
    }

    public function tearDown()
    {
        parent::tearDown();
        unset($this->instance);
    }

    public function test_MockObject(){
        $baseball = $this->getMock('BaseballApi', array('submitAtBat'));
        $baseball->expects($this->any())
            ->method('submitAtBat')
            ->will($this->returnValue(true));
        $baseball->submitAtBat('1','bh');


    }


    public function testMockery(){
        $someVal = true;
        $mockeryMock = new \Mockery\Mock('BaseballApi');
        $mockeryMock->shouldReceive('submitAtBat')->with('1','bh')->once()->andReturn($someVal);
        $this->assertEquals($someVal, $this->instance->submitAtBat('1','bh'));
    }

}
