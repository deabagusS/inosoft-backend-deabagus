<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Interfaces\KendaraanRepositoryInterface;

class KendaraanSeeder extends Seeder
{
    private KendaraanRepositoryInterface $kendaraanRepository;

    public function __construct(
        KendaraanRepositoryInterface $kendaraanRepository,
    ) {
        $this->kendaraanRepository = $kendaraanRepository;
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $warna = ['hitam', 'putih', 'merah', 'silver']; 
        $tahun = [ // tambahan harga kendaraan terbaru
            '2020' => 0,
            '2021' => 500000,
            '2022' => 1000000,
            '2023' => 1500000
        ];
        $kendaraan = [
            'motor' => [
                [
                    'harga' => 30000000,
                    'tipe_suspensi' => 'teleskopik',
                    'tipe_transmisi' => 'manual',
                ],
                [
                    'harga' => 33000000,
                    'tipe_suspensi' => 'upside down',
                    'tipe_transmisi' => 'manual',
                ],
                [
                    'harga' => 20000000,
                    'tipe_suspensi' => 'teleskopik',
                    'tipe_transmisi' => 'otomatis',
                ],
                [
                    'harga' => 23000000,
                    'tipe_suspensi' => 'upside down',
                    'tipe_transmisi' => 'otomatis',
                ],
            ],
            'mobil' => [
                [
                    'harga' => 150000000,
                    'kapasitas_penumpang' => 4,
                    'tipe' => 'Agya MT',
                ],
                [
                    'harga' => 170000000,
                    'kapasitas_penumpang' => 4,
                    'tipe' => 'Agya AT',
                ],
                [
                    'harga' => 210000000,
                    'kapasitas_penumpang' => 6,
                    'tipe' => 'Avanza Veloz MT',
                ],
                [
                    'harga' => 2500000000,
                    'kapasitas_penumpang' => 6,
                    'tipe' => 'Avanza Veloz AT',
                ],
            ]
        ];

        foreach ($warna as $warnaItem) {
            foreach ($tahun as $tahunKey => $tahunItem) {
                foreach ($kendaraan as $kendaraanKey => $kendaraanItem) {
                    foreach ($kendaraanItem as $value) {
                        for ($i=0; $i < 2; $i++) { 
                            $kendaraanDetail = [];
                            $kendaraanDetail = $value;
                            $kendaraanDetail['harga'] = $value['harga'] + $tahunItem;
                            $kendaraanDetail['tahun_keluaran'] = $tahunKey;
                            $kendaraanDetail['warna'] = $warnaItem;
                            $kendaraanDetail['mesin'] = generateNoMesin(10);
                            $this->kendaraanRepository->create($kendaraanDetail);
                        }
                    }
                }
            }
        }
    }
}
