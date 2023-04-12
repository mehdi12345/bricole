<?php

namespace App\Http\Livewire\Admin\Orders;

use App\Models\Order;
use App\Models\OrderInvoice;
use App\Models\OrderItem;
use Artesaos\SEOTools\Traits\SEOTools as SEOToolsTrait;
use Livewire\Component;
use Livewire\WithPagination;

class OrdersComponent extends Component
{
    use WithPagination, SEOToolsTrait;

    /**
     * Render component
     *
     * @return Illuminate\View\View
     */
    public function render()
    {
        // Seo
        $this->seo()->setTitle(setSeoTitle(__('messages.t_orders'), true));
        $this->seo()->setDescription(settings('seo')->description);

        return view('livewire.admin.orders.orders', [
            'orders' => $this->orders,
        ])->extends('livewire.admin.layout.app')->section('content');
    }

    /**
     * Get list of orders
     *
     * @return object
     */
    public function getOrdersProperty()
    {
        return Order::latest('placed_at')->paginate(42);
    }

    public function publish($id)
    {

        //->where('status', 'pending')
        // Get order
        $orderinv = OrderInvoice::where('order_id', $id)->firstOrFail();
        $orderItme = OrderItem::where('order_id', $id)->firstOrFail();
        $order = Order::where('id', $id)->firstOrFail();

        if ($orderinv) {
            $orderinv->status = "paid";
            $orderinv->save();
        }
        if ($order) {
            $order->is_finished = 1;
            $order->save();
        }
        if ($orderItme) {
            $orderItme->status = "proceeded";
            $orderItme->save();
        }

    }

    public function finished($id)
    {

        //->where('status', 'pending')
        // Get order
        $orderinv = OrderInvoice::where('order_id', $id)->firstOrFail();
        $orderItme = OrderItem::where('order_id', $id)->firstOrFail();
        $order = Order::where('id', $id)->firstOrFail();

        if ($orderinv) {
            $orderinv->status = "paid";
            $orderinv->save();
        }
        if ($order) {
            $order->is_finished = 2;
            $order->save();
        }
        if ($orderItme) {
            $orderItme->status = "finished";
            $orderItme->save();
        }

    }

}
