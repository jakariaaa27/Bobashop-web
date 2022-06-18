@foreach($setting as $data)
<div class="footer-top">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="footer-widget widget-text">
                    <div class="footer-logo">
                        <a href="index-2.html"><img width="200px" height="200px" src="{{ asset('Frontend/assets/images/boba.png') }}" alt=""></a>
                    </div>
                    <div class="widget-content">
                        <p>{{$data->site_desc}}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="footer-bottom">
    <div class="container">
        <div class="row">
			<div class="col-md-6">
				<div class="copyright-area">
					<p>{{$data->footer_frontend}}</p>
				</div>
			</div>
		</div>
    </div>
</div>
@endforeach