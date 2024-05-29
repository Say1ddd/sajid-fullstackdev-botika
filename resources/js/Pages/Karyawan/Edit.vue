<script setup>
import { defineProps } from 'vue';
import { Head, router } from '@inertiajs/vue3';
import Layout from '@/Layouts/AuthenticatedLayout.vue';
import { reactive } from 'vue';

const props = defineProps({
    karyawan: Object,
    divisiOptions: Array,
    pekerjaanOptions: Array,
});

const form = reactive({
    nama: props.karyawan.nama,
    email: props.karyawan.email,
    telepon: props.karyawan.telepon,
    alamat: props.karyawan.alamat,
    jenis_kelamin: props.karyawan.jenis_kelamin,
    aktif: props.karyawan.aktif,
    divisi_id: props.karyawan.divisi_id,
    pekerjaan_id: props.karyawan.pekerjaan_id,
});

function submit() {
    router.put(route('karyawan.update', props.karyawan.id), form);
}
</script>

<template>
    <Head title="Edit Karyawan" />

    <Layout>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <form @submit.prevent="submit">
                            <div class="mb-4">
                                <label for="nama" class="block text-sm font-medium text-gray-700">Nama Karyawan</label>
                                <input
                                    id="nama"
                                    type="text"
                                    v-model="form.nama"
                                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                            </div>
                            <div class="mb-4">
                                <label for="email" class="block text-sm font-medium text-gray-700">Alamat Email</label>
                                <input
                                    id="email"
                                    type="email"
                                    v-model="form.email"
                                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"></input>
                            </div>
                            <div class="mb-4">
                                <label for="telepon" class="block text-sm font-medium text-gray-700">Nomor Telepon</label>
                                <input
                                    id="telepon"
                                    type="text"
                                    v-model="form.telepon"
                                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"></input>
                            </div>
                            <div class="mb-4">
                                <label for="jenis_kelamin" class="block text-sm font-medium text-gray-700">Jenis Kelamin</label>
                                <select
                                    id="jenis_kelamin"
                                    v-model="form.jenis_kelamin"
                                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                    <option value="L">Laki-laki</option>
                                    <option value="P">Perempuan</option>
                                </select>
                            </div>
                            <div class="mb-4">
                                <label for="divisi_id" class="block text-sm font-medium text-gray-700">Divisi</label>
                                <select
                                    id="divisi_id"
                                    v-model="form.divisi_id"
                                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                                >
                                    <option value="" disabled>Pilih Divisi</option>
                                    <option v-for="divisi in divisiOptions" :key="divisi.id" :value="divisi.id">{{ divisi.nama_divisi }}</option>
                                </select>
                            </div>
                            <div class="mb-4">
                                <label for="pekerjaan_id" class="block text-sm font-medium text-gray-700">Pekerjaan</label>
                                <select
                                    id="pekerjaan_id"
                                    v-model="form.pekerjaan_id"
                                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                                >
                                    <option value="" disabled>Pilih Pekerjaan</option>
                                    <option v-for="pekerjaan in pekerjaanOptions" :key="pekerjaan.id" :value="pekerjaan.id">{{ pekerjaan.nama_pekerjaan }}</option>
                                </select>
                            </div>
                            <div class="flex justify-end">
                                <button
                                    type="submit"
                                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"
                                >
                                    Update Karyawan
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </Layout>
</template>
