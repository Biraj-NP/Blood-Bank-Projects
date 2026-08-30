<?php

namespace App\Filament\Resources\UserLogins\Tables;

use App\Mail\AdminMessageMail;
use Filament\Actions\Action;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Support\Facades\Mail;

class UserLoginsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('user_type')
                    ->badge(),

                TextColumn::make('email')
                    ->label('Email Address')
                    ->searchable(),

                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),

                TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])

            ->filters([
                //
            ])

            ->recordActions([
                EditAction::make(),

                Action::make('sendEmail')
                    ->label('Send Email')
                    ->icon('heroicon-o-envelope')

                    ->form([
                        TextInput::make('subject')
                            ->label('Subject')
                            ->required(),

                        Textarea::make('message')
                            ->label('Message')
                            ->rows(5)
                            ->required(),
                    ])

                    ->action(function ($record, array $data) {

                        try {

                            // कुन email मा mail जान लागेको हो हेर्न
                            // dd($record->email);

                            Mail::to($record->email)->send(
                                new AdminMessageMail(
                                    $data['subject'],
                                    $data['message']
                                )
                            );

                        } catch (\Exception $e) {

                            dd($e->getMessage());

                        }

                    })

                    ->successNotificationTitle('Email sent successfully'),
            ])

            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
