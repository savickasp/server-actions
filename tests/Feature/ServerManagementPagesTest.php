<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ServerManagementPagesTest extends TestCase
{
    public function test_server_parameters_is_loaded()
    {
        $response = $this->get('/server/parameters');

        $response->assertStatus(200);
    }

    public function test_reboot_page_is_loaded()
    {
        $response = $this->get('/server/reboot');

        $response->assertStatus(200);
    }

    public function test_reinstall_page_is_loaded()
    {
        $response = $this->get('/server/reinstall');

        $response->assertStatus(200);
    }

    public function test_change_password_page_is_loaded()
    {
        $response = $this->get('/server/password-change');

        $response->assertStatus(200);
    }

    public function test_change_hostname_page_is_loaded()
    {
        $response = $this->get('/server/hostname-change');

        $response->assertStatus(200);
    }

    public function test_web_console_page_is_loaded()
    {
        $response = $this->get('/server/web-console');

        $response->assertStatus(200);
    }
}
