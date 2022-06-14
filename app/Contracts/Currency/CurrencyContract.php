<?php

namespace App\Contracts\Currency;

interface CurrencyContract
{
    public function getAll();

    public function storeData($data);

    public function getById($id);

    public function updateDataById($id, $data);

    public function delete($id);

    public function supportedCurrencies();
}

?>
