@extends('adminlte::page')

@section('title', 'Dashboard - Admin Portal')

@section('content_header')
    <h1>Program Overview Dashboard</h1>
@stop

@section('content')
    <div class="row">
        <!-- Total Reports -->
        <div class="col-lg-4 col-6">
            <div class="small-box bg-info">
                <div class="inner">
                    <h3>{{ $totalReports }}</h3>
                    <p>Total Submitted Reports</p>
                </div>
                <div class="icon">
                    <i class="fas fa-file-alt"></i>
                </div>
                <a href="{{ route('admin.reports.index') }}" class="small-box-footer">
                    Manage Reports <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>

        <!-- Total Participants -->
        <div class="col-lg-4 col-6">
            <div class="small-box bg-success">
                <div class="inner">
                    <h3>{{ $totalParticipants }}</h3>
                    <p>Enrolled Students</p>
                </div>
                <div class="icon">
                    <i class="fas fa-users"></i>
                </div>
                <a href="{{ route('participants') }}" class="small-box-footer">
                    View Participants <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>

        <!-- Village Progress (Static for now) -->
        <div class="col-lg-4 col-12">
            <div class="small-box bg-warning">
                <div class="inner">
                    <h3>Plaosan</h3>
                    <p>Focus Village 2026</p>
                </div>
                <div class="icon">
                    <i class="fas fa-map-marked-alt"></i>
                </div>
                <a href="/" target="_blank" class="small-box-footer">
                    View Portal <i class="fas fa-external-link-alt"></i>
                </a>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card card-outline card-primary">
                <div class="card-header">
                    <h3 class="card-title">Recent Activity</h3>
                </div>
                <div class="card-body p-0">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Date</th>
                                <th>Project Name</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($latestReports as $report)
                                <tr>
                                    <td>{{ $report->created_at->diffForHumans() }}</td>
                                    <td>{{ $report->nama_project }}</td>
                                    <td><span class="badge badge-success">Published</span></td>
                                    <td>
                                        <a href="{{ route('admin.reports.edit', $report->id) }}" class="btn btn-xs btn-default">View</a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="text-center">No recent reports found.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Dashboard Loaded'); </script>
@stop
