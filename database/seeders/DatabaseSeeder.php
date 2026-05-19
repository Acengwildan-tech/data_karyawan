<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Role;
use App\Models\Jabatan;
use App\Models\Karyawan;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // 1. Seed Roles robustly
        Role::firstOrCreate(['id' => 1], ['nama_role' => 'admin']);
        Role::firstOrCreate(['id' => 2], ['nama_role' => 'karyawan']);

        // 2. Seed Admin User robustly
        User::firstOrCreate(
            ['email' => 'admin@gmail.com'],
            [
                'name' => 'Admin User',
                'password' => Hash::make('admin123'),
                'role_id' => 1,
            ]
        );

        // 3. Seed 5 Jabatans
        $jabatansList = [
            'Direktur Utama',
            'Manajer Personalia',
            'Staff Administrasi',
            'Software Engineer',
            'Customer Service'
        ];

        $jabatanModels = [];
        foreach ($jabatansList as $nama) {
            $jabatanModels[] = Jabatan::firstOrCreate(['nama_jabatan' => $nama]);
        }

        // 4. Seed 10 Users and Karyawans
        $karyawanData = [
            [
                'name' => 'Ahmad Hidayat',
                'email' => 'ahmad@gmail.com',
                'alamat' => 'Jl. Merdeka No. 12, Jakarta',
                'no_hp' => '081234567890',
            ],
            [
                'name' => 'Budi Santoso',
                'email' => 'budi@gmail.com',
                'alamat' => 'Jl. Sudirman No. 45, Bandung',
                'no_hp' => '081398765432',
            ],
            [
                'name' => 'Citra Lestari',
                'email' => 'citra@gmail.com',
                'alamat' => 'Jl. Diponegoro No. 89, Surabaya',
                'no_hp' => '081512345678',
            ],
            [
                'name' => 'Dedi Wijaya',
                'email' => 'dedi@gmail.com',
                'alamat' => 'Jl. Gajah Mada No. 3, Yogyakarta',
                'no_hp' => '082187654321',
            ],
            [
                'name' => 'Eka Putri',
                'email' => 'eka@gmail.com',
                'alamat' => 'Jl. Pemuda No. 17, Semarang',
                'no_hp' => '082211223344',
            ],
            [
                'name' => 'Fahmi Idris',
                'email' => 'fahmi@gmail.com',
                'alamat' => 'Jl. Ahmad Yani No. 56, Medan',
                'no_hp' => '085244556677',
            ],
            [
                'name' => 'Gita Permata',
                'email' => 'gita@gmail.com',
                'alamat' => 'Jl. Pahlawan No. 23, Makassar',
                'no_hp' => '085377889900',
            ],
            [
                'name' => 'Hendra Wijaya',
                'email' => 'hendra@gmail.com',
                'alamat' => 'Jl. Kartini No. 8, Palembang',
                'no_hp' => '087788990011',
            ],
            [
                'name' => 'Indah Sari',
                'email' => 'indah@gmail.com',
                'alamat' => 'Jl. Veteran No. 12, Malang',
                'no_hp' => '087812123434',
            ],
            [
                'name' => 'Joko Susilo',
                'email' => 'joko@gmail.com',
                'alamat' => 'Jl. Kenanga No. 5, Surakarta',
                'no_hp' => '089988776655',
            ]
        ];

        foreach ($karyawanData as $index => $data) {
            // Create user
            $user = User::firstOrCreate(
                ['email' => $data['email']],
                [
                    'name' => $data['name'],
                    'password' => Hash::make('karyawan123'),
                    'role_id' => 2, // Karyawan role
                ]
            );

            // Assign a sequential jabatan
            $jabatan = $jabatanModels[$index % count($jabatanModels)];

            // Create Karyawan record
            Karyawan::firstOrCreate(
                ['user_id' => $user->id],
                [
                    'jabatan_id' => $jabatan->id,
                    'alamat' => $data['alamat'],
                    'no_hp' => $data['no_hp'],
                ]
            );
        }
    }
}
