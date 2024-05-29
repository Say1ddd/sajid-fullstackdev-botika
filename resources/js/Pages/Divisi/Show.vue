<script setup>
import { defineProps } from 'vue';
import { Head } from '@inertiajs/vue3';
import Layout from '@/Layouts/AuthenticatedLayout.vue';

const props = defineProps({
    divisi: Object
});
</script>

<template>
    <Head title="Detail Divisi" />

    <Layout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Detail Divisi</h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <h3 class="text-lg font-semibold">{{ props.divisi.nama_divisi }}</h3>
                        <p>{{ props.divisi.deskripsi_divisi }}</p>
                        <p>{{ props.divisi.lokasi }}</p>
                    </div>
                </div>
            </div>
        </div>
    </Layout>
</template>
