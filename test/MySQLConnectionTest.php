<?php
declare(strict_types=1);

namespace App\Test;

use PDO;
use PHPUnit\Framework\TestCase;
use function printf;
use function sprintf;
use const PHP_EOL;

class MySQLConnectionTest extends TestCase
{
    /** @var mixed[] */
    private $config;

    protected function setUp() : void
    {
        parent::setUp();
        $this->config = require __DIR__ . '/../config/config.php';
    }

    /** @return mixed[] */
    private function mysqlConfig() : array
    {
        $config = $this->config['database'] ?? [];
        $config['host'] = $config['host'] ?? 'localhost';
        $config['database'] = $config['database'] ?? 'test';
        $config['port'] = $config['port'] ?? 3306;
        $config['username'] = $config['username'] ?? 'root';
        $config['password'] = $config['password'] ?? '';

        return $config;
    }

    public function testAConnectionCanBeEstablished() : void
    {
        $config = $this->mysqlConfig();
        $dsn = sprintf('mysql:dbname=%s;host=%s;port=%d', $config['database'], $config['host'], $config['port']);
        printf('Configured MySQL DSN is: %s' . PHP_EOL, $dsn);
        $pdo = new PDO($dsn, $config['username'], $config['password']);
        $statement = $pdo->query('SHOW TABLES');
        $data = $statement->fetchAll(PDO::FETCH_NUM);
        $this->assertIsArray($data);
    }
}
