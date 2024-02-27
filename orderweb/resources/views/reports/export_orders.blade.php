@extends('templates.base_reports')
@section('header', 'Reporte ordenes')
@section('content')
    <section id="results">
     @if ($orders)

     
        <p> <strong>Fecha inicial:</strong> {{ $initial_date }}</p>
        <p> <strong>Fecha final:</strong> {{ $final_date }}</p>
        
        <h3>Órdenes</h3>
        <table id="ReportTable">
            <thead>
                <tr>
                     <th>Id</th>
                     <th>Fecha de legalización</th>
                     <th>Dirección</th>
                     <th>Ciudad</th>
                     <th>Observacioón</th>
                     <th>Causal</th>
                 </tr>
            </thead>
            <tbody>
                @foreach ($orders as $order)
                    <tr>
                        <td>{{ $order['id'] }}</td>
                        <td>{{ $order['legalization_date'] }}</td>
                        <td>{{ $order['address'] }}</td>
                        <td>{{ $order['city']}}</td>
                        <td>{{optional($order->observation)->description ?? ''}}</td>
                        <td>{{$order->causal->description }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <h5>No existen ordenes</h5>
    @endif
    </section>
@endsection

