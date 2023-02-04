@extends('backend.layouts.modal')
@section('form')
    <form id="dataForm" name="dataForm" enctype="multipart/form-data">
        <input type="hidden" name="id" id="id">
        <div class="form-group">
            <div class="form-line">
                <label for="name">Nama</label>
                <input type="text" name="name" id="name" class="form-control" placeholder="Nama Ruangan">
                <label for="ip_address">Ip Address</label>
                <input type="text" name="ip_address" id="ip_address" class="form-control" placeholder="Contoh : 192.168.1.1">
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
