@extends('adminlte::page')

@section('title', 'Contact')

@section('content_header')
    <h1>Contact Management</h1>
@stop

@section('content')
    <p>Contact Record</p>

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
            <form method="post" action="{{ route('contact.save') }}">
                @csrf
                <div class="form-row">
                    <input type="hidden" name="id" value="{{ is_null($user->contact)? '' : $user->contact->user_id }}">
                    <div class="col-md-2">
                        <x-adminlte-input name="mobile" label="Mobile" type="text" required value="{{ is_null($user->contact)? '' : $user->contact->mobile }}"/>
                    </div>

                    <div class="col-md-2">
                        <x-adminlte-input name="landline" label="Landline" type="text" required value="{{ is_null($user->contact)? '' : $user->contact->landline}}"/>
                    </div>

                    <div class="col-md-2">
                        <x-adminlte-input name="alternate_email" label="Alternate Email" type="text" required value="{{ is_null($user->contact)? '' : $user->contact->alternate_email}}"/>
                    </div>
                </div>                
                <hr>
                <x-adminlte-button class="btn-sm" type="submit" label="Save" theme="primary" icon="fas fa-save"/>
                <a href="{{ route('index') }}" class="btn btn-danger btn-sm"><i class="fas fa-backspace"></i> Cancel</a>
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