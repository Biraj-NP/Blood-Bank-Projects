<?php

namespace App\Filament\Widgets;

use App\Models\Bloodcampaign;
use App\Models\BloodRequest;
use App\Models\Contact;
use App\Models\Donor;
use App\Models\UserLogin;
use Filament\Widgets\ChartWidget;

class BloodBankPost extends ChartWidget
{
    protected ?string $heading = 'Monthly Overview';

    protected static ?int $sort = 2;

    // Full width
    protected int|string|array $columnSpan = 'full';

    // Y-axis को maximum value store गर्न
    protected int $chartMaxValue = 1;

    protected function getData(): array
    {
        $contacts = [];
        $users = [];
        $donors = [];
        $requests = [];
        $campaigns = [];

        for ($month = 1; $month <= 12; $month++) {

            // Contacts
            $contacts[] = Contact::whereYear('created_at', now()->year)
                ->whereMonth('created_at', $month)
                ->count();

            // Users
            $users[] = UserLogin::whereYear('created_at', now()->year)
                ->whereMonth('created_at', $month)
                ->count();

            // Blood Donors
            $donors[] = Donor::whereYear('created_at', now()->year)
                ->whereMonth('created_at', $month)
                ->count();

            // Blood Requests
            $requests[] = BloodRequest::whereYear('created_at', now()->year)
                ->whereMonth('created_at', $month)
                ->count();

            // Blood Campaigns
            $campaigns[] = Bloodcampaign::whereYear('created_at', now()->year)
                ->whereMonth('created_at', $month)
                ->count();
        }

        /*
        |--------------------------------------------------------------------------
        | Find Highest Value
        |--------------------------------------------------------------------------
        */

        $this->chartMaxValue = max(
            max($contacts),
            max($users),
            max($donors),
            max($requests),
            max($campaigns),
            1
        );

        return [
            'datasets' => [

                /*
                |--------------------------------------------------------------------------
                | Contacts
                |--------------------------------------------------------------------------
                */

                [
                    'label' => 'Contacts',
                    'data' => $contacts,

                    'backgroundColor' => '#ef4444',
                    'borderColor' => '#dc2626',
                    'borderWidth' => 1,

                    'borderRadius' => 2,
                ],

                /*
                |--------------------------------------------------------------------------
                | Users
                |--------------------------------------------------------------------------
                */

                [
                    'label' => 'Users',
                    'data' => $users,

                    'backgroundColor' => '#ef4444',
                    'borderColor' => '#dc2626',
                    'borderWidth' => 1,

                    'borderRadius' => 2,
                ],

                /*
                |--------------------------------------------------------------------------
                | Blood Donors
                |--------------------------------------------------------------------------
                */

                [
                    'label' => 'Blood Donors',
                    'data' => $donors,

                    'backgroundColor' => '#ef4444',
                    'borderColor' => '#dc2626',
                    'borderWidth' => 1,

                    'borderRadius' => 2,
                ],

                /*
                |--------------------------------------------------------------------------
                | Blood Requests
                |--------------------------------------------------------------------------
                */

                [
                    'label' => 'Blood Requests',
                    'data' => $requests,

                    'backgroundColor' => '#ef4444',
                    'borderColor' => '#dc2626',
                    'borderWidth' => 1,

                    'borderRadius' => 2,
                ],

                /*
                |--------------------------------------------------------------------------
                | Blood Campaigns
                |--------------------------------------------------------------------------
                */

                [
                    'label' => 'Blood Campaigns',
                    'data' => $campaigns,

                    'backgroundColor' => '#ef4444',
                    'borderColor' => '#dc2626',
                    'borderWidth' => 1,

                    'borderRadius' => 2,
                ],
            ],

            /*
            |--------------------------------------------------------------------------
            | Months
            |--------------------------------------------------------------------------
            */

            'labels' => [
                'Jan',
                'Feb',
                'Mar',
                'Apr',
                'May',
                'Jun',
                'Jul',
                'Aug',
                'Sep',
                'Oct',
                'Nov',
                'Dec',
            ],
        ];
    }

    protected function getType(): string
    {
        return 'bar';
    }

    protected function getOptions(): array
    {
        /*
        |--------------------------------------------------------------------------
        | Dynamic Y-Axis Maximum
        |--------------------------------------------------------------------------
        |
        | यदि highest value 1 छ  => max 2
        | यदि highest value 5 छ  => max 6
        | यदि highest value 8 छ  => max 9
        | यदि highest value 10 छ => max 11
        |
        */

        $yAxisMax = max(2, $this->chartMaxValue + 1);

        return [

            /*
            |--------------------------------------------------------------------------
            | Chart
            |--------------------------------------------------------------------------
            */

            'responsive' => true,

            'maintainAspectRatio' => false,


            /*
            |--------------------------------------------------------------------------
            | Layout
            |--------------------------------------------------------------------------
            */

            'layout' => [
                'padding' => [
                    'top' => 0,
                    'bottom' => 0,
                    'left' => 0,
                    'right' => 0,
                ],
            ],


            /*
            |--------------------------------------------------------------------------
            | BAR SIZE
            |--------------------------------------------------------------------------
            |
            | यी setting ले bar लाई मोटा बनाउँछ
            | र bar हरूबीचको gap धेरै कम गर्छ।
            |
            */

            'datasets' => [
                'bar' => [

                    // Month बीचको gap धेरै कम
                    'categoryPercentage' => 0.95,

                    // एउटै month का bars लगभग जोडिएको
                    'barPercentage' => 0.98,

                    // Thick bar
                    'maxBarThickness' => 45,

                    // हल्का rounded corner
                    'borderRadius' => 2,
                ],
            ],


            /*
            |--------------------------------------------------------------------------
            | Plugins
            |--------------------------------------------------------------------------
            */

            'plugins' => [

                /*
                |--------------------------------------------------------------------------
                | Legend
                |--------------------------------------------------------------------------
                */

                'legend' => [
                    'display' => true,

                    'position' => 'bottom',

                    'labels' => [
                        'boxWidth' => 10,
                        'boxHeight' => 10,

                        // Legend को unnecessary gap कम
                        'padding' => 8,

                        'font' => [
                            'size' => 10,
                        ],
                    ],
                ],


                /*
                |--------------------------------------------------------------------------
                | Tooltip
                |--------------------------------------------------------------------------
                */

                'tooltip' => [
                    'enabled' => true,

                    'mode' => 'index',

                    'intersect' => false,
                ],
            ],


            /*
            |--------------------------------------------------------------------------
            | Scales
            |--------------------------------------------------------------------------
            */

            'scales' => [

                /*
                |--------------------------------------------------------------------------
                | X Axis
                |--------------------------------------------------------------------------
                */

                'x' => [

                    // Month को सुरु/अन्त्यमा extra gap नहोस्
                    'offset' => false,

                    'grid' => [
                        'display' => false,
                    ],

                    'ticks' => [
                        'padding' => 2,

                        'font' => [
                            'size' => 10,
                        ],
                    ],
                ],


                /*
                |--------------------------------------------------------------------------
                | Y Axis
                |--------------------------------------------------------------------------
                */

                'y' => [

                    // 0 बाट सुरु
                    'beginAtZero' => true,

                    // Dynamic maximum
                    'max' => $yAxisMax,

                    'ticks' => [

                        // 1, 2, 3, 4... integer मात्र
                        'precision' => 0,

                        // प्रत्येक 1 value मा tick
                        'stepSize' => 1,

                        'padding' => 2,

                        'font' => [
                            'size' => 10,
                        ],
                    ],

                    'grid' => [

                        'display' => true,

                        'drawBorder' => false,

                        'lineWidth' => 1,
                    ],
                ],
            ],
        ];
    }


    /*
    |--------------------------------------------------------------------------
    | Chart Height
    |--------------------------------------------------------------------------
    */

    protected function getContentHeight(): ?string
    {
        return '360px';
    }
}
