<?php
declare(strict_types=1);

namespace App\Test;

use PDO;
use PHPUnit\Framework\TestCase;
use function sprintf;

class ConnectionTest extends TestCase
{
    /** @var mixed[] */
    private $config;

    protected function setUp() : void
    {
        parent::setUp();
        $this->config = require __DIR__ . '/../config/config.php';
    }

    public function testAConnectionCanBeEstablished() : void
    {
        $config = $this->config['database'] ?? [];
        $host = $config['host'] ?? 'localhost';
        $db = $config['database'] ?? null;
        $port = $config['port'] ?? 3306;
        $dsn = sprintf('mysql:dbname=%s;host=%s;port=%d', $db, $host, $port);
        $pdo = new PDO($dsn, $config['username'], $config['password']);
        $statement = $pdo->query('SHOW TABLES');
        $data = $statement->fetchAll(PDO::FETCH_NUM);
        $this->assertIsArray($data);
    }
}
