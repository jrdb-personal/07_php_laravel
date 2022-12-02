@extends('adminlte::page')

@section('title', 'Address')

@section('content_header')
    <h1>Address Management</h1>
@stop

@section('content')
    <p>Address Record</p>

    <div class="card">
        <div class="card-body">

        <table class="table">
            <tr>
                <th>Address Type</th>
                <th>Address</th>
                <th>Municipality</th>
                <th>Region</th>
                <th>Zip Code</th>
                <th colspan="2">Actions</td>
            </tr>
                @forelse ($addresses as $address)
                    <tr>
                        <td>{{ $address->id }}</td>
                        <td>{{ $address->address_type }}</td>
                        <td>{{ ($address->primary == 1)? 'Primary' : '' }}</td>
                        <td>{{ $address->address }}</td>
                        <td>{{ $address->municipality }}</td>
                        <td>{{ $address->region }}</td>
                        <td>{{ $address->zip_code }}</td>
                        </td>
                        <td><a href="{{ route('addresses.view', ['id' => $address->id ]) }}">
                            <i class="far fa-edit"></i></a></td>
                        <td><a href="#"><i class="fas fa-trash-alt"></i></a></td>
                    </tr>
                @empty
                    <tr><td colspan="5">There are no Address records found in the system</td></tr>
                @endforelse
        </table>
        <nav aria-label="...">
            <ul class="pagination">
                {{ $addresses->links() }}
            </ul>
        </nav>
                
        <a href="{{ route('addresses.view') }}" class="btn btn-primary btn-sm">
        <i class="fas fa-map-marked-alt"></i> New Address Record</a>  
        <a href="{{ route('index') }}" class="btn btn-danger btn-sm">
        <i class="fas fa-backspace"></i> Cancel</a>
        </div>
    </div>
@stop
@section('plugins.Moment', true)
@section('plugins.TempusDominus', true)
@section('plugins.BootstrapSwitch', true)

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop