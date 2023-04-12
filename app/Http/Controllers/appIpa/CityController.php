<?php

namespace App\Http\Controllers\appIpa;

use App\Http\Controllers\Controller;
use App\Models\Subville;
use App\Models\Ville;
use Artesaos\SEOTools\Traits\SEOTools as SEOToolsTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Livewire\Component;
use Livewire\WithPagination;

class CityController extends Controller
{
    public function citys()
    {
        $citys = Ville::query()->orderBy('name', 'ASC')->get();
        return $citys;
    }

    public function areas()
    {
        $subcitys = Subville::query()->orderBy('name', 'ASC')->get();
        return $subcitys;
    }

    public function sendNotification(Request $request)
    {
        $this->sendNotificationFirbase("dC1FlrMCRNmng61hpytpZ3:APA91bFxV7mc9jGnkRMtVvRt59ySWLAL8k1tW8lFV_4AR7MQ65hHDwPVfybI1VV0P7NkyvNoUc_J6FZhsc8Ia8Wm8ZiFvcXzq-wiQmt4NwIAxki9Tju2uqOGrdcXiOvEwZLoNsnxnVg9", "bod de set notification", "title de notificaion");
    }

}
