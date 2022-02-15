<?php

namespace App\Exports;

use App\Models\Deal;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class DealsExport implements FromCollection,ShouldAutoSize,WithMapping, WithHeadings
{
    use Exportable;

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Deal::all();
    }

    public function map($deal): array{
        return[
            $deal->id,
            $deal->title,
            $deal->retails_price,
            $deal->price,
            $deal->start_at,
            $deal->end_at,
            $deal->description,
            $deal->more_info,
            $deal->location,
            $deal->status,
            $deal->merchant->name,
            $deal->user->name,
            $deal->created_at,
        ];
    }

    public function headings(): array{
        return [
            '#',
            'Title',
            'Retails_price',
            'Price',
            'Start at',
            'End at',
            'Description',
            'More info',
            'Location',
            'Status',
            'Merchant',
            'User',
            'Created at',
        ];
    }
}
