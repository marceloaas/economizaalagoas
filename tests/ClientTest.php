<?php

namespace M91\economizaalagoas\Tests;

use M91\economizaalagoas\Client;

class ClientTest extends \PHPUnit\Framework\TestCase
{
    public function testClient()
    {
        $this->assertInstanceOf(Client::class, new Client("AppToken"));
    }
}
