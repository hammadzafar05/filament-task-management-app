<?php

namespace App\Filament\Widgets;

use App\Models\Task;
use App\Models\User;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends BaseWidget
{
    protected function getStats(): array
    {
        $users = User::get();
        $tasks = Task::get();

        return [

            Stat::make('Total Users', $users->where('is_admin', 0)->count())
                ->color('success'),
            Stat::make('Total Admins', $users->where('is_admin', 1)->where('email', '!=', 'admin@dev.tribes.work')->count()),
            Stat::make('Total Tasks', $tasks->count()),
            Stat::make('Open Tasks', $tasks->where('status_id', 1)->count()),
            Stat::make('Pending Tasks', $tasks->where('status_id', 2)->count()),
            Stat::make('In-progress Tasks', $tasks->where('status_id', 3)->count()),
            Stat::make('In-review Tasks', $tasks->where('status_id', 4)->count()),
            Stat::make('Accepted Tasks', $tasks->where('status_id', 5)->count())
                ->color('success'),
            Stat::make('Rejected Tasks', $tasks->where('status_id', 6)->count())
                ->color('danger'),
        ];
    }
}
