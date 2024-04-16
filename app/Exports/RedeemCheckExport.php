<?php

namespace App\Exports;

use App\RedeemCheck;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Support\Carbon;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;


class RedeemCheckExport implements  FromQuery, WithHeadings, WithMapping
{
    use Exportable;

    public $from;
    public $to;
    public $user;

    public function __construct($from, $to, $user)
    {
        $this->from = $from;
        $this->to = $to;
        $this->user = $user;

    }
    /**
    * @return \Illuminate\Support\Collection
    */

    public function query()
    {
        return RedeemCheck::query()->whereBetween('created_at',[$this->from,$this->to])->where('user_id',$this->user);
    }

    public function headings(): array
    {
        return [
            '#',
            'Número de cheque',
            'Usado',
        ];
    }

    public function map($row): array
    {
        return [
            $row->id,
            $row->id_extra,
            $row->created_at->format('d-m-Y'),
        ];
    }

}
