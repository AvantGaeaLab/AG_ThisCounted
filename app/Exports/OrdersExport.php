<?php

namespace App\Exports;

use App\Models\Order;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class OrdersExport implements FromCollection,ShouldAutoSize,WithMapping, WithHeadings
{
    use Exportable;

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Order::all();
    }

    public function map($order): array{
        return[
            $order->id,
            $order->deal_id,
            $order->user->name,
            $order->quantity,
            $order->total,
            $order->status,
            $order->created_at,
        ];
    }

    public function headings(): array{
        return [
            '#',
            'deal ID',
            'User name',
            'Quantity',
            'Total',
            'Created at'
        ];
    }

}
