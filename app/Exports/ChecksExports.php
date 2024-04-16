<?php

namespace App\Exports;

use App\Check;
use Illuminate\Support\Carbon;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class ChecksExports implements FromQuery, WithHeadings, WithMapping
{
    use Exportable;

    public $from;
    public $to;
    public $user;
    public $state;

    public function __construct($from, $to, $user, $state)
    {
        $this->from = $from;
        $this->to = $to;
        $this->user = $user;
        $this->state = $state;

    }
    /**
    * @return \Illuminate\Support\Collection
    */

    public function query()
    {
        if($this->user){
            return Check::query()->whereBetween('created_at',[$this->from,$this->to])->where('user_id',$this->user);
        }elseif($this->state){
            return Check::query()->whereBetween('created_at',[$this->from,$this->to])->where('state_id',$this->state);
        }
        return Check::query()->whereBetween('created_at',[$this->from,$this->to]);
    }

    public function headings(): array
    {
        return [
            '#',
            'Nombre',
            'Apellidos',
            'Email',
            'Código Postal',
            'Número de cheque',
            'id',
            'Concesionario',
            'Factura',
            'Importe',
            'Creado',
            'Usado',
            'Caduca',
        ];
    }

    public function map($row): array
    {
        if($row->user){
            return [
                $row->id,
                $row->first_name,
                $row->last_name,
                $row->email,
                $row->postal_code,
                $row->id_extra,
                $row->user_id,
                $row->user->dealer->name,
                $row->redeem->invoice,
                $row->redeem->amount,
                $row->created_at->format('d-m-Y'),
                Carbon::parse($row->redeem->created_at)->format('d-m-y'),
                Carbon::parse($row->before_at)->format('d-m-y'),
            ];
        }
        return [
            $row->id,
            $row->first_name,
            $row->last_name,
            $row->email,
            $row->postal_code,
            $row->id_extra,
            $row->user_id,
            NULL,
            NULL,
            NULL,
            $row->created_at->format('d-m-Y'),
            NULL,
            Carbon::parse($row->before_at)->format('d-m-y'),
        ];
    }


}
