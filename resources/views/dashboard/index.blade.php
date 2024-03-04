@extends('layouts.dashboard.app')
@section('content') 
<div class="page-toolbar px-xl-4 px-sm-2 px-0 py-3">
<div class="container-fluid">
<div class="row g-3 mb-3 align-items-center">
<div class="col">
<ol class="breadcrumb bg-transparent mb-0">
<li class="breadcrumb-item"><a class="text-secondary" href="index.html">Home</a></li>
<li class="breadcrumb-item active" aria-current="page">Dashboard</li>
</ol>
</div>
</div> 
<div class="row align-items-center">
<div class="col">
<h1 class="fs-5 color-900 mt-1 mb-0">Welcome back, Allie!</h1>
</div>
<div class="col-xxl-4 col-xl-5 col-lg-6 col-md-7 col-sm-12 mt-2 mt-md-0">

<script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script><script src="{{url('/')}}/dashboard/assets/js/bundle/daterangepicker.bundle.js"></script>

<script>
              // date range picker
              $(function() {
                $('input[name="daterange"]').daterangepicker({
                  opens: 'left'
                }, function(start, end, label) {
                  console.log("A new date selection was made: " + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD'));
                });
              })
            </script>
</div>
</div> 
</div>
</div>

<div class="page-body px-xl-4 px-sm-2 px-0 py-lg-2 py-1 mt-0 mt-lg-3">
<div class="container-fluid">
<div class="row row-cols-xxl-4 row-cols-xl-2 row-cols-lg-4 row-cols-md-2 row-cols-sm-2 row-cols-1 g-xl-3 g-2 mb-3">
<div class="col">
<div class="card">
<div class="card-body d-flex align-items-start">
<div class="avatar rounded no-thumbnail">
<i class="fa fa-shopping-basket fa-lg"></i>
</div>
<div class="flex-fill ms-3">
<div class="fw-bold"><span class="h4 mb-0">401</span><span class="text-success ms-1">2.55% <i class="fa fa-caret-up"></i></span></div>
<div class="text-muted small">Total Orders</div>
<div class="mt-3">
<label class="small d-flex justify-content-between">This Week<span class="fw-bold">248</span></label>
<div class="progress mt-1" style="height: 6px;">
<div class="progress-bar bg-primary" role="progressbar" aria-valuenow="87" aria-valuemin="0" aria-valuemax="100" style="width: 87%;"></div>
</div>
</div>
<div class="mt-2">
<label class="small d-flex justify-content-between">Last Week<span class="fw-bold">148</span></label>
<div class="progress mt-1" style="height: 6px;">
<div class="progress-bar bg-secondary" role="progressbar" aria-valuenow="44" aria-valuemin="0" aria-valuemax="100" style="width: 44%;"></div>
</div>
</div>
</div>
</div>
</div>
</div>
<div class="col">
<div class="card">
<div class="card-body d-flex align-items-start">
<div class="avatar rounded no-thumbnail">
<i class="fa fa-users fa-lg"></i>
</div>
<div class="flex-fill ms-3">
<div class="fw-bold"><span class="h4 mb-0">1089</span><span class="text-danger ms-1">1.05% <i class="fa fa-caret-down"></i></span></div>
<div class="text-muted small">Customers</div>
 <div class="mt-3">
<label class="small d-flex justify-content-between">This Week<span class="fw-bold">349</span></label>
<div class="progress mt-1" style="height: 6px;">
<div class="progress-bar bg-primary" role="progressbar" aria-valuenow="43" aria-valuemin="0" aria-valuemax="100" style="width: 43%;"></div>
</div>
</div>
<div class="mt-2">
<label class="small d-flex justify-content-between">Last Week<span class="fw-bold">488</span></label>
<div class="progress mt-1" style="height: 6px;">
<div class="progress-bar bg-secondary" role="progressbar" aria-valuenow="79" aria-valuemin="0" aria-valuemax="100" style="width: 79%;"></div>
</div>
</div>
</div>
</div>
</div>
</div>
<div class="col">
<div class="card">
<div class="card-body d-flex align-items-start">
<div class="avatar rounded no-thumbnail">
<i class="fa fa-cart-plus fa-lg"></i>
</div>
<div class="flex-fill ms-3">
<div class="fw-bold"><span class="h4 mb-0">56</span><span class="text-success ms-1">5.77% <i class="fa fa-caret-up"></i></span></div>
<div class="text-muted">New Order</div>
<div class="mt-3">
<label class="small d-flex justify-content-between">This Week<span class="fw-bold">44</span></label>
<div class="progress mt-1" style="height: 6px;">
<div class="progress-bar bg-primary" role="progressbar" aria-valuenow="67" aria-valuemin="0" aria-valuemax="100" style="width: 68%;"></div>
</div>
</div>
<div class="mt-2">
<label class="small d-flex justify-content-between">Last Week<span class="fw-bold">27</span></label>
<div class="progress mt-1" style="height: 6px;">
<div class="progress-bar bg-secondary" role="progressbar" aria-valuenow="41" aria-valuemin="0" aria-valuemax="100" style="width: 41%;"></div>
</div>
</div>
</div>
</div>
</div>
</div>
<div class="col">
<div class="card">
<div class="card-body d-flex align-items-start">
<div class="avatar rounded no-thumbnail">
<i class="fa fa-dollar fa-lg"></i>
</div>
<div class="flex-fill ms-3">
<div class="fw-bold"><span class="h4 mb-0">$42k</span><span class="text-success ms-1">9.22% <i class="fa fa-caret-up"></i></span></div>
<div class="text-muted">Total Revenue</div>
<div class="mt-3">
<label class="small d-flex justify-content-between">This Week<span class="fw-bold">$1,815</span></label>
<div class="progress mt-1" style="height: 6px;">
<div class="progress-bar bg-primary" role="progressbar" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100" style="width: 85%;"></div>
</div>
</div>
<div class="mt-2">
<label class="small d-flex justify-content-between">Last Week<span class="fw-bold">$284</span></label>
<div class="progress mt-1" style="height: 6px;">
<div class="progress-bar bg-secondary" role="progressbar" aria-valuenow="19" aria-valuemin="0" aria-valuemax="100" style="width: 19%;"></div>
</div>
</div>
</div>
</div>
</div>
</div>
</div> 

</div>
@endsection