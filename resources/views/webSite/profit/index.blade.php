@extends('layouts.site.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
            <h1 style="color: #ff0000">الارباح</h1>
        </div>
        <div class="row mb-5">
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
@endsection