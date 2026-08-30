<?php

namespace App\Filament\Resources\Donors\Tables;

use App\Mail\DonorWelcomeMail;
use App\Models\Bloodcampaign;
use Filament\Actions\Action;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Forms\Components\Select;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Support\Facades\Mail;

class DonorsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('first_name')
                    ->searchable(),

                TextColumn::make('last_name')
                    ->searchable(),

                TextColumn::make('email')
                    ->label('Email address')
                    ->searchable(),

                TextColumn::make('phone')
                    ->searchable(),

                TextColumn::make('dob')
                    ->date()
                    ->sortable(),

                TextColumn::make('gender')
                    ->badge(),

                TextColumn::make('blood_group')
                    ->searchable(),

                TextColumn::make('province')
                    ->searchable(),

                TextColumn::make('district')
                    ->searchable(),

                IconColumn::make('is_verified')
                    ->boolean(),

                IconColumn::make('is_active')
                    ->boolean(),

                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),

                TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])

            ->recordActions([

                /*
                |--------------------------------------------------------------------------
                | SEND EMAIL
                |--------------------------------------------------------------------------
                */

                Action::make('sendEmail')
                    ->label('Send Email')
                    ->icon('heroicon-o-envelope')
                    ->color('success')

                    ->form([
                        Select::make('campaign_id')
                            ->label('Campaign ID')
                            ->options(
                                Bloodcampaign::query()
                                    ->orderBy('id', 'desc')
                                    ->get()
                                    ->mapWithKeys(function ($campaign) {
                                        return [
                                            $campaign->id =>
                                            'ID ' . $campaign->id .
                                                ' - ' . $campaign->title
                                        ];
                                    })
                            )
                            ->searchable()
                            ->required()
                            ->placeholder('Select Campaign ID'),
                    ])

                    ->requiresConfirmation()

                    ->modalHeading('Send Donor Email')

                    ->modalDescription(
                        'Select the Campaign ID. The selected Campaign ID and campaign details will be included in the donor email.'
                    )

                    ->action(function ($record, array $data) {

                        $campaign = Bloodcampaign::findOrFail(
                            $data['campaign_id']
                        );

                        Mail::to($record->email)
                            ->send(
                                new DonorWelcomeMail(
                                    $record,
                                    $campaign
                                )
                            );
                    })

                    ->successNotificationTitle(
                        'Email sent successfully.'
                    ),

                EditAction::make(),
            ])

            ->filters([
                //
            ])

            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
