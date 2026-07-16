<x-layouts::app :title="__('Tasks')">
    <div class="p-6 space-y-6" x-data="{showModal: false}">

        <div class="flex justify-between">
            <div class="">
                <flux:heading size="xl"> Halaman Task </flux:heading>
                <flux:text class="mt-1">Semua data tugas (Tasks)</flux:text>
            </div>
            <div class="">
                <flux:button variant="primary" icon="plus-circle" @click="showModal = true">Buat</flux:button>
            </div>
        </div>

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
        <div x-show="showModal" x-cloak class="fixed inset-0 z-50 flex items-center justify-center bg-black/40"
            x-on:click.self="showModal = false">
            <div class="w-full max-w-lg rounded-lg bg-white dark:bg-neutral-700 p-6 space-y-4 shadow-lg">
                <flux:heading size="xl"> Task Baru </flux:heading>
                <flux:text class="mt-1">Buat Task baru</flux:text>

                <form action="">
                    <div class="py-2 mt-2">
                        <flux:input label="Judul Task" name="title" required placeholder="Masukan nama task" />
                    </div>
                    <div class="py-2 mt-2">
                        <flux:select label="Prioritas" name="priority">
                            <option value="low">low</option>
                            <option value="medium">medium</option>
                            <option value="high">High</option>
                        </flux:select>
                    </div>
                    <div class="py-2 mt-2">
                        <flux:textarea label="Deskripsi Tugas" name="desc"></flux:textarea>
                    </div>

                    <div class="py-2 mt-2">
                        <flux:button variant="primary" @click="showModal = false" >Batal</flux:button>
                        <flux:button type="submit" variant="primary">Buat Task</flux:button>
                    </div>
                </form>

            </div>
        </div>
    </div>

    <!-- modal area -->


</x-layouts::app>
