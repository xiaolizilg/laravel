<?php

namespace App\Http\Controllers\Api\User;

use App\Models\Order\Order;
use App\Models\Order\OrderInfo;
use App\Http\Controllers\Controller;
use App\Repositories\Api\Order\OrderRepository;
use App\Http\Requests\Api\User\GetOrdersRequest;
use App\Http\Requests\Api\User\StoreOrderRequest;
use App\Http\Requests\Api\User\UpdateOrderRequest;

class OrderController extends Controller
{
    protected $orders;

    public function __construct(OrderRepository $orders)
    {
        $this->orders = $orders;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(GetOrdersRequest $request)
    {
        if (2 < $request->input('status')) {
            $orders = auth()->user()->me->orders()->where('status', '>=', $request->input('status'));
        } else {
            $orders = auth()->user()->me->orders()->where(['status' => $request->input('status')]);
        }

        $orders = $orders->orderBy('id', 'desc')->paginate($request->has('p_page') ? $request->input('p_page') : 10, ['id', 'hospital', 'desc', 'money', 'total_price', 'updated_at']);

        return api(
                compact('orders')
            );
    }

    public function show(Order $order)
    {
        if (!auth()->user()->me->orders()->where(['id' => $order->id])->count()) {
            return api([], 403);
        }

        $order_infos = $order->order_infos()->get(['id', 'infoable_id', 'infoable_type', 'service_id', 'real_name', 'desc', 'price'])->map(function($item){
            $item->title = $item->infoable->title;

            unset($item->infoable);

            return $item;
        });

        $total_price = $order->total_price;
        $money       = $order->money;

        return api(
                compact('order_infos', 'total_price', 'money')
            );
    }

    public function store(StoreOrderRequest $request)
    {
        $this->orders->create(array_merge($request->all(), [
            'user_id' => auth()->user()->user_id,
            'account' => auth()->user()->name,
            'name'    => auth()->user()->me->name,
            'money'   => 5000,
            'ip'      => ip2long($request->ip()),
        ]));

        return api();
    }

    public function update(UpdateOrderRequest $request, OrderInfo $order)
    {
        if (!auth()->user()->me->orders()->where(['id' => $order->order_id])->count()) {
            return api([], 403);
        }

        $order->update([
                'real_name' => $request->input('real_name'),
                'service_id' => $request->input('service_id'),
            ]);

        return api();
    }

    public function refund(Order $order)
    {
        if (!auth()->user()->me->orders()->where(['id' => $order->id])->count()) {
            return api([], 403);
        }

        if (2 != $order->status) {
            return api('只有已付款的订单才能退款。', 3);
        }

        $order->update([
                'status' => 5,
            ]);

        return api();
    }

}
