<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Stat\StatRequest;
use App\Models\Stat;
use App\Models\Workspace;
use Illuminate\Http\JsonResponse;

class ApiStatController extends Controller
{
    public function store(Workspace $workspace, StatRequest $request): JsonResponse
    {
        $lastId = Stat::orderBy('id', 'desc')->first() ? Stat::orderBy('id', 'desc')->first()->id : 0;

        if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
            $remoteAddr = $_SERVER['HTTP_CLIENT_IP'];
        } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            $remoteAddr = $_SERVER['HTTP_X_FORWARDED_FOR'];
        } else {
            $remoteAddr = $_SERVER['REMOTE_ADDR'];
        }

        $httpAcceptLanguage = $_SERVER['HTTP_ACCEPT_LANGUAGE'] ?? null;
        $httpSecChUa = $_SERVER['HTTP_SEC_CH_UA'] ?? null;
        $httpSecChUaPlatform = $_SERVER['HTTP_SEC_CH_UA_PLATFORM'] ?? null;

        Stat::create([
            'stats_id' => 'stats_' . $lastId + 1,
            'report' => $request->get('report'),
            'tab' => $request->get('tab'),
            'additionalFields' => json_encode($request->get('additionalFields')),
            'remoteAddr' => $remoteAddr,
            'httpAcceptLanguage' => $httpAcceptLanguage,
            'httpUserAgent' => $_SERVER['HTTP_USER_AGENT'],
            'httpSecChUa' => $httpSecChUa,
            'httpSecChUaPlatform' => $httpSecChUaPlatform,
            'userId' => $request->get('userId'),
            'workspace' => $request->get('workspace'),
            'workspace_id' => $workspace->id,
        ]);

        return response()->json(['message' => 'Stat created'], 201);
    }
}
