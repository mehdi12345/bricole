<?php

namespace App\Http\Livewire\Admin\Refunds\Options;

use App\Models\OrderItem;
use App\Models\Refund;
use App\Models\RefundConversation;
use App\Models\User;
use Livewire\Component;
use Artesaos\SEOTools\Traits\SEOTools as SEOToolsTrait;

class DetailsComponent extends Component
{
    use SEOToolsTrait;

    public $refund;
    public $messages;

    /**
     * Init component
     *
     * @param string $id
     * @return void
     */
    public function mount($id)
    {
        // Get refund
        $refund         = Refund::where('uid', $id)->firstOrFail();

        // Get refund conversation
        $messages       = RefundConversation::where('refund_id', $refund->id)->latest()->get();

        // Set data
        $this->refund   = $refund;
        $this->messages = $messages;
    }


    /**
     * Render component
     *
     * @return Illuminate\View\View
     */
    public function render()
    {
        // Seo
        $this->seo()->setTitle( setSeoTitle(__('messages.t_refund_details'), true) );
        $this->seo()->setDescription( settings('seo')->description );

        return view('livewire.admin.refunds.options.details')->extends('livewire.admin.layout.app')->section('content');
    }


    /**
     * Accept refund
     *
     * @return void
     */
    public function accept()
    {
        // Check refund status
        if ($this->refund->status !== 'rejected_by_seller' && !$this->refund->request_admin_intervention) {
            
            $this->dispatchBrowserEvent('alert',[
                "message" => __('messages.t_u_cant_do_action_for_this_refund'),
                "type"    => "error"
            ]);

            return;

        }
        
        // Update refund status
        $this->refund->status = 'accepted_by_admin';
        $this->refund->save();

        // Get refund item
        $item = $this->refund->item;

        // Update item status
        OrderItem::where('id', $item->id)->update([
            'status'      => 'refunded',
            'is_finished' => true,
            'refunded_at' => now()
        ]);

        // Give buyer his money
        User::where('id', $this->refund->buyer_id)->update([
            'balance_available' => $this->refund->buyer->balance_available + $item->total_value
        ]);

        // Update seller balance
        User::where('id', $this->refund->seller_id)->update([
            'balance_pending' => $this->refund->buyer->balance_pending - $item->profit_value
        ]);

        // Send notification to buyer
        notification([
            'text'    => 't_app_name_has_approved_ur_refund_request',
            'action'  => url('account/refunds/details', $this->refund->uid),
            'user_id' => $this->refund->buyer_id,
            'params'  => ['app_name' => config('app.name')]
        ]);

        // Send notification to seller
        notification([
            'text'    => 't_app_name_has_approved_refund_request_from_buyer',
            'action'  => url('seller/refunds/details', $this->refund->uid),
            'user_id' => $this->refund->seller_id,
            'params'  => ['app_name' => config('app.name'), 'username' => $this->refund->buyer->username]
        ]);

        // Refresh refund
        $this->refund->refresh();

        // Success
        $this->dispatchBrowserEvent('alert',[
            "message" => __('messages.t_u_have_approved_this_refund'),
        ]);
    }


    /**
     * Decline dispute
     *
     * @return void
     */
    public function decline()
    {
        // Check refund status
        if ($this->refund->status !== 'rejected_by_seller' && !$this->refund->request_admin_intervention) {
            
            $this->dispatchBrowserEvent('alert',[
                "message" => __('messages.t_u_cant_do_action_for_this_refund'),
                "type"    => "error"
            ]);

            return;

        }

        // Update refund status
        $this->refund->status = 'rejected_by_admin';
        $this->refund->save();

        // Refresh refund
        $this->refund->refresh();

        // Send notification to buyer
        notification([
            'text'    => 't_app_name_has_declined_ur_refund_request',
            'action'  => url('account/refunds/details', $this->refund->uid),
            'user_id' => $this->refund->buyer_id,
            'params'  => ['app_name' => config('app.name')]
        ]);

        // Success
        $this->dispatchBrowserEvent('alert',[
            "message" => __('messages.t_u_have_declined_this_refund'),
        ]);
    }
    
}
