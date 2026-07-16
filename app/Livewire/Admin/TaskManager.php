<?php

namespace App\Livewire\Admin;

use Illuminate\Support\Facades\Auth;

use App\Models\{Task, User};
use Livewire\Component;
use Livewire\Attributes\{Layout, Validate};

#[Layout('layouts.app')]
class Taskmanager extends Component
{

    public bool $showModal = false;
    public ?int $editingId = null;

    #[Validate('required|string|max:100')]
    public string $title = '';

    #[Validate('required|string|max:1000')]
    public string $desc = '';

    #[Validate('required|in:todo,in_progress,done')]
    public string $status = '';

    #[Validate('required|in:low,medium,high')]
    public string $priority = '';

    #[Validate('required|exists:users,id')]
    public ?int $assign_to = null;


    public function create()
    {
        $this->showModal = true; 
    }

    public function edit(Task $task) :void
    {
        $this->editingId = $task->id;
        $this->title = $task->title;
        $this->desc = $task->desc;
        $this->status = $task->status;
        $this->priority = $task->priority;
        $this->assign_to = $task->assign_to;

        $this->showModal = true;
    }

    public function save() :void
    {
        $data = $this->validate();

        if($this->editingId){
            Task::findOrFail($this->editingId)->update($data);
        } else {
            $data['created'] = Auth::id();
            Task::create($data);
        }

        $this->showModal = false;
        session()->flash('message', 'Task berhasil disimpan');

    }

    public function delete(Task $task)
    {
        $task->delete();
        session()->flash('message', 'Task Dihapus'); 
    }

    public function render()
    {
        return view('livewire.admin.task-manager', [
            'tasks' => Task::with('assignee')->latest()->get(),
            'priorities' => Task::PRIORITIES,
            'statuses' => Task::STATUS,
            'members' => User::where('role', 'team')->get()
        ]);
    }

}
