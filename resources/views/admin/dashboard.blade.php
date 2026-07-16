<x-layouts::app :title="__('Dashboard Admin')">
    <div class="p-6 space-y-6">
        <flux:heading size="xl"> Dashboard Admin </flux:heading>
        <flux:text class="mt-1">Ringkasan Seluruh Task Team</flux>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
                <div class="rounded-xl border border-neutral-300 dark:border-neutral-500 p-5">
                    <p class="text-sm">Total Task</p>
                    <p class="text-3xl text-bold mt-2">10</p>
                </div>
                <div class="rounded-xl border border-neutral-300 dark:border-neutral-500 p-5">
                    <p class="text-sm">Total Task</p>
                    <p class="text-3xl text-bold mt-2">10</p>
                </div>
                <div class="rounded-xl border border-neutral-300 dark:border-neutral-500 p-5">
                    <p class="text-sm">Total Task</p>
                    <p class="text-3xl text-bold mt-2">10</p>
                </div>
                <div class="rounded-xl border border-neutral-300 dark:border-neutral-500 p-5">
                    <p class="text-sm">Total Task</p>
                    <p class="text-3xl text-bold mt-2">10</p>
                </div>
            </div>

            <div class="rounded-xl border border-neutral-300 dark:border-neutral-500 overflow-hidden">
                <div class="px-5 py-3 border-b border-neutral-300 dark:border-neutral-500">
                    <flux:heading size="lg"> Task Terbaru </flux:heading>
                </div>
                <table class="w-full text-sm">
                    <thead class="text-left text-neutral-300 dark:text-neutral-700 bg-neutral-50">
                        <tr>
                            <th class="px-5 py-3">Nama Task</th>
                            <th class="px-5 py-3">Ditugaskan</th>
                            <th class="px-5 py-3">Prioritas</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-neutral-200 dark:divide-neutral-700">

                        @php
                        $tasks = [
                        (object) [
                        'nama_task' => 'Perbaikan bug halaman login',
                        'status' => 'Sedang Dikerjakan',
                        'prioritas' => 'Tinggi',
                        'penugasan' => 'Budi Santoso'
                        ],
                        (object) [
                        'nama_task' => 'Membuat desain antarmuka (UI)',
                        'status' => 'Selesai',
                        'prioritas' => 'Tinggi',
                        'penugasan' => 'Siti Aisyah'
                        ],
                        (object) [
                        'nama_task' => 'Menulis dokumentasi API',
                        'status' => 'Belum Dimulai',
                        'prioritas' => 'Sedang',
                        'penugasan' => 'Joko Widodo'
                        ],
                        (object) [
                        'nama_task' => 'Rapat mingguan tim',
                        'status' => 'Belum Dimulai',
                        'prioritas' => 'Rendah',
                        'penugasan' => 'Semua Tim'
                        ],
                        (object) [
                        'nama_task' => 'Pembaruan basis data',
                        'status' => 'Sedang Dikerjakan',
                        'prioritas' => 'Tinggi',
                        'penugasan' => 'Ahmad Fauzi'
                        ],
                        (object) [
                        'nama_task' => 'Pengujian sistem (Testing)',
                        'status' => 'Belum Dimulai',
                        'prioritas' => 'Sedang',
                        'penugasan' => 'Dewi Sartika'
                        ],
                        (object) [
                        'nama_task' => 'Penyusunan laporan bulanan',
                        'status' => 'Selesai',
                        'prioritas' => 'Sedang',
                        'penugasan' => 'Rina Melati'
                        ],
                        (object) [
                        'nama_task' => 'Optimalisasi kecepatan website',
                        'status' => 'Sedang Dikerjakan',
                        'prioritas' => 'Tinggi',
                        'penugasan' => 'Budi Santoso'
                        ],
                        (object) [
                        'nama_task' => 'Pembuatan materi pemasaran',
                        'status' => 'Belum Dimulai',
                        'prioritas' => 'Rendah',
                        'penugasan' => 'Eko Prasetyo'
                        ],
                        (object) [
                        'nama_task' => 'Ulasan keamanan server',
                        'status' => 'Belum Dimulai',
                        'prioritas' => 'Tinggi',
                        'penugasan' => 'Ahmad Fauzi'
                        ]
                        ];


                        @endphp

                        @forelse ($tasks as $task)
                        <tr>
                            <td class="px-5 py-3 font-medium">{{$task->nama_task}}</td>
                            <td class="px-5 py-3 font-medium">{{$task->status}}</td>
                            <td class="px-5 py-3 font-medium">{{$task->prioritas}}</td>
                        </tr>
                        @empty

                        <tr>
                            <td class="px-5 py-3 font-medium text-center">Belum ada Task</td>
                        </tr>

                        @endforelse

                    </tbody>
                </table>
            </div>

    </div>

</x-layouts::app>
