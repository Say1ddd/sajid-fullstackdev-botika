<script setup>
import { defineProps } from 'vue';
import { Head, Link } from '@inertiajs/vue3';
import Layout from '@/Layouts/AuthenticatedLayout.vue';

const props = defineProps({
    pekerjaan: Array
});
</script>

<template>
    <Head title="Pekerjaan" />

    <Layout>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 space-y-6">
                        <div class="flex justify-end">
                            <Link :href="route('pekerjaan.create')" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                Tambah Pekerjaan
                            </Link>
                        </div>
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Nama Pekerjaan
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Deskripsi
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Aksi
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                <tr v-for="pekerjaan in props.pekerjaan" :key="pekerjaan.id">
                                    <td class="px-6 py-4 whitespace-nowrap text-wrap">{{ pekerjaan.nama_pekerjaan }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-wrap">{{ pekerjaan.deskripsi_pekerjaan }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                        <Link :href="route('pekerjaan.edit', pekerjaan.id)" class="text-blue-500">Edit</Link>
                                        <Link :href="route('pekerjaan.show', pekerjaan.id)" class="text-blue-500 ml-2">Show</Link>
                                        <Link href="#" @click.prevent="destroy(pekerjaan.id)" class="text-red-500 ml-2">Delete</Link>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </Layout>
</template>

<script>
import { router } from '@inertiajs/vue3';

function destroy(id) {
    if (confirm("Are you sure you want to delete this pekerjaan?")) {
        router.delete(route('pekerjaan.destroy', id));
    }
}
</script>
