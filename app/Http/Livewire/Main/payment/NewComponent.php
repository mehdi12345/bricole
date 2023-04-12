<?php

namespace App\Http\Livewire\Main\Payment;

use App\Http\Validators\Main\Checkout\PlaceValidator;
use App\Models\Admin;
use App\Models\Gig;
use App\Models\GigUpgrade;
use App\Models\Order;
use App\Models\OrderInvoice;
use App\Models\OrderItem;
use App\Models\OrderItemUpgrade;
use App\Models\Review;
use App\Models\UserBilling;
use App\Notifications\Admin\PendingOfflinePayment;
use App\Notifications\User\Buyer\OrderPlaced;
use App\Notifications\User\Everyone\GigPublished;
use App\Notifications\User\Seller\PendingOrder;
use Artesaos\SEOTools\Traits\SEOTools as SEOToolsTrait;
use Cartalyst\Stripe\Stripe;
use Livewire\Component;
use Livewire\WithPagination;

class NewComponent extends Component
{
    use WithPagination, SEOToolsTrait;
    public $gig;
    public $payment_method;
    public $inFavorite;
    public $related_gigs;
    public $content;
    public $address;
    public $company;
    public $email;
    public $lastname;
    public $firstname;
    public $gigId;

    /**
     *
     * Init component
     *
     * @param int $id
     * @return void
     */
    public function mount($id)
    {
        $gig = Gig::where('id', $id)->first();
        // Set gig
        $this->gig = $gig;
        // Get user billing
        $billing = UserBilling::firstOrCreate(['user_id' => auth()->id()]);

        // Set billing info
        $this->firstname = $billing->firstname;
        $this->lastname = $billing->lastname;
        $this->email = auth()->user()->email;
        $this->company = $billing->company;
        $this->address = $billing->address;

    }
    /**
     * Render component
     *
     * @return Illuminate\View\View
     */
    public function render()
    {
        // SEO
        $separator = settings('general')->separator;
        $title = __('messages.t_messages') . " $separator " . settings('general')->title;
        $description = settings('seo')->description;
        $ogimage = src(settings('seo')->ogimage);

        $this->seo()->setTitle($title);
        $this->seo()->setDescription($description);
        $this->seo()->setCanonical(url()->current());
        $this->seo()->opengraph()->setTitle($title);
        $this->seo()->opengraph()->setDescription($description);
        $this->seo()->opengraph()->setUrl(url()->current());
        $this->seo()->opengraph()->setType('website');
        $this->seo()->opengraph()->addImage($ogimage);
        $this->seo()->twitter()->setImage($ogimage);
        $this->seo()->twitter()->setUrl(url()->current());
        $this->seo()->twitter()->setSite("@" . settings('seo')->twitter_username);
        $this->seo()->twitter()->addValue('card', 'summary_large_image');
        $this->seo()->metatags()->addMeta('fb:page_id', settings('seo')->facebook_page_id, 'property');
        $this->seo()->metatags()->addMeta('fb:app_id', settings('seo')->facebook_app_id, 'property');
        $this->seo()->metatags()->addMeta('robots', 'index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1', 'name');
        $this->seo()->jsonLd()->setTitle($title);
        $this->seo()->jsonLd()->setDescription($description);
        $this->seo()->jsonLd()->setUrl(url()->current());
        $this->seo()->jsonLd()->setType('WebSite');

        return view('livewire.main.payment.payment', [
            'gig' => $this->gig,
            'content' => " this->gig",
        ])->extends('livewire.main.layout.app')->section('content');
    }

    // /**
    //  * Get latest reviews
    //  *
    //  * @return object
    //  */
    // public function getGigsProperty()
    // {

    //     $reviews = Gig::all();

    //     // Return reviews
    //     return $reviews;
    // }

    public function place()
    {
        try {

            // Validate billing info
            PlaceValidator::validate($this);

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
            $subtotal = $this->total();

            // Count total amount
            $total = $this->total() + $taxes;

            // Check if paypal payment selected
            if ($this->payment_method === 'offline') {

                // Check if offline payment enabled
                if (!settings('offline_payment')->is_enabled) {

                    // Not enabled
                    $this->dispatchBrowserEvent('alert', [
                        "message" => __('messages.t_payment_method_not_enabled'),
                        "type" => "error",
                    ]);

                    // Return
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
            $invoice->firstname = clean($this->firstname);
            $invoice->lastname = clean($this->lastname);
            $invoice->email = clean($this->email);
            $invoice->company = $this->company ? clean($this->company) : null;
            $invoice->address = clean($this->address);
            $invoice->status = $this->payment_method === 'offline' ? 'pending' : 'paid';
            $invoice->save();

            $this->sendNotificationFirbase($this->gig->owner->fcmToken, auth()->user()->username . " payment job " . $this->gig->title, $this->gig->title);

            // Send notification to owner
            $this->gig->owner->notify((new GigPublished($this->gig))->locale(config('app.locale')));

            // Send notification
            notification([
                'text' => 't_ur_gig_title_has_been_demande',
                'action' => "seller/orders",
                'user_id' => $this->gig->user_id,
                'params' => ['title' => $this->gig->title],
            ]);

            if ($this->gig) {
                // Save order item
                $order_item = new OrderItem();
                $order_item->uid = uid();
                $order_item->order_id = $order->id;
                $order_item->gig_id = $this->gig->id;
                $order_item->owner_id = $this->gig->user_id;
                $order_item->quantity = 1;
                $order_item->has_upgrades = false;
                $order_item->total_value = $total;
                $order_item->profit_value = $total - $this->taxes();
                $order_item->commission_value = 0;
                $order_item->save();
            }

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

            // After that the buyer has to send the seller the required form to start
            if ($this->payment_method === 'offline') {

                // Waiting for payment
                return redirect('account/orders')->with('message', __('messages.t_order_placed_waiting_offline_payment'));

            } else {

                // Submit required files
                return redirect('account/orders')->with('message', __('messages.t_u_have_send_reqs_asap_to_seller'));

            }

        } catch (\Illuminate\Validation\ValidationException$e) {

            // Validation error
            $this->dispatchBrowserEvent('alert', [
                "message" => __('messages.t_toast_form_validation_error'),
                "type" => "error",
            ]);

            throw $e;

        } catch (\Throwable$th) {

            // Validation error
            $this->dispatchBrowserEvent('alert', [
                "message" => $th->getMessage(),
                "type" => "error",
            ]);

        }
    }

    public function total()
    {
        return $this->gig->price;
    }
    public function taxes()
    {
        return 10;
    }
    public function sendNotificationFirbase($tken, $body, $title)
    {

        $url = 'https://fcm.googleapis.com/fcm/send';

        $FcmToken = $tken;
        $serverKey = 'AAAAzkDjTMk:APA91bEOXwmDHiAXcKMPBQoX2YyBNAmjG2tBuNDof6ZtoqtN7Bk8nW7Q-HPNpu_u0Pua6fE9mrSGcF5JfXEn7yABamEDOugM8YJCsocPxSh0RJiz_8W02Qgx94OZRvoDUzYwyG_RL00l'; // ADD SERVER KEY HERE PROVIDED BY FCM

        $data = [
            "registration_ids" => [
                $FcmToken,
            ],
            "notification" => [
                "title" => $title,
                "body" => $body,
                "android_channel_id" => "notification",
                "sound" => true,
            ],
        ];
        $encodedData = json_encode($data);

        $headers = [
            'Authorization:key=' . $serverKey,
            'Content-Type: application/json',
        ];

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
        // Disabling SSL Certificate support temporarly
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $encodedData);
        // Execute post
        $result = curl_exec($ch);
        if ($result === false) {
            die('Curl failed: ' . curl_error($ch));
        }
        // Close connection
        curl_close($ch);
        // FCM response

    }

}
