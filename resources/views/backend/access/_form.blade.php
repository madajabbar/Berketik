@extends('backend.layouts.modal')
@section('form')
    <form id="dataForm" name="dataForm" enctype="multipart/form-data">
        <input type="hidden" name="id" id="id">
        <div class="form-group">
            <div class="form-line">
                <label for="name">Nama</label>
                <input type="text" name="name" id="name" class="form-control" placeholder="Nama">
                <label for="name">Ruangan</label>
                <select name="room_id" id="room_id" class="form-select">
                    @foreach ($room as $data)
                        <option value="{{ $data->id }}">{{ $data->name }}</option>
                    @endforeach
                </select>
                <label for="start_at">Mulai</label>
                <input type="datetime-local" name="start_at" id="start_at" class="form-control">
                <label for="end_at">Selesai</label>
                <input type="datetime-local" name="end_at" id="end_at" class="form-control">
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                <i class="bx bx-x d-block d-sm-none"></i>
                <span class="d-none d-sm-block">Close</span>
            </button>
            <button type="button" id="saveBtn" class="btn btn-primary ml-1" data-bs-dismiss="modal">
                <i class="bx bx-check d-block d-sm-none"></i>
                <span class="d-none d-sm-block">Save</span>
            </button>
        </div>
    </form>
@endsection
