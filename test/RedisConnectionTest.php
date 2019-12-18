<?php
declare(strict_types=1);

namespace App\Test;

use PHPUnit\Framework\TestCase;
use Redis;

class RedisConnectionTest extends TestCase
{
    /** @var mixed[] */
    private $config;

    protected function setUp() : void
    {
        parent::setUp();
        $this->config = require __DIR__ . '/../config/config.php';
    }

    /** @return mixed[] */
    private function redisConfig() : array
    {
        $config = $this->config['redis'] ?? [];
        $config['host'] = $config['host'] ?? '127.0.0.1';
        $config['database'] = $config['database'] ?? 0;
        $config['port'] = $config['port'] ?? 6379;
        $config['password'] = $config['password'] ?? null;

        return $config;
    }

    public function testConnectionCanBeEstablished() : void
    {
        $config = $this->redisConfig();
        $client = new Redis();
        $client->connect($config['host'], (int) $config['port']);
        $client->select((int) $config['database']);
        if (! empty($config['password'])) {
            $client->auth($config['password']);
        }

        $client->set('foo', 'bar');
        $this->assertSame('bar', $client->get('foo'));
    }
}
