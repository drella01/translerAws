<div class="py-2 text-white">
    <h3>Filtros</h3>
    <p class="text-center text-white">Marca de vehículo</p>
    <ul class="mb-2" style="list-style: none">
        @foreach (App\Models\Brand::pluck('name') as $item)
        <li>{{ ucfirst($item) }}</li>
        @endforeach
    </ul>
    <hr class="dropdown-divider">
    <p class="text-center text-white">Tipo de vehículo</p>
    <form action="" method="get" id="">
        <select class="select2 form-control" name="" id="" onchange="">
            <option value={{ Null }}>Seleccione un elemento</option>
            @foreach ($types as $type)
                <option value="{{$type->id}}">{{ $type->name}}</option>
            @endforeach
        </select>
    </form>
</div>
