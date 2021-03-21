@extends('layouts.dashboard')

@section('title', 'Edit Operasi Kapal')

@section('content')
    <div class="container">
        <!-- content-header -->
        <div class="content-header">
            <div class="header">
                <div class="title">
                    Edit Operasi Kapal
                </div>
                <div class="actions">
                    <a href="{{ route('ship-operations.index') }}" class="btn btn-secondary">
                        Batal
                    </a>
                    <button onclick="document.querySelector('form').submit()" class="btn btn-primary">
                        Simpan
                    </button>
                </div>
            </div>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb"> 
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item">Operasi Kapal</li>
                    <li class="breadcrumb-item active" aria-current="page">Edit</li>
                </ol>
            </nav>
        </div>
        <!-- content-header:end -->
        <!-- content -->
        <div class="content">
            <div class="row">
                <div class="col-12">
                    <div class="mt-2">
                        <!-- flush message error -->
                        <x-message />
                        <!-- flush message error:end -->
                        <form action="{{ route('ship-operations.update', ['ship_operation' => $shipOperation->id]) }}" method="POST" autocomplete="off" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group row my-2">
                                <label class="col-sm-4 col-form-label text-md-end">Nama Kapal</label>
                                <div class="col-md-4">
                                    <div class="input-group">
                                        <span class="input-group-text">
                                            <svg class="bi icon" width="16" height="16" fill="currentColor">
                                                <use xlink:href="{{ asset('img/icon/bootstrap-icons.svg#credit-card-2-front-fill') }}"/>
                                            </svg>
                                        </span>
                                        <select name="ship_id" class="choices form-select">
                                            <option value="">--Pilih Kapal--</option>
                                            @foreach ($ships as $ship)
                                                <option value="{{ $ship->id }}" {{ ($ship->id == $shipOperation->ship_id ? 'selected' : '') }}>{{ $ship->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row my-2">
                                <label class="col-sm-4 col-form-label text-md-end">Tanggal</label>
                                <div class="col-md-4">
                                    <div class="input-group">
                                        <span class="input-group-text">
                                            <svg class="bi icon" width="16" height="16" fill="currentColor">
                                                <use xlink:href="{{ asset('img/icon/bootstrap-icons.svg#calendar-fill') }}"/>
                                            </svg>
                                        </span>
                                        <input class="form-control datepicker" data-date-format="dd-mm-yyyy" name="date" placeholder="Tanggal" autocomplete="off" value="{{ old('date', $shipOperation->date->format('d-m-Y')) }}">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row my-2">
                                <label class="col-sm-4 col-form-label text-md-end">Status</label>
                                <div class="col-md-4">
                                    <div class="input-group">
                                        <span class="input-group-text">
                                            <svg class="bi icon" width="16" height="16" fill="currentColor">
                                                <use xlink:href="{{ asset('img/icon/bootstrap-icons.svg#award-fill') }}"/>
                                            </svg>
                                        </span>
                                        <select name="status" class="choices form-select">
                                            <option value="">--Pilih Status--</option>
                                            <option value="Beroperasi" {{ ($shipOperation->status == 'Beroperasi' ? 'selected' : '') }}>Beroperasi</option>
                                            <option value="Tidak Beroperasi" {{ ($shipOperation->status == 'Tidak Beroperasi' ? 'selected' : '') }}>Tidak Beroperasi</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row my-2">
                                <label class="col-sm-4 col-form-label text-md-end">Keterangan</label>
                                <div class="col-md-4">
                                    <div class="input-group">
                                        <span class="input-group-text">
                                            <svg class="bi icon" width="16" height="16" fill="currentColor">
                                                <use xlink:href="{{ asset('img/icon/bootstrap-icons.svg#award-fill') }}"/>
                                            </svg>
                                        </span>
                                        <select name="description" class="choices form-select">
                                            <option value="Aman" {{ old('description', $shipOperation->description) == 'Aman' ? 'selected' : '' }}>Aman</option>
                                            <option value="Cuaca Buruk" {{ old('description', $shipOperation->description) == 'Cuaca Buruk' ? 'selected' : '' }}>Cuaca Buruk</option>
                                            <option value="Perbaikan Mesin" {{ old('description', $shipOperation->description) == 'Perbaikan Mesin' ? 'selected' : '' }}>Perbaikan Mesin</option>
                                            <option value="Docking" {{ old('description', $shipOperation->description) == 'Docking' ? 'selected' : '' }}>Docking</option>
                                            <option value="Lainnya" {{ old('description', $shipOperation->description) == 'Lainnya' ? 'selected' : '' }}>Lainnya</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row my-2" id="form-bmkg-group" style="display: none;">
                                <label class="col-sm-4 col-form-label text-md-end">Data BMKG</label>
                                <div class="col-md-4">
                                    <div>
                                        File Data :
                                        <a class="no-loader" href="{{ route('ship-operations.index') }}/{{ $shipOperation->id }}?view" target="_blank">Lihat Data (.pdf)</a>
                                        <span class="tw-text-red-500 tw-text-xs">*Isi File Jika ingin mengganti :</span>
                                    </div>
                                    <input type="file" class="form-control" name="file">
                                </div>
                            </div>
                            <div class="form-group row my-2">
                                <label class="col-sm-4 col-form-label text-md-end">Lokasi</label>
                                <div class="col-md-4">
                                    <div class="input-group">
                                        <span class="input-group-text">
                                            <svg class="bi icon" width="16" height="16" fill="currentColor">
                                                <use xlink:href="{{ asset('img/icon/bootstrap-icons.svg#map-fill') }}"/>
                                            </svg>
                                        </span>
                                        <input type="text" name="location" class="form-control" autocomplete="off" placeholder="Lokasi" value="{{ old('location', $shipOperation->location) }}">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row my-2">
                                <label class="col-sm-4 col-form-label text-md-end">Catatan</label>
                                <div class="col-md-4">
                                    <textarea name="note" class="form-control" placeholder="Catatan">{{ old('note', $shipOperation->note) }}</textarea>
                                </div>
                            </div>
                            <div class="form-group row my-2">
                                <div class="offset-md-4 col-md-4">
                                    <button class="btn btn-primary">
                                        Simpan
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- content:end -->
    </div>
@endsection

@push('styles-library')
    <link rel="stylesheet" href="{{ asset('vendor/choices.js/styles/choices.min.css') }}">   
    <link rel="stylesheet" href="{{ asset('vendor/bootstrap-datepicker/css/bootstrap-datepicker.min.css') }}">   
@endpush

@push('scripts-library')
    <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('vendor/choices.js/scripts/choices.min.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}"></script>
@endpush

@push('scripts')
    <script>
        // datepicker
        const initDatepicker = () => {
            $('.datepicker').datepicker({
                orientation: 'bottom'
            });
        }

        const initChoices = () => {
            const els = document.querySelectorAll('.choices.choice-default')
            els.forEach(function (el) {
                new Choices(el)
            })
        }

        const initCuaca = () => {
            const status = document.querySelector('select[name="status"]')
            const description = document.querySelector('select[name="description"]')
            const form = document.querySelector('#form-bmkg-group')
            var showUploadCuaca
            const check = () => {
                if (status.value == 'Tidak Beroperasi' && description.value == 'Cuaca Buruk') {
                    form.style.display = 'flex'
                } else {
                    form.style.display = 'none'                    
                }
            }
            status.addEventListener('change', function () {
                check()
            })
            description.addEventListener('change', function () {
                check()
            })
            check()
        }

        // init
        document.addEventListener('DOMContentLoaded', function () {
            initDatepicker()
            initChoices()
            initCuaca()
        })
    </script>
@endpush