<?php

namespace App\Http\Controllers;

use App\Helpers\ServerConnection;
use App\Http\Requests\HostnameChangeRequest;
use App\Http\Requests\ReinstallRequest;
use App\Http\Requests\WebConsoleRequest;

class ServerController extends Controller
{
    public function parameters()
    {
        $conn = new ServerConnection();
        $resp = $conn->getServerDetails();
        $parameters = [
            [
                'name' => 'Domain',
                'value' => $resp->domain,
            ],
            [
                'name' => 'Label',
                'value' => $resp->label,
            ],
            [
                'name' => 'OS',
                'value' => $resp->os,
            ],
            [
                'name' => 'Status',
                'value' => $resp->status,
            ],
            [
                'name' => 'CPU frequency',
                'value' => $resp->cpu_frequency,
            ],
            [
                'name' => 'CPU cores',
                'value' => $resp->cpu_cores,
            ],
            [
                'name' => 'RAM limit',
                'value' => $resp->ram_limit,
            ],
            [
                'name' => 'RAM used',
                'value' => $resp->ram_used,
            ],
            [
                'name' => 'Disk limit',
                'value' => $resp->disk_limit,
            ],
            [
                'name' => 'Disk usage',
                'value' => $resp->disk_usage,
            ],
            [
                'name' => 'BW limit',
                'value' => $resp->bw_limit,
            ],
            [
                'name' => 'BW in',
                'value' => $resp->bw_in,
            ],
            [
                'name' => 'BW out',
                'value' => $resp->bw_out,
            ],
            [
                'name' => 'Active task',
                'value' => $resp->active_task->name ?? '',
            ],
        ];
        return view('pages.server.parameters', compact('parameters'));
    }

    public function reboot()
    {
        return view('pages.server.reboot');
    }

    public function rebootConfirm()
    {
        $conn = new ServerConnection();
        $resp = $conn->serverReboot();
        $message = isset($resp->task_id) ? 'Reboot started successfully' : 'Reboot failed. Please try again';

        if (isset($resp->error)) {
            $message = reset($resp->error) . '. ' . $message;
        }
        return redirect(route('server.reboot'))
            ->with('message', $message);
    }

    public function reinstall()
    {
        $conn = new ServerConnection();
        $oss = $conn->getOS();
        return view('pages.server.reinstall', compact('oss'));
    }

    public function reinstallConfirm(ReinstallRequest $request)
    {
        $conn = new ServerConnection();
        $resp = $conn->reinstall($request->validated()['os']);
        $message = isset($resp->task_id) ? 'Server reinstall started successfully' : 'Server reinstall failed. Please try again';

        if (isset($resp->error)) {
            $message = reset($resp->error) . '. ' . $message;
        }
        return redirect(route('server.reinstall'))
            ->with('message', $message);
    }

    public function passwordChange()
    {
        return view('pages.server.password-change');
    }

    public function passwordChangeConfirm()
    {
        $conn = new ServerConnection();
        $resp = $conn->resetPassword();
        $message = isset($resp->task_id) ? 'Password reset was successful' : 'Reset failed. Please try again';

        if (isset($resp->error)) {
            $message = reset($resp->error) . '. ' . $message;
        }
        return redirect(route('server.password-change'))
            ->with('message', $message);
    }

    public function hostnameChange()
    {
        return view('pages.server.hostname-change');
    }

    public function hostnameChangeConfirm(HostnameChangeRequest $request)
    {
        $conn = new ServerConnection();
        $resp = $conn->changeHostname($request->validated()['hostname']);
        $message = isset($resp->task_id) ? 'Hostname was set successfully' : 'Change failed, please try again';

        if (isset($resp->error)) {
            $message = reset($resp->error) . '. ' . $message;
        }
        return redirect(route('server.hostname-change'))
            ->with('message', $message);
    }

    public function webConsole()
    {
        $timeouts = ['1h','3h','6h','12h','24h'];
        $whiteLabels = [true, false];
        return view('pages.server.web-console', compact('timeouts', 'whiteLabels'));
    }

    public function webConsoleConfirm(WebConsoleRequest $request)
    {
        $conn = new ServerConnection();
        $resp = $conn->launchWebConsole($request->validated()['timeout'], $request->validated()['whitelabel']);
        $message = isset($resp->task_id) ? 'Web console was started successfully' : 'Failed to start web console. Please try again';

        if (isset($resp->error)) {
            $message = reset($resp->error) . '. ' . $message;
        }
        return redirect(route('server.web-console'))
            ->with('message', $message);
    }

}
