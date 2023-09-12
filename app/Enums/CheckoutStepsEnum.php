<?php
    namespace App\Enums;

    enum CheckoutStepsEnum: int
    {
        case INFORMATION = 1;
        case SHIPPING = 2;
        case PAYMENT = 3;

        public function getName(): string
        {
            return match($this)
            {
                self::INFORMATION => "informações",
                self::SHIPPING => "frete",
                self::PAYMENT => "pagamento",
                default => "Status nao encontrado"
            };
        }
    }
