<script setup>
import { defineProps, watch, ref, computed } from 'vue';
import { Head, Link, router } from '@inertiajs/vue3';
import Layout from '@/Layouts/AuthenticatedLayout.vue';
import Modal from '@/Components/Modal.vue';

const props = defineProps({
    karyawan: Array,
    divisi: Array,
});

const selectedDivisiId = ref(null);
const filteredKaryawan = ref([...props.karyawan]);

const showDeleteModal = ref(false);
const karyawanToDelete = ref(null);

const confirmDelete = (karyawan) => {
    karyawanToDelete.value = karyawan;
    showDeleteModal.value = true;
};

const destroy = () => {
    if (karyawanToDelete.value) {
        router.delete(route('karyawan.destroy', karyawanToDelete.value.id), {
            onFinish: () => {
                showDeleteModal.value = false;
                karyawanToDelete.value = null;
            }
        });
    }
};

watch(selectedDivisiId, (newVal) => {
    if (newVal) {
        filteredKaryawan.value = props.karyawan.filter(karyawan => karyawan.divisi_id === newVal);
    } else {
        filteredKaryawan.value = [...props.karyawan];
    }
});

const countAktif = computed(() => {
    if (selectedDivisiId.value) {
        return filteredKaryawan.value.filter(karyawan => karyawan.aktif).length;
    } else {
        return props.karyawan.filter(karyawan => karyawan.aktif).length;
    }
});

const countNonAktif = computed(() => {
    if (selectedDivisiId.value) {
        return filteredKaryawan.value.filter(karyawan => !karyawan.aktif).length;
    } else {
        return props.karyawan.filter(karyawan => !karyawan.aktif).length;
    }
});

const countTrue = computed(() => {
    if (selectedDivisiId.value) {
        return filteredKaryawan.value.filter(karyawan => karyawan.aktif).length;
    } else {
        return props.karyawan.filter(karyawan => karyawan.aktif).length;
    }
});

const countFalse = computed(() => {
    if (selectedDivisiId.value) {
        return filteredKaryawan.value.filter(karyawan => !karyawan.aktif).length;
    } else {
        return props.karyawan.filter(karyawan => !karyawan.aktif).length;
    }
});
</script>

<template>
    <Head title="Karyawan" />

    <Layout>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 space-y-6">
                        <div class="flex justify-end space-x-4">
                            <div>
                                <span v-if="selectedDivisiId" class="mr-4 font-semibold text-gray-700">
                                    Aktif: {{ countAktif }} | Nonaktif: {{ countNonAktif }}
                                </span>
                                <span v-else class="mr-4 font-semibold text-gray-700">
                                    Aktif: {{ countTrue }} | Nonaktif: {{ countFalse }}
                                </span>
                                <select v-model="selectedDivisiId" class="border-gray-300 rounded-md shadow-sm">
                                    <option :value="null">Semua Divisi</option>
                                    <option v-for="divisi in props.divisi" :key="divisi.id" :value="divisi.id">{{ divisi.nama_divisi }}</option>
                                </select>
                            </div>
                            <Link :href="route('karyawan.create')" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                Tambah Karyawan
                            </Link>
                        </div>
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Nama Karyawan
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Divisi
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Pekerjaan
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Status
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Aksi
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                <tr v-for="karyawan in filteredKaryawan" :key="karyawan.id">
                                    <td class="px-6 py-4 whitespace-nowrap text-wrap">{{ karyawan.nama }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-wrap">{{ karyawan.divisi.nama_divisi }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-wrap">{{ karyawan.pekerjaan.nama_pekerjaan }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-wrap">{{ karyawan.aktif ? 'Aktif' : 'Nonaktif' }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                        <Link :href="route('karyawan.edit', karyawan.id)" class="text-blue-500">Edit</Link>
                                        <Link :href="route('karyawan.show', karyawan.id)" class="text-blue-500 ml-2">Show</Link>
                                        <button @click.prevent="confirmDelete(karyawan)" class="text-red-500 ml-2">Delete</button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </Layout>

    <Modal :show="showDeleteModal" @close="showDeleteModal = false">
        <template #default>
            <div class="p-6">
                <h2 class="text-lg font-medium text-gray-900">Delete Karyawan</h2>
                <p class="mt-4 text-sm text-gray-600">Are you sure you want to delete this karyawan? This action cannot be undone.</p>
                <div class="mt-6 flex justify-end">
                    <button @click="showDeleteModal = false" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded mr-2">Cancel</button>
                    <button @click="destroy" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Delete</button>
                </div>
            </div>
        </template>
    </Modal>
</template>
