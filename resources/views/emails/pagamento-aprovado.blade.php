<x-mail::message>
    # Pagamento aprovado

    O pagamento do pedido {{ $order->id }} foi aprovado.

    Valor total: @money($order->total)

    Obrigado por comprar com a gente !

</x-mail::message>
