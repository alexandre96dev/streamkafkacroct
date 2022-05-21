<?php
    use PHPUnit\Framework\TestCase;
    require_once 'IpStack.php';
    class IpStackTest extends TestCase
    {  
        public function testRetornoAPIIpStack()
        {
          $ipstack = new IpStack();
          $this->assertIsArray($ipstack->getGeoLocalization('http://api.ipstack.com/200.141.167.99?access_key=1cc9fca0d7ee9e8ca26468cc9046a641'));
        }
    }
    
?>