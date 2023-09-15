import { loadMercadoPago } from "@mercadopago/sdk-js";

export default () => ({
   async creditCardPayment() {
       await loadMercadoPago();
       const mp = new window.MercadoPago(import.meta.env.VITE_MERCADO_PAGO_PUBLIC_KEY);
   }
});
