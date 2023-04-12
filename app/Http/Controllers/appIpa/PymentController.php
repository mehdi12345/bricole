<?php

namespace App\Http\Controllers\appIpa;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Favorite;
use App\Models\FileManager;
use App\Models\Gig;
use App\Models\GigDocument;
use App\Models\GigFaq;
use App\Models\GigImage;
use App\Models\GigRequirement;
use App\Models\GigRequirementOption;
use App\Models\GigSeo;
use App\Models\GigUpgrade;
use App\Models\Order;
use App\Models\OrderInvoice;
use App\Models\OrderItem;
use App\Models\UserDeal;
use App\Notifications\Admin\PendingOfflinePayment;
use App\Notifications\User\Buyer\OrderPlaced;
use App\Notifications\User\Seller\PendingOrder;
use Artesaos\SEOTools\Traits\SEOTools as SEOToolsTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PymentController extends Controller
{

    public function payment(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'address' => 'required',
            "price" => 'required',
            'payment_method' => 'required',
            'lastname' => 'required',
            'firstname' => 'required',
            'gig_id' => 'required',
            'gig_user_id' => 'required',

        ]);

        if ($validator->fails()) {
            $errors = $validator->errors();
            return response()->json([
                'error in pyment' => $errors,
            ], 401);
        }

        // Get payment gateways settings
        $gateways = settings('gateways');

        // Get commission settings
        $settings = settings('commission');

        // Set unique id for this order
        $uid = uid();

        // Get buyer id
        $buyer_id = auth()->id();

        // Count taxes amount
        $taxes = $this->taxes();

        // Count subtotal amount
        $subtotal = $request->price;

        // Count total amount
        $total = $subtotal + $taxes;

        // Check if paypal payment selected
        if ($request->payment_method === 'offline') {

            // Check if offline payment enabled
            if (!settings('offline_payment')->is_enabled) {
                return;
            }

            // Set payment id
            $payment_id = uid();

            // Set payment method
            $payment_method = 'offline';

        }

        // Save order
        $order = new Order();
        $order->uid = $uid;
        $order->buyer_id = $buyer_id;
        $order->total_value = $total;
        $order->subtotal_value = $subtotal;
        $order->taxes_value = $taxes;
        $order->save();

        // Save invoice
        $invoice = new OrderInvoice();
        $invoice->order_id = $order->id;
        $invoice->payment_method = $payment_method;
        $invoice->payment_id = $payment_id;
        $invoice->firstname = $request->firstname;
        $invoice->lastname = $request->lastname;
        $invoice->email = $request->email;
        $invoice->company = $request->company ? $request->company : null;
        $invoice->address = $request->address;
        $invoice->status = $request->payment_method === 'offline' ? 'pending' : 'paid';
        $invoice->save();

        // Save order item
        $order_item = new OrderItem();
        $order_item->uid = uid();
        $order_item->order_id = $order->id;
        $order_item->gig_id = $request->gig_id;
        $order_item->owner_id = $request->gig_user_id;
        $order_item->quantity = 1;
        $order_item->has_upgrades = false;
        $order_item->total_value = $total;
        $order_item->profit_value = $total - $this->taxes();
        $order_item->commission_value = 0;
        $order_item->save();

        // If invoice not paid yet
        if ($invoice->status === 'pending') {

            // Send notification to admin
            Admin::first()->notify(new PendingOfflinePayment($order, $invoice));

        } else {

            // Update user balance
            if ($this->payment_method === 'credit_card' || $this->payment_method === 'paypal') {
                auth()->user()->update([
                    'balance_purchases' => $total,
                ]);
            } else if ($this->payment_method === 'balance') {
                auth()->user()->update([
                    'balance_purchases' => $total,
                    'balance_available' => auth()->user()->balance_available - $total,
                ]);
            }

            // Now let's forget the paypal order id that we used to capture the payment
            session()->forget('paypal_order_id');

        }

        // Now everything succeeded
        // Let's empty the cart
        session()->forget('cart');

        // Now let's notify the buyer that his order has been placed
        auth()->user()->notify((new OrderPlaced($order, $total))->locale(config('app.locale')));

        return response([
            "message" => "Seccses",
        ]);

    }

    public function total()
    {
        return $this->gig->price;
    }
    public function taxes()
    {
        return 10;
    }
}
