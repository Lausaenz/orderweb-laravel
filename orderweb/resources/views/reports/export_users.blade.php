@extends('templates.base_reports')
@section('header', 'Reporte general de usuarios')
@section('content')
    <section id="results">
     @if ($users)
        <table id="ReportTable">
            <thead>
                <tr>
                     <th>Id</th>
                     <th>Nombre</th>
                     <th>email</th>
                     
                 </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td>{{ $user['id'] }}</td>
                        <td>{{ $user['name'] }}</td>
                        <td>{{ $user['email'] }}</td>
                     
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <h5>No existen Usuarios</h5>
    @endif
    </section>
@endsection