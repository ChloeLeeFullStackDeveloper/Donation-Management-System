<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DonationCampaign extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'description', 'target_amount', 'current_amount', 'is_active'
    ];

    protected $casts = [
        'target_amount' => 'decimal:2',
        'current_amount' => 'decimal:2',
        'is_active' => 'boolean',
    ];
    public function donations()
    {
        return $this->hasMany(Donation::class, 'campaign_id');
    }

    public function updateCurrentAmount()
    {
        $this->current_amount = $this->donations()->sum('amount');
        $this->save();
    }
}
