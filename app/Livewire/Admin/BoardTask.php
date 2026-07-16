<?php

namespace App\Livewire\Admin;

use Illuminate\Support\Facades\Auth;

use App\Models\{Task, User};
use Livewire\Component;
use Livewire\Attributes\{Layout, Validate};

#[Layout('layouts.app')]
class BoardTask extends Component
{

    public function moveTask(int $taskId, string $newStatus, array $orderedIds) : void 
    {
        if (! array_key_exists($newStatus, Task::STATUS)){
            return;
        }

        $task = Task::findOrFail($taskId);

        // hanya dia yang bisa mindahin.
        if(Auth::user()->isTeam() && $task->assign_to !==Auth::id()){
            return;
        }

        // update status baru 
        $task->status = $newStatus;

        // progress
        if($newStatus === 'done'){
            $task->progress = 100;
        } elseif ($newStatus === 'todo') {
            $task->progress = 0;
        }
        $task->save();

        // menyusun ulang posisi
        foreach($orderedIds as $index => $id)
            {
                Task::where('id', $id)->update(['position' => $index]);
            }

    }

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
