@extends('back.layouts.pages-layout')
@section('pageTitle', isset($pageTitle) ? $pageTitle : 'Discount')
@section('content')
    <div class="page-wrapper">
        <!-- Page header -->
        <div class="page-header d-print-none">
            <div class="container-xl">
                <div class="row g-2 align-items-center">
                    <h1 class="page-title">
                        Create Discount
                    </h1>

                </div>
            </div>
        </div>
        <!-- Page body -->
        <div class="page-body">
            <div class="container-xl">
                <div class="box">
                    <div class="col-md-6 col-xl-12">
                        <form action="{{ route('admin.discount.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label">Discount code</label>
                                <input type="text" class="form-control" name="code" value="{{ old('code') }}">
                                @error('code')
                                    <p style="color: red; font-size:12px">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Discount name</label>
                                <input type="text" class="form-control" name="name" value="{{ old('name') }}">
                                @error('name')
                                    <p style="color: red; font-size:12px">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <div class="form-label">Select Type</div>
                                <select class="form-select" name="type" id='discount_type'>
                                    <option value=0>---Choose category--</option>
                                    <option value="fixed" {{ old('type') == 'fixed' ? 'selected' : '' }}>Fixed Price
                                    </option>
                                    <option value="percent" {{ old('type') == 'percent' ? 'selected' : '' }}>Percent
                                    </option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Discount Value</label>
                                <div class="input-group mb-3">
                                    <input type="number" class="form-control" min="1" name="discount_value"
                                        value="{{ old('discount_value') }}" id="discount_value">
                                    <span class="input-group-text" id='character'>
                                        $
                                    </span>
                                    <span class="input-group-text" id='character1'>
                                        %
                                    </span>
                                </div>
                                @error('discount_value')
                                    <p style="color: red; font-size:12px">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Max Discount Value</label>
                                <input type="number" class="form-control" name="max_discount_value" min="1"
                                    value="{{ old('max_discount_value') }}" id="max_discount_value">
                                @error('max_discount_value')
                                    <p style="color: red; font-size:12px">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Quantity:</label>
                                <input type="number" class="form-control" name="quantity" min="1"
                                    value="{{ old('quantity') }}">
                                @error('quantity')
                                    <p style="color: red; font-size:12px">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Minimum order value:</label>
                                <input type="number" class="form-control" name="condition" value="{{ old('condition') }}"
                                    min="1">
                                @error('condition')
                                    <p style="color: red; font-size:12px">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Max use</label>
                                <input type="number" class="form-control" name="max_uses" value="{{ old('max_uses') }}"
                                    min="1">
                                @error('max_uses')
                                    <p style="color: red; font-size:12px">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="input-icon mb-2">
                                <label class="form-label">Date start:</label>
                                <input class="form-control" type="datetime-local" placeholder="Select a date"
                                    name="starts_at" value="{{ old('starts_at') }}">
                                @error('starts_at')
                                    <p style="color: red; font-size:12px">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="input-icon mb-2">
                                <label class="form-label">Date expire:</label>
                                <input class="form-control" type="datetime-local" placeholder="Select a date"
                                    name="expires_at" value="{{ old('expires_at') }}">
                                @error('expires_at')
                                    <p style="color: red; font-size:12px">{{ $message }}</p>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-6 btn-primary w-100">
                                Submit
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            function updateDisplay(type) {
                var character = document.getElementById('character');
                var character1 = document.getElementById('character1');

                if (type === 'fixed') {
                    character.style.display = 'inline';
                    character1.style.display = 'none';
                } else {
                    character.style.display = 'none';
                    character1.style.display = 'inline';
                }
            }

            // Lấy giá trị từ Session Storage
            let savedType = sessionStorage.getItem('discount_type');
            if (savedType) {
                $('#discount_type').val(savedType);
                updateDisplay(savedType);
            }


            $('#discount_type').change(function() {
                var type = $(this).val();
                var discountValue = $('#discount_value').val();
                sessionStorage.setItem('discount_type', type);
                updateDisplay(type);
                if (type === 'fixed') {
                    $('#max_discount_value').val(discountValue).prop('readonly', true);
                } else {
                    $('#max_discount_value').prop('readonly', false);
                }
            });

            $('#discount_value').on('input', function() {
                if ($('#discount_type').val() === 'fixed') {
                    $('#max_discount_value').val($(this).val());
                }
            });
        });
    </script>
@endsection
