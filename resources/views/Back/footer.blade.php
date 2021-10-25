            <footer class="center-align m-b-30">All Rights Reserved by Materialart. Designed and Developed by <a
                    href="{{ $general->instagram }}">{{ $general->footer }}</a>.</footer>
        </div>
        <div class="chat-windows "></div>
    </div>
    <script src="{{ asset('Back') }}/assets/libs/jquery/dist/jquery.min.js"></script>
    <script src="{{ asset('Back') }}/dist/js/materialize.min.js"></script>
    <script src="{{ asset('Back') }}/assets/libs/perfect-scrollbar/dist/js/perfect-scrollbar.jquery.min.js"></script>
    <script src="{{ asset('Back') }}/dist/js/app.js"></script>
    <script src="{{ asset('Back') }}/dist/js/app.init.horizontal.js"></script>
    <script src="{{ asset('Back') }}/dist/js/app-style-switcher.horizontal.js"></script>
    <script src="{{ asset('Back') }}/dist/js/custom.min.js"></script>
    <script src="{{ asset('Back') }}/assets/datatables.min.js"></script>
    <script src="{{ asset('Back') }}/dist/js/pages/datatable/datatable-basic.init.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="{{ asset('Back') }}/assets/libs/ckeditor/ckeditor.js"></script>
    @toastr_js
    @toastr_render
</body>

</html>