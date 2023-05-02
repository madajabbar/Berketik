@extends('layouts.app')

@section('content')
    <!-- Start Section Body 1 -->
    <section id="sha_temp_body" class="col-12">
        <div class="row">
            <div class="col-12">
                <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    <span class="sha_temp">
                        <span>
                            <span class="temp-data"> SCAN </span>
                            <span class="temp-info">
                                <i class="fa fa-code"></i> QR MU
                            </span>
                            {{-- <img src="" alt=""> --}}
                        </span>
                    </span>
                </button>
            </div>
        </div>
    </section>
    <!-- Button trigger modal -->
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-fullscreen">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">QR Anda</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">x</button>
                </div>
                <div class="modal-body">
                    <div class="container">
                        <div class="row">
                          <div class="col align-self-start">
                            One of three columns
                          </div>
                          <div class="col align-self-center">
                            One of three columns
                          </div>
                          <div class="col align-self-end">
                            One of three columns
                          </div>
                        </div>
                      </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>
    <!-- End Section Body 1 -->

    <!-- Start Section Body 2 -->
    <section id="sha_temp_meta" class="col-12">
        <div class="row">
            <div class="col-12 sha_tile">
                <div>
                    <span class="tile_icon">
                        <i class="fa fa-user"></i>
                    </span>
                    <span class="tile_info">
                        Humidity
                        <span>65%</span>
                    </span>
                </div>
            </div>
            <div class="col-12 sha_tile">
                <div>
                    <span class="tile_icon">
                        <i class="fa fa-wifi"></i>
                    </span>
                    <span class="tile_info">
                        Internet
                        <span>20 mbps</span>
                    </span>
                </div>
            </div>
        </div>
    </section>
    <!-- End Section Body 2 -->
@endsection
