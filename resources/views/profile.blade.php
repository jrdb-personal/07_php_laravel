@extends('adminlte::page')

@section('title', 'Profile')

@section('content_header')
    <h1>Profile Management</h1>
@stop

@section('content')
    <p>Profile Record</p>
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
            <form method="post" action="{{ route('profile.save') }}" 
                enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="id" 
                value="{{ is_null($user->profile)? '' : $user->profile->id }}">
                
                <div class="form-row">
                    <div class="col-md-12">
                        <img src="{{ (is_null($user->profile)||empty($user->profile->photo))? 
                            asset('storage/photo.png') : asset('storage/'.$user->profile->photo) }}" 
                        width="200" height="200" alt="profile_image">
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-2">
                        <input type="hidden" name="profile_image_current" 
                        value="{{ is_null($user->profile)? '' : $user->profile->image }}">
                        <x-adminlte-input-file name="profile_image_new" label="Upload file" 
                        placeholder="Choose a file..." disable-feedback/>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-2">
                        <x-adminlte-input name="first_name" label="First Name" type="text" 
                        required 
                        value="{{ is_null($user->profile)? '' : $user->profile->first_name}}"/> 
                    </div>
                    <div class="col-md-2">
                        <x-adminlte-input name="middle_name" label="Middle Name" type="text" 
                        required value="{{ is_null($user->profile)? '' : $user->profile->middle_name}}"/>
                    </div>
                    <div class="col-md-2">
                        <x-adminlte-input name="last_name" label="Last Name" type="text" 
                        required value="{{ is_null($user->profile)? '' : $user->profile->last_name}}"/>
                    </div>
                    <div class="col-md-2">
                        <x-adminlte-input name="suffix" label="Suffix" type="text" 
                         value="{{ is_null($user->profile)? '' : $user->profile->suffix}}"/>
                    </div>
                </div>                
                <hr>
                <div class="row">
                @php
                    $config = ['format' => 'YYYY-MM-DD'];
                @endphp
                    <div class="col-md-2">
                        <x-adminlte-input-date name="birth_date" placeholder="Choose a date..."
                            label="Birthdate" required value="{{ is_null($user->profile)? '' : $user->profile->birth_date }}">
                            <x-slot name="appendSlot">
                                <x-adminlte-button theme="default" icon="fas fa-calendar"
                                    title="Select Date"/>
                            </x-slot>
                        </x-adminlte-input-date>
                    </div>
                    <div class="col-md-2">
                        <x-adminlte-select name="gender" label="Gender">
                            <option>Select</option>
                            @foreach ($gender as $g)
                                <option value="{{ $g }}" 
                                {{ !is_null($user->profile) && ($user->profile->gender == $g)? 'selected' : '' }}>
                                    {{ $g }}
                                </option>
                            @endforeach
                        </x-adminlte-select>
                    </div>

                    <div class="col-md-2">
                        <x-adminlte-select name="nationality" label="Nationality">
                            <option>Select</option>
                            @foreach ($nationality as $n)
                            <option value="{{ $n }}" {{!is_null($user->profile) && ($user->profile->nationality == $n)? 'selected' : '' }}>
                                    {{ $n }}
                            </option>
                            @endforeach
                        </x-adminlte-select>
                    </div>
                </div>               
                <hr>
                <x-adminlte-button class="btn-sm" type="submit" label="Save" theme="primary" icon="fas fa-save"/>
                <a href="{{ route('home') }}" class="btn btn-danger btn-sm"><i class="fas fa-backspace"></i> Cancel</a>
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