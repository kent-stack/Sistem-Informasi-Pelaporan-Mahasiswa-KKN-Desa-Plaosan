@extends('adminlte::page')

@section('title', 'Admin - Project Reports Management')

@section('content_header')
    <h1>Submitted Project Reports</h1>
@stop

@section('content')
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show">
            {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    <div class="card card-outline card-primary">
        <div class="card-header">
            <h3 class="card-title">Incoming Student Reports</h3>
        </div>
        <div class="card-body p-0">
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th style="width: 50px">#</th>
                        <th>Type</th>
                        <th>Submission Date</th>
                        <th>Project Title</th>
                        <th>Photos</th>
                        <th>Description Snippet</th>
                        <th style="width: 150px">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($reports as $index => $report)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>
                                <span class="badge {{ $report->report_type == 'Weekly Report' ? 'badge-primary' : 'badge-info' }}">
                                    {{ $report->report_type }}
                                </span>
                            </td>
                            <td>{{ $report->created_at->format('d M Y, H:i') }}</td>
                            <td><strong>{{ $report->nama_project }}</strong></td>
                            <td>
                                <span class="badge badge-secondary">
                                    {{ is_array($report->photos) ? count($report->photos) : 0 }} Photos
                                </span>
                            </td>
                            <td>{{ Str::limit($report->penjelasan_project, 60) }}</td>
                            <td>
                                <!-- Edit -->
                                <a href="{{ route('admin.reports.edit', $report->id) }}" class="btn btn-sm btn-warning" title="View/Edit Details">
                                    <i class="fas fa-edit"></i>
                                </a>
                                
                                <!-- Delete -->
                                <form action="{{ route('admin.reports.destroy', $report->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to permanently delete this report and all associated photos?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" title="Delete Permanently">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center py-4 text-muted">No student reports have been submitted yet.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@stop

@section('css')
    <style>
        .table td { vertical-align: middle; }
    </style>
@stop
