<?php

namespace App\Livewire;

use App\Models\Task as ModelsTask;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Task extends Component
{
    public function render()
    {
        return view('livewire.task')->with([
            'tasks' => ModelsTask::where('user_id', Auth::user()->id)->get(),
        ]);
    }
}
