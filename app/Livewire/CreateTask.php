<?php

namespace App\Livewire;

use App\Models\Status;
use App\Models\Tag;
use App\Models\Task;
use Livewire\Component;

class CreateTask extends Component
{
    public $title = '';

    public $description = '';

    public $status = '1';

    public $tags = [];

    public function render()
    {
        $statuses = Status::whereNotIn('name', ['Accepted', 'Rejected'])->get();

        $availableTags = Tag::all();

        return view('livewire.create-task')->with(['statuses' => $statuses, 'availableTags' => $availableTags]);
    }

    public function store(): void
    {
        $user = auth()->user();
        $validated = $this->validate([
            'title' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
            'status' => ['required'],
        ]);

        $task = new Task();
        $task->title = $validated['title'];
        $task->description = $validated['description'];
        $task->status_id = $validated['status'];
        $task->user_id = $user->id;
        $task->admin_user_id = $user->id;
        $task->save();

        if (count($this->tags)) {
            $task->tags()->sync($this->tags);

        }

        $this->redirect('/tasks', navigate: true);
    }
}
