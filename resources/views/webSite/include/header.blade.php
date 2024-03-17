<!-- start Header -->

  <nav class="navbar navbar-expand-lg shadow">
    <div class="container">
        <a class="navbar-brand" href="{{route('webSite.index')}}"><span style="color: blue">like</span><span style="color: red">4like</span></a>
        <button class="navbar-toggler navbar-dark bg-dark" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <ul class="navbar-nav ms-auto">
            @php
                $user = auth('customer')->user();
                $subscriptions = $user->subscriptions()->where('status', 'active')->get();
                $hasActiveSubscription = $subscriptions->isNotEmpty();
            @endphp

            @if (!$hasActiveSubscription)
                <!-- إذا كان العميل ليس لديه اشتراك نشط -->
                <a class="nav-link {{ request()->is('subscription') ? 'active' : '' }}" aria-current="page" href="{{ route('subscription') }}">الاشتراك في الباقه</a>
            @endif

            @if ($hasActiveSubscription)
                <!-- إذا كان العميل لديه اشتراك نشط -->
                <a class="nav-link  {{ request()->is('work*') ? 'active' : '' }}" aria-current="page" href="{{ route('webSite.work.index') }}">بيان العمل</a>
                <a class="nav-link {{ request()->is('withdrawal*') ? 'active' : '' }}" aria-current="page" href="{{ route('withdrawal.index') }}">السحب</a>
                <a class="nav-link {{ request()->is('profit*') ? 'active' : '' }}" aria-current="page" href="{{ route('profit.index') }}">الارباح</a>
            @endif

            <a class="nav-link {{ request()->is('help*') ? 'active' : '' }}" aria-current="page" href="{{route('help.index')}}">الدعم</a>
        </ul>

            <form method="POST" action="{{ route('logout.customer') }}">
                @csrf
                <button type="submit" class=" btn btn-danger">تسجيل الخروج</button>
                </form>
        </div>
    </div>
</nav>

  <!-- End Header --> 
  

<script>
    document.addEventListener("DOMContentLoaded", function() {
        var navLinks = document.querySelectorAll('.navbar-nav .nav-link');

        navLinks.forEach(function(navLink) {
            navLink.addEventListener('click', function() {
                navLinks.forEach(function(link) {
                    link.classList.remove('active');
                });
                link.classList.remove('active');
                this.classList.add('active');
            });
        });
    });
</script>



