@extends('Frontend.layouts.app') 
@section('title', 'Detail Destination | '.ucwords($config->site_name))
@section('content')
<div class="blog-details-area section">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="single-post box-shadow">
                    <div class="post-thumnile">
                        <div class="slide-thumbnile">
                            <div class="slide-thumbnile">
                                <div class="single-image">
                                    <img src="{{ url('images/destination/'. $data->pict) }}" alt="blog">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="post-title">
                        <h3>{{ $data->dest_name }}</h3>
                    </div>
                    <div class="blog-meta">
                        <ul>
                            <li> <span class="flaticon-man-user user"></span>
                                <p>By {{ $data->name }} </p>
                            </li>
                            <li> <span class="flaticon-calendar clendar"></span>
                                <p>{{ date('d M Y', strtotime($data->created_at)) }}</p>
                            </li>
                        </ul>
                    </div>
                    <div class="blog-content">
                        <p>
                            @php echo "
                            <p>$data->desc</p>" @endphp
                        </p>
                        <div>
                            <div class="row">
                                <div style="width: 100%; height: 500px;">
                                    {!! $mapRender !!}
                                </div>
                            </div>
                        </div>
                        @if ($data->dest_id!=null)
                        <a style="color: blue;" href="{{ url('/guide', $data->dest_id) }}">
                            <u><b><h4>Manager Contact {{ $data->dest_name }}</h4></u></b>

                        </a> 
                            
                        @endif
                    </div>
                </div>
                <div class="related-post box-shadow mt-70">
                    <div class="section-title">
                        <h3>Related Post</h3>
                    </div>
                    <div class="related-slide-post">
                    @foreach($related as $relat)
                        <div class="single-blog">
                            <div class="post-thumbnile">
                                <a href="{{ url('/destination/detail', $relat->dest_id) }}"><img src="{{ url('images/destination/'. $relat->pict) }}" alt="related post"></a>
                                <div class="cetagory-icon">
                                    <span class="flaticon-art"></span>
                                </div>
                            </div>
                            <div class="blog-info">
                                <div class="blog-title">
                                    <h3><a href="{{ url('/destination/detail', $relat->dest_id) }}">{{ $relat->dest_name }}</a></h3>
                                </div>
                                <div class="blog-content">
                                    @php 
                                        echo "<p>".substr(strip_tags($relat->desc), 0, 100). '...'."</p>" 
                                    @endphp
                                </div>
                                <div class="blog-meta fix">
                                    <div class="meta-left pull-left">
                                        <ul>
                                            <li> <span class="flaticon-man-user user"></span>
                                                <p>By {{ $data->name }}  </p>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="post-readmore pull-right">
                                        <a href="{{ url('/destination/detail', $relat->dest_id) }}" class="readmore-btn">Read More <span>+</span></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach

                    </div>
                </div>

            </div>
            <div class="col-lg-4">
                <div class="sidebar-widget">
                    <div class="single-widget search-widget box-shadow">
                        <div class="widget-inner">
                            <form action="{{ route('searchDest') }}" method="POST">
                            @csrf
                                <div class="search-from box-shadow">
                                    <input type="text" id="search" name="search" placeholder="Serach">
                                    <button class="search-icon"><i class="fa fa-search"></i></button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="single-widget category-widget box-shadow">
                        <div class="widget-inner">
                            <div class="widget-title">
                                <h3>Category</h3>
                            </div>
                            <div class="category-list">
                                <ul>
                                    @foreach($types as $typ)
                                    <li>
                                        <a href="{{ url('/category', $typ->type_id) }}">{{$typ->type_name}}
                                            @foreach($typ->category_count['0'] as $ct)
                                                 <span> {{$ct}}</span>
                                            @endforeach
                                        </a>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="single-widget recent-post-widget box-shadow">
                        <div class="widget-inner">
                            <div class="widget-title">
                                <h3>Recent Post</h3>
                            </div>
                            <div class="recent-post-list">
                                @foreach($recent as $rec)
                                <div class="single-post">
                                    <div class="posty-img">
                                        <a href="{{ url('/destination/detail', $rec->dest_id) }}"><img src="{{ url('images/destination/'. $rec->pict) }}" alt="post"></a>
                                    </div>
                                    <div class="post-title">
                                        <h4><a href="{{ url('/destination/detail', $rec->dest_id) }}">{{ $rec->dest_name }}</a></h4>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
  <!-- Google maps server -->
@endsection