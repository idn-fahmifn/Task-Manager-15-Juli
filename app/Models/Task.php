<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Task extends Model
{
    protected $fillable = [
        'title', 'desc', 'status', 'priority', 'progress', 'position', 'assign_to', 'created_by'
    ];

    protected $casts = [
        'progress' => 'integer',
        'position' => 'integer',
    ];

    // pilihan status priority
    public const STATUS = [
        'todo' => 'To Do',
        'in_progress' => 'Dikerjakan',
        'done' => 'Selesai',
    ];

    public const PRIORITIES = [
        'low' => 'Rendah',
        'medium' => 'Sedang',
        'high' => 'Tinggi',
    ];

    // Relasi :
    public function assignee(): BelongsTo
    {
        return $this->belongsTo(User::class, 'assign_to');
    }

    // Relasi :
    public function creator(): BelongsTo
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function getStatusLabelAttribute() :string
    {
        return self::STATUS[$this->status] ?? $this->status;
    }

    public function getPriorityLabelAttribute() :string
    {
        return self::PRIORITIES[$this->priority] ?? $this->priority;
    }

}
