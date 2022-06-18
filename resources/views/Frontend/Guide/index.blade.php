@extends('Frontend.layouts.app')
@section('title', 'Guide Destination | '.ucwords($config->site_name))
@section('content')
<div class="post-two-area portfolio-area section">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
            <div class="portfolio">
					<div class="row acurate">
						<div class="col-sm-12 acurate">
							<div class="filtering-button">
                                @foreach($destName as $dstN)
                                    <h3>Manager Of <u>{{$dstN->dest_name}}</u></h3>	
                                @endforeach								
							</div>
						</div>
                    </div>
                    <div class="post-list">
                    @if(count($result))
                    @foreach($result as $data)
                    <div class="single-post">
                        <div class="inner-post">
                            <div class="post-img">
                                <a href="#"><img src="{{ url('images/guide/'. $data->photo) }}" alt="blog"></a>
                            </div>
                            <div class="post-info">
                                <div class="post-title">
                                    <h3><a href="{{ url('/destination/detail', $data->dest_id) }}">{{ $data->name }}</a></h3>
                                </div>
                                <div class="post-content">
                                    <p>
                                        Email : <b>{{ $data->email }}</b><br>
                                        Phone : <b>{{ $data->phone }}</b>
                                    </p>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    {!! $result->links() !!}
                    @else
                        <div class="portfolio">
					        <div class="row acurate">
                                <center><h1>manager Not Found</h1></center>
                            </div>
                        </div> 
                    @endif
                    <!-- <div class="pagination-area">
                        <div class="pagination">
                            <ul>
                                <li class="prev"><a href="#">PRev</a></li>
                                <li class="page"><a href="#">01</a></li>
                                <li class="page"><a href="#">02</a></li>
                                <li class="page"><a href="#">03</a></li>
                                <li class="page"><a href="#">04</a></li>
                                <li class="page active"><a href="#">05</a></li>
                                <li class="page"><a href="#">06</a></li>
                                <li class="page"><a href="#">07</a></li>
                                <li class="next pull-right"><a href="#">Next</a></li>
                            </ul>
                        </div>
                    </div> -->
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
<!-- leaf left area start here	 -->
<div class="leaf-left">
    <img src="assets/images/leaf-left.png" alt="leaf-right">
</div>
<!-- leaf left area end here	 -->
<!-- leaf right area start here	 -->
<div class="leaf-right">
    <img src="assets/images/leaf-right.png" alt="leaf-right">
</div>
<!-- leaf right area end here	 -->
@endsection