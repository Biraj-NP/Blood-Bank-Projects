<?php

namespace App\Filament\Widgets;

use App\Models\Bloodcampaign;
use App\Models\BloodRequest;
use App\Models\Contact;
use App\Models\Donor;
use App\Models\UserLogin;
use Filament\Widgets\ChartWidget;

class BloodBankPie extends ChartWidget
{
    protected ?string $heading = 'Blood Bank Overview (%)';

    protected static ?int $sort = 3;

    // Half width - Right side
    protected int|string|array $columnSpan = 1;


    /*
    |--------------------------------------------------------------------------
    | Chart Data
    |--------------------------------------------------------------------------
    */

    protected function getData(): array
    {
        /*
        |--------------------------------------------------------------------------
        | Current Year Total
        |--------------------------------------------------------------------------
        */

        $contacts = Contact::whereYear(
            'created_at',
            now()->year
        )->count();


        $users = UserLogin::whereYear(
            'created_at',
            now()->year
        )->count();


        $donors = Donor::whereYear(
            'created_at',
            now()->year
        )->count();


        $requests = BloodRequest::whereYear(
            'created_at',
            now()->year
        )->count();


        $campaigns = Bloodcampaign::whereYear(
            'created_at',
            now()->year
        )->count();


        /*
        |--------------------------------------------------------------------------
        | Total
        |--------------------------------------------------------------------------
        */

        $total =
            $contacts +
            $users +
            $donors +
            $requests +
            $campaigns;


        /*
        |--------------------------------------------------------------------------
        | Calculate Percentage
        |--------------------------------------------------------------------------
        */

        if ($total > 0) {

            $contactPercentage = round(
                ($contacts / $total) * 100,
                1
            );

            $userPercentage = round(
                ($users / $total) * 100,
                1
            );

            $donorPercentage = round(
                ($donors / $total) * 100,
                1
            );

            $requestPercentage = round(
                ($requests / $total) * 100,
                1
            );

            $campaignPercentage = round(
                ($campaigns / $total) * 100,
                1
            );

        } else {

            $contactPercentage = 0;

            $userPercentage = 0;

            $donorPercentage = 0;

            $requestPercentage = 0;

            $campaignPercentage = 0;
        }


        /*
        |--------------------------------------------------------------------------
        | Return Chart Data
        |--------------------------------------------------------------------------
        */

        return [

            'datasets' => [

                [

                    'label' => 'Percentage',

                    'data' => [

                        $contactPercentage,

                        $userPercentage,

                        $donorPercentage,

                        $requestPercentage,

                        $campaignPercentage,

                    ],


                    /*
                    |--------------------------------------------------------------------------
                    | Pie Colors
                    |--------------------------------------------------------------------------
                    */

                    'backgroundColor' => [

                        '#ef4444',

                        '#3b82f6',

                        '#22c55e',

                        '#f59e0b',

                        '#8b5cf6',

                    ],


                    'borderColor' => '#ffffff',

                    'borderWidth' => 2,

                ],

            ],


            /*
            |--------------------------------------------------------------------------
            | Labels
            |--------------------------------------------------------------------------
            */

            'labels' => [

                'Contacts',

                'Users',

                'Blood Donors',

                'Blood Requests',

                'Blood Campaigns',

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
        return 'pie';
    }


    /*
    |--------------------------------------------------------------------------
    | Chart Options
    |--------------------------------------------------------------------------
    */

    protected function getOptions(): array
    {
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

                    'top' => 5,

                    'bottom' => 5,

                    'left' => 5,

                    'right' => 5,

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

                    'callbacks' => [

                        'label' => 'function(context) {

                            let label = context.label || "";

                            let value = context.parsed || 0;

                            return label + ": " + value + "%";

                        }',

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
