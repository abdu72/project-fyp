@extends('dashboard.layouts.main')

@section('container')

@foreach($users as $user)
@if(!$user->is_admin)
<div class="justify-content-between align-items-center mb-3">
    <h3>Details {{ $user->username }}</h3>
    <div>
        <!-- Gunakan div sebagai wadah untuk tombol -->
        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#userModal{{ $user->id }}">See All
            Details</button>
    </div>
</div>

<div class="table-responsive col-lg-9">
    <table class="table table-striped table-sm">
        <thead>
            <tr>
                <th>Number</th>
                <th>Username</th>
                <th>Gender of Heir</th>
                <th>Status of Heir</th>
                <th>Total Inheritance</th>
            </tr>
        </thead>
        <tbody>
            @foreach($user->heirs as $heir)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $user->username }}</td>
                <td>{{ $heir->gender }}</td>
                <td>{{ $heir->status }}</td>
                <td>{{ $heir->total_inheritance }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
<hr> <!-- Garis pemisah antar user -->

<!-- Modal -->
<div class="modal fade" id="userModal{{ $user->id }}" tabindex="-1" aria-labelledby="userModalLabel{{ $user->id }}"
    aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="userModalLabel{{ $user->id }}">Details for {{ $user->username }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Number</th>
                                <th>Gender of Heir</th>
                                <th>Status of Heir</th>
                                <th>Month</th>
                                <th>Type of Business</th>
                                <th>Result Calculation</th>
                                <th>Total Inheritance</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($user->heirs as $heir)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $heir->gender }}</td>
                                <td>{{ $heir->status }}</td>
                                <td>{{ $heir->month }}</td>
                                <td>{{ $heir->type_of_business }}</td>
                                <td>{{ $heir->inheritance }}</td>
                                <td>{{ $heir->total_inheritance }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <hr> <!-- Garis pemisah antar tabel -->

                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Will</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($user->posts as $post)
                            <tr>
                                <td>{{ $post->will }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- Di sini Anda bisa menambahkan konten tambahan dari tabel posts -->
            </div>


            <div class="modal-footer">
                <div class="button">
                    <button class="btn btn-secondary" onclick="cetakHalaman()">PRINT <svg
                            xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-printer" viewBox="0 0 16 16">
                            <path d="M2.5 8a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1" />
                            <path
                                d="M5 1a2 2 0 0 0-2 2v2H2a2 2 0 0 0-2 2v3a2 2 0 0 0 2 2h1v1a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2v-1h1a2 2 0 0 0 2-2V7a2 2 0 0 0-2-2h-1V3a2 2 0 0 0-2-2zM4 3a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1v2H4zm1 5a2 2 0 0 0-2 2v1H2a1 1 0 0 1-1-1V7a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1h-1v-1a2 2 0 0 0-2-2zm7 2v3a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1v-3a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1" />
                        </svg></button>
                </div>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<hr> <!-- Garis pemisah antar user -->

@endif
@endforeach

@endsection

<script>
function cetakHalaman() {
    window.print();
}
</script>