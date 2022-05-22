<?php

namespace App\Http\Controllers\API;

use App\Models\Order;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class OrderController extends BaseControlloer
{
    /**
     * Список заказов
     *
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        $orders = Order::all();
        return $this->sendResponse($orders->toArray());
    }

    /**
     * Сохранение нового заказа в БД
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function store(Request $request): JsonResponse
    {
        $input = $request->all();
        $validator = Validator::make($input, [
            'number'    => 'required',
            'client'    => 'required',
            'total_sum' => 'required',
            'address'   => 'required',
        ]);
        if ($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());
        }
        $input['created'] = date('Y-m-d H:i:s');
        $order = Order::create($input);
        return $this->sendResponse($order->toArray());
    }
    /**
     * Поиск заказа по ID.
     *
     * @param int $id
     * @return JsonResponse
     */
    public function show(int $id): JsonResponse
    {
        $order = Order::find($id);
        if (is_null($order)) {
            return $this->sendError('Order not found.');
        }
        return $this->sendResponse($order->toArray());
    }

    /**
     * Изменение заказа.
     *
     * @param Request $request
     * @param Order $order
     * @return JsonResponse
     */
    public function update(Request $request, Order $order): JsonResponse
    {
        $input = $request->all();
        $validator = Validator::make($input, [
            'number'    => 'required',
            'client'    => 'required',
            'total_sum' => 'required',
            'address'   => 'required',
        ]);
        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());
        }
        $order->number = $input['number'];
        $order->client = $input['client'];
        $order->total_sum = $input['total_sum'];
        $order->address = $input['address'];
        $order->save();
        return $this->sendResponse($order->toArray());
    }

    /**
     * Удаление заказа.
     *
     * @param Order $order
     * @return JsonResponse
     */
    public function destroy(Order $order): JsonResponse
    {
        $order->delete();
        return $this->sendResponse($order->toArray());
    }
}
