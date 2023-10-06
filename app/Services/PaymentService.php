<?php

    namespace App\Services;

    use App\Enums\OrderStepsEnum;
    use App\Enums\PaymentStatusEnum;
    use App\Mail\PaymentApprovedMail;
    use App\Models\Payment;
    use Illuminate\Support\Facades\Mail;
    use MercadoPago\Resources\Payment as MPayment;
    use MercadoPago\MercadoPagoConfig;

    class PaymentService
    {
        public function __construct()
        {
            MercadoPagoConfig::setAccessToken('payment.mercadopago.access_token');
        }

        public function udpate($external_id): void
        {
            $mp_payment = MPayment::find_by_id($external_id);
            $payment = Payment::with('order.user')->where('external_id', $external_id)->firstOrFail();

            $payment->status = PaymentStatusEnum::parse($mp_payment->status);
            $payment->save();

            if ($payment->status === PaymentStatusEnum::PAID)
            {
                $payment->approved_at = $mp_payment->date_approved;
                $payment->order->status = OrderStepsEnum::PAID;
                $payment->order->save();

                Mail::to($payment->order->user->email)->queue(new PaymentApprovedMail($payment->order));
            }

            if ($payment->status === PaymentStatusEnum::CANCELLED || $payment->status === PaymentStatusEnum::REJECTED)
            {
                $payment->order->status = OrderStepsEnum::parse($mp_payment->status);
                $payment->order->save();
            }
        }
    }
