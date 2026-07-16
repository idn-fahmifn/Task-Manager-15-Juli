<div class="p-6 space-y-4">
    <h1 class="text-2xl font-bold text-gray-800">Papan Kanban</h1>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
        @foreach ($columns as $statusKey => $statusLabel)
            <div class="bg-gray-100 dark:bg-neutral-500 rounded-xl p-3">
                <h2 class="font-semibold text-gray-700 mb-3 px-1">
                    {{ $statusLabel }}
                    <span class="text-xs text-gray-400">({{ ($tasks[$statusKey] ?? collect())->count() }})</span>
                </h2>

                {{-- kolom drop --}}
                <div class="kanban-column space-y-2 min-h-[100px]"
                     data-status="{{ $statusKey }}">
                    @foreach ($tasks[$statusKey] ?? [] as $task)
                        <div class="kanban-card bg-white dark:bg-neutral-800 rounded-lg shadow p-3 cursor-move"
                             data-id="{{ $task->id }}"
                             wire:key="task-{{ $task->id }}">
                            <p class="font-medium text-gray-800 dark:text-gray-200 text-sm">{{ $task->title }}</p>
                            <div class="flex items-center justify-between mt-2">
                                <span class="text-xs px-2 py-0.5 rounded-full
                                    @class([
                                        'bg-red-100 text-red-700' => $task->priority === 'high',
                                        'bg-yellow-100 text-yellow-700' => $task->priority === 'medium',
                                        'bg-gray-100 text-gray-600' => $task->priority === 'low',
                                    ])">
                                    {{ $task->priority_label }}
                                </span>
                                <span class="text-xs text-gray-400">{{ $task->assignee?->name ?? '—' }}</span>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @endforeach
    </div>

    @script
    <script>
        function loadSortable(cb) {
            if (window.Sortable) return cb();
            const s = document.createElement('script');
            s.src = 'https://cdn.jsdelivr.net/npm/sortablejs@1.15.2/Sortable.min.js';
            s.onload = cb;
            document.head.appendChild(s);
        }

        function initBoard() {
            document.querySelectorAll('.kanban-column').forEach(col => {
                if (col._sortable) return; // hindari inisialisasi ganda
                col._sortable = Sortable.create(col, {
                    group: 'kanban',
                    animation: 150,
                    ghostClass: 'opacity-40',
                    onEnd: (evt) => {
                        const card      = evt.item;
                        const taskId    = parseInt(card.dataset.id);
                        const newStatus = evt.to.dataset.status;
                        const orderedIds = Array.from(evt.to.querySelectorAll('.kanban-card'))
                            .map(el => parseInt(el.dataset.id));

                        $wire.moveTask(taskId, newStatus, orderedIds);
                    },
                });
            });
        }

        loadSortable(initBoard);
        // inisialisasi ulang setelah Livewire re-render DOM
        Livewire.hook('morphed', () => loadSortable(initBoard));
    </script>
    @endscript
</div>