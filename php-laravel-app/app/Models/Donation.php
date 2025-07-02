<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Donation extends Model
{
    use HasFactory;

    protected $fillable = [
        'donor_id', 'campaign_id', 'amount', 'donation_type', 'fund_restriction', 'fund_purpose', 'transaction_id', 'donation_date', 'receipt_sent', 'receipt_number'
    ];

    protected $casts = [
        'amount' => 'decimal:2',
        'donation_date' => 'datetime',
        'receipt_sent' => 'boolean',
    ];
    
    public function donor()
    {
        return $this->belongsTo(Donor::class);
    }

    public function campaign()
    {
        return $this->belongsTo(DonationCampaign::class, 'campaign_id');
    }
}
