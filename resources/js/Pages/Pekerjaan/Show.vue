<script setup>
import { defineProps } from 'vue';
import { Head } from '@inertiajs/vue3';
import Layout from '@/Layouts/AuthenticatedLayout.vue';

const props = defineProps({
    pekerjaan: Object
});
</script>

<template>
    <Head title="Detail Pekerjaan" />

    <Layout>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <h3 class="text-lg font-semibold">{{ props.pekerjaan.nama_pekerjaan }}</h3>
                        <p>{{ props.pekerjaan.deskripsi_pekerjaan }}</p>
                        <p>{{ props.pekerjaan.lokasi }}</p>
                    </div>
                </div>
            </div>
        </div>
    </Layout>
</template>
