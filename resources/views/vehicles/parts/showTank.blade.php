<table class="table table-striped">
    <tr>
        <th>{{ __('custom.tankTrailer.madeof') }}</th>
        <td>{{$vehicle->tankTrailer->madeof}}</td>
    </tr>
    <tr>
        <th>{{ __('custom.tankTrailer.fuel') }}</th>
        <td>{{$vehicle->tankTrailer->fuel}}</td>
    </tr>
    <tr>
        <th>{{ __('custom.tankTrailer.volume') }}</th>
        <td>{{$vehicle->tankTrailer->volume}}</td>
    </tr>
    <tr>
        <th>{{ __('custom.tankTrailer.compartments') }}</th>
        <td>{{$vehicle->tankTrailer->compartments}}</td>
    </tr>
    @for($x=1;$x<=$vehicle->tankTrailer->compartments;$x++)
        @php
            $xz = 'liters'.$x;
        @endphp
        <tr>
            <th>{{ __('custom.tankTrailer.'.$xz) }}</th>
            <td>{{$vehicle->tankTrailer->$xz}}</td>
        </tr>
    @endfor
    <tr>
        <th>{{ __('custom.tankTrailer.degassed') }}</th>
        <td>{{$vehicle->tankTrailer->degassed}}</td>
    </tr>
    <tr>
        <th>{{ __('custom.tankTrailer.counter') }}</th>
        <td>{{$vehicle->tankTrailer->counter}}</td>
    </tr>
    <tr>
        <th>{{ __('custom.tankTrailer.bombBrand') }}</th>
        <td>{{$vehicle->tankTrailer->bombBrand}}</td>
    </tr>
    <tr>
        <th>{{ __('custom.tankTrailer.minLPM') }}</th>
        <td>{{$vehicle->tankTrailer->minLPM}}</td>
    </tr>
    <tr>
        <th>{{ __('custom.tankTrailer.maxLPM') }}</th>
        <td>{{$vehicle->tankTrailer->maxLPM}}</td>
    </tr>
</table>
