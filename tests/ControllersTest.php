<?php

class ControllersTest extends \PHPUnit\Framework\TestCase
{
    protected $app;

    public function setUp()
    {
        $settings = require __DIR__ . '/../src/settings.php';
        $this->app = new \Slim\App($settings);
    }
    public function testCanary()
    {
        // AAA
        $this->assertTrue(true);
    }
    public function testGetHomepage()
    {
        // ARRANGE
        $twig = new Slim\Views\Twig(__DIR__ . "/../templates/");
        $logMock = $this->getMockBuilder(\Monolog\Logger::class)
            ->disableOriginalConstructor()
            ->getMock();
        $logMock->method('info')
            ->willReturn('view rendered');
        $act = new App\Controllers\HomeAction($twig, $logMock);
        $env = \Slim\Http\Environment::mock([
            'REQUEST_METHOD' => 'GET',
            'REQUEST_URI' => '/',
        ]);
        $req = \Slim\Http\Request::createFromEnvironment($env);
        $res = new \Slim\Http\Response();

        // ACT
        $res = $act($req, $res, []);

        // ASSERT
        $this->assertTrue($res->isOk());
        $this->assertContains('Welcome to', (string)$res->getBody());
        $this->assertContains('Homework #2', (string)$res->getBody());
    }

    public function test404page()
    {
        // ARRANGE and ACT
        $res = $this->app->run();

        // ASSERT
        $this->assertTrue($res->isNotFound());
        $this->assertContains("<title>Page Not Found</title>", (string)$res->getBody());
        $this->assertContains('The page you are looking for could not be found. Check the address bar', (string)$res->getBody());
    }

    public function testCookiesTemplate()
    {
        // ARRANGE
        $twig = new Slim\Views\Twig(__DIR__ . "/../templates/");
        $logMock = $this->getMockBuilder(\Monolog\Logger::class)
            ->disableOriginalConstructor()
            ->getMock();
        $logMock->method('info')
            ->willReturn('view rendered');
        $act = new App\Controllers\HomeAction($twig, $logMock);
        $env = \Slim\Http\Environment::mock([
            'REQUEST_METHOD' => 'GET',
            'REQUEST_URI' => '/',
        ]);
        $req = \Slim\Http\Request::createFromEnvironment($env);
        $res = new \Slim\Http\Response();

        // ACT
        $res = $act($req, $res, []);

        $this->assertTrue($res->isOk());
        $this->assertContains('Time: ', (string)$res->getBody());
        $this->assertContains('Time ', (string)$res->getBody());
        $this->assertContains('cookies', (string)$res->getBody());
    }
}
