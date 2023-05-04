@extends('backend.layouts.app')
@section('css')
    <link rel="stylesheet"
        href="{{ asset('Backend/assets/extensions/datatables.net-bs5/css/dataTables.bootstrap5.min.css') }}">
    <link rel="stylesheet" href="{{ asset('Backend/assets/css/pages/fontawesome.css') }}">
    <link rel="stylesheet" href="{{ asset('Backend/assets/css/pages/datatables.css') }}">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <style>
        table.dataTable td {
            padding: 15px 8px;
        }

        .fontawesome-icons .the-icon svg {
            font-size: 24px;
        }
    </style>
@endsection

@section('header')
    <div class="page-heading">
        <h3>Tabel {{ $title }}</h3>
    </div>
@endsection

@section('content')
    <div class="page-content">
        <div class="card">
            <div class="card-header">
                <div class="col my-1">
                    {{ $title }} Datatable
                </div>
                <div class="col">
                    <button type="button" class="input btn btn-outline-primary block" data-bs-toggle="modal"
                        data-bs-target="#exampleModalCenter">
                        <span class="fa-fw select-all fas"></span>
                        Input Data
                    </button>
                    <button class="btn btn-outline-warning block" onclick="reloadDatatable()">
                        Refresh
                    </button>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table" id="table1">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Hari</th>
                                <th>Ruangan</th>
                                <th>Waktu Mulai</th>
                                <th>Waktu Selesai</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    @include('backend.access._form')
@endsection

@section('js')
    <script src="{{ asset('Backend/assets/extensions/jquery/jquery.min.js') }}"></script>
    <script src="https://cdn.datatables.net/v/bs5/dt-1.12.1/datatables.min.js"></script>
    {{-- <script src="{{ asset('Backend/assets/js/pages/datatables.js') }}"></script> --}}
    <script type="text/javascript">
        // Jquery Datatable
        $(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            let jquery_datatable = $("#table1").DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('access.index') }}",
                columns: [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex'
                    },
                    {
                        data: 'name',
                        name: 'name'
                    },
                    {
                        data: 'day',
                        name: 'day'
                    },
                    {
                        data: 'room_id',
                        name: 'room_id'
                    },
                    {
                        data: 'start_at',
                        name: 'start_at'
                    },
                    {
                        data: 'end_at',
                        name: 'end_at'
                    },
                    {
                        data: 'action',
                        name: 'action'
                    },
                ]
            })
        });
        $('body').on('click', '.input', function() {
            $('#exampleModalCenterTitle').html("Tambahkan Akses");
            $('#dataForm').trigger("reset");
        })

        function reloadDatatable() {
            $('#table1').DataTable().ajax.reload();
        }
        $('body').on('click', '.deleteProduct', function() {
            var data_id = $(this).data("id");
            var check = confirm("Are You sure want to delete !");
            if (check == true) {
                $.ajax({
                    type: "DELETE",
                    url: "{{ route('access.store') }}" + '/' + data_id,
                    success: function(data) {
                        reloadDatatable();
                        Swal.fire({
                            icon: 'warning',
                            title: 'Data berhasil dihapus',
                        })
                    },
                    error: function(data) {
                        console.log('Error:', data);
                    }
                });
            } else {
                swal.fire({
                    icon: 'success',
                    title: 'Dibatalkan'
                })
            }
        });
        $('body').on('click', '.editProduct', function() {
            var data_id = $(this).data('id');
            $.get("{{ route('access.index') }}" + '/' + data_id + '/edit', function(data) {
                $('#exampleModalCenterTitle').html("Edit Tag");
                $('#saveBtn').val("edit");
                $('#exampleModalCenter').modal('show');
                $('#id').val(data.id);
                $('#name').val(data.name);
            })
        });
        $(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $('#saveBtn').click(function(e) {
                e.preventDefault();
                $(this).html('Sending..');
                var myform = document.getElementById('dataForm');
                var formData = new FormData(myform);
                $.ajax({
                    data: formData,
                    cache: false,
                    contentType: false,
                    processData: false,
                    url: "{{ route('access.store') }}",
                    type: "POST",
                    dataType: 'json',
                    success: function(data) {
                        $('#dataForm').trigger("reset");
                        $('#ajaxModel').modal('hide');
                        $('#saveBtn').html('success');
                        Swal.fire({
                            icon: 'success',
                            title: 'Data berhasil dimasukan',
                        })
                        reloadDatatable();
                    },
                    error: function(data) {
                        console.log('Error:', data);
                        Swal.fire({
                            icon: 'error',
                            title: 'Terjadi Error!',
                        })
                        $('#saveBtn').html('Error');
                    }
                });
            });
        });
    </script>
@endsection
