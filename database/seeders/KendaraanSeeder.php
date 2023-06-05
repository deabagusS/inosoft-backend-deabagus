<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Interfaces\KendaraanRepositoryInterface;
use App\Interfaces\MobilRepositoryInterface;
use App\Interfaces\MotorRepositoryInterface;

class KendaraanSeeder extends Seeder
{
    private KendaraanRepositoryInterface $kendaraanRepository;
    private MobilRepositoryInterface $mobilRepository;
    private MotorRepositoryInterface $motorRepository;

    public function __construct(
        KendaraanRepositoryInterface $kendaraanRepository,
        MobilRepositoryInterface $mobilRepository,
        MotorRepositoryInterface $motorRepository
    ) {
        $this->kendaraanRepository = $kendaraanRepository;
        $this->mobilRepository = $mobilRepository;
        $this->motorRepository = $motorRepository;
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
                    'kapasitas_penumpang' => 4,
                    'tipe' => 'Avanza Veloz MT',
                ],
                [
                    'harga' => 2500000000,
                    'kapasitas_penumpang' => 4,
                    'tipe' => 'Avanza Veloz AT',
                ],
            ]
        ];

        foreach ($warna as $warnaItem) {
            foreach ($tahun as $tahunKey => $tahunItem) {
                foreach ($kendaraan as $kendaraanKey => $kendaraanItem) {
                    foreach ($kendaraanItem as $value) {
                        $kendaraanSave = $this->kendaraanRepository->create(
                            [
                                'tahun_keluaran'=> $tahunKey, 
                                'warna'=> $warnaItem, 
                                'harga'=> $value['harga'] + $tahunItem,
                            ]
                        );

                        $kendaraanId = $kendaraanSave->id;
                        if ($kendaraanKey === 'motor'){
                            $this->motorRepository->create(
                                [
                                    'mesin' => generateNoMesin(10),
                                    'tipe_suspensi' => $value['tipe_suspensi'], 
                                    'tipe_transmisi' => $value['tipe_transmisi'], 
                                    'kendaraan_id' => $kendaraanId,
                                ]
                            );
                        } elseif ($kendaraanKey === 'mobil') {
                            $this->mobilRepository->create(
                                [
                                    'mesin' => generateNoMesin(10),
                                    'kapasitas_penumpang' => $value['kapasitas_penumpang'], 
                                    'tipe' => $value['tipe'], 
                                    'kendaraan_id' => $kendaraanId, 
                                ]
                            );
                        }
                    }
                }
            }
        }
    }
}
