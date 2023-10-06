<?php

namespace App\Http\Controllers;

use App\Http\Requests\webhookRequest;
use App\Services\PaymentService;
use Illuminate\Http\Request;

class WebhookController extends Controller
{
    public function __construct(public PaymentService $paymentService)
    {

    }

    public function index(webhookRequest $request)
    {
        $this->paymentService->update($request->data['id']);
    }
}
