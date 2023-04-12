<?php

namespace App\Http\Livewire\Admin\Orders\Options;

use App\Models\Order;
use App\Models\OrderInvoice;
use App\Models\OrderItem;
use Artesaos\SEOTools\Traits\SEOTools as SEOToolsTrait;
use Livewire\Component;

class DetailsComponent extends Component
{
    use SEOToolsTrait;

    public $order;

    /**
     * Init component
     *
     * @param string $id
     * @return void
     */
    public function mount($id)
    {
        // Get order
        $order = Order::where('uid', $id)->firstOrFail();

        // Set order
        $this->order = $order;
    }

    /**
     * Render component
     *
     * @return Illuminate\View\View
     */
    public function render()
    {
        // Seo
        $this->seo()->setTitle(setSeoTitle(__('messages.t_order_details'), true));
        $this->seo()->setDescription(settings('seo')->description);

        return view('livewire.admin.orders.options.details')->extends('livewire.admin.layout.app')->section('content');
    }

    public function publish()
    {
        //->where('status', 'pending')
        // Get order
        $orderinv = OrderInvoice::where('order_id', $this->order->id)->firstOrFail();
        $orderItme = OrderItem::where('order_id', $this->order->id)->firstOrFail();

        if ($orderinv) {
            $orderinv->status = "paid";
            $orderinv->save();
        }
        if ($orderItme) {
            $orderItme->status = "delivered";
            $orderItme->save();
        }

    }

}
