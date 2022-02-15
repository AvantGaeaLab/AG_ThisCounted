<?php

namespace App\Exports;

use App\Models\Merchant;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class MerchantsExport implements FromCollection,ShouldAutoSize,WithMapping, WithHeadings
{
    use Exportable;

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Merchant::all();
    }

    public function map($merchant): array{
        return[
            $merchant->id,
            $merchant->name,
            $merchant->created_at,
        ];
    }

    public function headings(): array{
        return [
            '#',
            'name',
            'Created at'
        ];
    }


}
