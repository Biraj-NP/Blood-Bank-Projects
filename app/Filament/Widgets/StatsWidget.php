<?php

namespace App\Filament\Widgets;

use App\Models\Bloodcampaign;
use App\Models\BloodRequest;
use App\Models\Contact;
use App\Models\Donor;
use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsWidget extends StatsOverviewWidget
{
    protected static ?int $sort = 1;

    protected function getStats(): array
    {
        /*
        |--------------------------------------------------------------------------
        | Today's Data
        |--------------------------------------------------------------------------
        */

        $todayContacts = Contact::whereDate('created_at', today())->count();

        $todayDonors = Donor::whereDate('created_at', today())->count();

        $todayRequests = BloodRequest::whereDate('created_at', today())->count();

        $todayCampaigns = Bloodcampaign::whereDate('created_at', today())->count();


        /*
        |--------------------------------------------------------------------------
        | Last 7 Days Data
        |--------------------------------------------------------------------------
        */

        $contactChart = [];
        $donorChart = [];
        $requestChart = [];
        $campaignChart = [];

        for ($i = 6; $i >= 0; $i--) {

            $date = now()->subDays($i)->toDateString();

            // Contacts
            $contactChart[] = Contact::whereDate('created_at', $date)->count();

            // Donors
            $donorChart[] = Donor::whereDate('created_at', $date)->count();

            // Blood Requests
            $requestChart[] = BloodRequest::whereDate('created_at', $date)->count();

            // Campaigns
            $campaignChart[] = Bloodcampaign::whereDate('created_at', $date)->count();
        }


        /*
        |--------------------------------------------------------------------------
        | Stats Cards
        |--------------------------------------------------------------------------
        */

        return [

            // Contacts
            Stat::make('Contacts', Contact::count())->description($todayContacts . ' received today')->descriptionIcon('heroicon-m-chat-bubble-left-right')
                ->color('danger')
                ->chart($contactChart)
                ->url(route('filament.admin.resources.contacts.index')),


            // Campaigns
            Stat::make(
                'Campaigns',
                Bloodcampaign::count()
            )
                ->description(
                    $todayCampaigns . ' created today'
                )
                ->descriptionIcon(
                    'heroicon-m-calendar-days'
                )
                ->color('danger')
                ->chart($campaignChart)
                ->url(
                    route(
                        'filament.admin.resources.bloodcampaigns.index'
                    )
                ),


            // Blood Donors
            Stat::make(
                'Donors',
                Donor::count()
            )
                ->description(
                    $todayDonors . ' registered today'
                )
                ->descriptionIcon(
                    'heroicon-m-heart'
                )
                ->color('danger')
                ->chart($donorChart)
                ->url(
                    route(
                        'filament.admin.resources.donors.index'
                    )
                ),


            // Blood Requests
            Stat::make(
                'Blood Requests',
                BloodRequest::count()
            )
                ->description(
                    $todayRequests . ' requested today'
                )
                ->descriptionIcon(
                    'heroicon-m-clipboard-document-check'
                )
                ->color('danger')
                ->chart($requestChart)
                ->url(
                    route(
                        'filament.admin.resources.blood-requests.index'
                    )
                ),
        ];
    }
}
