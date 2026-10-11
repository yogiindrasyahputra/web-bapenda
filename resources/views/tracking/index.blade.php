@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row mb-4">
        <div class="col-md-12">
            <h1>Tracking Hotel</h1>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Hotel</th>
                                    <th>Tipe</th>
                                    <th>Keterangan</th>
                                    <th>Tanggal</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($trackings as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>
                                            @if($item->hotel)
                                                <strong>{{ $item->hotel->nama }}</strong><br>
                                                <small class="text-muted">{{ $item->hotel->alamat }}</small>
                                            @else
                                                <span class="text-muted">-</span>
                                            @endif
                                        </td>
                                        <td>
                                            @if($item->tipe == 'kunjungan')
                                                <span class="badge bg-info">Kunjungan</span>
                                            @elseif($item->tipe == 'pemeriksaan')
                                                <span class="badge bg-warning">Pemeriksaan</span>
                                            @else
                                                <span class="badge bg-secondary">{{ $item->tipe }}</span>
                                            @endif
                                        </td>
                                        <td>{{ $item->keterangan }}</td>
                                        <td>{{ $item->created_at->format('d-m-Y H:i') }}</td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="text-center">Tidak ada tracking</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    <div class="d-flex justify-content-center">
                        {{ $trackings->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
