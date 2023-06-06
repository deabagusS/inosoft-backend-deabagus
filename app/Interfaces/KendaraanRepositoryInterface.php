<?php

namespace App\Interfaces;

interface KendaraanRepositoryInterface 
{
    public function getList(array $filter, int $page, int $perPage);
    public function find(string $id);
    public function jumlahStock(array $filter) ;
    public function create(array $orderDetails);
    public function delete(string $id);
}