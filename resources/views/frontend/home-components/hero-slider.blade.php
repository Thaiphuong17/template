<div class="trending-area fix">
    <div class="container">
        <div class="trending-main">
            <!-- Trending Tittle -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="trending-tittle">
                        <strong>Tin nổi bật</strong>
                        <!-- <p>Rem ipsum dolor sit amet, consectetur adipisicing elit.</p> -->
                        <div class="trending-animated">
                            <ul id="js-news" class="js-hidden">
                                <li class="news-item">Bangladesh dolor sit amet, consectetur adipisicing elit.</li>
                                <li class="news-item">Spondon IT sit amet, consectetur.......</li>
                                <li class="news-item">Rem ipsum dolor sit amet, consectetur adipisicing elit.</li>
                            </ul>
                        </div>

                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8">
                    <!-- Trending Top -->
                    <div class="trending-top mb-30">
                        <div class="trend-top-img">
                            @foreach($hot as $news)
                                @if ($loop->index <= 0)
                                    <img src="{{ asset('Frontend/assets/' . $news->image) }}" alt="">
                                    <div class="trend-top-cap">
                                        <h2><a href="details.html">{{$news->title}}<br></a></h2>
                                        <!-- <p style="color:#fff;">{{$news->content}}</p> -->
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    </div>
                    <!-- Trending Bottom -->
                    <div class="trending-bottom">
                        <div class="row">
                            @foreach ($hot as $news)
                                @if ($loop->index > 1 && $loop->index <= 4)
                                    <div class="col-lg-4">
                                        <div class="single-bottom mb-35">
                                            <div class="trend-bottom-img mb-30">
                                                <img src="{{asset('Frontend/assets/' . $news->image)}}" alt="">
                                            </div>
                                            <div class="trend-bottom-cap">
                                                <span class="color1">Lifestyple</span>
                                                <h4><a href="details.html">{{$news->title}}</a></h4>
                                            </div>
                                        </div>
                                    </div>
                                @endif

                            @endforeach

                            <!-- <div class="col-lg-4">
                                    <div class="single-bottom mb-35">
                                        <div class="trend-bottom-img mb-30">
                                            <img src="Frontend/assets/img/trending/trending_bottom2.jpg" alt="">
                                        </div>
                                        <div class="trend-bottom-cap">
                                            <span class="color2">Sports</span>
                                            <h4>
                                                <h4><a href="details.html">Get the Illusion of Fuller Lashes by
                                                        “Mascng.”</a></h4>
                                            </h4>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="single-bottom mb-35">
                                        <div class="trend-bottom-img mb-30">
                                            <img src="Frontend/assets/img/trending/trending_bottom3.jpg" alt="">
                                        </div>
                                        <div class="trend-bottom-cap">
                                            <span class="color3">Travels</span>
                                            <h4><a href="details.html"> Welcome To The Best Model Winner Contest</a>
                                            </h4>
                                        </div>
                                    </div>
                                </div> -->
                        </div>
                    </div>
                </div>
                <!-- Riht content -->
                <div class="col-lg-4">
                    @foreach ($hot as $news)
                        @if ($loop->index >4 && $loop->index < 10)
                            <div class="trand-right-single d-flex">
                                <div class="trand-right-img">
                                    <img class="img-fluid" src="{{asset('Frontend/assets/'.$news->image)}}" alt="">
                                </div>
                                <div class="trand-right-cap">
                                    <span class="color1">Concert</span>
                                    <h4><a href="{{ route('detail', ['category' => $news->category->slug, 'id' => $news->id]) }}">{{$news->title}}</a></h4>
                                </div>
                            </div>
                        @endif
                    @endforeach
                    <!-- <div class="trand-right-single d-flex">
                        <div class="trand-right-img">
                            <img src="Frontend/assets/img/trending/right1.jpg" alt="">
                        </div>
                        <div class="trand-right-cap">
                            <span class="color1">Concert</span>
                            <h4><a href="details.html">Welcome To The Best Model Winner Contest</a></h4>
                        </div>
                    </div>
                    <div class="trand-right-single d-flex">
                        <div class="trand-right-img">
                            <img src="Frontend/assets/img/trending/right2.jpg" alt="">
                        </div>
                        <div class="trand-right-cap">
                            <span class="color3">sea beach</span>
                            <h4><a href="details.html">Welcome To The Best Model Winner Contest</a></h4>
                        </div>
                    </div>
                    <div class="trand-right-single d-flex">
                        <div class="trand-right-img">
                            <img src="Frontend/assets/img/trending/right3.jpg" alt="">
                        </div>
                        <div class="trand-right-cap">
                            <span class="color2">Bike Show</span>
                            <h4><a href="details.html">Welcome To The Best Model Winner Contest</a></h4>
                        </div>
                    </div>
                    <div class="trand-right-single d-flex">
                        <div class="trand-right-img">
                            <img src="Frontend/assets/img/trending/right4.jpg" alt="">
                        </div>
                        <div class="trand-right-cap">
                            <span class="color4">See beach</span>
                            <h4><a href="details.html">Welcome To The Best Model Winner Contest</a></h4>
                        </div>
                    </div>
                    <div class="trand-right-single d-flex">
                        <div class="trand-right-img">
                            <img src="Frontend/assets/img/trending/right5.jpg" alt="">
                        </div>
                        <div class="trand-right-cap">
                            <span class="color1">Skeping</span>
                            <h4><a href="details.html">Welcome To The Best Model Winner Contest</a></h4>
                        </div>
                    </div> -->
                </div>
            </div>
        </div>
    </div>
</div>