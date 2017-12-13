<?php
namespace Src;
class Temperature
{
    private $service;

    public function __construct($service)
    {
        $this->service = $service;
    }

    public function average()
    {
        $total = 0;
        for ($i=0; $i<4; $i++) {
            $total += $this->service->readTemp();
        }
        return $total/4;
    }
}