<?php

namespace App\Exports;

use App\Category;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class CategoriesExport implements FromCollection,WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return Category::select('title', 'description')->get();
    }

    public function headings(): array
    {
        // TODO: Implement headings() method.

        return ([
            'Title',
            'Description',
        ]);
    }
}

//    public function headingRow(): int
//    {
//        return 2;
//    }
//}
