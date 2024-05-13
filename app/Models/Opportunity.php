<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Opportunity extends Model
{
    use HasFactory;

    public function users() : BelongsToMany
    {
        return $this->belongsToMany(User::class, 'opportunity_user', 'opportunity_id', 'user_id');
    }

    // protected $casts = [
    //     'closing_date' => 'date'
    // ];

    public function feedbacks() : HasMany
    {
        return $this->hasMany(Feedback::class);
    }
}
