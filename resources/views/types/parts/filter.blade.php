<div class="py-2">
    <h3>Filtros</h3>
    <hr class="dropdown-divider">
    <p class="text-center">Marca de vehículo</p>
    <form action="">
        @foreach (App\Models\Brand::pluck('name') as $item)
        <div class="form-check">
            <input type="checkbox" class="form-check-input atpc" id="{{$item}}" name="brands[]" value={{ $item }}>
            <label class="form-check-label" for="{{$item}}">{{ ucfirst($item) }}</label>
        </div>
        @endforeach
    </form>
    <hr class="dropdown-divider">
</div>
<script>
     $(document).ready(function(){
        var vehicles = {!! $vehicles !!};
        console.log(vehicles);
        var brands = [];
        $('.atpc').on('change', function() {
            if( $(this).is(':checked') ){
                brands.push($(this).val());
                vehicles.forEach( element => {
                    if (brands.includes(element.brand)) {
                        $("#"+element.id).show();
                    } else {
                        $("#"+element.id).hide();
                    }
                });
            } else {
                var index = brands.indexOf($(this).val())
                if (index > -1) {
                    brands.splice(index, 1);
                }
                vehicles.forEach( element => {if (brands.includes(element.brand)) {
                        $("#"+element.id).show();
                    } else {
                        $("#"+element.id).hide();
                    }
                });

                if(brands.length == 0){
                    vehicles.forEach ( element => {
                        $("#"+element.id).show();
                    });
                    alert('Has eliminado el filtro de marcas de vehículos');
                }
            }
        });
    });
</script>
