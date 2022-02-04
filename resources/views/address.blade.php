@extends('adminlte::page')

@section('title', 'Address')

@section('content_header')
    <h1>Address Management</h1>
@stop

@section('content')
    <p>Address Record</p>
    <div class="card">
        <div class="card-body">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form method="post" action="{{ route('addresses.save') }}">
                @csrf
                <div class="form-row">
                    <input type="hidden" name="id" value="{{ is_null($address)? '' : $address->id }}">
                    <div class="col-md-2">
                        <x-adminlte-input name="address_type" label="Address Type" type="text" 
                        required value="{{ is_null($address)? '' : $address->address_type }}"/>
                    </div>

                    <div class="col-md-4">
                        <x-adminlte-input name="address" label="Address" type="text" 
                        required value="{{ is_null($address)? '' : $address->address }}"/>
                    </div>
                </div>

                <div class="form-row">
                    <div class="col-md-2">
                        <x-adminlte-select name="municipality" label="Municipality">
                        <option>Select</option>
                            @foreach ($geolocation as $gl)
                                @foreach($gl['municipality'] as $m)
                                <option value="{{ $m }}" {{!is_array($address) && ($address->municipality == trim($m))? 'selected' : '' }}>
                                    {{ trim($m) }}
                                </option>
                                @endforeach
                            @endforeach
                        </x-adminlte-select>
                    </div>

                    <div class="col-md-2">
                        <x-adminlte-select name="region" label="Region">
                        <option>Select</option>
                            @foreach ($geolocation as $gl)
                                <option value="{{ $gl['region'] }}" {{!is_array($address) && ($address->region == $gl['region'])? 'selected' : '' }}>
                                    {{ $gl['region'] }}
                                </option>
                            @endforeach
                        </x-adminlte-select>
                    </div>
                    
                    <div class="col-md-2">
                        <x-adminlte-select name="zip_code" label="Zip Code">
                        <option>Select</option>
                            @foreach ($geolocation as $d)
                                @foreach($d['zipcode'] as $z)
                                <option value="{{ $z }}" {{!is_array($address) && ($address->zip_code == $z)? 'selected' : '' }}>
                                    {{ $z }}
                                </option>
                                @endforeach
                            @endforeach
                        </x-adminlte-select>
                    </div>                    
                </div>                
                <hr>
                <x-adminlte-button class="btn-sm" type="submit" label="Save" 
                theme="primary" icon="fas fa-save"/>
                <a href="{{ route('addresses.list') }}" class="btn btn-danger btn-sm">
                <i class="fas fa-backspace"></i> Cancel</a>
            </form>
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