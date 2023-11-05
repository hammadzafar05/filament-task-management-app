<?php

namespace App\Filament\Resources\TaskResource\Pages;

use App\Filament\Resources\TaskResource;
use App\Mail\NewTaskCreatedForUser;
use App\Models\User;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class CreateTask extends CreateRecord
{
    protected static string $resource = TaskResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    protected function afterCreate(): void
    {
        $recipient = User::find($this->data['user_id']);
        $taskData = $this->data;
        $response = Mail::to($recipient->email)->queue(new NewTaskCreatedForUser($taskData));
        if ($response) {
            Log::info('New Task Assigned Mail Sent Successfully to '.$recipient->email);
        }

    }
}
