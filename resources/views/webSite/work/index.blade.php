@extends('layouts.site.app')

@section('content')
<!-- تنبيه -->
<div class="alert alert-info custom-alert show fade" role="alert">
                <strong>ملاحظة:</strong> تتم مراجعة لقطات الشاشة من قبل الإدارة، وفي حال اكتشاف لقطة شاشة غير صحيحة سيتم إلغاء الاشتراك مباشرة. تتم عملية المراجعة بمدة تصل إلى 72 ساعة.
    </div>
<div class="container">
    <div class="row my-5">
        <div class="col-md-6 mx-auto">
            <div class="w-50 p-2 mx-auto shadow">
                <a href="{{route('facebook')}}" class="">
                    <img src="{{url('/')}}/website/assets/work/facebook.jfif" style="cursor: pointer" class="w-100" alt="">
                </a>
            </div>
        </div>
        <div class="col-md-6">
            <div class="w-50 p-2 mx-auto shadow">
                <a href="{{route('youtube')}}" class="">
                    <img src="{{url('/')}}/website/assets/work/youtube.jfif" style="cursor: pointer" class="w-100" alt="">
                </a>
            </div>
        </div>
    </div>
    

</div>
@endsection

<style>
    .custom-alert {
        background-color: #cce5ff;
        color: #004085;
        border-color: #b8daff;
        border-radius: 5px;
        padding: 15px;
        animation: slideInDown 0.5s ease-in-out;
    }

    @keyframes slideInDown {
      0% {
        transform: translateY(-100%);
        opacity: 0;
      }
      100% {
        transform: translateY(0%);
        opacity: 1;
      }
    }
</style>
