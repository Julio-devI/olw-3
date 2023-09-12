<x-app-layout>
    <div class="bg-terciary-900">
        <div class="fixed left-0 top-0 hidden lg:block h-full w-1/2 bg-terciary-900 " aria-hidden= "true"></div>
        <div class="fixed right-0 top-0 hidden lg:block h-full w-1/2 bg-terciary-800 " aria-hidden= "true"></div>

        <div class="relative mx-auto grid max-w-7xl grid-cols-1 lg:grid-cols-2 gap-x-16 lg:px-8 lg:pt-16">
            <section
                aria-labelledby="summary-heading"
                class="bg-terciary-800 py-12 md:px-10 lg:col-start-2 lg:row-start-1 lg:mx-auto lg:w-full lg:max-w-lg lg:bg-transparent lg:px-0 lg:pb-24 lg:pt-0"
            >

                <div class="mx-auto max-w-2xl px-4 lg:max-w-none lg:px-0">
                    <dl>
                        <dt class="text-lg font-medium text-primary-200">Resumo</dt>
                    </dl>
                    <x-checkout.product-list>
                        <x-checkout.product-item /> //falta adicionar os dados para serem apresentados
                    </x-checkout.product-list>

                    <dl class="space-y-6 border-t border-white border-opacity-10 pt-6 text-sm font-medium">

                        <x-checkout.summary-item title="Subtotal" value="570.00" />
                        <x-checkout.summary-item title="Frete" value="570.00" />
                        <x-checkout.summary-item title="Taxas" value="10.00" />
                        <x-checkout.summary-item title="Total" value="1150.00": isLast="true" />
                    </dl>
                </div>

            </section>

            <section
                aria-labelledby="payment-and-shipping-heading"
                class="py-16 lg:col-start-1 lg:row-start-1 lg:mx-auto lg:w-full lg:max-w-lg lg:pb-24 lg:pt-0"
            >
                <form action="">
                    <div class="mx-auto max-w-2xl px-4 lg:max-w-none lg:px-0">
                        <div class="">

                            <x-section-title title="Informacoes de contato" />

                            <div class="mt-6">
                                <label for="email-address" class="block text-sm font-medium text-white">
                                    E-mail address
                                </label>

                                <div class="mt-1">
                                    <input
                                        type="email"
                                        id="email-address"
                                        name="email"
                                        autocomplete="email"
                                        class="block w-full rounded-md text-primary-200 bg-terciary-800 border-gray-300 shadow-sm focus:border-primary-200 focus:ring-primary-200 sm:text-sm"
                                        placeholder="Digite seu e-mail"
                                    />
                                </div>
                            </div>

                            <div class="mt-10">
                                <x-section-title title="Detalhes do pagamento"/>

                                <div class="mt-6 grid-cols-3 gap-x-4 gap-y-6 sm:grid-cols-4">
                                    <div class="col-span-3 sm:col-span-4">
                                        <x-input-label for="card-number" value="Numero do cartao" />
                                        <div class="mt-1">
                                            <x-text-input
                                                type="text"
                                                id="card-number"
                                                name="card-number"
                                                placeholder="Numero do cartao"
                                            />
                                        </div>
                                    </div>

                                    <div class="col-span-2 sm:col-span-3">
                                        <x-input-label for="expiration-date" value="Data de expiração"/>
                                        <div class="mt-1">
                                            <x-text-input
                                            type="text"
                                            id="expiration-date"
                                            name="expiration-date"
                                            placeholder-="MM / AA"
                                            />
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </form>
            </section>

        </div>
    </div>
</x-app-layout><?php
