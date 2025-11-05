<section class="works py-5 fade-sections">
    <div class="container">
        <!-- Section Title -->
        <div class="title text-center mb-5">
            <h3 class="mb-3">My Work - <span>My Latest Works</span></h3>
            <div class="decoration">
                <div class="upline"></div>
                <div class="downline"></div>
                <div class="icon"></div>
            </div>
        </div>

        @if (Route::currentRouteName() !== 'homepage')

            <div class="text-end mb-3">
                <div class="btn-group">

                    <select class="form-select s-150" name="" id="category">
                        <option value="" disabled>Select Category</option>
                        <option value="1">Templates</option>
                    </select>

                    <div class="btn-group">
                        <input type="search" id="search" class="form-control ms-3 s-400 d-none"
                            placeholder="Search for templates, projects and more">
                        <i class="fas fa-search pt-2 ms-3"></i>
                    </div>
                </div>
            </div>
                    
            <!-- Latest Templates -->
            <h4 class="mb-3">Latest Templates</h4>
            <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 row-cols-xl-4 g-3 mb-4">
                <div class="col">
                    <div class="card border-0 shadow-sm">
                        <div class="card-body p-1">
                            <img src="{{asset('imgs/skills.png')}}" alt="temp" class="card-img" />
                            <div class="py-3 px-2">
                                <h5 class="card-title">Template Name</h5>
                                <h6>$30</h6>
                                <div class="text-end">
                                    <div class="btn-group">
                                        <a href="#" class="btn btn-outline-primary">
                                            <i class="fas fa-eye me-1"></i>Demo
                                        </a>
                                        <a href="#" class="btn btn-outline-success">
                                            <i class="fas fa-dollar me-1"></i>Pay
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col">
                    <div class="card border-0 shadow-sm">
                        <div class="card-body p-1">
                            <img src="{{asset('imgs/skills.png')}}" alt="temp" class="card-img" />
                            <div class="py-3 px-2">
                                <h5 class="card-title">Template Name</h5>
                                <h6>$30</h6>
                                <div class="text-end">
                                    <div class="btn-group">
                                        <a href="#" class="btn btn-outline-primary">
                                            <i class="fas fa-eye me-1"></i>Demo
                                        </a>
                                        <a href="#" class="btn btn-outline-success">
                                            <i class="fas fa-dollar me-1"></i>Pay
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col">
                    <div class="card border-0 shadow-sm">
                        <div class="card-body p-1">
                            <img src="{{asset('imgs/skills.png')}}" alt="temp" class="card-img" />
                            <div class="py-3 px-2">
                                <h5 class="card-title">Template Name</h5>
                                <h6>$30</h6>
                                <div class="text-end">
                                    <div class="btn-group">
                                        <a href="#" class="btn btn-outline-primary">
                                            <i class="fas fa-eye me-1"></i>Demo
                                        </a>
                                        <a href="#" class="btn btn-outline-success">
                                            <i class="fas fa-dollar me-1"></i>Pay
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col">
                    <div class="card border-0 shadow-sm">
                        <div class="card-body p-1">
                            <img src="{{asset('imgs/skills.png')}}" alt="temp" class="card-img" />
                            <div class="py-3 px-2">
                                <h5 class="card-title">Template Name</h5>
                                <h6>$30</h6>
                                <div class="text-end">
                                    <div class="btn-group">
                                        <a href="#" class="btn btn-outline-primary">
                                            <i class="fas fa-eye me-1"></i>Demo
                                        </a>
                                        <a href="#" class="btn btn-outline-success">
                                            <i class="fas fa-dollar me-1"></i>Pay
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        @else

            <!-- Latest Templates -->
            <h4 class="mb-3">Latest Templates</h4>
            <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 row-cols-xl-4 g-3 mb-4">
                <div class="col">
                    <div class="card border-0 shadow-sm">
                        <div class="card-body p-1">
                            <img src="{{asset('imgs/skills.png')}}" alt="temp" class="card-img" />
                            <div class="py-3 px-2">
                                <h5 class="card-title">Template Name</h5>
                                <h6>$30</h6>
                                <div class="text-end">
                                    <div class="btn-group">
                                        <a href="#" class="btn btn-outline-primary">
                                            <i class="fas fa-eye me-1"></i>Demo
                                        </a>
                                        <a href="#" class="btn btn-outline-success">
                                            <i class="fas fa-dollar me-1"></i>Pay
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col">
                    <div class="card border-0 shadow-sm">
                        <div class="card-body p-1">
                            <img src="{{asset('imgs/skills.png')}}" alt="temp" class="card-img" />
                            <div class="py-3 px-2">
                                <h5 class="card-title">Template Name</h5>
                                <h6>$30</h6>
                                <div class="text-end">
                                    <div class="btn-group">
                                        <a href="#" class="btn btn-outline-primary">
                                            <i class="fas fa-eye me-1"></i>Demo
                                        </a>
                                        <a href="#" class="btn btn-outline-success">
                                            <i class="fas fa-dollar me-1"></i>Pay
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col">
                    <div class="card border-0 shadow-sm">
                        <div class="card-body p-1">
                            <img src="{{asset('imgs/skills.png')}}" alt="temp" class="card-img" />
                            <div class="py-3 px-2">
                                <h5 class="card-title">Template Name</h5>
                                <h6>$30</h6>
                                <div class="text-end">
                                    <div class="btn-group">
                                        <a href="#" class="btn btn-outline-primary">
                                            <i class="fas fa-eye me-1"></i>Demo
                                        </a>
                                        <a href="#" class="btn btn-outline-success">
                                            <i class="fas fa-dollar me-1"></i>Pay
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col">
                    <div class="card border-0 shadow-sm">
                        <div class="card-body p-1">
                            <img src="{{asset('imgs/skills.png')}}" alt="temp" class="card-img" />
                            <div class="py-3 px-2">
                                <h5 class="card-title">Template Name</h5>
                                <h6>$30</h6>
                                <div class="text-end">
                                    <div class="btn-group">
                                        <a href="#" class="btn btn-outline-primary">
                                            <i class="fas fa-eye me-1"></i>Demo
                                        </a>
                                        <a href="#" class="btn btn-outline-success">
                                            <i class="fas fa-dollar me-1"></i>Pay
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        @endif

    </div>
    <!---->
</section>
