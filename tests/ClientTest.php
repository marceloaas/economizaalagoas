<?php

namespace Economizaalagoas\Tests;

use \Economizaalagoas\Client;

class ClientTest extends \PHPUnit\Framework\TestCase
{
    public function testClient()
    {
        $this->assertInstanceOf(Client::class, new Client("AppToken"));
    }
}
