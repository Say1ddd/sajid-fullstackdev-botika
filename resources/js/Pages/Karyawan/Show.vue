<script setup>
import { defineProps } from 'vue';
import { Head } from '@inertiajs/vue3';
import Layout from '@/Layouts/AuthenticatedLayout.vue';

const props = defineProps({
    karyawan: Object,
    divisi: Object,
    pekerjaan: Object
});
</script>

<template>
    <Head title="Detail Karyawan" />

    <Layout>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <div class="flex justify-start items-center mb-6">
                            <h3 class="text-2xl font-semibold">{{ props.karyawan.nama }}</h3>
                            <p class="text-sm text-gray-600 mx-2">{{ props.karyawan.jenis_kelamin == 'L' ? 'Laki-laki' : 'Perempuan' }}</p>
                        </div>
                        <div class="mb-4">
                            <p class="text-sm text-gray-600">Email:</p>
                            <p class="font-semibold">{{ props.karyawan.email }}</p>
                        </div>
                        <div class="mb-4">
                            <p class="text-sm text-gray-600">Telepon:</p>
                            <p class="font-semibold">{{ props.karyawan.telepon }}</p>
                        </div>
                        <div class="mb-4">
                            <p class="text-sm text-gray-600">Alamat:</p>
                            <p class="font-semibold">{{ props.karyawan.alamat }}</p>
                        </div>
                        <div class="mb-4">
                            <p class="text-sm text-gray-600">Status:</p>
                            <p class="font-semibold">{{ props.karyawan.aktif ? 'Aktif' : 'Nonaktif' }}</p>
                        </div>
                        <div class="mb-4">
                            <p class="text-sm text-gray-600">Divisi:</p>
                            <p class="font-semibold">{{ props.divisi.nama_divisi }}</p>
                        </div>
                        <div class="mb-4">
                            <p class="text-sm text-gray-600">Pekerjaan:</p>
                            <p class="font-semibold">{{ props.pekerjaan.nama_pekerjaan }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </Layout>
</template>
