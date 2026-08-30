<?php

namespace App\Filament\Resources\Donors\Pages;

use App\Filament\Resources\Donors\DonorResource;
use App\Mail\DonorWelcomeMail;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Support\Facades\Mail;

class CreateDonor extends CreateRecord
{
    protected static string $resource = DonorResource::class;

       protected function afterCreate(): void
    {
        $donor = $this->record;

        Mail::to($donor->email)
            ->send(new DonorWelcomeMail($donor));
    }

}


