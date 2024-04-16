<?php

namespace App\Exports;

use App\Models\Vehicle;
use Illuminate\Support\Carbon;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class VehiclesExports implements FromQuery, WithHeadings, WithMapping
{
    use Exportable;

    public $from;
    public $to;
    public $user;
    public $state;

    public function __construct($vehicles)
    {
        /*$this->from = $from;
        $this->to = $to;
        $this->user = $user;*/
        $this->vehicles = $vehicles;

    }
    /**
    * @return \Illuminate\Support\Collection
    */

    public function query()
    {
        /*if($this->vehicles){
            return Vehicle::query()->whereBetween('created_at',[$this->from,$this->to])->where('user_id',$this->user);
        }elseif($this->state){
            return Vehicle::query()->whereBetween('created_at',[$this->from,$this->to])->where('state_id',$this->state);
        }*/
        return Vehicle::query();
    }

    public function headings(): array
    {
        return [
            '#',
            'Primera matriculacion',
            'Matricula',
            'Marca',
            'Modelo',
            'Número de chasis',
            'Referencia',
            'Adquirido',
            'Proveedor',
            'Compra',
            'Cliente',
        ];
    }

    public function map($row): array
    {
        /*if($row->user){
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
        }*/
        return [
            $row->id,
            Carbon::parse($row->reg_date)->format('d-m-Y'),
            $row->registration,
            $row->brand,
            $row->model,
            $row->chassis_number,
            $row->reference,
            Carbon::parse($row->buy_date)->format('d-m-Y'),
            $row->provider->name,
            $row->buy_price,
            $row->client_id,
        ];
    }


}
