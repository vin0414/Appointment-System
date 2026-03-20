<?php

namespace App\Services;
use Illuminate\Support\Facades\Auth;
use App\Models\Logs;

class LogService
{
    public function saveLogs($action, $ip, $agent)
    {
        Logs::create([
            'id'=>Auth::id(),
            'activities'=>$action,
            'ip_address'=>$ip,
            'user_agent'=>$agent
            ]);
    }
}
