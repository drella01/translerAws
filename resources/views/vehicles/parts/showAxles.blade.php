<div class="row">
    @foreach ($vehicle->axlesDetail as $key=>$item)
    <div class="col-md-8">
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
    </div>
    <div class="col-sm-4">
        <div class="d-flex my-5">
            @if ($item->isDir)
            <div class="d-inline-block square isdir">
                <p class="my-4" style="font-size: 8px">20%</p>
            </div>
            <hr>
            <div class="d-inline-block square isdir">
                <p class="my-4" style="font-size: 8px">20%</p>
            </div>
            @else
            @if ($item->isDouble)
            <div class="d-inline-block square">
               <p class="my-4" style="font-size: 8px">20%</p>
            </div>
            @endif
            <div class="d-inline-block square">
               <p class="my-4" style="font-size: 8px">20%</p>
            </div>
            <hr>
            @if ($item->isDouble)
            <div class="d-inline-block square">
               <p class="my-4" style="font-size: 8px">20%</p>
            </div>
            @endif
            <div class="d-inline-block square">
               <p class="my-4" style="font-size: 8px">20%</p>
            </div>
            @endif
        </div>
    </div>
    @endforeach
</div>
