@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
    <p>Welcome to this beautiful admin panel.</p>

    URL GENERATING METHODS:<br>
    <ul>
        
        <li><a href="@php echo url('profile/view'); @endphp"> 
            URL GENERATE USING url() METHOD</a>
        </li>
        <li><a href="@php echo route('profile.view'); @endphp"> 
            URL GENERATE USING route() METHOD</a>
        </li>
        <li><a href="@php echo action('ProfileController@viewprofile'); @endphp"> 
            URL GENERATE USING action() METHOD</a>
        </li>
    </ul>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop