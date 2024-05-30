<!--   Core JS Files   -->
<script src="{{ asset('assets/js/core/popper.min.js') }}"></script>
<script src="{{ asset('assets/js/core/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/js/plugins/perfect-scrollbar.min.js') }}"></script>
<script src="{{ asset('assets/js/plugins/smooth-scrollbar.min.js') }}"></script>
<script src="{{ asset('assets/js/plugins/chartjs.min.js') }}"></script>


<script src="{{ asset('assets/plugins/jquery/jquery-3.7.1.min.js') }}"></script>
<script src="{{ asset('assets/plugins/DataTables-2.0.7/js/dataTables.js') }}"></script>
<script src="{{ asset('assets/plugins/DataTables-2.0.7/js/dataTables.bootstrap5.min.js') }}"></script>
<script src="{{ asset('assets/plugins/Buttons-3.0.2/js/dataTables.buttons.js') }}"></script>
<script src="{{ asset('assets/plugins/Buttons-3.0.2/js/buttons.dataTables.js') }}"></script>

<script src="{{ asset('assets/plugins/jszip-v3.10.1/jszip.min.js') }}"></script>

<script src="{{ asset('assets/plugins/Buttons-3.0.2/js/buttons.html5.js') }}"></script>

<script src="{{ asset('assets/plugins/Buttons-3.0.2/js/buttons.bootstrap5.js') }}"></script>

<script src="{{ asset('assets/plugins/sweetalert2/sweetalert2.all.min.js') }}"></script>


@yield('script')

<script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
        var options = {
            damping: '0.5'
        }
        Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }

    $('.table').DataTable({
        // dom: 'Bflrtip',
        dom: "Bfl<'mb-2'>rt<'row '<'col-sm-6'i><'col-sm d-flex flex-row justify-content-end'p>>",
        buttons: [{
                extend: 'excel',
                className: "btn bg-tranparent btn-sm btn-success",
                footer: true
            },
            {
                extend: 'copy',
                className: "btn bg-tranparent btn-sm btn-warning",
                footer: true
            },
        ],
        "pageLength": 5,
        "lengthMenu": [
            [5, 100, 1000, -1],
            [5, 100, 1000, "ALL"],
        ],
    })

    //message with sweetalert
    @if (session('success'))
        Swal.fire({
            icon: "success",
            title: "Success",
            text: "{{ session('success') }}",
            showConfirmButton: false,
            timer: 2000
        });
    @elseif (session('error'))
        Swal.fire({
            icon: "error",
            title: "Error",
            text: "{{ session('error') }}",
            showConfirmButton: false,
            timer: 2000
        });
    @endif

    function deleteTombol(e) {
        const ket = e.getAttribute('data-ket');
        const href = e.getAttribute('data-href') ? e.getAttribute('data-href') : e.getAttribute('href');
        Swal.fire({
            title: 'Are you sure?',
            text: ket,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.value) {
                if (href) {
                    window.location.href = href;
                } else {
                    e.parentElement.submit();
                }
            }
        })
        e.preventDefault();
    }
</script>
<!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
<script src="{{ asset('assets/js/argon-dashboard.min.js?v=2.0.4') }}"></script>
</body>

</html>
