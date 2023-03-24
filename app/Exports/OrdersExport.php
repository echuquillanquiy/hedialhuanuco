<?php

namespace App\Exports;

use App\Order;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithDrawings;
use Maatwebsite\Excel\Concerns\WithHeadings;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use PhpOffice\PhpSpreadsheet\Worksheet\Drawing;
use Maatwebsite\Excel\Concerns\WithCustomStartCell;

class OrdersExport implements
        FromCollection,
        ShouldAutoSize,
        WithMapping,
        WithHeadings,
        WithEvents,
        FromQuery,
        WithDrawings,
        WithCustomStartCell
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function query()
    {
        return Order::query()
            ->with('patient')
            ->;
        //return Order::all();
    }

    public function query()
    {
        return Order::query()
            ->with('patient')
            ->with('room')
            ->with('shift');
        //return Order::all();
    }

    public function startCell(): string
    {
        // TODO: Implement startCell() method.
    }

    public function drawings()
    {
        // TODO: Implement drawings() method.
    }

    public function registerEvents(): array
    {
        // TODO: Implement registerEvents() method.
    }

    public function headings(): array
    {

        return [
            'N° Orden',
            'Paciente',
            'Sala',
            'Turno'
        ];

    }

    public function map($order): array
    {
        return [
            $order->id,
            $order->patient->name,
            $order->room->name,
            $order->shift->name
        ];
    }

}
