<?php

namespace App\Http\Controllers;

use App\Http\Requests\webhookRequest;
use Illuminate\Http\Request;

class WebhookController extends Controller
{
    public function index(webhookRequest $request)
    {
        $request->all();
    }
}
