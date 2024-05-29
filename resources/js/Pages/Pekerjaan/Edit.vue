<script setup>
import { defineProps } from 'vue';
import { Head, router } from '@inertiajs/vue3';
import Layout from '@/Layouts/AuthenticatedLayout.vue';
import { reactive } from 'vue';

const props = defineProps({
    pekerjaan: Object
});

const form = reactive({
    nama_pekerjaan: props.pekerjaan.nama_pekerjaan,
    deskripsi_pekerjaan: props.pekerjaan.deskripsi_pekerjaan,
});

function submit() {
    router.put(route('pekerjaan.update', props.pekerjaan.id), form);
}
</script>

<template>
    <Head title="Edit Pekerjaan" />

    <Layout>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <form @submit.prevent="submit">
                            <div class="mb-4">
                                <label for="nama_pekerjaan" class="block text-sm font-medium text-gray-700">Nama Pekerjaan</label>
                                <input
                                    id="nama_pekerjaan"
                                    type="text"
                                    v-model="form.nama_pekerjaan"
                                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                            </div>
                            <div class="mb-4">
                                <label for="deskripsi_pekerjaan" class="block text-sm font-medium text-gray-700">Deskripsi</label>
                                <textarea
                                    id="deskripsi_pekerjaan"
                                    v-model="form.deskripsi_pekerjaan"
                                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"></textarea>
                            </div>
                            <div class="flex justify-end">
                                <button
                                    type="submit"
                                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"
                                >
                                    Update Pekerjaan
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </Layout>
</template>
