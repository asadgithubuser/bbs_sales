<?php
    namespace App\Imports;
    use Illuminate\Support\Collection;
    use Maatwebsite\Excel\Concerns\ToCollection;

    class CommodityImport implements ToCollection
    {
       public function collection(Collection $rows)
       {
       }
    }