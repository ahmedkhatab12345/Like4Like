@extends('layouts.dashboard.app')

@section('content') 
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="card">
                    <div class="card-header bg-primary text-white">
                        <h3 class="mb-0 text-center">مراجعة طلبات السحب</h3>
                    </div>
                    @foreach($withdrawals as $withdrawal)
                        <div class="card-body">
                            @if($withdrawals->count() > 0)
                                <div class="row row-cols-1 row-cols-md-2 g-4"> 
                                    <div class="col">
                                        <div class="card" id="withdrawalCard{{$withdrawal->id}}">
                                            <div class="card-header bg-primary text-white">
                                                <h5 class="mb-0">{{ optional($withdrawal->customer)->name }} _ الرصيد الكلي: {{ optional($withdrawal->customer)->total_earning }} جنيه</h5>
                                            </div>
                                            @if($withdrawal->withdrawal_amount > optional($withdrawal->customer)->total_earning )
                                                <div class="alert alert-danger text-center font-weight-bold" role="alert">
                                                    <strong>تحذير:</strong> مبلغ السحب أكبر من إجمالي الأرباح!
                                                </div>
                                            @endif
                                            <div class="card-body" style="direction: rtl;">
                                                <h5 class="mb-3" style="margin-top: 0; text-align: right;">رقم الهاتف: <span style="font-weight: bold; font-size: 16px; color: blue;">{{ $withdrawal->phone_number }}</span></h5>
                                                <p class="mb-3" style="text-align: right; font-weight: bold;">الطريقة: <span style="font-weight: bold; color: red;">{{ $withdrawal->methoud }}</span></p>
                                                <hr>
                                                <h5 class="mb-3" style="margin-bottom: 10px; text-align: right;">المبلغ المطلوب: <span style="font-weight: bold; font-size: 18px; color: green;">{{ $withdrawal->withdrawal_amount }} جنيه</span></h5>
                                                <hr>
                                                <form method="POST" action="{{ route('withdrawals.update', ['withdrawal' => $withdrawal->id]) }}" enctype="multipart/form-data">   
                                                    @csrf
                                                    @method('PUT')
                                                      <!-- إضافة حقل مخفي لطلب الموافقة -->
                                                        <input type="hidden" name="accepted" value="1">
                                                        <!-- إضافة حقل مخفي لطلب الرفض -->
                                                        <input type="hidden" name="rejected" value="1">
                                                        <div class="mb-3">
                                                            <label for="photo" class="form-label">صورة تأكيد السحب</label>
                                                            <input type="file" class="form-control" id="photo" name="photo">
                                                        </div>
                                                    <div class="d-flex justify-content-between">
                                                        <button type="submit" class="btn btn-success confirm-withdrawal-btn">موافقة</button>
                                                        <button type="submit" class="btn btn-danger reject-withdrawal-btn">مرفوضة</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @else
                                <p class="text-center">لا يوجد حتى الآن</p>
                            @endif
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')

@endsection
