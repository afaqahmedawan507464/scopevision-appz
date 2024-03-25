<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="theme-color" content="#ffffff">
    <script src="/themes/public/assets/js/config.js"></script>
    <script src="/themes/public/vendors/overlayscrollbars/OverlayScrollbars.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"
        integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>


    <!-- ===============================================-->
    <!--    Stylesheets-->
    <!-- ===============================================-->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,500,600,700%7cPoppins:300,400,500,600,700,800,900&amp;display=swap"
        rel="stylesheet">
    <link href="/themes/public/vendors/overlayscrollbars/OverlayScrollbars.min.css" rel="stylesheet">
    <link href="/themes/public/assets/css/theme-rtl.min.css" rel="stylesheet" id="style-rtl">
    <link href="/themes/public/assets/css/theme.min.css" rel="stylesheet" id="style-default">
    <link href="/themes/public/assets/css/user-rtl.min.css" rel="stylesheet" id="user-style-rtl">
    <link href="/themes/public/assets/css/user.min.css" rel="stylesheet" id="user-style-default">
    <title> Scope Visions | Attendance List</title>
</head>

<body>
    <div class="container-fluid mt-2">
        @if (Session::has('error_message'))
            <script>
                swal("Error Message", "{{ Session::get('error_message') }}", "error", {
                    button: "Close",
                });
            </script>
        @endif
        @if (Session::has('success_message'))
            <script>
                swal("Success Message", "{{ Session::get('success_message') }}", "success", {
                    button: "Close",
                });
            </script>
        @endif
        @if ($errors->any())
            <script>
                var errorMessages = '';
                @foreach ($errors->all() as $error)
                    errorMessages += '{{ $error }}\n';
                @endforeach
                swal("Info Message", errorMessages, "info", {
                    button: "Close",
                });
            </script>
        @endif
        <div class="card">
            <div class="card-header">
                <div class="col-12">
                    <div class="row">
                        <div class="col-6">
                            <a href="{{ route('adminDashboardPage') }}" class="btn btn-outline-primary"><i
                                    class="fas fa-angle-left me-2"></i>Back</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <h2 class="text-end d-none d-md-block">Attendance List</h2>
                <h4 class="text-center d-md-none ">Attendance List</h4>
                <div class="col-12 py-2">
                    <div class="py-2 d-flex justify-content-end align-items-center">
                        {{-- <a href="{{ route('checkEmployeePresentOrAbsent') }}" class="btn btn-outline-primary"><i class="mx-2 fas fa-check"></i>Check Attendance</a> --}}
                        <a href="{{ route('addNewAttendancePage') }}" class="btn btn-outline-primary mx-2"><i
                                class="mx-2 fas fa-plus"></i>Add More</a>
                    </div>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    @if ($selectEmployees->isEmpty())
                                    @else
                                        @foreach ($selectEmployees as $selectEmployeess)
                                        @endforeach
                                        @if (\DB::table('attendance_employees')->where('id', '=', $selectEmployeess->id)->whereNotNull('clockOutDate')->count() > 0)
                                            <th class="d-md-table-cell" scope="col"
                                                style="width: 20%;text-align:center">
                                                <p class="largeScreen d-none d-md-inline">Date</p>
                                                <p class="mediumScreen d-md-none" style="font-size:12px">Date</p>
                                            </th>
                                            <th class="d-md-table-cell" scope="col"
                                                style="width: 20%;text-align:center">
                                                <p class="largeScreen d-none d-md-inline">Employee</p>
                                                <p class="mediumScreen d-md-none" style="font-size:12px">Employee</p>

                                            </th>
                                            <th class="d-md-table-cell" scope="col"
                                                style="width: 20%;text-align:center">
                                                <p class="largeScreen d-none d-md-inline">Clock In</p>
                                                <p class="mediumScreen d-md-none" style="font-size:12px">Clock In</p>

                                            </th>
                                            <th class="d-md-table-cell" scope="col"
                                                style="width: 20%;text-align:center">
                                                <p class="largeScreen d-none d-md-inline">Clock Out</p>
                                                <p class="mediumScreen d-md-none" style="font-size:12px">Clock Out</p>

                                            </th>
                                            <th class="d-md-table-cell" scope="col"
                                                style="width: 20%;text-align:center">
                                                <p class="largeScreen d-none d-md-inline">Late Time</p>
                                                <p class="mediumScreen d-md-none" style="font-size:12px">Late Time</p>

                                            </th>
                                        @else
                                            <th class="d-md-table-cell" scope="col"
                                                style="width: 15%;text-align:center">
                                                <p class="largeScreen d-none d-md-inline">Date</p>
                                                <p class="mediumScreen d-md-none" style="font-size:12px">Date</p>

                                            </th>
                                            <th class="d-md-table-cell" scope="col"
                                                style="width: 35%;text-align:center">
                                                <p class="largeScreen d-none d-md-inline">Employee</p>
                                                <p class="mediumScreen d-md-none" style="font-size:12px">Employee</p>

                                            </th>
                                            <th class="d-md-table-cell" scope="col"
                                                style="width: 15%;text-align:center">
                                                <p class="largeScreen d-none d-md-inline">Clock In</p>
                                                <p class="mediumScreen d-md-none" style="font-size:12px">Clock In</p>

                                            </th>
                                            <th class="d-md-table-cell" scope="col"
                                                style="width: 15%;text-align:center">
                                                <p class="largeScreen d-none d-md-inline">Clock Out</p>
                                                <p class="mediumScreen d-md-none" style="font-size:12px">Clock Out</p>

                                            </th>
                                            <th class="d-md-table-cell" scope="col"
                                                style="width: 20%;text-align:center">
                                                <p class="largeScreen d-none d-md-inline">Late Time</p>
                                                <p class="mediumScreen d-md-none" style="font-size:12px">Late Time</p>

                                            </th>
                                            <th class="d-md-table-cell" scope="col"
                                                style="width: 5%;text-align:center">
                                                <p class="largeScreen d-none d-md-inline">Menu</p>
                                                <p class="mediumScreen d-md-none" style="font-size:12px">Menu</p>

                                            </th>
                                        @endif
                                    @endif
                                </tr>
                            </thead>
                            @if ($selectEmployees->isEmpty())
                            @else
                                <tbody id="clientData">
                                    <div id="total_records">
                                        @foreach ($selectEmployees as $selectEmployeess)
                                            <tr>
                                                @if (\DB::table('attendance_employees')->where('id', '=', $selectEmployeess->id)->whereNotNull('clockOutDate')->count() > 0)
                                                    <td class="d-md-table-cell" style="width: 20%;text-align:center">
                                                        <p class="largeScreen d-none d-md-inline">
                                                            {{ \Carbon\Carbon::parse($selectEmployeess->clockInDate)->format('M d, Y') }}
                                                        </p>
                                                        <p class="mediumScreen d-md-none" style="font-size:12px">
                                                            {{ \Carbon\Carbon::parse($selectEmployeess->clockInDate)->format('M d, Y') }}
                                                        </p>

                                                    </td>
                                                    <td class="d-md-table-cell" style="width: 20%;text-align:center">
                                                        <p class="largeScreen d-none d-md-inline">
                                                            {{ $selectEmployeess->employeename }}</p>
                                                        <p class="mediumScreen d-md-none" style="font-size:12px">
                                                            {{ $selectEmployeess->employeename }}
                                                        </p>

                                                    </td>
                                                    <td class="d-md-table-cell" style="width: 20%;text-align:center">
                                                        <p class="largeScreen d-none d-md-inline">
                                                            {{ \Carbon\Carbon::parse($selectEmployeess->clockInTime)->format('h:i A') }}
                                                        </p>
                                                        <p class="mediumScreen d-md-none" style="font-size:12px">
                                                            {{ \Carbon\Carbon::parse($selectEmployeess->clockInTime)->format('h:i A') }}
                                                        </p>

                                                    </td>
                                                    <td class="d-md-table-cell" style="width: 20%;text-align:center">
                                                        @if (empty($selectEmployeess->clockOutTime))
                                                        @else
                                                            <p class="largeScreen d-none d-md-inline">
                                                                {{ \Carbon\Carbon::parse($selectEmployeess->clockOutTime)->format('h:i A') }}
                                                            </p>
                                                            <p class="mediumScreen d-md-none" style="font-size:12px">
                                                                {{ \Carbon\Carbon::parse($selectEmployeess->clockOutTime)->format('h:i A') }}
                                                            </p>
                                                        @endif
                                                    </td>
                                                    <td class="d-md-table-cell" style="width: 20%;text-align:center">
                                                        <p class="largeScreen d-none d-md-inline">
                                                            {{ $selectEmployeess->lateTime }}</p>
                                                        <p class="mediumScreen d-md-none" style="font-size:12px">
                                                            {{ $selectEmployeess->lateTime }}
                                                        </p>

                                                    </td>
                                                @else
                                                    <td class="d-md-table-cell" style="width: 15%;text-align:center">
                                                        <p class="largeScreen d-none d-md-inline">
                                                            {{ \Carbon\Carbon::parse($selectEmployeess->clockInDate)->format('M d, Y') }}
                                                        </p>
                                                        <p class="mediumScreen d-md-none" style="font-size:12px">
                                                            {{ \Carbon\Carbon::parse($selectEmployeess->clockInDate)->format('M d, Y') }}
                                                        </p>

                                                    </td>
                                                    <td class="d-md-table-cell" style="width: 35%;text-align:center">
                                                        <p class="largeScreen d-none d-md-inline">
                                                            {{ $selectEmployeess->employeename }}</p>
                                                        <p class="mediumScreen d-md-none" style="font-size:12px">
                                                            {{ $selectEmployeess->employeename }}
                                                        </p>

                                                    </td>
                                                    <td class="d-md-table-cell" style="width: 15%;text-align:center">
                                                        <p class="largeScreen d-none d-md-inline">
                                                            {{ \Carbon\Carbon::parse($selectEmployeess->clockInTime)->format('h:i A') }}
                                                        </p>
                                                        <p class="mediumScreen d-md-none" style="font-size:12px">
                                                            {{ \Carbon\Carbon::parse($selectEmployeess->clockInTime)->format('h:i A') }}
                                                        </p>

                                                    </td>
                                                    <td class="d-md-table-cell" style="width: 15%;text-align:center">
                                                        @if (empty($selectEmployeess->clockOutTime))
                                                        @else
                                                            <p class="largeScreen d-none d-md-inline">
                                                                {{ \Carbon\Carbon::parse($selectEmployeess->clockOutTime)->format('h:i A') }}
                                                            </p>
                                                            <p class="mediumScreen d-md-none" style="font-size:12px">
                                                                {{ \Carbon\Carbon::parse($selectEmployeess->clockOutTime)->format('h:i A') }}
                                                            </p>
                                                        @endif
                                                    </td>
                                                    <td class="d-md-table-cell" style="width: 20%;text-align:center">
                                                        <p class="largeScreen d-none d-md-inline">
                                                            {{ $selectEmployeess->lateTime }}</p>
                                                        <p class="mediumScreen d-md-none" style="font-size:12px">
                                                            {{ $selectEmployeess->lateTime }}
                                                        </p>

                                                    </td>
                                                    <td class="d-md-table-cell" style="width: 5%;text-align:center">
                                                        <div class="d-flex justify-content-center align-items-center">
                                                            <div class="row">
                                                                <div class="col-12">
                                                                    <p class="largeScreen d-none d-md-inline"><a
                                                                            href="#"
                                                                            class="action-icon dropdown-toggle text-black"
                                                                            data-bs-toggle="dropdown"
                                                                            aria-expanded="false"><i
                                                                                class="fas fa-bars"></i></a></p>
                                                                    <p class="mediumScreen d-md-none"
                                                                        style="font-size:12px"><a href="#"
                                                                            class="action-icon dropdown-toggle text-black"
                                                                            data-bs-toggle="dropdown"
                                                                            aria-expanded="false"><i
                                                                                class="fas fa-bars"></i></a></p>
                                                                    <div class="dropdown-menu dropdown-menu-right"
                                                                        style="">
                                                                        <a class="dropdown-item"
                                                                            href="{{ route('attendanceEditPage', $selectEmployeess->id) }}"><i
                                                                                class="fas fa-edit mx-2"></i> Edit</a>
                                                                        <a class="dropdown-item"
                                                                            href="{{ route('removeAttendanceDetails', $selectEmployeess->id) }}"><i
                                                                                class="fas fa-trash mx-2"></i>
                                                                            Delete</a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </td>
                                                @endif

                                            </tr>
                                        @endforeach
                                    </div>
                                </tbody>
                            @endif
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="exampleModalLabel">Select Stock Type</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="d-flex justify-content-center align-items-center">
                            <div class="d-flex mx-1">
                                <a href="{{ route('createStockScopesPartsPage') }}"
                                    class="btn btn-outline-primary">New Stock For Repairing Parts</a>
                            </div>
                            <div class="d-flex mx-1">
                                <a href="{{ route('createStockOtherPage') }}" class="btn btn-outline-primary">New
                                    Stock For Other Items</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="/themes/public/vendors/popper/popper.min.js"></script>
    <script src="/themes/public/vendors/bootstrap/bootstrap.min.js"></script>
    <script src="/themes/public/vendors/anchorjs/anchor.min.js"></script>
    <script src="/themes/public/vendors/is/is.min.js"></script>
    <script src="/themes/public/vendors/echarts/echarts.min.js"></script>
    <script src="/themes/public/vendors/fontawesome/all.min.js"></script>
    <script src="/themes/public/vendors/lodash/lodash.min.js"></script>
    <script src="https://polyfill.io/v3/polyfill.min.js?features=window.scroll"></script>
    <script src="/themes/public/vendors/list.js/list.min.js"></script>
    <script src="/themes/public/assets/js/theme.js"></script>
    <script src="/jquery-3.7.1.min.js"></script>
</body>

</html>
