<?php

namespace App\Http\Controllers;

use App\Models\Servicio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use MercadoPago\Client\Preference\PreferenceClient;
use MercadoPago\MercadoPagoConfig;


class MercadoPagoController extends Controller
{
    public function index()
    {
        try {
            MercadoPagoConfig::setAccessToken(config('mercadopago.access_token'));

            //simular carrito de compras
            $servicios = Servicio::whereIn('servicio_id', [1, 2])->get();

            $items = [];
            foreach ($servicios as $servicio) {
                $items[] = [
                    'id' => $servicio->servicio_id,
                    'title' => $servicio->nombre,
                    'quantity' => 1,
                    'unit_price' => $servicio->precio,
                ];
            }

            $preferencesFactory = new PreferenceClient();
            $preference = $preferencesFactory->create([
                'items' => $items,
                'back_urls' => [
                    'success' => 'https://proreform-crunchingly-vaughn.ngrok-free.dev/mp-test/success',
                    'failure' => route('mp.test.failure'),
                    'pending' => route('mp.test.pending'),
                ],
                'auto_return' => 'approved',
            ]);

            $user = auth()->user();

            return view('mercadopago.test', [
                'servicios' => $servicios,
                'preference' => $preference,
                'MPPublicKey' => config('mercadopago.public_key'),
                'user' => $user,
            ]);
        } catch (\MercadoPago\Exceptions\MPApiException $e) {
            echo "Error en la preparación del pago: " . $e->getApiResponse()->getContent()['message'];
        } catch (\Throwable $e) {
            throw $e;
        }
    }

    public function success(Request $request)
    {
        echo "Compra exitosa. La data recibida es: ";
        dd($request->input());
    }

    public function paymentConfirmation(Request $request)
    {
        Log::info('Pago recibido: ' . collect($request->input()));
    }
}
