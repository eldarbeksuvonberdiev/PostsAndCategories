@extends('layouts.admin_main')

@section('title', 'Poll')
@section('pagename', 'Poll')

@section('content')
    <div class="row">
        <div class="col-8 offset-2">
            
            <div>
                <canvas id="myChart"></canvas>
            </div>

            <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

            <script>
                const ctx = document.getElementById('myChart');

                new Chart(ctx, {
                    type: 'line',
                    data: {
                        labels: @json($options),
                        datasets: [{
                            label: '# of Votes',
                            data: @json($votes),
                            borderWidth: 3
                        }]
                    },
                    options: {
                        scales: {
                            y: {
                                beginAtZero: true
                            }
                        }
                    }
                });
            </script>
        </div>
    </div>
@endsection
