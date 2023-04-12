<?php

namespace App\Http\Controllers\appIpa;

use App\Http\Controllers\Controller;
use App\Models\Favorite;
use App\Models\Gig as ModelsGig;
use Illuminate\Http\Request;
use Livewire\Component;

class FavoriteServer extends Controller
{

    /**
     * Remove gig from favorite
     *
     * @param string $id
     * @return void
     */
    public function removeFromFavorite($id)
    {

        // Get gig
        $gig = ModelsGig::where('id', $id)->where('user_id', '!=', auth()->user()->id)->active()->firstOrFail();

        // Check if gig already in favorite
        $favorite = Favorite::where('user_id', auth()->user()->id)->where('gig_id', $gig->id)->first();

        // Check if already exists
        if ($favorite) {

            // Delete
            $favorite->delete();

            // Update status
            $this->favorite = false;

            // Success
            return "true";

        }

    }

    /**
     * Add gig to favorite list
     *
     * @param string $id
     * @return mixed
     */
    public function addToFavorite($id)
    {

        try {

            // Get gig
            $gig = ModelsGig::where('id', $id)->where('user_id', '!=', auth()->id())->active()->firstOrFail();
            if (!$gig) {
                // Error
                return response([
                    'message' => 'Err',
                ], 401);

            }
            // Check if gig already in favorite
            $in_favorite = Favorite::where('user_id', auth()->user()->id)->where('gig_id', $gig->id)->first();

            // Check if already exists
            if ($in_favorite) {
                // Error
                return response([
                    'message' => 'Err',
                ], 401);

            }

            // Add to list
            Favorite::create([
                'gig_id' => $gig->id,
                'user_id' => auth()->user()->id,
            ]);

            // Set status
            $this->favorite = true;

            // Success
            return response([
                'message' => 'success',
            ], 200);
        } catch (e) {
            response([
                'message' => 'Err',
            ], 405);
        }

    }
}
