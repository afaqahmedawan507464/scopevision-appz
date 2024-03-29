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
    <title>Scope Visions | Edit Company</title>
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
                            <a href="{{ route('companyNameList') }}" class="btn btn-outline-primary"><i
                                    class="fas fa-angle-left me-2"></i>Back</a>
                        </div>
                        <div class="col-6">
                            <h2 class="text-end">Update Company Form</h2>
                        </div>
                    </div>
                </div>
            </div>
            @foreach ($selectCompanyes as $selectCompany)
            @endforeach
            <div class="card-body">
                <form action="{{ route('updateCompanyOperation', $selectCompany->id) }}" method="post" class="row"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="d-flex justify-content-center align-items-center py-2">
                        <img src="{{ $selectCompany->company_logo }}" alt=""
                            style="width: 200px;height:200px;border-radius:50%;">
                    </div>
                    <div class="col-10 py-2 px-2">
                        <div class="row px-2 py-2">
                            <div class="col-12">
                                <div class="d-flex justify-content-center align-items-center py-2">
                                    <label class="text-end mx-2 mt-1" for="" style="width:300px;">Company
                                        Name:</label>
                                    <input type="text" class="form-control" placeholder="Ex, demo campany"
                                        name="companyName" value="{{ $selectCompany->company_name }}">
                                </div>
                            </div>
                            {{--  --}}
                            <div class="col-12">
                                <div class="d-flex justify-content-center align-items-center py-2">
                                    <label class="text-end mx-2 mt-1" for="" style="width:300px;">Company
                                        Logo:</label>
                                    <input type="file" class="form-control" placeholder="Ex, demo campany"
                                        name="companyLogo">
                                </div>
                            </div>
                            {{--  --}}
                            <div class="col-12">
                                <div class="d-flex justify-content-center align-items-center py-2">
                                    <label class="text-end mx-2 mt-1" for="" style="width:300px;">Company Email
                                        Address:</label>
                                    <input type="email" class="form-control" placeholder="Ex, abc@abc.com"
                                        name="companyEmailAddress" value="{{ $selectCompany->company_emailaddress }}">
                                </div>
                            </div>
                            {{--  --}}
                            <div class="col-12">
                                <div class="d-flex justify-content-center align-items-center py-2">
                                    <label class="text-end mx-2 mt-1" for="" style="width:300px;">Company
                                        Contact Number:</label>
                                    <input type="text" class="form-control" placeholder="Ex, 0092 3010000000"
                                        name="companyContactNumber" value="{{ $selectCompany->company_contactnumber }}">
                                </div>
                            </div>
                            {{--  --}}
                            <div class="col-12">
                                <div class="d-flex justify-content-center align-items-center py-2">
                                    <label class="text-end mx-2 mt-1" for="" style="width:300px;">Company Phone
                                        Number:</label>
                                    <input type="text" class="form-control" placeholder="Ex, 051 1234567"
                                        name="companyPhoneNumber" value="{{ $selectCompany->company_phonenumber }}">
                                </div>
                            </div>
                            {{--  --}}
                            <div class="col-12">
                                <div class="d-flex justify-content-center align-items-center py-2">
                                    <label class="text-end mx-2 mt-1" for="" style="width:300px;">Company
                                        Owner Name:</label>
                                    <input type="text" class="form-control" placeholder="Ex, Abc"
                                        name="companyOwnerName" value="{{ $selectCompany->company_ownername }}">
                                </div>
                            </div>
                            {{--  --}}
                            <div class="col-12">
                                <div class="d-flex justify-content-center align-items-center py-2">
                                    <label class="text-end mx-2 mt-1" for="" style="width:300px;">Company NTN
                                        Number:</label>
                                    <input type="text" class="form-control" placeholder="Ex, 123abc"
                                        name="companyNTNNumber" value="{{ $selectCompany->company_ntnnumber }}">
                                </div>
                            </div>
                            {{--  --}}
                            <div class="col-12">
                                <div class="d-flex justify-content-center align-items-center py-2">
                                    <label class="text-end mx-2 mt-1" for="" style="width:300px;">Company
                                        Timing ( To ):</label>
                                    <input type="text" class="form-control" placeholder="Ex, HH:MM:SS"
                                        name="companyOpenTiming" value="{{ $selectCompany->companyTimeIn }}">
                                </div>
                            </div>
                            {{--  --}}
                            <div class="col-12">
                                <div class="d-flex justify-content-center align-items-center py-2">
                                    <label class="text-end mx-2 mt-1" for="" style="width:300px;">Company
                                        Timing ( From ):</label>
                                    <input type="text" class="form-control" placeholder="Ex, HH:MM:II"
                                        name="companyCloseTiming" value="{{ $selectCompany->companyTimeOut }}">
                                </div>
                            </div>
                            {{--  --}}
                            <div class="col-12">
                                <div class="d-flex justify-content-center align-items-start py-2">
                                    <label class="text-end mx-2 mt-1" for="" style="width:300px;">Company
                                        Address:</label>
                                    <textarea name="companyAddress" id="companyAddress" cols="30" rows="5" class="form-control"
                                        placeholder="Ex, Taxila punjab pakistan">{{ $selectCompany->company_address }}</textarea>
                                </div>
                            </div>
                            {{--  --}}
                            <div class="col-12">
                                <div class="d-flex justify-content-center align-items-start py-2">
                                    <label class="text-end mx-2 mt-1" for="" style="width:300px;">Company
                                        Working Short Information:</label>
                                    <textarea name="companyWorkInformation" id="companyWorkInformation" cols="30" rows="5"
                                        class="form-control" placeholder="Ex, Company Working Details">{{ $selectCompany->company_workDetails }}</textarea>
                                </div>
                            </div>
                            {{--  --}}
                        </div>
                    </div>
                    <div class="col-12">
                        <button type="submit" class="btn btn-outline-primary">Update</button>
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
