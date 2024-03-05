@extends('layouts.site.app')
@section('content')

  <div class="container">
    <div class="row">
      <div class="col-12">
        <h1 style="color: #ff0000">Earnings</h1>
      </div>
      <div class="col-12">
        <!-- start today profits -->
        <div class="today-profits p-3 mt-5 text-white" style="
              background-image: linear-gradient(to right, #f05f22, #e53f52);
            ">
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
    </div>
  </div>
  <!-- start submit-->
  <div class="container py-4">
    <div class="row py-3">
      <form class="mt-3">
        <div class="mb-3">
          <input type="text" class="px-1 py-2" placeholder="رقم التحويل"
            style="width: 50%; border: 2px solid black; border-radius: 4px" />
        </div>
        <div class="mb-3">
          <input type="text" class="px-1 py-4" placeholder="المبلغ"
            style="width: 50%; border: 2px solid black; border-radius: 4px" />
        </div>
        <div class="form-check d-flex justify-content-end">
          <button type="submit" class="btn" style="background-color: #ff0000; color: white">
            سحب
          </button>
        </div>
      </form>
    </div>
  </div>
  <!-- End submit-->
  <div class="container">
    <div class="row">
      <div class="col-12">
        <!-- start today profits -->
        <div class="today-profits p-3 text-white" style="
              background-image: linear-gradient(to right, #f05f22, #e53f52);
            ">
          <div class="to-pro d-flex justify-content-between p-3">
            <p>الرصيد الإجمالي</p>
            <p>$٤,١٥٦.٤٥</p>
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
  <!-- start submit-->
  <div class="submit py-4">
    <div class="container">
      <div class="row py-3">
        <form class="mt-3">
          <div class="mb-3">
            <input type="text" class="px-1 py-2" placeholder="رقم التحويل"
              style="width: 50%; border: 2px solid black; border-radius: 4px" />
          </div>
          <div class="mb-3">
            <input type="text" class="px-1 py-4" placeholder="المبلغ"
              style="width: 50%; border: 2px solid black; border-radius: 4px" />
          </div>
          <div class="form-check d-flex justify-content-end">
            <button type="submit" class="btn" style="background-color: #ff0000; color: white">
              سحب
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>
  <!-- End submit-->
  
@endsection
