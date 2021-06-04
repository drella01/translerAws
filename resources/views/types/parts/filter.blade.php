<div class="py-2">
    <h3>Filtros</h3>
    <hr class="dropdown-divider">
    <p class="text-center">Marca de vehículo</p>
    <form action="">
        @foreach (App\Models\Brand::pluck('name') as $item)
        <div class="form-check">
            <input type="checkbox" class="form-check-input" id="{{$item}}" value={{ $item }} name="brands[]">
            <label class="form-check-label" for="{{$item}}">{{ ucfirst($item) }}</label>
        </div>
        @endforeach
        <input type="submit" value="submit">
    </form>
    <hr class="dropdown-divider">
</div>
