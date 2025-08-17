@extends('layout.app')

@section('title')
    طلباتي
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <h1 class="text-center dispaly-2 fw-bold mb-5">
                طلباتي
            </h1>
            <div class="col-12 d-none d-lg-block">
                <table class="table table-striped table-bordered">
                    <thead class="table-dark">
                        <tr>
                            <th>اسم الزبون</th>
                            <th>اسم المنتوج</th>
                            <th>العنوان</th>
                            <th>رقم الهاتف</th>
                            <th>المدينة</th>
                            <th>الكمية</th>
                            <th>الثمن الاجمالي</th>
                            <th>حالة الطلب</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($userOrders as $order)
                            <tr>
                                <td>{{ $order->client_name }}</td>
                                <td>{{ $order->product_name }}</td>
                                <td>{{ $order->client_address }}</td>
                                <td>{{ $order->client_phone }}</td>
                                <td>{{ $order->city }}</td>
                                <td>{{ $order->quantity }}</td>
                                <td>{{ $order->total_price }} درهم</td>
                                <td>
                                    @if ($order->status === 'processing')
                                        <span class="badge bg-info">قيد المعالجة</span>
                                    @elseif ($order->status === 'delivered')
                                        <span class="badge bg-success">تم التوصيل</span>
                                    @elseif ($order->status === 'cancelled')
                                        <span class="badge bg-danger">تم الإلغاء</span>
                                    @endif
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="8" class="text-center text-muted fw-bold">
                                    لا توجد لديك أي طلبات حالياً
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>


            <!-- Cards for small/medium screens -->
            <div class="col-12 d-lg-none">
                <div class="row g-3">
                    <!-- Example card in Arabic -->
                    <div class="col-12">
                        <div class="card shadow-sm border-1 rounded-3">
                            <div class="card-body">
                                <h5 class="card-title mb-3 text-primary fw-bold">
                                    <i class="bi bi-person-circle me-2"></i> محمد العلوي
                                </h5>
                                
                                <p class="mb-2">
                                    <i class="bi bi-box-seam text-secondary me-2"></i>
                                    <strong>المنتج:</strong> آيفون 15
                                </p>
                                
                                <p class="mb-2">
                                    <i class="bi bi-geo-alt text-danger me-2"></i>
                                    <strong>العنوان:</strong> شارع محمد الخامس، الدار البيضاء
                                </p>
                                
                                <p class="mb-2">
                                    <i class="bi bi-telephone text-success me-2"></i>
                                    <strong>الهاتف:</strong> +212600000000
                                </p>
                                
                                <p class="mb-2">
                                    <i class="bi bi-building text-info me-2"></i>
                                    <strong>المدينة:</strong> الدار البيضاء
                                </p>
                                
                                <p class="mb-2">
                                    <i class="bi bi-list-ol text-warning me-2"></i>
                                    <strong>الكمية:</strong> 2
                                </p>
                                
                                <p class="mb-2">
                                    <i class="bi bi-cash-coin text-success me-2"></i>
                                    <strong>المجموع:</strong> 2000 درهم
                                </p>
                                
                                <p class="mb-0">
                                    <i class="bi bi-check-circle-fill text-success me-2"></i>
                                    <strong>الحالة:</strong>
                                    <span class="badge bg-success">تم التوصيل</span>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection