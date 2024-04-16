<?php

namespace App\Exports;

use App\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\Exportable;

class UsersExport implements FromQuery, WithHeadings, WithMapping
{
    use Exportable;

    public function __construct()
    {

    }

    /**
    * @return \Illuminate\Support\Collection
    */

    public function query()
    {
        return User::query()->where('role_id',2)->whereNotNull('password');
    }

    public function headings(): array
    {
        return [
            '#',
            'Nombre',
            'Email',
            'Concesionario',
            'Código',
            'Creado',
        ];
    }

    public function map($row): array
    {
        return [
            $row->id,
            $row->name,
            $row->email,
            $row->dealer->name,
            $row->dealer->id_extra,
            $row->created_at->format('d-m-Y'),
        ];

    }

}
