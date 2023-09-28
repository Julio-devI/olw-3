<?php
    namespace App\Services;

    use App\Enums\OrderStepsEnum;
    use App\Models\Order;

    class OrderService
    {
        public function update($order_id, $payment, $user): Order
        {
            Order::find($order_id);

            $order->status = OrderStepsEnum::parse();
        }
    }
