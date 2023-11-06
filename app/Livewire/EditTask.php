<?php

namespace App\Livewire;

use App\Models\Status;
use App\Models\Tag;
use App\Models\Task;
use Livewire\Component;

class EditTask extends Component
{
    public Task $task;

    public $title;

    public $description;

    public $status_id;

    public $tags;

    public function mount(Task $task)
    {
        $this->task = $task;
        $this->title = $task->title;
        $this->description = $task->description;
        $this->status_id = $task->status_id;
        $this->tags = $task->tags->pluck('id')->all();
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
            'title' => 'required',
            'description' => 'required',
            'status_id' => 'required',
        ]);

        $this->task->update($validatedData);

        if (count($this->tags)) {
            $this->task->tags()->sync($this->tags);
        }

        session()->flash('message', 'Task updated successfully.');

        // return redirect()->route('task');
        $this->redirect('/tasks', true);
    }
}
