@extends('layouts.site.app')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-12">
            <h1 style="color: #ff0000" class="mt-5">Earnings</h1>
        </div>
        <div class="row">
            <div class="col-6">
                <!-- start today profits -->
                <div class="today-profits p-3 mt-5 text-white"
                    style="background-image: linear-gradient(to right, #f05f22, #e53f52);">
                    <div class="to-pro d-flex justify-content-between p-3">
                        <p>أرباح اليوم</p>
                        <p>$١٠٦.٤٥</p>
                    </div>
                    <div class="to-pro d-flex justify-content-between p-3">
                        <p>عدد المهام</p>
                        <p>٨</p>
                    </div>
                </div>
                <!-- End today profits-->
            </div>

            <div class="col-6">
                <!-- start today profits -->
                <div class="today-profits p-3 mt-5 text-white"
                    style="background-image: linear-gradient(to right, #f05f22, #e53f52);">
                    <div class="to-pro d-flex justify-content-between p-3">
                        <p>الرصيد الإجمالي</p>
                        <p>$٤,١٥٦.٤٥{{ App\Models\Withdrawal::calculateTotalEarnings() }}</p>
                    </div>
                    <div class="to-pro d-flex justify-content-between p-3">
                        <p>عدد المهام</p>
                        <p>٤٠</p>
                    </div>
                </div>
                <!-- End today profits-->
            </div>
        </div>
    </div>
</div>
<!-- start submit-->
<div class="container py-4">
    <div class="row py-3">
        <form action="{{ route('store') }}" method="POST" class="mb-3" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <input type="text" name="phone_number" class="form-control w-50 " value="{{ old('phone_number') }}"
                    placeholder="رقم التحويل" />
                @error('phone_number')
                <div class="w-50 alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <input type="text" name="withdrawal_amount" class="form-control w-50 "
                    value="{{ old('withdrawal_amount') }}" placeholder="المبلغ : اقل مبلغ للسحب 50ج " />
                @error('withdrawal_amount')
                <div class="w-50 alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <p class="h6 my-3">طريقة الدفع :</p><span</span>
                <select name="methoud" id="payment_method" class="form-select w-50">
                    <option value="">اختر طريقة الدفع</option>
                    <option value="cach" {{ old('methoud') === 'cach' ? 'selected' : '' }}>فودافون كاش</option>
                    <option value="insta" {{ old('methoud') === 'insta' ? 'selected' : '' }}>انستا باي</option>
                </select>

                @error('methoud')
                <div class="w-50 alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="d-flex justify-content-start">
                <button type="submit" class="btn btn-danger">
                    سحب
                </button>
            </div>
        </form>
    </div>
</div>
<!-- End submit-->

@endsection
