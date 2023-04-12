<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\URL;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function saveImage($image, $path = 'public')
    {
        if (!$image) {
            return null;
        }

        $filename = time() . '.png';
        // save image
        \Storage::disk($path)->put($filename, base64_decode($image));

        //return the path
        // Url is the base url exp: localhost:8000
        return URL::to('/') . '/storage/' . $path . '/' . $filename;
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
