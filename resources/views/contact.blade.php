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
            <form method="post" action="{{ route('contact.save') }}" 
                enctype="multipart/form-data">
                @csrf
                             
                <hr>
                <x-adminlte-button class="btn-sm" type="submit" label="Save" theme="primary" icon="fas fa-save"/>
                <a href="{{ route('contact.list') }}" class="btn btn-danger btn-sm"><i class="fas fa-backspace"></i> Cancel</a>
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