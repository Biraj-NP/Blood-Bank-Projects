<?php

namespace App\Filament\Widgets;

use App\Models\Bloodcampaign;
use App\Models\BloodRequest;
use App\Models\Contact;
use App\Models\Donor;
use App\Models\UserLogin;
use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsWidget extends StatsOverviewWidget
{
    protected static ?int $sort = 1;

    protected function getStats(): array
    {
        // Today's data
        $todayContacts = Contact::whereDate('created_at', today())->count();

        $todayUsers = UserLogin::whereDate('created_at', today())->count();

        $todayDonors = Donor::whereDate('created_at', today())->count();

        $todayRequests = BloodRequest::whereDate('created_at', today())->count();

        $todayCampaigns = Bloodcampaign::whereDate('created_at', today())->count();

        return [

            // Contacts
            Stat::make('Contacts', Contact::count())
                ->description($todayContacts . ' received today')
                ->color('danger')
                ->url(route('filament.admin.resources.contacts.index'))
                ->descriptionIcon('heroicon-m-chat-bubble-left-right'),

            // // Users
            // Stat::make('Users', UserLogin::count())
            //     ->description($todayUsers . ' registered today')
            //     ->color('danger')
            //     ->url(route('filament.admin.resources.user-logins.index'))
            //     ->descriptionIcon('heroicon-m-users'),

            // Campaigns
            Stat::make('Campaigns', Bloodcampaign::count())
                ->description($todayCampaigns . ' created today')
                ->color('danger')
                ->url(route('filament.admin.resources.bloodcampaigns.index'))
                ->descriptionIcon('heroicon-m-calendar-days'),

            // Blood Donors
            Stat::make('Donors', Donor::count())
                ->description($todayDonors . ' registered today')
                ->color('danger')
                ->url(route('filament.admin.resources.donors.index'))
                ->descriptionIcon('heroicon-m-heart'),

            // Blood Requests
            Stat::make('Blood Requests', BloodRequest::count())
                ->description($todayRequests . ' requested today')
                ->color('danger')
                ->url(route('filament.admin.resources.blood-requests.index'))
                ->descriptionIcon('heroicon-m-clipboard-document-check'),
        ];
    }
}
