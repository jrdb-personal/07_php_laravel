@extends('adminlte::page')

@section('title', 'Contact')

@section('content_header')
    <h1>Contact Management</h1>
@stop

@section('content')
    <p>Contact Record</p>

    <div class="card">
        <div class="card-body">

        <table class="table">
            <tr>
                <th>Contact Type</th>
                <th>Primary?</th>
                <th>Number</th>
                <th colspan="2">Actions</td>
            </tr>
                @forelse ($contacts as $contact)
                    <tr>
                        <td>{{ $contact->contact_type }}</td>
                        <td>{{ ($contact->primary == 1)? 'Primary' : '' }}</td>
                        <td>{{ $contact->number }}</td>
                        </td>
                        <td><a href="{{ route('contact.view', ['id' => $contact->id ]) }}">
                            <i class="far fa-edit"></i></a></td>
                        <td><a href="#"><i class="fas fa-trash-alt"></i></a></td>
                    </tr>
                @empty
                    <tr><td colspan="5">There are no Contact records found in the system</td></tr>
                @endforelse
        </table>
        <nav aria-label="...">
            <ul class="pagination">
                {{ $contacts->links() }}
            </ul>
        </nav>
        <a href="{{ route('contact.view') }}" class="btn btn-primary btn-sm">
        <i class="fas fa-map-marked-alt"></i> New Contact Record</a>  
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