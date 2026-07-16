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

        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
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

    </div>

    <!-- Always gets the latest version -->
    <script src="https://jsdelivr.net"></script>

    <!-- Specific stable version (Recommended for production) -->
    <script src="https://cdn.jsdelivr.net/npm/sortablejs@1.15.7/Sortable.min.js"></script>



</x-layouts::app>
