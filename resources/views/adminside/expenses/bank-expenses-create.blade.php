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
    <title>Scope Visions | New Bank Expenses</title>
</head>

<body>
    <div class="container mt-2">

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
                <h2 class="text-end d-none d-md-block">Bank Payment</h2>
                <h4 class="text-center d-md-none ">Bank Payment</h4>
                <form action="{{ route('createExpensesBankOperation') }}" method="post" class="row"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="col-md-10 py-2 px-2">
                        {{--  --}}
                        <div class="row px-2 py-2">
                            <div class="col-12">
                                <div class="d-md-flex flex-md-row align-items-md-start py-2">
                                    <label class="lable1 text-end mx-2 mt-1 d-none d-md-inline" for=""
                                        style="width:300px;">Date:</label>
                                    <label class="lable2 text-start mx-2 mt-1  d-md-none " for="">Date
                                        :</label>
                                    <input type="date" class="form-control" placeholder="Ex, 12-12-0000"
                                        name="expenseDate">
                                </div>
                            </div>
                            {{--  --}}
                        </div>
                        {{--  --}}
                        <div id="add_form">
                            <div id="show_items15">
                                <div class="row px-2 py-2">
                                    <div class="col-12 py-2">
                                        <div class="row">
                                            <div class="col-12 d-flex justify-content-end align-items-center">
                                                <button class="btn btn-outline-primary add_item_btn15"><i
                                                        class="mx-2 fas fa-plus"></i>Add More</button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="d-md-flex flex-md-row align-items-md-start py-2">
                                            <label class="lable1 text-end mx-2 mt-1 d-none d-md-inline" for=""
                                                style="width:300px;">Received From:</label>
                                            <label class="lable2 text-start mx-2 mt-1  d-md-none "
                                                for="">Received From
                                                :</label>
                                            <input type="text" class="form-control"
                                                placeholder="Ex, demo person name" name="expensePersonName[]">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="d-md-flex flex-md-row align-items-md-start py-2">
                                            <label class="lable1 text-end mx-2 mt-1 d-none d-md-inline" for=""
                                                style="width:300px;">Amount:</label>
                                            <label class="lable2 text-start mx-2 mt-1  d-md-none " for="">Amount
                                                :</label>
                                            <input type="text" class="form-control" placeholder="Ex, 132"
                                                name="expenseAmount[]">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="d-md-flex flex-md-row align-items-md-start py-2">
                                            <label class="lable1 text-end mx-2 mt-1 d-none d-md-inline" for=""
                                                style="width:300px;">Payment:</label>
                                            <label class="lable2 text-start mx-2 mt-1  d-md-none "
                                                for="">Payment
                                                :</label>
                                            <select name="expenseType[]" id="expenseType" class="form-control">
                                                <option value="">Select Payment</option>
                                                <option value="1">Payment Send</option>
                                                <option value="2">Payment Received</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="d-md-flex flex-md-row align-items-md-start py-2">
                                            <label class="lable1 text-end mx-2 mt-1 d-none d-md-inline" for=""
                                                style="width:300px;">Payment Type:</label>
                                            <label class="lable2 text-start mx-2 mt-1  d-md-none "
                                                for="">Payment Type
                                                :</label>
                                            <select name="expensePaymentType[]" id="expensePaymentType"
                                                class="form-control">
                                                <option value="">Select Payment Type</option>
                                                <option value="1">Cash Payment</option>
                                                <option value="2">Online Payment</option>
                                                {{-- <option value="3">Payment Through Check</option> --}}
                                            </select>
                                        </div>
                                    </div>
                                    {{--  --}}
                                    <div class="col-12">
                                        <div class="d-md-flex flex-md-row align-items-md-start py-2">
                                            <label class="lable1 text-end mx-2 mt-1 d-none d-md-inline" for=""
                                                style="width:300px;">Bank Name:</label>
                                            <label class="lable2 text-start mx-2 mt-1  d-md-none " for="">Bank
                                                Name
                                                :</label>
                                            <input type="text" class="form-control"
                                                placeholder="Ex, demo bank name" name="expenseBankName[]">
                                        </div>
                                    </div>
                                    {{--  --}}
                                    <div class="col-12">
                                        <div class="d-md-flex flex-md-row align-items-md-start py-2">
                                            <label class="lable1 text-end mx-2 mt-1 d-none d-md-inline" for=""
                                                style="width:300px;">Account Number:</label>
                                            <label class="lable2 text-start mx-2 mt-1  d-md-none "
                                                for="">Account Number
                                                :</label>
                                            <input type="text" class="form-control" placeholder="Ex, 123465"
                                                name="expenseBankAccountNumber[]">
                                        </div>
                                    </div>
                                    {{--  --}}
                                    <div class="col-12 d-none">
                                        <div class="d-md-flex flex-md-row align-items-md-start py-2">
                                            <label class="lable1 text-end mx-2 mt-1 d-none d-md-inline" for=""
                                                style="width:300px;">Check Number:</label>
                                            <label class="lable2 text-start mx-2 mt-1  d-md-none "
                                                for="">Check Number
                                                :</label>
                                            <input type="text" class="form-control" placeholder="Ex, 123465"
                                                name="expenseCheckNumber[]">
                                        </div>
                                    </div>
                                    {{--  --}}
                                    <div class="col-12">
                                        <div class="d-md-flex flex-md-row align-items-md-start py-2">
                                            <label class="lable1 text-end mx-2 mt-1 d-none d-md-inline" for=""
                                                style="width:300px;">Transection Id:</label>
                                            <label class="lable2 text-start mx-2 mt-1  d-md-none "
                                                for="">Transection Id
                                                :</label>
                                            <input type="text" class="form-control" placeholder="Ex, 123465"
                                                name="expenseTransectionId[]">
                                        </div>
                                    </div>
                                    {{--  --}}
                                </div>
                            </div>
                        </div>
                        {{--  --}}
                    </div>
                    <div class="col-12">
                        <button type="submit" class="btn btn-outline-primary">Save</button>
                    </div>
                </form>
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
    <script src="/custom.js"></script>
</body>

</html>
