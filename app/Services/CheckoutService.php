<?php

    namespace App\Services;

    use App\Enums\OrderStepsEnum;
    use App\Exceptions\PaymentException;
    use App\Models\Order;
    use Database\Seeders\OrderSeeder;
    use MercadoPago\SDK;

    class CheckoutService {

        public function __construct()
        {
            SDK::setAccessToken(config('payment.mercadopago.access_token'));
        }

        public function loadCart(): array
        {
            $cart = Order::with('skus.product', 'skus.features')
                ->where('status', OrderStepsEnum::CART)
                ->where(function ($query) {
                    $query->where('session_id', session()->getId());
                    if (auth()->check()) {
                        $query->orWhere('user_id', auth()->user()->id);
                    }
                })->first();

            if (!$cart && config('app.env') == 'local')
            {
                $seed = new OrderSeeder();
                $seed->run(session()->getId());
                return $this->loadCart();
            }

            return $cart->toArray();
        }

        public function creditCardPayment($data)
        {
            $payment = new Payment();
            $payment->transaction_amount = (float)$data['transaction_amount'];
            $payment->token = $data['token'];
            $payment->description = $data['description'];
            $payment->installments = (int)$data['installments'];
            $payment->payment_method_id = $data['payment_method_id'];
            $payment->issuer_id = (int)$data['issuer_id'];

            $payer = new Payer();
            $payer->email = $data['payer']['email'];
            $payer->identification = array(
                "type" => $data['payer']['identification']['type'],
                "number" => $data['payer']['identification']['number']
            );
            $payer->payer = $payer;

            $payment->save();

            throw_if(
                !$payment->id || $payment->status === 'rejected',
                PaymentException::class,
                $payment?->error?->message ?? "Verifique os dados do cartao"
            );

            return $payment;
        }
    }
