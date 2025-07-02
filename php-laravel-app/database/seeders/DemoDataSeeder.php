<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Donor;
use App\Models\DonationCampaign;
use App\Models\Donation;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class DemoDataSeeder extends Seeder
{
    public function run(): void
    {
        $campaigns = [
            ['name' => 'General Ministry Fund',
            'description' => 'Support ongoing ministry and relief work worldwide',
            'target_amount' => 100000.00,
            'current_amount' => 0,
            'is_active' => true,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
            ],
            ['name' => 'Emergency Disaster Relief',
            'description' => 'Immediate response to natural disasters and emergencies',
            'target_amount' => 50000.00,
            'current_amount' => 0,
            'is_active' => true,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
            ],
            ['name' => 'Children\'s Programs',
            'description' => 'Support for children\'s education and welfare programs',
            'target_amount' => 75000.00,
            'current_amount' => 0,
            'is_active' => true,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
            ],
            ['name' => 'Medical Mission Support',
            'description' => 'Funding for medial missions and healthcare programs',
            'target_amount' => 60000.00,
            'current_amount' => 0,
            'is_active' => true,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
            ]
        ];

        foreach($campaigns as $campaign){
            DonationCampaign::create($campaign);
        }

        $donors = [
            [
                'first_name' =>'John',
                'last_name' => 'Smith',
                'email' => 'john.smith@example.com',
                'phone' => '(403) 555-0101',
                'address' => '123 Main St, Calgary, AB T2P 1A1',
            ],
            [
                'first_name' =>'Sara',
                'last_name' => 'Johnson',
                'email' => 'sarah.johnson@example.com',
                'phone' => '(403) 555-0102',
                'address' => '456 Oak Ave, Calgary, AB T2P 1A2',
            ],
            [
                'first_name' =>'Michael',
                'last_name' => 'Brown',
                'email' => 'michael.brown@example.com',
                'phone' => '(403) 555-0103',
                'address' => '789 Pine St, Calgary, AB T2P 1A3',
            ],
            [
                'first_name' =>'Emily',
                'last_name' => 'Davis',
                'email' => 'emily.davis@example.com',
                'phone' => '(403) 555-0104',
                'address' => '101 Elm St, Calgary, AB T2P 1A4',
            ],      
            [
                'first_name' =>'David',
                'last_name' => 'Wilson',
                'email' => 'david.wilson@example.com',
                'phone' => '(403) 555-0105',
                'address' => '101 Elm St, Calgary, AB T2P 1A5',
            ],      
            [
                'first_name' =>'Olivia',
                'last_name' => 'Taylor',
                'email' => 'olivia.taylor@example.com',
                'phone' => '(403) 555-0106',
                'address' => '654 Maple Rd, Calgary, AB T2P 1A6',
            ],      
        ];

        foreach($donors as $donor){
            Donor::create($donor);
        }

        $donations = [
            [
                'donor_id' => 1, 
                'campaign_id' => 1, 
                'amount' => 250.00, 
                'donation_type' => 'one-time',
                'fund_restriction' => 'unrestricted',
                'fund_purpose' => null,
                'transaction_id' => 'TXN001',
                'donation_date' => Carbon::now()->subDays(10),
                'receipt_sent' => true,
                'receipt_number' => 'RCP24001'
            ],
            [
                'donor_id' => 2, 
                'campaign_id' => 2, 
                'amount' => 500.00, 
                'donation_type' => 'one-time',
                'fund_restriction' => 'restricted',
                'fund_purpose' => 'Hurricane Relief',
                'transaction_id' => 'TXN002',
                'donation_date' => Carbon::now()->subDays(8),
                'receipt_sent' => true,
                'receipt_number' => 'RCP24002'
            ],
            [
                'donor_id' => 3, 
                'campaign_id' => 3, 
                'amount' => 100.00, 
                'donation_type' => 'recurring',
                'fund_restriction' => 'restricted',
                'fund_purpose' => 'Children Education',
                'transaction_id' => 'TXN003',
                'donation_date' => Carbon::now()->subDays(5),
                'receipt_sent' => true,
                'receipt_number' => 'RCP24003'
            ],
            [
                'donor_id' => 4, 
                'campaign_id' => 4, 
                'amount' => 75.00, 
                'donation_type' => 'one-time',
                'fund_restriction' => 'unrestricted',
                'fund_purpose' => null,
                'transaction_id' => 'TXN004',
                'donation_date' => Carbon::now()->subDays(3),
                'receipt_sent' => false,
                'receipt_number' => 'RCP24004'
            ],
            [
                'donor_id' => 5, 
                'campaign_id' => 4, 
                'amount' => 300.00,
                'donation_type' => 'one-time',
                'fund_restriction' => 'restricted',
                'fund_purpose' => 'Medical Supplies',
                'transaction_id' => 'TXN005',
                'donation_date' => Carbon::now()->subDays(2),
                'receipt_sent' => true,
                'receipt_number' => 'RCP24005'
            ],
            [
                'donor_id' => 1, 
                'campaign_id' => 2, 
                'amount' => 150.00, 
                'donation_type' => 'one-time',
                'fund_restriction' => 'restricted',
                'fund_purpose' => 'Emergency Response',
                'transaction_id' => 'TXN006',
                'donation_date' => Carbon::now()->subDays(1),
                'receipt_sent' => true,
                'receipt_number' => 'RCP24006'
            ],
            [
                'donor_id' => 2, 
                'campaign_id' => 1, 
                'amount' => 200.00, 
                'donation_type' => 'recurring',
                'fund_restriction' => 'unrestricted',
                'fund_purpose' => null,
                'transaction_id' => 'TXN007',
                'donation_date' => Carbon::now(),
                'receipt_sent' => false,
                'receipt_number' => 'RCP24007'
            ]
        ]; 

        foreach($donations as $donation){
            Donation::create($donation);
        }

        $campaigns = DonationCampaign::all();
        foreach($campaigns as $campaign) {
            $campaign->updateCurrentAmount();
        }
        echo "Demo data seeded successfully!\n";
        echo "Created:\n";
        echo "- " . Donor::count() . " donors\n";
        echo "- " . DonationCampaign::count() . " campaigns\n";
        echo "- " . Donation::count() . " donations\n";
        echo "- Total donations: $" . number_format(Donation::sum('amount'), 2) . "\n";
    }
}
