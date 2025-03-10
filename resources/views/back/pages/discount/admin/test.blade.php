@extends('back.layouts.pages-layout')
@section('pageTitle', isset($pageTitle) ? $pageTitle : 'Discount')
@section('content')
    <div class="page-wrapper">
        <div class="page-header d-print-none">
            <div class="container-xl">
                <div class="row g-2 align-items-center">
                    <div class="col">
                        <h2 class="page-title">
                            Discount
                        </h2>
                    </div>
                    @if (session('message'))
                        <div class="alert alert-danger">
                            <strong>Alert!</strong>{{ session('message') }}
                        </div>
                    @endif
                    <div class="card">
                        <div class="col-md-6 col-xl-12">
                            <div class="card-body border-bottom py-3">
                                <div class="d-flex">
                                    <div class="text-secondary">
                                        Search:
                                        <div class="ms-2 d-inline-block">
                                            <input type="text" class="form-control form-control-sm"
                                                aria-label="Search invoice">
                                        </div>
                                    </div>
                                    <div class="ms-auto text-secondary">
                                        <a href="{{ route('admin.discount.create') }}"
                                            class="btn btn-6 btn-outline-primary w-100">
                                            Add new Discount
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="coupon-section">
                                <h3>Apply Coupon</h3>
                                <div class="coupon-form-wrap">
                                    <form action="{{ route('admin.discount.apply') }}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <div class="mb-3">
                                            <p><input type="text" placeholder="Coupon" value="" name="code"></p>
                                        </div>
                                        <div class="mb-3">
                                            <p><input type="text" placeholder="userId" name="userId"></p>
                                        </div>
                                        <div class="mb-3">
                                            <p><input type="text" placeholder="totalPrice" name="subtotal_price"></p>
                                        </div>
                                        <button type="submit">Apply</button>
                                    </form>
                                    @if (session()->has('discount'))
                                        <div>
                                            <p>Discount Applied: {{ session('discount')['discount_amount'] }}</p>
                                        </div>
                                        <a href="{{ route('admin.discount.remove') }}" class="btn btn-danger">
                                            Remove Discount
                                        </a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
