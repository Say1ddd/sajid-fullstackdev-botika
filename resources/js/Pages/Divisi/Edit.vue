<script setup>
import { defineProps } from 'vue';
import { Head, router } from '@inertiajs/vue3';
import Layout from '@/Layouts/AuthenticatedLayout.vue';
import { reactive } from 'vue';

const props = defineProps({
    divisi: Object
});

const form = reactive({
    nama_divisi: props.divisi.nama_divisi,
    deskripsi_divisi: props.divisi.deskripsi_divisi,
    lokasi: props.divisi.lokasi,
});

function submit() {
    router.put(route('divisi.update', props.divisi.id), form);
}
</script>

<template>
    <Head title="Edit Divisi" />

    <Layout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Edit Divisi</h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <form @submit.prevent="submit">
                            <div class="mb-4">
                                <label for="nama_divisi" class="block text-sm font-medium text-gray-700">Nama Divisi</label>
                                <input
                                    id="nama_divisi"
                                    type="text"
                                    v-model="form.nama_divisi"
                                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                            </div>
                            <div class="mb-4">
                                <label for="deskripsi_divisi" class="block text-sm font-medium text-gray-700">Deskripsi</label>
                                <textarea
                                    id="deskripsi_divisi"
                                    v-model="form.deskripsi_divisi"
                                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"></textarea>
                            </div>
                            <div class="mb-4">
                                <label for="lokasi" class="block text-sm font-medium text-gray-700">Lokasi</label>
                                <input
                                    id="lokasi"
                                    type="text"
                                    v-model="form.lokasi"
                                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                            </div>
                            <div class="flex justify-end">
                                <button
                                    type="submit"
                                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"
                                >
                                    Update Divisi
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </Layout>
</template>
