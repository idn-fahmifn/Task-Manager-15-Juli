<?php

namespace App\Livewire\Admin;

use App\Models\{Task, User};
use Livewire\Component;
use Livewire\Attributes\{Layout, Validate};

#[Layout('layouts.app')]
class Taskmanager extends Component
{

    public bool $showModal = false;

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
        // 
    }

    public function edit(Task $task)
    {
        // 
    }

    public function save() :void
    {
        $data = $this->validate();
        dd($data);
    }

    public function delete(Task $task)
    {
        // 
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
