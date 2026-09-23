@extends('adminlte::page')

@section('title', 'Admin - Edit Project Report')

@section('content_header')
    <h1>Review Project Report</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-md-10">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Project Details</h3>
                </div>
                
                <form action="{{ route('admin.reports.update', $report->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    
                    <div class="card-body">
                        @if($errors->any())
                            <div class="alert alert-danger">
                                <ul class="mb-0">
                                    @foreach($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <div class="form-group">
                            <label for="report_type">Report Type</label>
                            <select name="report_type" class="form-control @error('report_type') is-invalid @enderror" id="report_type" required>
                                <option value="Daily Report" {{ old('report_type', $report->report_type) == 'Daily Report' ? 'selected' : '' }}>Daily Report</option>
                                <option value="Weekly Report" {{ old('report_type', $report->report_type) == 'Weekly Report' ? 'selected' : '' }}>Weekly Report</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="nama_project">Project Title</label>
                            <input type="text" name="nama_project" class="form-control @error('nama_project') is-invalid @enderror" id="nama_project" value="{{ old('nama_project', $report->nama_project) }}" required>
                        </div>

                        <div class="form-group">
                            <label for="penjelasan_project">Description & Success Story</label>
                            <textarea name="penjelasan_project" class="form-control @error('penjelasan_project') is-invalid @enderror" id="penjelasan_project" rows="8" required>{{ old('penjelasan_project', $report->penjelasan_project) }}</textarea>
                        </div>
                        
                        <div class="form-group">
                            <label>Current Photo Documentation</label>
                            <div class="row">
                                @if($report->photos && count($report->photos) > 0)
                                    @foreach($report->photos as $photo)
                                        <div class="col-md-3 mb-3">
                                            <div class="border rounded p-2">
                                                <img src="{{ asset('storage/' . $photo) }}" class="img-fluid rounded" style="height: 150px; width: 100%; object-fit: cover;">
                                            </div>
                                        </div>
                                    @endforeach
                                @else
                                    <div class="col-12">
                                        <p class="text-muted">No photos uploaded for this report.</p>
                                    </div>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="photos">Upload New Photos (Replaces current documentation)</label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" name="photos[]" multiple class="custom-file-input" id="photos" accept="image/*">
                                    <label class="custom-file-label" for="photos">Choose photos...</label>
                                </div>
                            </div>
                            <small class="form-text text-muted">Abaikan jika tidak ingin mengganti foto dokumentasi.</small>
                        </div>
                    </div>
                    
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Save Changes</button>
                        <a href="{{ route('admin.reports.index') }}" class="btn btn-default float-right">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@stop

@section('js')
<script>
    $('.custom-file-input').on('change', function() { 
        let fileCount = $(this)[0].files.length;
        $(this).next('.custom-file-label').addClass("selected").html(fileCount + " files selected"); 
    });
</script>
@stop
