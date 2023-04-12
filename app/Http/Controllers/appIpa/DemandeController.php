<?php

namespace App\Http\Controllers\appIpa;

use App\Http\Controllers\Controller;
use App\Models\Demande;
use App\Models\Favorite;
use App\Models\Gig as ModelsGig;
use Illuminate\Http\Request;
use Livewire\Component;

class DemandeController extends Controller
{

    public function getDemandes()
    {
        $alljobs = Demande::where('user_id', auth()->id())->get();

        foreach ($alljobs as $job) {
            $git_images[] = [$job->gig->thumbnail];
            foreach ($job->gig->images as $image) {
                $git_images[] = [$image->small];
            }

            $jobs[] = [
                'id' => $job->id,
                'idByer' => $job->user_id,
                "status" => $job->status,
                'user_bayer' => [
                    "id" => $job->user->id,
                    "fcmToken" => $job->user->fcmToken,
                    "uid" => $job->user->uid,
                    "username" => $job->user->username,
                    "email" => $job->user->email,
                    "email_verified_at" => $job->user->email_verified_at,
                    "phon" => $job->user->phon,
                    "address" => $job->user->address,
                    "cin_or_passport" => $job->user->cin_or_passport,
                    "account_type" => $job->user->account_type,
                    "avatar" => $job->user->avatar_id ? $job->user->avatar->file_folder . "/" . $job->user->avatar->uid . "." . $job->user->avatar->file_extension : null,
                    "level_id" => $job->user->level_id,
                    "provider_name" => $job->user->provider_name,
                    "provider_id" => $job->user->provider_id,
                    "country_id" => $job->user->country_id,
                    "fullname" => $job->user->fullname,
                    "headline" => $job->user->headline,
                    "description" => $job->user->description,
                    "status" => $job->user->status,
                    "balance_net" => $job->user->balance_net,
                    "balance_withdrawn" => $job->user->balance_withdrawn,
                    "balance_purchases" => $job->user->balance_purchases,
                    "balance_pending" => $job->user->balance_pending,
                    "balance_available" => $job->user->balance_available,
                    "deleted_at" => $job->user->deleted_at,
                    "last_activity" => $job->user->last_activity,
                    "created_at" => $job->user->created_at,
                    "updated_at" => $job->user->updated_at,
                ],
                'job' => [
                    "id" => $job->gig->id,
                    "title" => $job->gig->title, // done
                    "description" => strip_tags($job->gig->description), // done
                    "review" => $job->gig->rating, // done
                    "price" => $job->gig->price, // done
                    "user" => [
                        "id" => $job->gig->owner->id,
                        "uid" => $job->gig->owner->uid,
                        "username" => $job->gig->owner->username,
                        "email" => $job->gig->owner->email,
                        "email_verified_at" => $job->gig->owner->email_verified_at,
                        "phon" => $job->gig->owner->phon,
                        "address" => $job->gig->owner->address,
                        "cin_or_passport" => $job->gig->owner->cin_or_passport,
                        "account_type" => $job->gig->owner->account_type,
                        "avatar" => $job->gig->owner->avatar_id ? $job->gig->owner->avatar->file_folder . "/" . $job->gig->owner->avatar->uid . "." . $job->gig->owner->avatar->file_extension : null,
                        "level_id" => $job->gig->owner->level_id,
                        "provider_name" => $job->gig->owner->provider_name,
                        "provider_id" => $job->gig->owner->provider_id,
                        "country_id" => $job->gig->owner->country_id,
                        "fullname" => $job->gig->owner->fullname,
                        "headline" => $job->gig->owner->headline,
                        "description" => $job->gig->owner->description,
                        "status" => $job->gig->owner->status,
                        "balance_net" => $job->gig->owner->balance_net,
                        "balance_withdrawn" => $job->gig->owner->balance_withdrawn,
                        "balance_purchases" => $job->gig->owner->balance_purchases,
                        "balance_pending" => $job->gig->owner->balance_pending,
                        "balance_available" => $job->gig->owner->balance_available,
                        "deleted_at" => $job->gig->owner->deleted_at,
                        "last_activity" => $job->gig->owner->last_activity,
                        "created_at" => $job->gig->owner->created_at,
                        "updated_at" => $job->gig->owner->updated_at,
                    ], // done
                    "img_thumb" => $job->gig->thumbnail,
                    "git_images" => $git_images,
                    "category" => [
                        "id" => $job->gig->category->id,
                        "name" => $job->gig->category->name,
                        "image" => $job->gig->category->image->uid . '.' . $job->gig->category->image->file_extension,
                        "slug" => $job->gig->category->slug,
                        "description" => $job->gig->category->description,
                        "icon" => $job->gig->category->icon->uid . '.' . $job->gig->category->icon->file_extension,
                    ],
                    "subcategory" => $job->gig->subcategory,
                    "ville" => $job->gig->ville,
                    "area" => $job->gig->subville,
                    "imageMedium" => $job->gig->imageMedium,
                    "imageLarge" => $job->gig->imageLarge,
                    "documents" => $job->gig->documents,
                    "reviews" => $job->gig->reviews,
                    "favorite" => $job->gig->favorite = Favorite::where('user_id', auth()->id())->where('gig_id', $job->gig->id)->first() ? true : false,
                    "created_at" => $job->gig->created_at,
                    "updated_at" => $job->gig->updated_at,
                ],
            ];
            $git_images = [];
        }
        if ($alljobs->count() > 0) {
            return $jobs;
        } else {
            return [];
        }

    }

    public function getDemondMyJobs()
    {
        $alljobs = Demande::where('seller_id', auth()->id())->get();

        foreach ($alljobs as $job) {
            $git_images[] = [$job->gig->thumbnail];
            foreach ($job->gig->images as $image) {
                $git_images[] = [$image->small];
            }

            $jobs[] = [
                'id' => $job->id,
                'idByer' => $job->user_id,
                "status" => $job->status,
                'user_bayer' => [
                    "id" => $job->user->id,
                    "fcmToken" => $job->user->fcmToken,
                    "uid" => $job->user->uid,
                    "username" => $job->user->username,
                    "email" => $job->user->email,
                    "email_verified_at" => $job->user->email_verified_at,
                    "phon" => $job->user->phon,
                    "address" => $job->user->address,
                    "cin_or_passport" => $job->user->cin_or_passport,
                    "account_type" => $job->user->account_type,
                    "avatar" => $job->user->avatar_id ? $job->user->avatar->file_folder . "/" . $job->user->avatar->uid . "." . $job->user->avatar->file_extension : null,
                    "level_id" => $job->user->level_id,
                    "provider_name" => $job->user->provider_name,
                    "provider_id" => $job->user->provider_id,
                    "country_id" => $job->user->country_id,
                    "fullname" => $job->user->fullname,
                    "headline" => $job->user->headline,
                    "description" => $job->user->description,
                    "status" => $job->user->status,
                    "balance_net" => $job->user->balance_net,
                    "balance_withdrawn" => $job->user->balance_withdrawn,
                    "balance_purchases" => $job->user->balance_purchases,
                    "balance_pending" => $job->user->balance_pending,
                    "balance_available" => $job->user->balance_available,
                    "deleted_at" => $job->user->deleted_at,
                    "last_activity" => $job->user->last_activity,
                    "created_at" => $job->user->created_at,
                    "updated_at" => $job->user->updated_at,
                ],

                'job' => [
                    "id" => $job->gig->id,
                    "title" => $job->gig->title, // done
                    "description" => strip_tags($job->gig->description), // done
                    "review" => $job->gig->rating, // done
                    "price" => $job->gig->price, // done
                    "user" => [
                        "id" => $job->gig->owner->id,
                        "uid" => $job->gig->owner->uid,
                        "username" => $job->gig->owner->username,
                        "email" => $job->gig->owner->email,
                        "email_verified_at" => $job->gig->owner->email_verified_at,
                        "phon" => $job->gig->owner->phon,
                        "address" => $job->gig->owner->address,
                        "cin_or_passport" => $job->gig->owner->cin_or_passport,
                        "account_type" => $job->gig->owner->account_type,
                        "avatar" => $job->gig->owner->avatar_id ? $job->gig->owner->avatar->file_folder . "/" . $job->gig->owner->avatar->uid . "." . $job->gig->owner->avatar->file_extension : null,
                        "level_id" => $job->gig->owner->level_id,
                        "provider_name" => $job->gig->owner->provider_name,
                        "provider_id" => $job->gig->owner->provider_id,
                        "country_id" => $job->gig->owner->country_id,
                        "fullname" => $job->gig->owner->fullname,
                        "headline" => $job->gig->owner->headline,
                        "description" => $job->gig->owner->description,
                        "status" => $job->gig->owner->status,
                        "balance_net" => $job->gig->owner->balance_net,
                        "balance_withdrawn" => $job->gig->owner->balance_withdrawn,
                        "balance_purchases" => $job->gig->owner->balance_purchases,
                        "balance_pending" => $job->gig->owner->balance_pending,
                        "balance_available" => $job->gig->owner->balance_available,
                        "deleted_at" => $job->gig->owner->deleted_at,
                        "last_activity" => $job->gig->owner->last_activity,
                        "created_at" => $job->gig->owner->created_at,
                        "updated_at" => $job->gig->owner->updated_at,
                    ], // done
                    "img_thumb" => $job->gig->thumbnail,
                    "git_images" => $git_images,
                    "category" => [
                        "id" => $job->gig->category->id,
                        "name" => $job->gig->category->name,
                        "image" => $job->gig->category->image->uid . '.' . $job->gig->category->image->file_extension,
                        "slug" => $job->gig->category->slug,
                        "description" => $job->gig->category->description,
                        "icon" => $job->gig->category->icon->uid . '.' . $job->gig->category->icon->file_extension,
                    ],
                    "subcategory" => $job->gig->subcategory,
                    "ville" => $job->gig->ville,
                    "area" => $job->gig->subville,
                    "imageMedium" => $job->gig->imageMedium,
                    "imageLarge" => $job->gig->imageLarge,
                    "documents" => $job->gig->documents,
                    "reviews" => $job->gig->reviews,
                    "favorite" => $job->gig->favorite = Favorite::where('user_id', auth()->id())->where('gig_id', $job->gig->id)->first() ? true : false,
                    "created_at" => $job->gig->created_at,
                    "updated_at" => $job->gig->updated_at,
                ],
            ];
            $git_images = [];
        }
        if ($alljobs->count() > 0) {
            return $jobs;
        } else {
            return [];
        }
    }

    /**
     * Remove gig from favorite
     *
     * @param string $id
     * @return void
     */
    public function removeDemande($id)
    {

        // Get gig
        $Demande = Demande::where('id', $id)->first();

        // Check if already exists
        if ($Demande) {

            // Delete
            $Demande->delete();
            // Success
            return response([
                'message' => 'Seccs',
            ], 200);

        }

        return response([
            'message' => 'Err',
        ], 401);

    }

    /**
     * Add gig to favorite list
     *
     * @param string $id
     * @return mixed
     */
    public function addDemande(Request $request)
    {

        try {
            $ver = Demande::where('user_id', auth()->id())->where('gig_id', $request->id)->first();
            if (!$ver) {
                // Now save dommade
                Demande::create([
                    'gig_id' => $request->id,
                    'seller_id' => $request->user_id,
                    'user_id' => auth()->id(),
                ]);
                // Success
                return response([
                    'message' => 'success',
                ], 200);
            } else {
                return response([
                    'message' => 'Err',
                ], 405);
            }
        } catch (e) {
            response([
                'message' => 'Err',
            ], 405);
        }

    }

    public function activerDemande($id)
    {
        $ver = Demande::where('id', $id)->first();
        $ver->status = "active";
        $ver->save();
        return response([
            'message' => 'success',
        ], 200);
    }

    public function normalisation($job)
    {

    }

}
