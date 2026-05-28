@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="my-4">NBA Teams</h1>

    <div class="row">
        <!-- Eastern Conference -->
        <div class="col-md-6">
            <h2>Eastern Conference</h2>
            <div class="table-responsive">
                <table class="table table-striped table-hover">
                    <thead class="table-dark">
                        <tr>
                            <th>Team</th>
                            <th>City</th>
                            <th>Division</th>
                            <th>Wins</th>
                            <th>Losses</th>
                            <th>Arena</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($eastTeams as $team)
                        <tr>
                            <td><strong>{{ $team['name'] }}</strong></td>
                            <td>{{ $team['city'] }}</td>
                            <td>{{ $team['division'] }}</td>
                            <td>{{ $team['wins'] }}</td>
                            <td>{{ $team['losses'] }}</td>
                            <td>{{ $team['arena'] }}</td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6" class="text-center text-muted">Belum ada tim Eastern Conference</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Western Conference -->
        <div class="col-md-6">
            <h2>Western Conference</h2>
            <div class="table-responsive">
                <table class="table table-striped table-hover">
                    <thead class="table-dark">
                        <tr>
                            <th>Team</th>
                            <th>City</th>
                            <th>Division</th>
                            <th>Wins</th>
                            <th>Losses</th>
                            <th>Arena</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($westTeams as $team)
                        <tr>
                            <td><strong>{{ $team['name'] }}</strong></td>
                            <td>{{ $team['city'] }}</td>
                            <td>{{ $team['division'] }}</td>
                            <td>{{ $team['wins'] }}</td>
                            <td>{{ $team['losses'] }}</td>
                            <td>{{ $team['arena'] }}</td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6" class="text-center text-muted">Belum ada tim Western Conference</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
