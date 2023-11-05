<?php

namespace App\Filament\Resources\AdminResource\Pages;

use App\Filament\Resources\AdminResource;
use App\Models\User;
use Filament\Resources\Pages\CreateRecord;

class CreateAdmin extends CreateRecord
{
    protected static string $resource = AdminResource::class;

    public function mount(): void
    {
        $user = User::find(auth()->user()->id);
        $allowed = $user->canCreateAdmins();
        abort_unless($allowed, 403);
    }

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['is_admin'] = 1;

        return $data;
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
