<div class="col-md-4" data-sticky_column>
    <div class="primary-sidebar">

        <aside class="widget news-letter">
            <h3 class="widget-title text-uppercase text-center">Get Newsletter</h3>
            @include('admin.error')
            <form action="/subscribe" method="post">
                @csrf
                <input type="text" placeholder="Your email address" name="email">
                <input type="submit" value="Subscribe Now"
                       class="text-uppercase text-center btn btn-subscribe">
            </form>

        </aside>
        <aside class="widget">
            <h3 class="widget-title text-uppercase text-center">Popular Posts</h3>
            <div class="popular-post">
                @if($popularPost)
                    @foreach($popularPost as $item)
                        <a href="{{route('post.show', $item->slug)}}" class="popular-img"><img
                                    src="{{$item->getImage()}}" alt="">
                            <div class="p-overlay"></div>
                        </a>
                        <div class="p-content">
                            <a href="{{route('post.show', $item->slug)}}" class="text-uppercase">{{$item->title}}</a>
                            <span class="p-date">{{$item->getDate()}}</span>
                        </div>
                    @endforeach
                @endif
            </div>
        </aside>
        <aside class="widget">
            <h3 class="widget-title text-uppercase text-center">Featured Posts</h3>

            <div id="widget-feature" class="owl-carousel">
                @if($featuredPost)
                    @foreach($featuredPost as $item)
                        <div class="item">
                            <div class="feature-content">
                                <img src="{{$item->getImage()}}" alt="">

                                <a href="{{route('post.show', $item->slug)}}" class="overlay-text text-center">
                                    <h5 class="text-uppercase">{{$item->title}}</h5>
                                    {{$item->description}}
                                </a>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </aside>
        <aside class="widget pos-padding">
            <h3 class="widget-title text-uppercase text-center">Recent Posts</h3>
            @if($recentPost)
                @foreach($recentPost as $item)
                    <div class="thumb-latest-posts">
                        <div class="media">
                            <div class="media-left">
                                <a href="{{route('post.show', $item->slug)}}" class="popular-img"><img
                                            src="{{$item->getImage()}}" alt="">
                                    <div class="p-overlay"></div>
                                </a>
                            </div>
                            <div class="p-content">
                                <a href="{{route('post.show', $item->slug)}}"
                                   class="text-uppercase">{{$item->title}}</a>
                                <span class="p-date">{{$item->getDate()}}</span>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
        </aside>
        <aside class="widget border pos-padding">
            <h3 class="widget-title text-uppercase text-center">Categories</h3>
            <ul>
                @if($categories)
                    @foreach($categories as $category)
                        <li>
                            <a href="{{route('category.show', $category->slug)}}">{{$category->title}}</a>
                            <span class="post-count pull-right"> {{$category->posts()->count()}}</span>
                        </li>
                    @endforeach
                @endif
            </ul>
        </aside>
    </div>
</div>