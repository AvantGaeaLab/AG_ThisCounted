<?php

namespace App\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class UserExport implements FromCollection,ShouldAutoSize,WithMapping, WithHeadings
{
    use Exportable;
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return User::all();
    }

    public function map($user): array{
        return[
        $user->id,
        $user->name,
        $user->email,
        $user->phone_number,
        $user->orders->count(),
        $user->created_at,
        ];
    }

    public function headings(): array{
        return [
            '#',
            'name',
            'Email',
            'Phone number',
            'Orders',
            'Created at'
        ];
    }


}
