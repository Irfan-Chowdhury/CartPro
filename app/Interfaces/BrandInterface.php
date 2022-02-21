<?php

namespace App\Interfaces;

//Data Access Logic (DAL)
interface BrandInterface
{
    public function getAll();

    public function store(array $data);

    public function findById($id);

    public function update($id, array $data);

    public function selectedBrands($idsArray);

    public function brandTranslation($brand_id);
}

?>
