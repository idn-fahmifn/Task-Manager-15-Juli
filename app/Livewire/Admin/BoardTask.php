<?php

namespace App\Livewire\Admin;

use Illuminate\Support\Facades\Auth;

use App\Models\{Task, User};
use Livewire\Component;
use Livewire\Attributes\{Layout, Validate};

#[Layout('layouts.app')]
class BoardTask extends Component
{
    public function render()
    {
        $user = Auth::user();
        $query = Task::with('assignee')
        ->when($user->isTeam(), fn ($q) => $q->where('assign_to', $user->id))
        ->orderBy('position');

        $tasks = $query->get()->groupBy('status');

        return view('livewire.admin.board-task', [
            'columns' => Task::STATUS,
            'tasks' => $tasks,
        ]);


    }
}
