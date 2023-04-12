<?php

namespace App\Http\Controllers\appIpa;

use App\Http\Controllers\Controller;
use App\Models\Favorite;
use App\Models\Order;
use App\Models\OrderItem;
use App\Notifications\User\Seller\OrderItemCanceled;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function getOrders()
    {
        $table = false;
        $orders = Order::where('buyer_id', auth()->id())->orderByDesc('id')->get(); //paginate(42);

        foreach ($orders as $order) {
            $git_images[] = [$order->items[0]->gig->thumbnail];
            foreach ($order->items[0]->gig->images as $image) {
                $git_images[] = [$image->small];
            }
            $table = true;

            $tableOrders[] = [
                'user_bayer' => [
                    "id" => $order->buyer->id,
                    "fcmToken" => $order->buyer->fcmToken,
                    "uid" => $order->buyer->uid,
                    "username" => $order->buyer->username,
                    "email" => $order->buyer->email,
                    "email_verified_at" => $order->buyer->email_verified_at,
                    "phon" => $order->buyer->phon,
                    "address" => $order->buyer->address,
                    "cin_or_passport" => $order->buyer->cin_or_passport,
                    "account_type" => $order->buyer->account_type,
                    "avatar" => $order->buyer->avatar_id ? $order->buyer->avatar->file_folder . "/" . $order->buyer->avatar->uid . "." . $order->buyer->avatar->file_extension : null,
                    "level_id" => $order->buyer->level_id,
                    "provider_name" => $order->buyer->provider_name,
                    "provider_id" => $order->buyer->provider_id,
                    "country_id" => $order->buyer->country_id,
                    "fullname" => $order->buyer->fullname,
                    "headline" => $order->buyer->headline,
                    "description" => $order->buyer->description,
                    "status" => $order->buyer->status,
                    "balance_net" => $order->buyer->balance_net,
                    "balance_withdrawn" => $order->buyer->balance_withdrawn,
                    "balance_purchases" => $order->buyer->balance_purchases,
                    "balance_pending" => $order->buyer->balance_pending,
                    "balance_available" => $order->buyer->balance_available,
                    "deleted_at" => $order->buyer->deleted_at,
                    "last_activity" => $order->buyer->last_activity,
                    "created_at" => $order->buyer->created_at,
                    "updated_at" => $order->buyer->updated_at,
                ],
                'job' => [
                    "id" => $order->items[0]->gig->id,
                    "title" => $order->items[0]->gig->title, // done
                    "description" => strip_tags($order->items[0]->gig->description), // done
                    "review" => $order->items[0]->gig->rating, // done
                    "price" => $order->items[0]->gig->price, // done
                    "user" => [
                        "id" => $order->items[0]->gig->owner->id,
                        "fcmToken" => $order->items[0]->gig->owner->fcmToken,
                        "uid" => $order->items[0]->gig->owner->uid,
                        "username" => $order->items[0]->gig->owner->username,
                        "email" => $order->items[0]->gig->owner->email,
                        "email_verified_at" => $order->items[0]->gig->owner->email_verified_at,
                        "phon" => $order->items[0]->gig->owner->phon,
                        "address" => $order->items[0]->gig->owner->address,
                        "cin_or_passport" => $order->items[0]->gig->owner->cin_or_passport,
                        "account_type" => $order->items[0]->gig->owner->account_type,
                        "avatar" => $order->items[0]->gig->owner->avatar_id ? $order->items[0]->gig->owner->avatar->file_folder . "/" . $order->items[0]->gig->owner->avatar->uid . "." . $order->items[0]->gig->owner->avatar->file_extension : null,
                        "level_id" => $order->items[0]->gig->owner->level_id,
                        "provider_name" => $order->items[0]->gig->owner->provider_name,
                        "provider_id" => $order->items[0]->gig->owner->provider_id,
                        "country_id" => $order->items[0]->gig->owner->country_id,
                        "fullname" => $order->items[0]->gig->owner->fullname,
                        "headline" => $order->items[0]->gig->owner->headline,
                        "description" => $order->items[0]->gig->owner->description,
                        "status" => $order->items[0]->gig->owner->status,
                        "balance_net" => $order->items[0]->gig->owner->balance_net,
                        "balance_withdrawn" => $order->items[0]->gig->owner->balance_withdrawn,
                        "balance_purchases" => $order->items[0]->gig->owner->balance_purchases,
                        "balance_pending" => $order->items[0]->gig->owner->balance_pending,
                        "balance_available" => $order->items[0]->gig->owner->balance_available,
                        "deleted_at" => $order->items[0]->gig->owner->deleted_at,
                        "last_activity" => $order->items[0]->gig->owner->last_activity,
                        "created_at" => $order->items[0]->gig->owner->created_at,
                        "updated_at" => $order->items[0]->gig->owner->updated_at,
                    ], // done
                    "img_thumb" => $order->items[0]->gig->thumbnail,
                    "git_images" => $git_images,
                    "category" => [
                        "id" => $order->items[0]->gig->category->id,
                        "name" => $order->items[0]->gig->category->name,
                        "image" => $order->items[0]->gig->category->image->uid . '.' . $order->items[0]->gig->category->image->file_extension,
                        "slug" => $order->items[0]->gig->category->slug,
                        "description" => $order->items[0]->gig->category->description,
                        "icon" => $order->items[0]->gig->category->icon->uid . '.' . $order->items[0]->gig->category->icon->file_extension,
                    ],
                    "subcategory" => $order->items[0]->gig->subcategory,
                    "ville" => $order->items[0]->gig->ville,
                    "area" => $order->items[0]->gig->subville,
                    "imageMedium" => $order->items[0]->gig->imageMedium,
                    "imageLarge" => $order->items[0]->gig->imageLarge,
                    "documents" => $order->items[0]->gig->documents,
                    "reviews" => $order->items[0]->gig->reviews,
                    "favorite" => $order->items[0]->gig->favorite = Favorite::where('user_id', auth()->id())->where('gig_id', $order->items[0]->gig->id)->first() ? true : false,
                    "created_at" => $order->items[0]->gig->created_at,
                    "updated_at" => $order->items[0]->gig->updated_at,
                ],
                'status' => $order->items[0]->status,
                'is_finished' => $order->items[0]->is_finished,
                'total_value' => $order->items[0]->total_value,
                "id" => $order->items[0]->id,
                "placed_at" => $order->items[0]->placed_at,
            ];
        }
        if ($table) {
            return $tableOrders;
        } else {
            return [];
        }

    }

    public function getOrdersSeller()
    {
        $orders = OrderItem::where('owner_id', auth()->id())->orderByDesc('id')->get(); //paginate(42);

        foreach ($orders as $order) {
            $git_images[] = [$order->gig->thumbnail];
            foreach ($order->gig->images as $image) {
                $git_images[] = [$image->small];
            }
            $tableOrders[] = [
                'user_bayer' => [
                    "id" => $order->order->buyer->id,
                    "fcmToken" => $order->order->buyer->fcmToken,
                    "uid" => $order->order->buyer->uid,
                    "username" => $order->order->buyer->username,
                    "email" => $order->order->buyer->email,
                    "email_verified_at" => $order->order->buyer->email_verified_at,
                    "phon" => $order->order->buyer->phon,
                    "address" => $order->order->buyer->address,
                    "cin_or_passport" => $order->order->buyer->cin_or_passport,
                    "account_type" => $order->order->buyer->account_type,
                    "avatar" => $order->order->buyer->avatar_id ? $order->order->buyer->avatar->file_folder . "/" . $order->order->buyer->avatar->uid . "." . $order->order->buyer->avatar->file_extension : null,
                    "level_id" => $order->order->buyer->level_id,
                    "provider_name" => $order->order->buyer->provider_name,
                    "provider_id" => $order->order->buyer->provider_id,
                    "country_id" => $order->order->buyer->country_id,
                    "fullname" => $order->order->buyer->fullname,
                    "headline" => $order->order->buyer->headline,
                    "description" => $order->order->buyer->description,
                    "status" => $order->order->buyer->status,
                    "balance_net" => $order->order->buyer->balance_net,
                    "balance_withdrawn" => $order->order->buyer->balance_withdrawn,
                    "balance_purchases" => $order->order->buyer->balance_purchases,
                    "balance_pending" => $order->order->buyer->balance_pending,
                    "balance_available" => $order->order->buyer->balance_available,
                    "deleted_at" => $order->order->buyer->deleted_at,
                    "last_activity" => $order->order->buyer->last_activity,
                    "created_at" => $order->order->buyer->created_at,
                    "updated_at" => $order->order->buyer->updated_at,
                ],
                'job' => [
                    "id" => $order->gig->id,
                    "title" => $order->gig->title, // done
                    "description" => strip_tags($order->gig->description), // done
                    "review" => $order->gig->rating, // done
                    "price" => $order->gig->price, // done
                    "user" => [
                        "id" => $order->gig->owner->id,
                        "fcmToken" => $order->gig->owner->fcmToken,
                        "uid" => $order->gig->owner->uid,
                        "username" => $order->gig->owner->username,
                        "email" => $order->gig->owner->email,
                        "email_verified_at" => $order->gig->owner->email_verified_at,
                        "phon" => $order->gig->owner->phon,
                        "address" => $order->gig->owner->address,
                        "cin_or_passport" => $order->gig->owner->cin_or_passport,
                        "account_type" => $order->gig->owner->account_type,
                        "avatar" => $order->gig->owner->avatar_id ? $order->gig->owner->avatar->file_folder . "/" . $order->gig->owner->avatar->uid . "." . $order->gig->owner->avatar->file_extension : null,
                        "level_id" => $order->gig->owner->level_id,
                        "provider_name" => $order->gig->owner->provider_name,
                        "provider_id" => $order->gig->owner->provider_id,
                        "country_id" => $order->gig->owner->country_id,
                        "fullname" => $order->gig->owner->fullname,
                        "headline" => $order->gig->owner->headline,
                        "description" => $order->gig->owner->description,
                        "status" => $order->gig->owner->status,
                        "balance_net" => $order->gig->owner->balance_net,
                        "balance_withdrawn" => $order->gig->owner->balance_withdrawn,
                        "balance_purchases" => $order->gig->owner->balance_purchases,
                        "balance_pending" => $order->gig->owner->balance_pending,
                        "balance_available" => $order->gig->owner->balance_available,
                        "deleted_at" => $order->gig->owner->deleted_at,
                        "last_activity" => $order->gig->owner->last_activity,
                        "created_at" => $order->gig->owner->created_at,
                        "updated_at" => $order->gig->owner->updated_at,
                    ], // done
                    "img_thumb" => $order->gig->thumbnail,
                    "git_images" => $git_images,
                    "category" => [
                        "id" => $order->gig->category->id,
                        "name" => $order->gig->category->name,
                        "image" => $order->gig->category->image->uid . '.' . $order->gig->category->image->file_extension,
                        "slug" => $order->gig->category->slug,
                        "description" => $order->gig->category->description,
                        "icon" => $order->gig->category->icon->uid . '.' . $order->gig->category->icon->file_extension,
                    ],
                    "subcategory" => $order->gig->subcategory,
                    "ville" => $order->gig->ville,
                    "area" => $order->gig->subville,
                    "imageMedium" => $order->gig->imageMedium,
                    "imageLarge" => $order->gig->imageLarge,
                    "documents" => $order->gig->documents,
                    "reviews" => $order->gig->reviews,
                    "favorite" => $order->gig->favorite = Favorite::where('user_id', auth()->id())->where('gig_id', $order->gig->id)->first() ? true : false,
                    "created_at" => $order->gig->created_at,
                    "updated_at" => $order->gig->updated_at,
                ],
                'status' => $order->status,
                'is_finished' => $order->is_finished,
                'total_value' => $order->total_value,
                "id" => $order->id,
                "placed_at" => $order->placed_at,
            ];
        }
        return $tableOrders;
    }

}
