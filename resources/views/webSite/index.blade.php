@extends('layouts.site.app')
@section('content')
<!-- تضمين مكتبة jQuery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- تضمين مكتبة Bootstrap الأساسية -->
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<style>
  /* تحديد الارتفاع المطلوب لصور عنصر التمرير */
  .carousel-item img {
    height: 500px; /* تعيين الارتفاع المطلوب هنا بالبكسل */
    object-fit: contain; /* ضبط عرض وارتفاع الصورة لتناسب حاويتها دون تغيير نسبة الأبعاد */
  }
</style>

<div id="carouselExampleControls" class="carousel slide container" data-ride="carousel" data-interval="5000"> <!-- تعيين مدة عرض كل صورة إلى 5 ثواني -->
  <div class="carousel-inner">
    @foreach($sliders as $slider)
      <div class="carousel-item @if ($loop->first) active @endif">
        <img class="w-100" src="{{ asset('images/dashboard/sliders/'.$slider->photo) }}" alt="Slider Image">
      </div>
    @endforeach
  </div>
  <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
@endsection
