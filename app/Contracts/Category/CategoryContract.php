<?php

namespace App\Contracts\Category;

interface CategoryContract
{
    public function getAll();

    public function storeCategory($data);

    public function getById($id);

    public function updateCategoryById($id, $data);

    public function active($id);

    public function inactive($id);

    public function destroy($id);

    public function bulkAction($type, $ids);



    // // public function categoryTranslation($category_id);

    // public function update($id, $data);

    // public function selectedCategories($idsArray);
}

?>
