@extends("back.layouts.pages-layout")
@section("pageTitle", isset($pageTitle) ? $pageTitle : "Welcome to my site")
@section("content")

<div class="page-wrapper">
    <!-- Page header -->
    <div class="page-header d-print-none">
        <div class="container-xl">
            <div class="row g-2 align-items-center">
                <div class="col">
                    <h2 class="page-title">
                        ORDERS MANAGEMENT
                    </h2>
                </div>
                <!-- Page title actions -->
            </div>
        </div>
    </div>
    <!-- Page body -->
    <div class="page-body">
        <div class="container-xl">
            <div class="table-responsive" style="height: 65vh">
                {{-- @dd($orders) --}}
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>id</th>
                            <th>UserId</th>
                            <th>OrderName</th>
                            {{-- <th>OrderEmail</th> --}}
                            <th>OrderPhone</th>
                            {{-- <th>OrderAddress</th> --}}
                            <th>ShippingAddress</th>
                            <th>ItemsList</th>
                            {{-- <th>Note</th> --}}
                            {{-- <th>TotalCost</th> --}}
                            {{-- <th>Shipping</th> --}}
                            <th>FinalPrice</th>
                            {{-- <th>DiscountCode</th> --}}
                            <th>Status</th>
                            <th>OrderDate</th>
                            {{-- <th>DeliveryDate</th> --}}
                            <th>PaymentId</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($orders as $item)
                        <tr class="">
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->userId }}</td>
                            <td>{{ $item->orderName }}</td>
                            {{-- <td>{{ $item->orderEmail }}</td> --}}
                            <td>{{ $item->orderPhone }}</td>
                            {{-- <td>{{ $item->orderAddress }}</td> --}}
                            <td>{{ $item->shippingAddress }}</td>
                            {{-- <td>{{ $item->itemsList }}</td> --}}
                            <td>
                                <textarea name="" id="" rows="3">
                                    <?php
                                    foreach ($item->itemsList as $key => $val) {echo $key . ": " . "" . $val . ", ";}?>
                                </textarea>
                            </td>
                            {{-- <td>
                                <textarea name="" id="" rows="3">
                                    {{ $item->note }}
                                </textarea>
                            </td> --}}
                            {{-- <td>{{ $item->totalCost }}</td> --}}
                            {{-- <td>{{ $item->shipping }}</td> --}}
                            <td>{{ $item->finalPrice }}</td>
                            {{-- <td>{{ $item->discountCode }}</td> --}}
                            <td>{{ $item->status }}</td>
                            <td>{{ $item->orderDate }}</td>
                            {{-- <td>{{ $item->deliveryDate }}</td> --}}
                            <td>{{ $item->payment_id }}</td>
                            <td>
                                {{-- <a href={{ route("", $item) }}> --}}
                                    <a href="">
                                        <span class="badge bg-success-lt">Details</span>
                                    </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- Page foot -->
    @include("back.layouts.inc.footer")
    <!-- End Page foot -->
</div>
@endsection
