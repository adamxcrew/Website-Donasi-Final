<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    public function run()
    {
        $permissions = [
            [
                'id'    => 1,
                'title' => 'user_management_access',
            ],
            [
                'id'    => 2,
                'title' => 'permission_create',
            ],
            [
                'id'    => 3,
                'title' => 'permission_edit',
            ],
            [
                'id'    => 4,
                'title' => 'permission_delete',
            ],
            [
                'id'    => 5,
                'title' => 'permission_access',
            ],
            [
                'id'    => 6,
                'title' => 'role_create',
            ],
            [
                'id'    => 7,
                'title' => 'role_edit',
            ],
            [
                'id'    => 8,
                'title' => 'role_delete',
            ],
            [
                'id'    => 9,
                'title' => 'role_access',
            ],
            [
                'id'    => 10,
                'title' => 'user_create',
            ],
            [
                'id'    => 11,
                'title' => 'user_edit',
            ],
            [
                'id'    => 12,
                'title' => 'user_show',
            ],
            [
                'id'    => 13,
                'title' => 'user_delete',
            ],
            [
                'id'    => 14,
                'title' => 'user_access',
            ],
            [
                'id'    => 15,
                'title' => 'administrasi_access',
            ],
            [
                'id'    => 16,
                'title' => 'agama_create',
            ],
            [
                'id'    => 17,
                'title' => 'agama_edit',
            ],
            [
                'id'    => 18,
                'title' => 'agama_delete',
            ],
            [
                'id'    => 19,
                'title' => 'agama_access',
            ],
            [
                'id'    => 20,
                'title' => 'bank_create',
            ],
            [
                'id'    => 21,
                'title' => 'bank_edit',
            ],
            [
                'id'    => 22,
                'title' => 'bank_delete',
            ],
            [
                'id'    => 23,
                'title' => 'bank_access',
            ],
            [
                'id'    => 24,
                'title' => 'profesi_create',
            ],
            [
                'id'    => 25,
                'title' => 'profesi_edit',
            ],
            [
                'id'    => 26,
                'title' => 'profesi_delete',
            ],
            [
                'id'    => 27,
                'title' => 'profesi_access',
            ],
            [
                'id'    => 28,
                'title' => 'provinsi_create',
            ],
            [
                'id'    => 29,
                'title' => 'provinsi_edit',
            ],
            [
                'id'    => 30,
                'title' => 'provinsi_delete',
            ],
            [
                'id'    => 31,
                'title' => 'provinsi_access',
            ],
            [
                'id'    => 32,
                'title' => 'kabupaten_create',
            ],
            [
                'id'    => 33,
                'title' => 'kabupaten_edit',
            ],
            [
                'id'    => 34,
                'title' => 'kabupaten_delete',
            ],
            [
                'id'    => 35,
                'title' => 'kabupaten_access',
            ],
            [
                'id'    => 36,
                'title' => 'kecamatan_create',
            ],
            [
                'id'    => 37,
                'title' => 'kecamatan_edit',
            ],
            [
                'id'    => 38,
                'title' => 'kecamatan_delete',
            ],
            [
                'id'    => 39,
                'title' => 'kecamatan_access',
            ],
            [
                'id'    => 40,
                'title' => 'kelurahan_create',
            ],
            [
                'id'    => 41,
                'title' => 'kelurahan_edit',
            ],
            [
                'id'    => 42,
                'title' => 'kelurahan_delete',
            ],
            [
                'id'    => 43,
                'title' => 'kelurahan_access',
            ],
            [
                'id'    => 44,
                'title' => 'relawan_access',
            ],
            [
                'id'    => 45,
                'title' => 'rekening_create',
            ],
            [
                'id'    => 46,
                'title' => 'rekening_edit',
            ],
            [
                'id'    => 47,
                'title' => 'rekening_show',
            ],
            [
                'id'    => 48,
                'title' => 'rekening_delete',
            ],
            [
                'id'    => 49,
                'title' => 'rekening_access',
            ],
            [
                'id'    => 50,
                'title' => 'program_donasi_create',
            ],
            [
                'id'    => 51,
                'title' => 'program_donasi_edit',
            ],
            [
                'id'    => 52,
                'title' => 'program_donasi_show',
            ],
            [
                'id'    => 53,
                'title' => 'program_donasi_delete',
            ],
            [
                'id'    => 54,
                'title' => 'program_donasi_access',
            ],
            [
                'id'    => 55,
                'title' => 'donasi_create',
            ],
            [
                'id'    => 56,
                'title' => 'donasi_edit',
            ],
            [
                'id'    => 57,
                'title' => 'donasi_show',
            ],
            [
                'id'    => 58,
                'title' => 'donasi_delete',
            ],
            [
                'id'    => 59,
                'title' => 'donasi_access',
            ],
            [
                'id'    => 60,
                'title' => 'saran_create',
            ],
            [
                'id'    => 61,
                'title' => 'saran_show',
            ],
            [
                'id'    => 62,
                'title' => 'saran_delete',
            ],
            [
                'id'    => 63,
                'title' => 'saran_access',
            ],
        ];

        Permission::insert($permissions);
    }
}
