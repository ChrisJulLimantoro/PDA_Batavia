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
                'name' => 'Desa Gampong Drien',
                'description' => '-',
                'address' => 'Gampong Drien, Kecamatan Peukan Bada, Kabupaten Aceh Besar',
                'phone' => '0812-1234-5678',
                'email' => 'gampongdrien@gmail.com',
            ],
            [
                'name' => 'Desa Darul Ikhsan',
                'description' => '-',
                'address' => 'Darul Ikhsan, Kecamatan Peukan Bada, Kabupaten Aceh Besar',
                'phone' => '0812-1234-5678',
                'email' => 'darulikh@gmail.com',
            ],
            [
                'name' => 'Desa Gampong Baro',
                'description' => '-',
                'address' => 'Gampong Baro, Kecamatan Peukan Bada, Kabupaten Aceh Besar',
                'phone' => '0812-1234-5678',
                'email' => 'gampongbaro@gmail.com',
            ]
        ];

        foreach ($vendors as $vendor) {
            Vendor::create($vendor);
        }
    }
}
