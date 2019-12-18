<?php
declare(strict_types=1);

namespace App\Test;

use PHPUnit\Framework\TestCase;
use Redis;

class RedisConnectionTest extends TestCase
{
    public function testConnectionCanBeEstablished() : void
    {
        $client = new Redis();
        $client->connect('127.0.0.1');
        $result = $client->get('foo');
        $this->assertFalse($result);
        $client->set('foo', 'bar');
        $this->assertSame('bar', $client->get('foo'));
    }
}
