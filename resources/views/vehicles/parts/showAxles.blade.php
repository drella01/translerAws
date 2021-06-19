<div class="row">
    <div class="col-md-8">
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
    </div>
    <div class="col-sm-4">
        @foreach ($vehicle->axlesDetail as $item)
        <div class="d-flex my-5">
            <div class="d-inline-block square"></div>
            <hr>
            <div class="d-inline-block square">redios</div>
        </div>
        @endforeach
    </div>
</div>
