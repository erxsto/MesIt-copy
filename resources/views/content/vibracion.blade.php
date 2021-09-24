@extends('layouts.index')
@section('content')
<div class="content">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    Dashboard
                </div>
                    <div class="row">
                        <div class="col-md-12">
                            <h3>Last 30 speed measurements</h3>
                            <canvas id="myChart"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <table>
            <thead>
                <th>Id</th>
                <th>Eje X</th>
                <th>Eje Y</th>
                <th>Eje Z</th>
            </thead>
            <tbody>
                @foreach($grafica as $graficas)
                <tr>
                    <td>{{$graficas->id}}</td>
                    <td>{{$graficas->ejex}}</td>
                    <td>{{$graficas->ejey}}</td>
                    <td>{{$graficas->ejez}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection