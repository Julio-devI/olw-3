<?php

    namespace App\Enums;
    enum PaymentMethodEnum: int
    {
        case CREDIT_CARD = 1;
        case PIX = 2;
        case BANK_SLIP = 3;

        public function getName():string
        {
            return match($this)
            {
                self::CREDIT_CARD => 'Cartão de credito',
                self::PIX => 'Pix',
                self::BANK_SLIP => 'Boleto',
                default => 'Metodo nao encontrado'
            };
        }

        public static function parse($method_name)
        {
            switch($method_name)
            {
                case 'credit_card':
                    return self::CREDIT_CARD;
                case 'bank_transfer':
                    return self::PIX;
                case 'ticket':
                    return self::BANK_SLIP;
                default:
                    return null;
            }
        }
    }
