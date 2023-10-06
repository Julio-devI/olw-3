<?php

    namespace App\Services;

    use App\Enums\OrderStepsEnum;
    use App\Enums\PaymentStatusEnum;
    use App\Models\Payment;
    use MercadoPago\Resources\Payment as MPayment;
    use MercadoPago\MercadoPagoConfig;

    class PaymentServices
    {
        public function __construct()
        {
            MercadoPagoConfig::setAccessToken('payment.mercadopago.access_token');
        }

        public function udpate($external_id): Order
        {
            $mp_payment = MPayment::find_by_id($external_id);
            $payment = Payment::with('order')->where('external_id', $external_id)->findOrFail();

            $payment->status = PaymentStatusEnum::parse($mp_payment->status);
            $payment->save();

            if ($payment->status === PaymentStatusEnum::PAID)
            {
                $payment->approved_at = $mp_payment->date_approved;
                $payment->order->status = OrderStepsEnum::PAID;
                $payment->order->save();
            }

            return $order;
        }
    }
