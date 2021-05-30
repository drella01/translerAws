@foreach ($vehicle->axlesDetail as $key=>$item)
<table class="table table-striped">
    <tr>
        <h2 class="text-center">{{ __('custom.axle').' '.++$key }}</h2>
    </tr>
    <tr>
        <th>
            {{ __('custom.axles.isDir') }}
        </th>
        <td>
            @if ($item->isDir)
                Yes
            @else
                No
            @endif
        </td>
    </tr>
    <tr>
        <th>
            {{ __('custom.axles.isDouble') }}
        </th>
        <td>
            @if ($item->isDouble)
                Yes
            @else
                No
            @endif
        </td>
    </tr>
    <tr>
        <th>
            {{ __('custom.axles.brake') }}
        </th>
        <td>
            {{$item->brake}}
        </td>
    </tr>
    <tr>
        <th>
            {{ __('custom.axles.suspension') }}
        </th>
        <td>
            {{$item->suspension}}
        </td>
    </tr>
</table>
@endforeach
