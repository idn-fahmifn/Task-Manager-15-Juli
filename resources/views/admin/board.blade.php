<x-layouts::app :title="__('Board Tasks')">
    <div class="p-6 space-y-6">

        <div class="flex justify-between">
            <div class="">
                <flux:heading size="xl"> Papan Task </flux:heading>
                <flux:text csayaalass="mt-1">Geser kartu untuk mengelola tugas</flux:text>
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
                    <div class="rounded-xl bg-neutral-100 dark:bg-neutral-700 border border-neutral-300 dark:border-neutral-500 p-5">
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

    <!-- Specific stable version (Recommended for production) -->
    <script src="https://cdn.jsdelivr.net/npm/sortablejs@1.15.2/Sortable.min.js"></script>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
    // Mengambil semua elemen kolom kanban
    const kolomKanban = document.querySelectorAll('.kolom-kanban');

    kolomKanban.forEach(kolom => {
        new Sortable(kolom, {
            group: 'kanban-board', // Mengizinkan perpindahan antar kolom dengan group yang sama
            animation: 150,        // Durasi animasi perpindahan (milidetik)
            ghostClass: 'bg-neutral-200', // Class visual saat kartu sedang ditarik (opsional)
            
            // Event saat kartu selesai dilepas/dipindah
            onEnd: function (evt) {
                const itemEl = evt.item;          // Elemen kartu yang dipindah
                const targetColumn = evt.to;      // Kolom tujuan baru
                const fromColumn = evt.from;      // Kolom asal sebelum dipindah
                
                // Mengambil status/key dari atribut data-status
                const newStatus = targetColumn.getAttribute('data-status');
                const oldStatus = fromColumn.getAttribute('data-status');
                
                // Logika jika kartu benar-benar berpindah kolom
                if (newStatus !== oldStatus) {
                    console.log(`Kartu dipindah ke status: ${newStatus}`);
                    
                    // TODO: Kirim data ke backend menggunakan Fetch API atau Axios
                    // updateStatusDiBackend(itemEl.dataset.id, newStatus);
                }
            },
        });
    });
});


    </script>




</x-layouts::app>
