<?php

namespace App\Interfaces;
// use Illuminate\Http\Request;

interface CategoryInterface
{
    public function getAll();

    public function store(array $data);
    // public function store(Request $request);

    public function find($id);

    public function categoryTranslation($category_id);

    public function update($id, array $data);

    public function selectedCategories($idsArray);
}

?>
