<x-layouts::app :title="__('Board Tasks')">
    <div class="p-6 space-y-6">

        <div class="flex justify-between">
            <div class="">
                <flux:heading size="xl"> Papan Task </flux:heading>
                <flux:text class="mt-1">Geser kartu untuk mengelola tugas</flux:text>
            </div>
            <div class="">
                <flux:button variant="primary" icon="plus-circle" @click="showModal = true">Buat</flux:button>
            </div>
        </div>

        @php
        $kolom = [

        'todo' => ['label' => 'todo', 'cards' => [
        ['Fix Bug', 'high', 'bg-red-100 text-red-800', 'Tim Admin'],
        ['desain ui/ux', 'high', 'bg-red-100 text-red-800', 'Tim Admin'],
        ['Analisis', 'high', 'bg-red-100 text-red-800', 'Tim Admin'],
        ]],
        'in_progress' => ['label' => 'in progress', 'cards' => [
        ['pentest', 'high', 'bg-red-100 text-red-800', 'Tim Admin'],
        ['testing', 'high', 'bg-red-100 text-red-800', 'Tim Admin'],
        ]],
        'done' => ['label' => 'done', 'cards' => [
        ['uji coba', 'high', 'bg-red-100 text-red-800', 'Tim Admin'],
        ]],

        ]

        @endphp


        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">

            @foreach ($kolom as $key => $data )

            <div class="rounded-xl bg-neutral-100 dark:bg-neutral-700 p-3">
                <h2 class="font-semi-bold">{{$data['label']}}</h2>
                <span class="text-xs text-neutral-500">Total Task : {{count($data['cards'])}}</span>

                <div class="kolom-kanban space-y-2 min-h-[120px] mt-4" data-status="{{$key}}">
                    @foreach ($data['cards'] as [$judul, $prioritas, $classPrioritas, $assign])
                    <div class="rounded-xl border border-neutral-300 dark:border-neutral-500 p-5">
                        <p class="text-sm">Total Task</p>
                        <p class="text-3xl text-bold mt-2">10</p>
                    </div>
                    @endforeach
                </div>
            </div>



            @endforeach


        </div>

    </div>

    <!-- Always gets the latest version -->
    <script src="https://jsdelivr.net"></script>

    <!-- Specific stable version (Recommended for production) -->
    <script src="https://cdn.jsdelivr.net/npm/sortablejs@1.15.7/Sortable.min.js"></script>

    <script>
        function initKanban() {
            if (typeof Sortable === 'undefined') {
                console.error('Sortable belum dipakai')
            }

            document.querySelectorAll('kolom-kanban').forEach(col => {
                // menghindari init ganda
                if (col._sortable) return;
                col._sortable = Sortable.create(col, {
                    group: 'kanban',
                    animation: 150,
                    ghostClass: 'opacity-40'
                });
                console.log('Kanban sudah aktif', col.dataset.status)
            })

            // berjalan saat load 
            document.addEventListener('DOMContentLoaded', initKanban);
            document.addEventListener('livewire:navigated', initKanban);

        }

    </script>




</x-layouts::app>
