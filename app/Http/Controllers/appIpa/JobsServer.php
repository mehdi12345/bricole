<?php

namespace App\Http\Controllers\appIpa;

use App\Http\Controllers\Controller;
use App\Http\Controllers\str_random;
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
use App\Models\UserDeal;
use App\Notifications\Admin\PendingGig;
use App\Utils\Uploader\ImageUploader;
use Artesaos\SEOTools\Traits\SEOTools as SEOToolsTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\TemporaryUploadedFile;
use Livewire\WithFileUploads;

// use Spatie\Permission\Models\Role;

class JobsServer extends Controller
{

    use WithFileUploads, SEOToolsTrait;

    public function jobs($id)
    {
        $alljobs = Gig::where('status', "active")->orderBy('category_id', 'DESC')->inRandomOrder()->get();
        foreach ($alljobs as $job) {
            $git_images[] = [$job->thumbnail];
            foreach ($job->images as $image) {
                $git_images[] = [$image->small];
            }

            $jobs[] = [
                "id" => $job->id,
                "title" => $job->title, // done
                "description" => strip_tags($job->description), // done
                "review" => $job->rating, // done
                "price" => $job->price, // done
                "user" => [
                    "id" => $job->owner->id,
                    "fcmToken" => $job->owner->fcmToken,
                    "uid" => $job->owner->uid,
                    "username" => $job->owner->username,
                    "email" => $job->owner->email,
                    "email_verified_at" => $job->owner->email_verified_at,
                    "phon" => $job->owner->phon,
                    "address" => $job->owner->address,
                    "cin_or_passport" => $job->owner->cin_or_passport,
                    "account_type" => $job->owner->account_type,
                    "avatar" => $job->owner->avatar_id ? $job->owner->avatar->file_folder . "/" . $job->owner->avatar->uid . "." . $job->owner->avatar->file_extension : null,
                    "level_id" => $job->owner->level_id,
                    "provider_name" => $job->owner->provider_name,
                    "provider_id" => $job->owner->provider_id,
                    "country_id" => $job->owner->country_id,
                    "fullname" => $job->owner->fullname,
                    "headline" => $job->owner->headline,
                    "description" => $job->owner->description,
                    "status" => $job->owner->status,
                    "balance_net" => $job->owner->balance_net,
                    "balance_withdrawn" => $job->owner->balance_withdrawn,
                    "balance_purchases" => $job->owner->balance_purchases,
                    "balance_pending" => $job->owner->balance_pending,
                    "balance_available" => $job->owner->balance_available,
                    "deleted_at" => $job->owner->deleted_at,
                    "last_activity" => $job->owner->last_activity,
                    "created_at" => $job->owner->created_at,
                    "updated_at" => $job->owner->updated_at,
                ], // done
                "img_thumb" => $job->thumbnail,
                "git_images" => $git_images,
                "category" => [
                    "id" => $job->category->id,
                    "name" => $job->category->name,
                    "image" => $job->category->image->uid . '.' . $job->category->image->file_extension,
                    "slug" => $job->category->slug,
                    "description" => $job->category->description,
                    "icon" => $job->category->icon->uid . '.' . $job->category->icon->file_extension,
                ],
                "subcategory" => $job->subcategory,
                "ville" => $job->ville,
                "area" => $job->subville,
                "imageMedium" => $job->imageMedium,
                "imageLarge" => $job->imageLarge,
                "documents" => $job->documents,
                "reviews" => $job->reviews,
                "favorite" => $job->favorite = Favorite::where('user_id', $id)->where('gig_id', $job->id)->first() ? true : false,
                "created_at" => $job->created_at,
                "updated_at" => $job->updated_at,
            ];
            $git_images = [];
        }
        if ($alljobs->count() > 0) {
            return $jobs;
        } else {
            return [];
        }

    }

    public function Myjobs($id)
    {
        $alljobs = Gig::where('status', "active")->where('user_id', $id)->inRandomOrder()->get();
        foreach ($alljobs as $job) {
            $git_images[] = [$job->thumbnail];
            foreach ($job->images as $image) {
                $git_images[] = [$image->small];
            }

            $jobs[] = [
                "id" => $job->id,
                "title" => $job->title, // done
                "status" => $job->status, // done
                "description" => strip_tags($job->description), // done
                "review" => $job->rating, // done
                "price" => $job->price, // done
                "user" => [
                    "id" => $job->owner->id,
                    "fcmToken" => $job->owner->fcmToken,
                    "uid" => $job->owner->uid,
                    "username" => $job->owner->username,
                    "email" => $job->owner->email,
                    "email_verified_at" => $job->owner->email_verified_at,
                    "phon" => $job->owner->phon,
                    "address" => $job->owner->address,
                    "cin_or_passport" => $job->owner->cin_or_passport,
                    "account_type" => $job->owner->account_type,
                    "avatar" => $job->owner->avatar_id ? $job->owner->avatar->file_folder . "/" . $job->owner->avatar->uid . "." . $job->owner->avatar->file_extension : null,
                    "level_id" => $job->owner->level_id,
                    "provider_name" => $job->owner->provider_name,
                    "provider_id" => $job->owner->provider_id,
                    "country_id" => $job->owner->country_id,
                    "fullname" => $job->owner->fullname,
                    "headline" => $job->owner->headline,
                    "description" => $job->owner->description,
                    "status" => $job->owner->status,
                    "balance_net" => $job->owner->balance_net,
                    "balance_withdrawn" => $job->owner->balance_withdrawn,
                    "balance_purchases" => $job->owner->balance_purchases,
                    "balance_pending" => $job->owner->balance_pending,
                    "balance_available" => $job->owner->balance_available,
                    "deleted_at" => $job->owner->deleted_at,
                    "last_activity" => $job->owner->last_activity,
                    "created_at" => $job->owner->created_at,
                    "updated_at" => $job->owner->updated_at,
                ], // done
                "img_thumb" => $job->thumbnail,
                "git_images" => $git_images,
                "category" => [
                    "id" => $job->category->id,
                    "name" => $job->category->name,
                    "image" => $job->category->image->uid . '.' . $job->category->image->file_extension,
                    "slug" => $job->category->slug,
                    "description" => $job->category->description,
                    "icon" => $job->category->icon->uid . '.' . $job->category->icon->file_extension,
                ],
                "subcategory" => $job->subcategory,
                "ville" => $job->ville,
                "area" => $job->subville,
                "imageMedium" => $job->imageMedium,
                "imageLarge" => $job->imageLarge,
                "documents" => $job->documents,
                "reviews" => $job->reviews,
                "favorite" => $job->favorite = Favorite::where('user_id', auth()->id())->where('gig_id', $job->id)->first() ? true : false,
                "created_at" => $job->created_at,
                "updated_at" => $job->updated_at,
            ];
            $git_images = [];
        }

        return $jobs;

    }

    public function MyFavoriteJobs()
    {
        $favoret = false;
        $alljobs = Gig::where('status', "active")->inRandomOrder()->get();
        foreach ($alljobs as $job) {
            $res = Favorite::where('user_id', auth()->id())->where('gig_id', $job->id)->first() ? true : false;
            if ($res) {
                $favoret = true;
                $git_images[] = [$job->thumbnail];
                foreach ($job->images as $image) {
                    $git_images[] = [$image->small];
                }
                $jobs[] = [
                    "id" => $job->id,
                    "title" => $job->title, // done
                    "description" => strip_tags($job->description), // done
                    "review" => $job->rating, // done
                    "price" => $job->price, // done
                    "user" => [
                        "id" => $job->owner->id,
                        "fcmToken" => $job->owner->fcmToken,
                        "uid" => $job->owner->uid,
                        "username" => $job->owner->username,
                        "email" => $job->owner->email,
                        "email_verified_at" => $job->owner->email_verified_at,
                        "phon" => $job->owner->phon,
                        "address" => $job->owner->address,
                        "cin_or_passport" => $job->owner->cin_or_passport,
                        "account_type" => $job->owner->account_type,
                        "avatar" => $job->owner->avatar_id ? $job->owner->avatar->file_folder . "/" . $job->owner->avatar->uid . "." . $job->owner->avatar->file_extension : null,
                        "level_id" => $job->owner->level_id,
                        "provider_name" => $job->owner->provider_name,
                        "provider_id" => $job->owner->provider_id,
                        "country_id" => $job->owner->country_id,
                        "fullname" => $job->owner->fullname,
                        "headline" => $job->owner->headline,
                        "description" => $job->owner->description,
                        "status" => $job->owner->status,
                        "balance_net" => $job->owner->balance_net,
                        "balance_withdrawn" => $job->owner->balance_withdrawn,
                        "balance_purchases" => $job->owner->balance_purchases,
                        "balance_pending" => $job->owner->balance_pending,
                        "balance_available" => $job->owner->balance_available,
                        "deleted_at" => $job->owner->deleted_at,
                        "last_activity" => $job->owner->last_activity,
                        "created_at" => $job->owner->created_at,
                        "updated_at" => $job->owner->updated_at,
                    ], // done
                    "img_thumb" => $job->thumbnail,
                    "git_images" => $git_images,
                    "category" => [
                        "id" => $job->category->id,
                        "name" => $job->category->name,
                        "image" => $job->category->image->uid . '.' . $job->category->image->file_extension,
                        "slug" => $job->category->slug,
                        "description" => $job->category->description,
                        "icon" => $job->category->icon->uid . '.' . $job->category->icon->file_extension,
                    ],
                    "subcategory" => $job->subcategory,
                    "ville" => $job->ville,
                    "area" => $job->subville,
                    "imageMedium" => $job->imageMedium,
                    "imageLarge" => $job->imageLarge,
                    "documents" => $job->documents,
                    "reviews" => $job->reviews,
                    "favorite" => $job->favorite = Favorite::where('user_id', auth()->id())->where('gig_id', $job->id)->first() ? true : false,
                    "created_at" => $job->created_at,
                    "updated_at" => $job->updated_at,
                ];
                $git_images = [];
            }
        }
        if ($alljobs->count() > 0 && $favoret) {
            return $jobs;
        } else {
            return [];
        }

    }

    // public function MyDommndeJobs()
    // {
    //     $alljobs = Gig::where('status', "active")->where('user_id', auth()->id())->inRandomOrder()->get();
    //     foreach ($alljobs as $job) {
    //         $git_images[] = [$job->thumbnail];
    //         foreach ($job->images as $image) {
    //             $git_images[] = [$image->small];
    //         }

    //         $jobs[] = [
    //             "id" => $job->id,
    //             "title" => $job->title, // done
    //             "description" => $job->description, // done
    //             "price" => $job->price, // done
    //             "user" => $job->owner, // done
    //             "img_thumb" => $job->thumbnail,
    //             "git_images" => $git_images,
    //             "category" => [
    //                 "id" => $job->category->id,
    //                 "name" => $job->category->name,
    //                 "image" => $job->category->image->uid . '.' . $job->category->image->file_extension,
    //                 "slug" => $job->category->slug,
    //                 "description" => $job->category->description,
    //                 "icon" => $job->category->icon->uid . '.' . $job->category->icon->file_extension,
    //             ],
    //             "subcategory" => $job->subcategory,
    //             "ville" => $job->ville,
    //             "area" => $job->subville,
    //             "imageMedium" => $job->imageMedium,
    //             "imageLarge" => $job->imageLarge,
    //             "documents" => $job->documents,
    //             "reviews" => $job->reviews,
    //             "favorite" => $job->favorite = Favorite::where('user_id', auth()->id())->where('gig_id', $job->id)->first() ? true : false,
    //             "created_at" => $job->created_at,
    //             "updated_at" => $job->updated_at,
    //         ];
    //         $git_images = [];
    //     }
    //     if ($alljobs->count() > 1) {
    //         return $jobs;
    //     } else {
    //         return [];
    //     }

    // }
    public function getByCategorie(Request $request, $id)
    {
        $alljobs = Gig::where('status', "active")->where('category_id', $request->category_id)->inRandomOrder()->get();
        foreach ($alljobs as $job) {
            $git_images[] = [$job->thumbnail];
            foreach ($job->images as $image) {
                $git_images[] = [$image->small];
            }

            $jobs[] = [
                "id" => $job->id,
                "title" => $job->title, // done
                "description" => strip_tags($job->description), // done
                "price" => $job->price, // done
                "review" => $job->rating, // done
                "user" => [
                    "id" => $job->owner->id,
                    "fcmToken" => $job->owner->fcmToken,
                    "uid" => $job->owner->uid,
                    "username" => $job->owner->username,
                    "email" => $job->owner->email,
                    "email_verified_at" => $job->owner->email_verified_at,
                    "phon" => $job->owner->phon,
                    "address" => $job->owner->address,
                    "cin_or_passport" => $job->owner->cin_or_passport,
                    "account_type" => $job->owner->account_type,
                    "avatar" => $job->owner->avatar_id ? $job->owner->avatar->file_folder . "/" . $job->owner->avatar->uid . "." . $job->owner->avatar->file_extension : null,
                    "level_id" => $job->owner->level_id,
                    "provider_name" => $job->owner->provider_name,
                    "provider_id" => $job->owner->provider_id,
                    "country_id" => $job->owner->country_id,
                    "fullname" => $job->owner->fullname,
                    "headline" => $job->owner->headline,
                    "description" => $job->owner->description,
                    "status" => $job->owner->status,
                    "balance_net" => $job->owner->balance_net,
                    "balance_withdrawn" => $job->owner->balance_withdrawn,
                    "balance_purchases" => $job->owner->balance_purchases,
                    "balance_pending" => $job->owner->balance_pending,
                    "balance_available" => $job->owner->balance_available,
                    "deleted_at" => $job->owner->deleted_at,
                    "last_activity" => $job->owner->last_activity,
                    "created_at" => $job->owner->created_at,
                    "updated_at" => $job->owner->updated_at,
                ], // done
                "img_thumb" => $job->thumbnail,
                "git_images" => $git_images,
                "category" => [
                    "id" => $job->category->id,
                    "name" => $job->category->name,
                    "image" => $job->category->image->uid . '.' . $job->category->image->file_extension,
                    "slug" => $job->category->slug,
                    "description" => $job->category->description,
                    "icon" => $job->category->icon->uid . '.' . $job->category->icon->file_extension,
                ],
                "subcategory" => $job->subcategory,
                "ville" => $job->ville,
                "area" => $job->subville,
                "imageMedium" => $job->imageMedium,
                "imageLarge" => $job->imageLarge,
                "documents" => $job->documents,
                "reviews" => $job->reviews,
                "favorite" => $job->favorite = Favorite::where('user_id', $id)->where('gig_id', $job->id)->first() ? true : false,
                "created_at" => $job->created_at,
                "updated_at" => $job->updated_at,
            ];
            $git_images = [];
        }
        if ($alljobs->count() > 0) {
            return $jobs;
        } else {
            return [];
        }
    }

    public function getBySherach(Request $request, $id)
    {

        $alljobs = Gig::where('title', 'LIKE', '%' . $request->value . '%')
            ->orWhere('description', 'LIKE', '%' . $request->value . '%')->where(function ($query) {
            $query->where('status', "active");
        })->inRandomOrder()->get();

        foreach ($alljobs as $job) {
            $git_images[] = [$job->thumbnail];
            foreach ($job->images as $image) {
                $git_images[] = [$image->small];
            }

            $jobs[] = [
                "id" => $job->id,
                "title" => $job->title, // done
                "description" => strip_tags($job->description), // done
                "review" => $job->rating, // done
                "price" => $job->price, // done
                "user" => [
                    "id" => $job->owner->id,
                    "fcmToken" => $job->owner->fcmToken,
                    "uid" => $job->owner->uid,
                    "username" => $job->owner->username,
                    "email" => $job->owner->email,
                    "email_verified_at" => $job->owner->email_verified_at,
                    "phon" => $job->owner->phon,
                    "address" => $job->owner->address,
                    "cin_or_passport" => $job->owner->cin_or_passport,
                    "account_type" => $job->owner->account_type,
                    "avatar" => $job->owner->avatar_id ? $job->owner->avatar->file_folder . "/" . $job->owner->avatar->uid . "." . $job->owner->avatar->file_extension : null,
                    "level_id" => $job->owner->level_id,
                    "provider_name" => $job->owner->provider_name,
                    "provider_id" => $job->owner->provider_id,
                    "country_id" => $job->owner->country_id,
                    "fullname" => $job->owner->fullname,
                    "headline" => $job->owner->headline,
                    "description" => $job->owner->description,
                    "status" => $job->owner->status,
                    "balance_net" => $job->owner->balance_net,
                    "balance_withdrawn" => $job->owner->balance_withdrawn,
                    "balance_purchases" => $job->owner->balance_purchases,
                    "balance_pending" => $job->owner->balance_pending,
                    "balance_available" => $job->owner->balance_available,
                    "deleted_at" => $job->owner->deleted_at,
                    "last_activity" => $job->owner->last_activity,
                    "created_at" => $job->owner->created_at,
                    "updated_at" => $job->owner->updated_at,
                ], // done
                "img_thumb" => $job->thumbnail,
                "git_images" => $git_images,
                "category" => [
                    "id" => $job->category->id,
                    "name" => $job->category->name,
                    "image" => $job->category->image->uid . '.' . $job->category->image->file_extension,
                    "slug" => $job->category->slug,
                    "description" => $job->category->description,
                    "icon" => $job->category->icon->uid . '.' . $job->category->icon->file_extension,
                ],
                "subcategory" => $job->subcategory,
                "ville" => $job->ville,
                "area" => $job->subville,
                "imageMedium" => $job->imageMedium,
                "imageLarge" => $job->imageLarge,
                "documents" => $job->documents,
                "reviews" => $job->reviews,
                "favorite" => $job->favorite = Favorite::where('user_id', $id)->where('gig_id', $job->id)->first() ? true : false,
                "created_at" => $job->created_at,
                "updated_at" => $job->updated_at,
            ];
            $git_images = [];
        }
        if ($alljobs->count() > 0) {
            return $jobs;
        } else {
            return [];
        }
    }

    public function getByfilter(Request $request, $id)
    {

        if ($request->idSubCate == 0 && $request->idSubcity == 0) {
            $alljobs = Gig::where('status', "active")->where('category_id', $request->category_id)->where('ville_id', $request->ville_id)->whereBetween('price', [$request->main, $request->max])->inRandomOrder()->get();
        } else if ($request->idSubCate == 0) {
            $alljobs = Gig::where('status', "active")->where('category_id', $request->category_id)->where('ville_id', $request->ville_id)->where('subville_id', $request->idSubcity)->whereBetween('price', [$request->main, $request->max])->inRandomOrder()->get();
        } else if ($request->idSubcity == 0) {
            $alljobs = Gig::where('status', "active")->where('category_id', $request->category_id)->where('ville_id', $request->ville_id)->where('subcategory_id', $request->idSubCate)->whereBetween('price', [$request->main, $request->max])->inRandomOrder()->get();
        } else {
            $alljobs = Gig::where('status', "active")->where('category_id', $request->category_id)->where('ville_id', $request->ville_id)->where('subcategory_id', $request->idSubCate)->where('subville_id', $request->idSubcity)->whereBetween('price', [$request->main, $request->max])->inRandomOrder()->get();
        }

        foreach ($alljobs as $job) {
            $git_images[] = [$job->thumbnail];
            foreach ($job->images as $image) {
                $git_images[] = [$image->small];
            }

            $jobs[] = [
                "id" => $job->id,
                "title" => $job->title, // done
                "description" => strip_tags($job->description), // done
                "price" => $job->price, // done
                "review" => $job->rating, // done
                "user" => [
                    "id" => $job->owner->id,
                    "fcmToken" => $job->owner->fcmToken,
                    "uid" => $job->owner->uid,
                    "username" => $job->owner->username,
                    "email" => $job->owner->email,
                    "email_verified_at" => $job->owner->email_verified_at,
                    "phon" => $job->owner->phon,
                    "address" => $job->owner->address,
                    "cin_or_passport" => $job->owner->cin_or_passport,
                    "account_type" => $job->owner->account_type,
                    "avatar" => $job->owner->avatar_id ? $job->owner->avatar->file_folder . "/" . $job->owner->avatar->uid . "." . $job->owner->avatar->file_extension : null,
                    "level_id" => $job->owner->level_id,
                    "provider_name" => $job->owner->provider_name,
                    "provider_id" => $job->owner->provider_id,
                    "country_id" => $job->owner->country_id,
                    "fullname" => $job->owner->fullname,
                    "headline" => $job->owner->headline,
                    "description" => $job->owner->description,
                    "status" => $job->owner->status,
                    "balance_net" => $job->owner->balance_net,
                    "balance_withdrawn" => $job->owner->balance_withdrawn,
                    "balance_purchases" => $job->owner->balance_purchases,
                    "balance_pending" => $job->owner->balance_pending,
                    "balance_available" => $job->owner->balance_available,
                    "deleted_at" => $job->owner->deleted_at,
                    "last_activity" => $job->owner->last_activity,
                    "created_at" => $job->owner->created_at,
                    "updated_at" => $job->owner->updated_at,
                ], // done
                "img_thumb" => $job->thumbnail,
                "git_images" => $git_images,
                "category" => [
                    "id" => $job->category->id,
                    "name" => $job->category->name,
                    "image" => $job->category->image->uid . '.' . $job->category->image->file_extension,
                    "slug" => $job->category->slug,
                    "description" => $job->category->description,
                    "icon" => $job->category->icon->uid . '.' . $job->category->icon->file_extension,
                ],
                "subcategory" => $job->subcategory,
                "ville" => $job->ville,
                "area" => $job->subville,
                "imageMedium" => $job->imageMedium,
                "imageLarge" => $job->imageLarge,
                "documents" => $job->documents,
                "reviews" => $job->reviews,
                "favorite" => $job->favorite = Favorite::where('user_id', $id)->where('gig_id', $job->id)->first() ? true : false,
                "created_at" => $job->created_at,
                "updated_at" => $job->updated_at,
            ];
            $git_images = [];
        }
        if ($alljobs->count() > 0) {
            return $jobs;
        } else {
            return [];
        }

    }

    public function create(Request $request)
    {

        // Generate unique id for this gig
        $uid = uid();

        // Get title
        $title = $request->title;

        // Generate unique slug for this gig
        $slug = substr(Str::slug($title), 0, 138) . '-' . $uid;

        // Get description
        $description = $request->description;

        // Get price
        $price = $request->price;

        // Get delivery time
        $delivery_time = $request->delivery_time;

        // Get parent category
        $category_id = $request->category_id;

        // Get subcategory
        $subcategory_id = $request->subcategory_id;

        // Get parent ville
        $ville_id = $request->ville_id;

        // Get subville
        $subville_id = $request->subville_id;

        // Get gig status
        $status = settings('publish')->auto_approve_gigs ? 'active' : 'pending';

        // Check if gig has upgrades
        $has_upgrades = false; //is_array($this->upgrades) && count($this->upgrades) ? true : false;

        // Check if gig has faqs
        $has_faqs = false; //is_array($this->faqs) && count($this->faqs) ? true : false;

        // Get video link
        $video_link = $request->video_link ? $request->video_link : null;

        // Get video id
        $video_id = $request->video_id ? $request->video_id : null;

        // Upload thumbnail image
        $image_thumb_id = $this->imageUp("gigs/previews/small", $request->thumbnail); // ImageUploader::make($preview)->resize(400)->folder('gigs/previews/small')->handle();

        // Upload medium image
        $image_medium_id = $this->imageUp("gigs/previews/medium", $request->thumbnail);
        // $image_medium_id = ImageUploader::make($preview)->resize(800)->folder('gigs/previews/medium')->handle();

        // Upload large image
        $image_large_id = $this->imageUp("gigs/previews/large", $request->thumbnail);
        // $image_large_id = ImageUploader::make($preview)->resize(1200)->folder('gigs/previews/large')->handle();

        // Save gig
        $gig = new Gig();
        $gig->uid = $uid; // done
        $gig->user_id = auth()->id(); // done
        $gig->title = $title; // done
        $gig->slug = $slug; // done
        $gig->description = "</p>" . $description . "</p>"; // done
        $gig->price = $price; // done
        $gig->delivery_time = $delivery_time; // done
        $gig->category_id = $category_id; // done
        $gig->subcategory_id = $subcategory_id; // done
        $gig->ville_id = $ville_id; // done
        $gig->subville_id = $subville_id; // done
        $gig->image_thumb_id = $image_thumb_id;
        $gig->image_medium_id = $image_medium_id;
        $gig->image_large_id = $image_large_id;
        $gig->status = $status; // done
        $gig->has_upgrades = $has_upgrades; // done
        $gig->has_faqs = $has_faqs; // done
        $gig->video_link = $video_link; // done
        $gig->video_id = $video_id; // done
        $gig->save();

        // Save gig images
        foreach ($request->images as $image) {

            // Upload small image
            $img_thumb_id = $this->imageUp("gigs/gallery/small", $image); //ImageUploader::make($image)->resize(400)->folder('gigs/gallery/small')->handle();

            // Upload medium image
            $img_medium_id = $this->imageUp('gigs/gallery/medium', $image);

            // Upload large image
            $img_large_id = $this->imageUp('gigs/gallery/large', $image);

            // Save images
            $imagesU = GigImage::create([
                'gig_id' => $gig->id,
                'img_thumb_id' => $img_thumb_id,
                'img_medium_id' => $img_medium_id,
                'img_large_id' => $img_large_id,
            ]);

        }

        $jobCreate = Gig::where('id', $gig->id)->get();

        foreach ($gig->images as $image) {
            $git_images[] = [$image->small];
        }
        $gig = $jobCreate[0];
        return response([
            'job' => [
                "title" => $gig->title, // done
                "description" => strip_tags($gig->description), // done
                "price" => $gig->price, // done
                "review" => 0, // done
                "user" => [
                    "id" => $gig->owner->id,
                    "fcmToken" => $gig->owner->fcmToken,
                    "uid" => $gig->owner->uid,
                    "username" => $gig->owner->username,
                    "email" => $gig->owner->email,
                    "email_verified_at" => $gig->owner->email_verified_at,
                    "phon" => $gig->owner->phon,
                    "address" => $gig->owner->address,
                    "cin_or_passport" => $gig->owner->cin_or_passport,
                    "account_type" => $gig->owner->account_type,
                    "avatar" => $gig->owner->avatar_id ? $gig->owner->avatar->file_folder . "/" . $gig->owner->avatar->uid . "." . $gig->owner->avatar->file_extension : null,
                    "level_id" => $gig->owner->level_id,
                    "provider_name" => $gig->owner->provider_name,
                    "provider_id" => $gig->owner->provider_id,
                    "country_id" => $gig->owner->country_id,
                    "fullname" => $gig->owner->fullname,
                    "headline" => $gig->owner->headline,
                    "description" => $gig->owner->description,
                    "status" => $gig->owner->status,
                    "balance_net" => $gig->owner->balance_net,
                    "balance_withdrawn" => $gig->owner->balance_withdrawn,
                    "balance_purchases" => $gig->owner->balance_purchases,
                    "balance_pending" => $gig->owner->balance_pending,
                    "balance_available" => $gig->owner->balance_available,
                    "deleted_at" => $gig->owner->deleted_at,
                    "last_activity" => $gig->owner->last_activity,
                    "created_at" => $gig->owner->created_at,
                    "updated_at" => $gig->owner->updated_at,
                ], // done
                "img_thumb" => $gig->thumbnail,
                "git_images" => $git_images,
                "category" => [
                    "id" => $gig->category->id,
                    "name" => $gig->category->name,
                    "image" => $gig->category->image->uid . '.' . $gig->category->image->file_extension,
                    "slug" => $gig->category->slug,
                    "description" => $gig->category->description,
                    "icon" => $gig->category->icon->uid . '.' . $gig->category->icon->file_extension,
                ],
                "subcategory" => $gig->subcategory,
                "ville" => $gig->ville,
                "area" => $gig->subville,
                "imageMedium" => $gig->imageMedium,
                "imageLarge" => $gig->imageLarge,
                "documents" => $gig->documents,
                "reviews" => $gig->reviews,
                "favorite" => $gig->favorite = Favorite::where('user_id', auth()->id())->where('gig_id', $gig->id)->first() ? true : false,
                "created_at" => $gig->created_at,
                "updated_at" => $gig->updated_at,
            ],
        ], 200);

    }

    public function imageUp($pathFolder, $image)
    {

        // Generate unique file id
        $uid = uid();

        // Generate file name
        $name = $uid . ".png";

        // Get mime type
        $mime = "image/png";

        // Set path
        $path = $pathFolder . "/";

        $size = "2000";

        //Storage::disk("gigs")->put("gigs/previews/small/osdfsdfsd.png", base64_decode($request->thumbnail));

        $imageName = $name;
        Storage::disk('gigs')->put($path . $imageName, base64_decode($image));

        // Save file
        $file = new FileManager();
        $file->uid = $uid;
        $file->file_folder = $pathFolder;
        $file->file_size = $size;
        $file->file_mimetype = $mime;
        $file->file_extension = "png";
        $file->save();

        // Return file id
        return $file->id;

    }

}
