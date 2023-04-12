<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Cache;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $guarded = [];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    /**
     * Get user verification
     *
     * @return object
     */
    public function verification()
    {
        return $this->hasOne(VerificationCenter::class, 'user_id');
    }


    /**
     * Get user avatar
     *
     * @return object
     */
    public function avatar()
    {
        return $this->belongsTo(FileManager::class, 'avatar_id');
    }

    /**
     * Get user billing info
     *
     * @return object
     */
    public function billing()
    {
        return $this->hasOne(UserBilling::class, 'user_id');
    }

    /**
     * Get user level
     *
     * @return object
     */
    public function level()
    {
        return $this->belongsTo(Level::class, 'level_id');
    }

    /**
     * Get user country
     *
     * @return object
     */
    public function country()
    {
        return $this->belongsTo(Country::class, 'country_id');
    }

    /**
     * Get user sales
     *
     * @return object
     */
    public function sales()
    {
        return $this->hasMany(OrderItem::class, 'owner_id');
    }

    /**
     * Get user skills
     *
     * @return object
     */
    public function skills()
    {
        return $this->hasMany(UserSkill::class, 'user_id');
    }

    /**
     * Get user linked account
     *
     * @return object
     */
    public function accounts()
    {
        return $this->hasOne(UserLinkedAccount::class, 'user_id');
    }

    /**
     * Get user projects
     *
     * @return object
     */
    public function projects()
    {
        return $this->hasMany(UserPortfolio::class, 'user_id');
    }

    /**
     * Get user languages
     *
     * @return object
     */
    public function languages()
    {
        return $this->hasMany(UserLanguage::class, 'user_id');
    }

    /**
     * Get user availability
     *
     * @return object
     */
    public function availability()
    {
        return $this->hasOne(UserAvailability::class, 'user_id');
    }

    /**
     * Check if user online
     *
     * @return boolean
     */
    public function isOnline(){
        return Cache::has('user-is-online-'. $this->id);
    }

    /**
     * Get seller reviews
     *
     * @return object
     */
    public function reviews()
    {
        return $this->hasMany(Review::class, 'seller_id');
    }

    /**
     * Get seller rating
     *
     * @return integer
     */
    public function rating()
    {
        try {
            
            // Get total rating
            $total_rating  = $this->reviews()->sum('rating');

            // Get total reviews
            $total_reviews = $this->reviews()->count();

            // Retun rating
            return $total_reviews === 0 ? 0 : $total_rating / $total_reviews;

        } catch (\Throwable $th) {
            return 0;
        }
    }

    /**
     * Get notifications
     *
     * @return object
     */
    public function notifications()
    {
        return $this->hasMany(Notification::class, 'user_id');
    }
}
