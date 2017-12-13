<?php
use \Mockery;
use PHPUnit\Framework\TestCase;
use Src\Temperature;
class TemperatureTest extends TestCase
{
    public function tearDown()
    {
        Mockery::close();
    }

    public function testGetsAverageTemperatureFromThreeServiceReadings()
    {
        $service = Mockery::mock('service');
        $service->shouldReceive('readTemp')
            ->times(4)
            ->andReturn(15, 12, 15, 18);

        $temperature = new Temperature($service);

        $this->assertEquals(15, $temperature->average());
    }
}