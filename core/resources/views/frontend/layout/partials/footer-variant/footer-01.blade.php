<!-- footer area start -->
<footer class="footer-area footer-fluid white-footer footer-bg-1">
    <div class="container">
        <div class="footer-area-wrapper footer-bg-1">

            <div class="row gx-5 footer-area-top">
                {!! render_frontend_sidebar('footer_one') !!}
                <div class="col-3">
                    <img src="{{ asset('assets/static/img/shurjopay_payment_methods.png') }}" alt="Shurjopay">
                </div>
            </div>

            <div class="copyright-area copyright-border">
                <div class="row">
                    <div class="col-12">
                        <div class="footer-widget-para">
                            {!! render_footer_copyright_text() !!}
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</footer>
<!-- footer area end -->