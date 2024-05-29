<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';

const karyawanData = [
    { key: 'nama', value: 'string' },
    { key: 'email', value: 'string' },
    { key: 'telepon', value: 'int' },
    { key: 'alamat', value: 'string' },
    { key: 'jenis_kelamin', value: "enum('L', 'P')" },
    { key: 'aktif', value: 'boolean, default:true' },
    { key: 'divisi_id', value: "foreign key('divisi')" },
    { key: 'divisi_id', value: "foreign key('pekerjaan')" }
];

const pekerjaanData = [
    { key: 'nama_pekerjaan', value: 'string' },
    { key: 'deskripsi_pekerjaan', value: 'text, nullable' },
];

const divisiData = [
    { key: 'nama_divisi', value: 'string' },
    { key: 'deskripsi_divisi', value: 'text, nullable' }
];

const authEndpoint = [
    { method: 'POST', endpoint: '/api/login', deskripsi: 'Mengenerate session token' },
    { method: 'POST', endpoint: '/api/logout', deskripsi: 'Menghapus session token' },
];

const crudEndpoint = [
    { method: 'GET', endpoint: '/api/karyawan', deskripsi: 'Mengembalikan seluruh daftar karyawan' },
    { method: 'GET', endpoint: '/api/karyawan/{id}', deskripsi: 'Mengembalikan data karyawan berdasarkan ID' },
    { method: 'POST', endpoint: '/api/karyawan', deskripsi: 'Menambahkan data karyawan' },
    { method: 'PUT', endpoint: '/api/karyawan/{id}', deskripsi: 'Mengubah data karyawan berdasarkan ID' },
    { method: 'DELETE', endpoint: '/api/karyawan/{id}', deskripsi: 'Menghapus data karyawan berdasarkan ID' },
    { method: 'GET', endpoint: '/api/pekerjaan', deskripsi: 'Mengembalikan seluruh daftar pekerjaan' },
    { method: 'GET', endpoint: '/api/pekerjaan/{id}', deskripsi: 'Mengembalikan data pekerjaan berdasarkan ID' },
    { method: 'POST', endpoint: '/api/pekerjaan', deskripsi: 'Menambahkan data pekerjaan' },
    { method: 'PUT', endpoint: '/api/pekerjaan/{id}', deskripsi: 'Mengubah data pekerjaan berdasarkan ID' },
    { method: 'DELETE', endpoint: '/api/pekerjaan/{id}', deskripsi: 'Menghapus data pekerjaan berdasarkan ID' },
    { method: 'GET', endpoint: '/api/divisi', deskripsi: 'Mengembalikan seluruh daftar divisi' },
    { method: 'GET', endpoint: '/api/divisi/{id}', deskripsi: 'Mengembalikan data divisi berdasarkan ID' },
    { method: 'POST', endpoint: '/api/divisi', deskripsi: 'Menambahkan data divisi' },
    { method: 'PUT', endpoint: '/api/divisi/{id}', deskripsi: 'Mengubah data divisi berdasarkan ID' },
    { method: 'DELETE', endpoint: '/api/divisi/{id}', deskripsi: 'Menghapus data divisi berdasarkan ID' }
];
</script>

<template>
    <Head title="Dashboard" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Dashboard</h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 font-bold">Dokumentasi ERD</div>
                    <div class="px-6 text-gray-900">Keterangan dari struktur database sekaligus tipe data dan validasi yang disesuaikan.</div>
                    
                    <div class="p-6">
                        <div class="font-bold">Tabel Karyawan</div>
                        <table class="min-w-fit divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th  class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Key</th>
                                    <th  class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Value</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="(karyawanTable, index) in karyawanData" :key="index">
                                    <td class="px-4 py-2 border-b border-gray-200">{{ karyawanTable.key }}</td>
                                    <td class="px-4 py-2 border-b border-gray-200">{{ karyawanTable.value }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="flex">
                        <div class="p-6">
                            <div class="font-bold">Tabel Pekerjaan</div>
                                <table class="min-w-fit divide-y divide-gray-200">
                                    <thead class="bg-gray-50">
                                        <tr>
                                            <th  class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Key</th>
                                            <th  class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Value</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr v-for="(pekerjaanTable, index) in pekerjaanData" :key="index">
                                            <td class="px-4 py-2 border-b border-gray-200">{{ pekerjaanTable.key }}</td>
                                            <td class="px-4 py-2 border-b border-gray-200">{{ pekerjaanTable.value }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                        </div>
                        <div class="p-6">
                            <div class="font-bold">Tabel Divisi</div>
                                <table class="min-w-fit divide-y divide-gray-200">
                                    <thead class="bg-gray-50">
                                        <tr>
                                            <th  class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Key</th>
                                            <th  class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Value</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr v-for="(divisiTable, index) in divisiData" :key="index">
                                            <td class="px-4 py-2 border-b border-gray-200">{{ divisiTable.key }}</td>
                                            <td class="px-4 py-2 border-b border-gray-200">{{ divisiTable.value }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                        </div>
                    </div>
                </div>
                <div class="py-12">
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6 text-gray-900 font-bold">Dokumentasi API</div>
                        <div class="px-6 text-gray-900">API ini menggunakan sistem <span class="italic">token based authentication</span> sehingga diperlukan login agar mendapatkan bearer token untuk melakukan perintah CRUD kedalam aplikasi. Token akan dihapus setiap 7 hari atau dapat dihapus secara manual dengan melakukan <span class="p-1 bg-black/25 rounded uppercase">post</span> kedalam endpoint <span class="p-1 bg-black/25 rounded">/api/logout</span>.</div>
                        <div class="p-6 text-gray-900">
                            <div class="font-bold">Endpoint Authentikasi</div>
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead class="bg-gray-50">
                                    <tr>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Method</th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Endpoint</th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Deskripsi</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                    <tr v-for="(endpoint, index) in authEndpoint" :key="'auth_' + index">
                                        <td class="px-6 py-4 whitespace-nowrap text-wrap">{{ endpoint.method }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-wrap">{{ endpoint.endpoint }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-wrap">{{ endpoint.deskripsi }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="p-6 text-gray-900">
                            <div class="font-bold">Endpoint CRUD</div>
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead class="bg-gray-50">
                                    <tr>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Method</th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Endpoint</th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Deskripsi</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                    <tr v-for="(endpoint, index) in crudEndpoint" :key="'crud_' + index">
                                        <td class="px-6 py-4 whitespace-nowrap text-wrap">{{ endpoint.method }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-wrap">{{ endpoint.endpoint }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-wrap">{{ endpoint.deskripsi }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
