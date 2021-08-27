<?php


namespace App\Helpers;


use GuzzleHttp\Client;

class ServerConnection
{
    protected $server_id;
    protected $client;

    public function __construct()
    {
        $details = config('server-configuration');

        // Check if configuration is valid
        abort_if($details === null, 404, 'Server configuration not found');
        abort_unless(is_string($details['base_url']), 404, 'base_url wrong format');
        abort_unless(is_string($details['username']), 404, 'username wrong format');
        abort_unless(is_string($details['password']), 404, 'password wrong format');
        abort_unless(is_numeric($details['server_id']), 404, 'server_id wrong format');

        // Create Client instance and set server_id from config
        $this->client = new Client([
            'verify' => false,
            'base_uri' => $details['base_url'],
            'auth' => [$details['username'], $details['password']]
        ]);
        $this->server_id = $details['server_id'];
    }

    public function getServerDetails(): \stdClass
    {
        $resp = $this->client->get('server/'.$this->server_id);
        return json_decode($resp->getBody()->getContents());
    }

    public function serverReboot(): \stdClass
    {
        $resp = $this->client->post('server/'.$this->server_id.'/reboot');
        return json_decode($resp->getBody()->getContents());
    }

    public function getOS(): array
    {
        $resp = $this->client->get('server/'.$this->server_id.'/oses');
        return json_decode($resp->getBody()->getContents());
    }

    public function reinstall(string $os, string $script = null, string $sshKey = null): \stdClass
    {
        $resp = $this->client->post('server/'.$this->server_id.'/reinstall', [
            'json' => [
                'os' => $os,
                'script' => $script,
                'ssh_key' => $sshKey,
            ],
        ]);
        return json_decode($resp->getBody()->getContents());
    }

    public function resetPassword(): \stdClass
    {
        $resp = $this->client->post('server/'.$this->server_id.'/resetpassword');
        return json_decode($resp->getBody()->getContents());
    }

    public function changeHostname(string $hostname): \stdClass
    {
        $resp = $this->client->post('server/'.$this->server_id.'/rename', [
            'json' => [
                'hostname' => $hostname,
            ],
        ]);
        return json_decode($resp->getBody()->getContents());
    }

    public function launchWebConsole(string $timeout, bool $whiteLabel): \stdClass
    {
        $resp = $this->client->post('server/'.$this->server_id.'/webconsole', [
            'json' => [
                'timeout' => $timeout,
                'whitelabel' => $whiteLabel,
            ],
        ]);
        return json_decode($resp->getBody()->getContents());
    }
}
