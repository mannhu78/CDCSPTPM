<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use App\Models\Sanpham;
use Illuminate\Support\Str;


class SanphamImportClass implements ToCollection
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $rows)
    {
        foreach ($rows as $key => $row) {
        Sanpham::create([
            'name'=> trim($row[0]),
            'slug'=> Str::slug(trim($row[0])),
            'thuonghieu_id'=>4,
            'danhmuc_id'=>trim($row[5]),
            'price'=>0,
            'status'=>'Active',
            'description'=>trim($row[1]),
            'content'=>trim($row[2])
               

        ]);
    }
}
}
