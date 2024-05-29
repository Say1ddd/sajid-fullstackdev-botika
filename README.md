# Dokumentasi ERD

Keterangan dari struktur database sekaligus tipe data dan validasi yang disesuaikan.

## Tabel Karyawan

| Key           | Value                   |
| ------------- | ----------------------- |
| nama          | string                  |
| email         | string                  |
| telepon       | int                     |
| alamat        | string                  |
| jenis_kelamin | enum('L', 'P')          |
| aktif         | boolean                 |
| divisi_id     | foreign key('divisi')   |
| divisi_id     | foreign key('pekerjaan')|

## Tabel Pekerjaan

| Key           | Value                   |
| ------------- | ----------------------- |
| key_1         | value_1                 |
| key_2         | value_2                 |
| key_3         | value_3                 |
| ...           | ...                     |

## Tabel Divisi

| Key           | Value                   |
| ------------- | ----------------------- |
| key_1         | value_1                 |
| key_2         | value_2                 |
| key_3         | value_3                 |
| ...           | ...                     |

# Dokumentasi API

API ini menggunakan sistem *token based authentication* sehingga diperlukan login agar mendapatkan bearer token untuk melakukan perintah CRUD ke dalam aplikasi. Token akan dihapus setiap 7 hari atau dapat dihapus secara manual dengan melakukan `POST` ke endpoint `/api/logout`.

## Endpoint Authentikasi

| Method | Endpoint      | Deskripsi                           |
| ------ | ------------- | ----------------------------------- |
| POST   | /api/login    | Mengenerate session token           |
| POST   | /api/logout   | Menghapus session token             |

## Endpoint CRUD

| Method | Endpoint                | Deskripsi                                |
| ------ | ----------------------- | ---------------------------------------- |
| GET    | /api/karyawan           | Mengembalikan seluruh daftar karyawan    |
| GET    | /api/karyawan/{id}      | Mengembalikan data karyawan berdasarkan ID |
| POST   | /api/karyawan           | Menambahkan data karyawan                |
| PUT    | /api/karyawan/{id}      | Mengubah data karyawan berdasarkan ID    |
| DELETE | /api/karyawan/{id}      | Menghapus data karyawan berdasarkan ID   |
| GET    | /api/pekerjaan          | Mengembalikan seluruh daftar pekerjaan   |
| GET    | /api/pekerjaan/{id}     | Mengembalikan data pekerjaan berdasarkan ID |
| POST   | /api/pekerjaan          | Menambahkan data pekerjaan               |
| PUT    | /api/pekerjaan/{id}     | Mengubah data pekerjaan berdasarkan ID   |
| DELETE | /api/pekerjaan/{id}     | Menghapus data pekerjaan berdasarkan ID  |
| GET    | /api/divisi             | Mengembalikan seluruh daftar divisi      |
| GET    | /api/divisi/{id}        | Mengembalikan data divisi berdasarkan ID |
| POST   | /api/divisi             | Menambahkan data divisi                  |
| PUT    | /api/divisi/{id}        | Mengubah data divisi berdasarkan ID      |
| DELETE | /api/divisi/{id}        | Menghapus data divisi berdasarkan ID     |
