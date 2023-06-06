<?php

namespace App\Interfaces;

interface PenjualanRepositoryInterface
{
    public function getList(array $filter, int $page, int $perPage);
    public function jumlahTerjual(array $filter);
    public function create(array $orderDetails);
}