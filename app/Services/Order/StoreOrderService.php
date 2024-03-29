<?php

namespace App\Services\Order;

use App\Models\Item;
use App\Models\Order;
use App\Services\Installment\StoreInstallmentByOrderService;
use Illuminate\Support\Arr;
use App\Services\Installment\StoreInstallmentService;

class StoreOrderService
{
    protected StoreInstallmentByOrderService $storeInstallmentByOrderService;

    /**
     * @param StoreInstallmentByOrderService $storeInstallmentByOrderService
     */
    public function __construct(StoreInstallmentByOrderService $storeInstallmentByOrderService)
    {
        $this->storeInstallmentByOrderService = $storeInstallmentByOrderService;
    }

    /**
     * @param  array  $data
     *
     * @return mixed
     */
    public function run(array $data = [])
    {
        $order = Order::create($data);

        $order->client()->associate(Arr::get($data, 'client_id'));
        $order->address()->associate(Arr::get($data, 'address_id'));

        $this->insertProducts($data['products'] ?? [], $order);
        $this->insertServices($data['services'] ?? [], $order);

        $order->save();

        foreach ($data['installments'] ?? [] as $installment) {
            $this->storeInstallmentByOrderService->run($installment, $order);
        }

        return $order;
    }

    private function insertProducts($products, Order $order){
        foreach ($products as $product) {
            if(!isset($product['id'])){
                continue;
            }

            if(!isset($product['value'])){
                $itemTypeProduct = Item::find($product['id']);
            }

            $order->products()->attach($product['id'], [
                'quantity'  => isset($product['quantity']) ? $product['quantity'] : 1,
                'value'     => isset($product['value']) ? $product['value'] : $itemTypeProduct->default_value
            ]);
        }
    }

    private function insertServices($services, Order $order){
        foreach ($services as $service) {
            if(!isset($service['id'])){
                continue;
            }

            if(!isset($service['value'])){
                $itemTypeService = Item::find($service['id']);
            }

            $order->services()->attach($service['id'], [
                'quantity'  => isset($service['quantity']) ? $service['quantity'] : 1,
                'value'     => isset($service['value']) ? $service['value'] : $itemTypeService->default_value
            ]);
        }
    }


}
