<?php

namespace Database\Seeders;

use App\Models\Vendor;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VendorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $vendors = [
            [
                'name' => 'Desa Paksebali',
                'description' => '-',
                'address' => 'BUM Desa Paksebali',
                'phone' => '0812-1234-3748',
                'email' => 'paksebali@gmail.com',
            ],
            [
                'name' => 'Desa Cempaga',
                'description' => '-',
                'address' => 'BUM Desa Bersama Bali Aga',
                'phone' => '0812-1234-5678',
                'email' => 'baliaga@gmail.com',
            ],
            [
                'name' => 'Desa Tanjuang Balik',
                'description' => '-',
                'address' => 'BUM Desa Bangun Tanjuang Jaya Tanjuang Balik',
                'phone' => '0812-1234-2370',
                'email' => 'tanjuangjaya@gmail.com',
            ],
            [
                'name' => 'Desa Simpang Sugiran',
                'description' => '-',
                'address' => 'BUM Desa Zigiran Mandiri Simpang Sugiran',
                'phone' => '0812-1234-2370',
                'email' => 'zigiranmandiri@gmail.com',
            ],
            [
                'name' => 'Desa Pabuaran Lor',
                'description' => '-',
                'address' => 'BUM Desa Rajawali Pabuaran Lor',
                'phone' => '0812-2343-2370',
                'email' => 'pbl@gmail.com',
            ],
            [
                'name' => 'Desa Kemurang Wetan',
                'description' => '-',
                'address' => 'BUM Desa Rajawali Kemurang Wetan',
                'phone' => '0812-1234-2123',
                'email' => 'rjsdkj@gmail.com',
            ],
            [
                'name' => 'Desa Cantuk',
                'description' => '-',
                'address' => 'BUM Desa Rajawali Cantuk',
                'phone' => '0812-1234-2321',
                'email' => 'cnths@gmail.com',
            ],
        ];

        foreach ($vendors as $vendor) {
            Vendor::create($vendor);
        }
    }
}
