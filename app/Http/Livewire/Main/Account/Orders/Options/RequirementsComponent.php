<?php

namespace App\Http\Livewire\Main\Account\Orders\Options;

use App\Http\Validators\Main\Pdf\PdfValidator;
use App\Models\Demande;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\OrderItemRequirement;
use App\Models\RequirementDemande;
use App\Utils\Uploader\ImageUploader;
use Artesaos\SEOTools\Traits\SEOTools as SEOToolsTrait;
use Dompdf\Dompdf;
use Exception;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;
use Livewire\Component;
use Livewire\TemporaryUploadedFile;
use Livewire\WithFileUploads;

class RequirementsComponent extends Component
{
    use WithFileUploads, SEOToolsTrait;

    public $demandeId;
    public $itemId;
    public $order;
    public $item;
    public $requirements = [];
    protected $queryString = [
        'demandeId' => ['as' => 'demande'],
    ];
    public $dateTo;
    public $dateForm;
    public $price;
    public $message;
    public $document;
    public $id_requirement;

    /**
     * Init component
     *
     * @return void
     */
    public function mount($id)
    {
        // Get user id
        $user_id = auth()->id();

        // Get order
        $order = Demande::where('id', $id)->firstOrFail();
        $this->item = $order;

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
        $title = __('messages.t_submit_required_info') . " $separator " . settings('general')->title;
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

        return view('livewire.main.account.orders.options.requirements')->extends('livewire.main.layout.app')->section('content');
    }

    /**
     * Submit required files to seller
     *
     * @return mixed
     */

    public function createPdf()
    {
        PdfValidator::validate($this);

        $requirementD = new RequirementDemande();
        $requirementD->uid = uid();
        $requirementD->user_id = $this->item->user->id;
        $requirementD->seller_id = $this->item->gig->owner->id;
        $requirementD->gig_id = $this->item->gig->id;
        $requirementD->price = $this->price;
        $requirementD->dateForm = $this->dateForm;
        $requirementD->dateTo = $this->dateTo;
        $requirementD->descreption = $this->message;
        $requirementD->save();

        $demmm = Demande::where('id', $this->item->id)->firstOrFail();
        $demmm->id_requirment = $requirementD->id;
        $demmm->save();
        $this->sendNotificationFirbase($this->item->user->id == auth()->id() ? $this->item->gig->owner->fcmToken : $this->item->user->fcmToken, auth()->user()->username . " send requirements", "new requirement");

        redirect("https://localhost/main/bricole/pdf/" . $this->item->id . "/" . $this->message . "/" . $this->dateTo . "/" . $this->dateForm . "/" . $this->price);
    }

    public function submit()
    {

        $requirementD = new RequirementDemande();
        $requirementD->uid = uid();
        $requirementD->user_id = $this->item->user->id;
        $requirementD->seller_id = $this->item->gig->owner->id;
        $requirementD->gig_id = $this->item->gig->id;
        $requirementD->id_document = $id_document;
        $requirementD->save();

    }

    /**
     * Re-submit the required info to seller
     *
     * @return mixed
     */
    public function resubmit()
    {
        try {

            // Check if user already submitted the required info
            if ($this->item->is_requirements_sent) {

                // Loop through required info
                foreach ($this->item->requirements as $requirement) {

                    // Check if type file
                    if ($requirement->form_type === 'file') {

                        // Get file path
                        $file = public_path('storage/orders/requirements/' . $requirement->form_value['id'] . '.' . $requirement->form_value['extension']);

                        // We have to delete file from local storage
                        if (File::exists($file)) {
                            File::delete($file);
                        }

                    }

                    // Delete requirement
                    $requirement->delete();

                }

                // We have to reset expected delivery date
                $this->item->expected_delivery_date = null;
                $this->item->is_requirements_sent = false;
                $this->item->save();

                // Refresh item
                $this->item->refresh();

                // Success
                $this->dispatchBrowserEvent('alert', [
                    "message" => __('messages.t_resubmit_requirements_success_msg'),
                ]);

            } else {

                // Not yet
                $this->dispatchBrowserEvent('alert', [
                    "message" => __('messages.t_u_didnt_submit_any_info_yet_requirements'),
                    "type" => "error",
                ]);

                return;

            }

        } catch (\Throwable$th) {
            throw $th;
        }
    }

    /**
     * Check if form valid to continue request
     *
     * @param object $requirements
     * @return boolean
     */
    private function isValid($requirements)
    {
        // Get settings media
        $settings_media = settings('media');

        // Get maximum required file size
        $max_file_size = $settings_media->requirements_file_max_size * 1024;

        // Get allowed extension
        $allowed_extensions = $settings_media->requirements_file_allowed_extensions;

        // Loop through requirements in database
        foreach ($requirements as $requirement) {

            // Check if requirement required
            if ($requirement->is_required) {

                // Requirement must be exists in request
                $isExists = $this->isExists($requirement);

                // Check if exists
                if ($isExists) {

                    // Check type of this requirement
                    if ($requirement->type === 'text') {

                        // Get text length
                        $text_length = strlen($isExists);

                        // Check if the user submitted this text input
                        if ($text_length < 1 || $text_length > 500) {

                            // Throw error
                            throw new Exception('REQUIRED_INPUT_TEXT_LENGTH_VALIDATION_FAILED');

                        }

                    } elseif ($requirement->type === 'choice') {

                        // Check choice type
                        if ($requirement->is_multiple) {

                            // Multiple options allowed but they must be exist in database
                            $value_exist_in_db = $requirement->options->whereIn('option', $isExists)->first();

                            // Must be exists
                            if (!$value_exist_in_db) {

                                // Throw error
                                throw new Exception('REQUIRED_CHOICE_MULTIPLE_VALUES_NOT_EXISTS');

                            }

                        } else {

                            // Only one value and must be exists in database
                            $is_value_exists_in_db = $requirement->options->where('option', $isExists)->first();

                            // Must be exists
                            if (!$is_value_exists_in_db) {

                                // Throw error
                                throw new Exception('REQUIRED_CHOICE_VALUE_NOT_EXISTS');

                            }

                        }

                    } elseif ($requirement->type === 'file') {

                        // Let's validate file
                        $validator = Validator::make(['file' => $isExists], [
                            'file' => "required|file|max:$max_file_size|mimes:$allowed_extensions",
                        ]);

                        // Validator fails
                        if ($validator->fails()) {

                            // Throw error
                            throw new Exception('REQUIRED_FILE_VALIDATION_FAILED');

                        }

                    } else {

                        // Something not right
                        return false;

                    }

                } else {

                    // Throw error
                    throw new Exception('REQUIRED_INPUT_NOT_EXISTS_IN_REQUEST');

                }

            } else {

                // Requirement input not required, but if exists in request, we have to validate it
                $isExists = $this->isExists($requirement);

                // Check if exists
                if ($isExists) {

                    // Check type of this requirement
                    if ($requirement->type === 'text') {

                        // Get text length
                        $text_length = strlen($isExists);

                        // Check if the user submitted this text input
                        if ($text_length < 1 || $text_length > 500) {

                            // Throw error
                            throw new Exception('REQUIRED_INPUT_TEXT_LENGTH_VALIDATION_FAILED');

                        }

                    } elseif ($requirement->type === 'choice') {

                        // Check choice type
                        if ($requirement->is_multiple) {

                            // Multiple options allowed but they must be exist in database
                            $value_exist_in_db = $requirement->options->whereIn('option', $isExists)->first();

                            // Must be exists
                            if (!$value_exist_in_db) {

                                // Throw error
                                throw new Exception('REQUIRED_CHOICE_MULTIPLE_VALUES_NOT_EXISTS');

                            }

                        } else {

                            // Only one value and must be exists in database
                            $is_value_exists_in_db = $requirement->options->where('option', $isExists)->first();

                            // Must be exists
                            if (!$is_value_exists_in_db) {

                                // Throw error
                                throw new Exception('REQUIRED_CHOICE_VALUE_NOT_EXISTS');

                            }

                        }

                    } elseif ($requirement->type === 'file') {

                        // Let's validate file
                        $validator = Validator::make(['file' => $isExists], [
                            'file' => "required|file|max:$max_file_size|mimes:$allowed_extensions",
                        ]);

                        // Validator fails
                        if ($validator->fails()) {

                            // Throw error
                            throw new Exception('REQUIRED_FILE_VALIDATION_FAILED');

                        }

                    } else {

                        // Something not right
                        return false;

                    }

                }

            }

        }
    }

    /**
     * Check if requirement exists in request
     *
     * @param object $requirement
     * @return mixed
     */
    private function isExists($requirement)
    {
        // Check if required input exists
        if (array_key_exists($requirement->id, $this->requirements)) {

            // Return the value
            return $this->requirements[$requirement->id]['value'];

        }

        // Not found
        return false;
    }

    /**
     * Caculate expected delivery date
     *
     * @param object $item
     * @return string
     */
    private function calculateExpectedDeliveryDate()
    {
        // Set empty days variable
        $days = 0;

        // Culculate extra days for upgrades
        $days += $this->item->upgrades()->exists() ? $this->item->upgrades->sum('extra_days') : 0;

        // Add gig delivery time
        $days += $this->item->gig->delivery_time;

        // Calculate expected delivery date
        return now()->addDays($days);
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
