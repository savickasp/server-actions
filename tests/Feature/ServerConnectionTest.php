<?php

namespace Tests\Feature;

use App\Helpers\ServerConnection;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ServerConnectionTest extends TestCase
{
    public function test_get_server_details()
    {
        $conn = new ServerConnection();
        $this->assertInstanceOf(\stdClass::class, $conn->getServerDetails());
    }

    public function test_server_reboot()
    {
        $conn = new ServerConnection();
        $this->assertInstanceOf(\stdClass::class, $conn->serverReboot());
    }

    public function test_get_os()
    {
        $conn = new ServerConnection();
        $this->assertTrue(is_array($conn->getOS()));
    }

    public function test_reinstall()
    {
        $conn = new ServerConnection();
        $this->assertInstanceOf(\stdClass::class, $conn->reinstall('os'));
    }

    public function test_reset_password()
    {
        $conn = new ServerConnection();
        $this->assertInstanceOf(\stdClass::class, $conn->resetPassword());
    }

    public function test_change_hostname()
    {
        $conn = new ServerConnection();
        $this->assertInstanceOf(\stdClass::class, $conn->changeHostname('name'));
    }

    public function test_launch_web_console()
    {
        $conn = new ServerConnection();
        $this->assertInstanceOf(\stdClass::class, $conn->launchWebConsole('1h', true));
    }
}
