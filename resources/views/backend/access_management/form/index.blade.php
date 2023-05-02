@extends('backend.layouts.app')

@section('header')
    <div class="page-heading">
        <h3>Form {{ $title }}</h3>
    </div>
@endsection
@section('content')
    <div class="page-content">
        <div class="card">
            <div class="card-header">
                {{ $title }}
            </div>
            <div class="card-body">
                <form id="dataForm" method="POST" action="{{ route('access-management.store') }}"
                    enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id" id="id">
                    <div class="form-group">
                        <div class="col-10">
                            <div class="form-line">
                                <label for="access_id">Akses</label>
                                <input type="text" name="access_id" id="access_id" class="form-control"
                                    value="{{ $access->id }}" hidden>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($user as $data)
                                        <tr>
                                            <td>
                                                {{ $loop->iteration }}
                                            </td>
                                            <td>
                                                {{ $data->name }}
                                            </td>
                                            <td>{{ $data->role->name }}</td>
                                            <td>
                                                <input type="checkbox" class="form-check-input" name="add[]"
                                                    id="checkbox2" value{{$data->id}}>
                                                <label for="checkbox2">Tambahkan</label>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="save" class="btn btn-primary ml-1">
                            <i class="bx bx-check d-block d-sm-none"></i>
                            <span class="d-none d-sm-block">Tambahkan</span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
