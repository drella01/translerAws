<div class="py-2 text-white">
    <h3>Filtros</h3>
    <h6 class="text-center text-white">Marcas</h6>
    <ul class="mb-2" style="list-style: none">
        @foreach (App\Models\Brand::pluck('name') as $item)
        <li>{{$item}}</li>
        @endforeach
    </ul>
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
