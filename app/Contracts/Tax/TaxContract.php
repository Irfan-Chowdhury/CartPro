<?php

namespace App\Contracts\Tax;

interface TaxContract
{
    public function getAll();

    public function getAllActiveData();

    public function store($data);
}
