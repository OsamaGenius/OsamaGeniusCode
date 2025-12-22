<div>
    <div class="text-center">
        <h5 class="mb-0">{{ Auth::guard('panel')->user()->name }}</h5>
        <h6>{{ Auth::guard('panel')->user()->email }}</h6>
    </div>
</div>
