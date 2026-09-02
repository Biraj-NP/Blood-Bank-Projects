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

    // Half width - Left side
    protected int|string|array $columnSpan = 1;

    // Highest chart value
    protected int $chartMaxValue = 1;


    /*
    |--------------------------------------------------------------------------
    | Chart Data
    |--------------------------------------------------------------------------
    */

    protected function getData(): array
    {
        $contacts = [];
        $users = [];
        $donors = [];
        $requests = [];
        $campaigns = [];


        /*
        |--------------------------------------------------------------------------
        | Monthly Data
        |--------------------------------------------------------------------------
        */

        for ($month = 1; $month <= 12; $month++) {

            // Contacts
            $contacts[] = Contact::whereYear(
                'created_at',
                now()->year
            )
            ->whereMonth('created_at', $month)
            ->count();


            // Users
            $users[] = UserLogin::whereYear(
                'created_at',
                now()->year
            )
            ->whereMonth('created_at', $month)
            ->count();


            // Blood Donors
            $donors[] = Donor::whereYear(
                'created_at',
                now()->year
            )
            ->whereMonth('created_at', $month)
            ->count();


            // Blood Requests
            $requests[] = BloodRequest::whereYear(
                'created_at',
                now()->year
            )
            ->whereMonth('created_at', $month)
            ->count();


            // Blood Campaigns
            $campaigns[] = Bloodcampaign::whereYear(
                'created_at',
                now()->year
            )
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


        /*
        |--------------------------------------------------------------------------
        | Return Data
        |--------------------------------------------------------------------------
        */

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

                    'backgroundColor' => '#3b82f6',

                    'borderColor' => '#2563eb',

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

                    'backgroundColor' => '#22c55e',

                    'borderColor' => '#16a34a',

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

                    'backgroundColor' => '#f59e0b',

                    'borderColor' => '#d97706',

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

                    'backgroundColor' => '#8b5cf6',

                    'borderColor' => '#7c3aed',

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


    /*
    |--------------------------------------------------------------------------
    | Chart Type
    |--------------------------------------------------------------------------
    */

    protected function getType(): string
    {
        return 'bar';
    }


    /*
    |--------------------------------------------------------------------------
    | Chart Options
    |--------------------------------------------------------------------------
    */

    protected function getOptions(): array
    {
        $yAxisMax = max(
            2,
            $this->chartMaxValue + 1
        );


        return [

            /*
            |--------------------------------------------------------------------------
            | Responsive
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
            | Bar Size
            |--------------------------------------------------------------------------
            */

            'datasets' => [

                'bar' => [

                    'categoryPercentage' => 0.95,

                    'barPercentage' => 0.98,

                    'maxBarThickness' => 35,

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

                        'padding' => 6,

                        'font' => [

                            'size' => 9,

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

                    'offset' => false,

                    'grid' => [

                        'display' => false,

                    ],

                    'ticks' => [

                        'padding' => 2,

                        'font' => [

                            'size' => 9,

                        ],

                    ],

                ],


                /*
                |--------------------------------------------------------------------------
                | Y Axis
                |--------------------------------------------------------------------------
                */

                'y' => [

                    'beginAtZero' => true,

                    'max' => $yAxisMax,

                    'ticks' => [

                        'precision' => 0,

                        'stepSize' => 1,

                        'padding' => 2,

                        'font' => [

                            'size' => 9,

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
