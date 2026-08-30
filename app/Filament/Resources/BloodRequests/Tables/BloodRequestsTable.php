<?php

namespace App\Filament\Resources\BloodRequests\Tables;

use App\Mail\BloodRequestWelcomeMail;
use App\Models\BBMSCompany;
use App\Models\Bloodcampaign;
use Filament\Actions\Action;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Support\Facades\Mail;

class BloodRequestsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('first_name')
                    ->label('First Name')
                    ->searchable(),

                TextColumn::make('last_name')
                    ->label('Last Name')
                    ->searchable(),

                TextColumn::make('email')
                    ->label('Email Address')
                    ->searchable(),

                TextColumn::make('phone')
                    ->label('Phone')
                    ->searchable(),

                TextColumn::make('dob')
                    ->label('Date of Birth')
                    ->date()
                    ->sortable(),

                TextColumn::make('gender')
                    ->badge(),

                TextColumn::make('blood_group')
                    ->label('Blood Group')
                    ->badge(),

                TextColumn::make('province')
                    ->searchable(),

                TextColumn::make('district')
                    ->searchable(),

                TextColumn::make('campaign.title')
                    ->label('Campaign')
                    ->searchable()
                    ->toggleable(),

                IconColumn::make('is_verified')
                    ->label('Verified')
                    ->boolean(),

                IconColumn::make('is_active')
                    ->label('Active')
                    ->boolean(),

                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(
                        isToggledHiddenByDefault: true
                    ),

                TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(
                        isToggledHiddenByDefault: true
                    ),
            ])

            ->filters([
                //
            ])

            ->recordActions([

                /*
                |--------------------------------------------------------------------------
                | Send Email
                |--------------------------------------------------------------------------
                */

                Action::make('sendEmail')
                    ->label('Send Email')
                    ->icon('heroicon-o-envelope')
                    ->color('success')

                    ->schema([

                        /*
                        |--------------------------------------------------------------------------
                        | Optional Heading
                        |--------------------------------------------------------------------------
                        */

                        TextInput::make('customHeading')
                            ->label('Email Heading')
                            ->placeholder(
                                'Leave empty to use default heading'
                            )
                            ->helperText(
                                'Optional. If you do not write anything, the default heading will be used.'
                            )
                            ->maxLength(255),

                        /*
                        |--------------------------------------------------------------------------
                        | Optional Message
                        |--------------------------------------------------------------------------
                        */

                        RichEditor::make('customMessage')
                            ->label('Email Message')
                            ->placeholder(
                                'Leave empty to use the default message'
                            )
                            ->helperText(
                                'Optional. Write additional information only when needed.'
                            )
                            ->toolbarButtons([
                                'bold',
                                'italic',
                                'underline',
                                'bulletList',
                                'orderedList',
                                'link',
                            ])
                            ->columnSpanFull(),

                        /*
                        |--------------------------------------------------------------------------
                        | Optional Campaign
                        |--------------------------------------------------------------------------
                        */

                        Select::make('campaign_id')
                            ->label('Blood Donation Campaign')
                            ->options(
                                Bloodcampaign::query()
                                    ->orderByDesc('id')
                                    ->pluck('title', 'id')
                                    ->toArray()
                            )
                            ->searchable()
                            ->preload()
                            ->nullable()
                            ->helperText(
                                'Optional. Select a campaign if you want campaign information in the email.'
                            ),
                    ])

                    ->requiresConfirmation()

                    ->modalHeading(
                        'Send Blood Request Email'
                    )

                    ->modalDescription(
                        'Heading and message are optional. Leave them empty to send the default email.'
                    )

                    ->action(function ($record, array $data): void {

                        /*
                        |--------------------------------------------------------------------------
                        | Get Campaign
                        |--------------------------------------------------------------------------
                        */

                        $campaign = null;

                        if (!empty($data['campaign_id'])) {
                            $campaign = Bloodcampaign::find(
                                $data['campaign_id']
                            );
                        }

                        /*
                        |--------------------------------------------------------------------------
                        | Get BBMS Company
                        |--------------------------------------------------------------------------
                        */

                        $BBMScompanies = BBMSCompany::first();

                        /*
                        |--------------------------------------------------------------------------
                        | Clean Custom Heading
                        |--------------------------------------------------------------------------
                        */

                        $customHeading = !empty(
                            trim($data['customHeading'] ?? '')
                        )
                            ? trim($data['customHeading'])
                            : null;

                        /*
                        |--------------------------------------------------------------------------
                        | Clean Custom Message
                        |--------------------------------------------------------------------------
                        */

                        $customMessage = !empty(
                            trim(strip_tags($data['customMessage'] ?? ''))
                        )
                            ? $data['customMessage']
                            : null;

                        /*
                        |--------------------------------------------------------------------------
                        | Send Email
                        |--------------------------------------------------------------------------
                        */

                        Mail::to($record->email)->send(
                            new BloodRequestWelcomeMail(
                                bloodRequest: $record,
                                campaign: $campaign,
                                BBMScompanies: $BBMScompanies,
                                customHeading: $customHeading,
                                customMessage: $customMessage,
                            )
                        );
                    })

                    ->successNotificationTitle(
                        'Blood request email sent successfully.'
                    ),

                /*
                |--------------------------------------------------------------------------
                | Edit
                |--------------------------------------------------------------------------
                */

                EditAction::make(),
            ])

            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
