<?php

namespace App\Livewire;

use App\Models\Status;
use App\Models\Tag;
use App\Models\Task;
use Livewire\Component;

class EditTask extends Component
{
    public Task $task;

    public function mount(Task $task)
    {
        $this->task = $task;
    }

    public function render()
    {
        $statuses = Status::whereNotIn('name', ['Accepted', 'Rejected'])->get();

        $availableTags = Tag::all();

        return view('livewire.edit-task')->with(['statuses' => $statuses, 'availableTags' => $availableTags]);
    }

    public function update()
    {
        $validatedData = $this->validate([
            'task.title' => 'required',
            'task.description' => 'required',
            'task.status' => 'required',
            'task.tags' => 'required',
        ]);

        $this->task->update($validatedData['task']);

        session()->flash('message', 'Task updated successfully.');

        return redirect()->route('tasks.index');
    }
}
