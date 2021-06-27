<div class="py-2">
    <h3>Filtros</h3>
    <h5 class="text-center">{{__('custom.sortBy')}}</h5>
    <button class="btn btn-primary" onclick="highLow()">{{__('custom.highLow')}}</button>
    <button class="btn btn-primary" onclick="lowHigh()">{{__('custom.lowHigh')}}</button>
    <hr class="dropdown-divider">
    <form action="">
    </form>
    <hr class="dropdown-divider">
    <h5 class="text-center">{{__('custom.details.brand')}}</h5>
    <hr class="dropdown-divider">
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

    function highLow(){
        var vehicles = {!! $vehicles !!};
        var tst = vehicles.sort(function(a, b){return a.sale_price - b.sale_price});
        tst.forEach( element => {
            //$("#"+element.id).show();
        });
        console.log(tst);
    };

    function lowHigh(){
        var vehicles = {!! $vehicles !!};
        var tst = vehicles.sort(function(a, b){return a.sale_price - b.sale_price});
        vehicles.forEach( element => {
            $("#"+element.id).hide();
        });
        console.log(tst);
        $('.prueba').prop('hidden',false);
    };
</script>
