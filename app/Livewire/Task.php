<?php

namespace App\Livewire;

use App\Mail\TaskStatusUpdated;
use App\Models\Status;
use App\Models\Task as ModelsTask;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;
use Livewire\WithPagination;

class Task extends Component
{
    use WithPagination;

    public $selectedStatus = [];

    public function render()
    {
        $tasks = ModelsTask::where('user_id', Auth::user()->id);

        foreach ($tasks->get() as $task) {
            $this->selectedStatus[$task->id] = $task->status_id;
        }

        return view('livewire.task', [
            'statuses' => Status::all(),
            'tasks' => $tasks->paginate(10),
        ]);
    }

    public function updateStatus($taskId)
    {
        $task = ModelsTask::find($taskId);
        $task->status_id = $this->selectedStatus[$taskId];
        if ($task->save() && $task->status->name == 'In-review' && $task->user_id != $task->admin_user_id) {
            Mail::to($task->assignedBy->email)->queue(new TaskStatusUpdated($task));
        }

        $this->dispatch('status-updated');
    }

    public function delete($id)
    {
        ModelsTask::find($id)->delete();
        session()->flash('message', 'Task deleted successfully.');

        $this->redirect('/tasks', true);
    }
}
