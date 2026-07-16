<?php

namespace App\Livewire\Admin;

use App\Models\Task;
use Livewire\Component;
use Livewire\Attributes\Layout;

#[Layout('layouts.app')]
class Taskmanager extends Component
{
    public function create()
    {
        // 
    }

    public function edit(Task $task)
    {
        // 
    }

    public function save()
    {
        // 
    }

    public function delete(Task $task)
    {
        // 
    }

    public function render()
    {
        return view('livewire.admin.task-manager', [
            'tasks' => Task::with('assignee')->latest()->get(),
        ]);
    }

}
