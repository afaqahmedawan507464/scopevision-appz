<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="theme-color" content="#ffffff">
    <script src="/themes/public/assets/js/config.js"></script>
    <script src="/themes/public/vendors/overlayscrollbars/OverlayScrollbars.min.js"></script>


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
    <title>Scope Visions | Details Stock</title>
</head>

<body>
    <div class="container mt-2">

        @if (Session::has('error_message'))
            <div class="alert alert-danger alert-dismissible fade show px-4 d-flex justify-content-center flex-column"
                role="alert">
                <strong>Error</strong> {{ Session::get('error_message') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        @if (Session::has('success_message'))
            <div class="alert alert-success alert-dismissible fade show px-4 d-flex justify-content-center flex-column"
                role="alert">
                <strong>Success:</strong> {{ Session::get('success_message') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        @if ($errors->any())
            <div class="alert alert-danger alert-dismissible fade show px-4 d-flex justify-content-center flex-column"
                role="alert">
                @foreach ($errors->all() as $item)
                    <li style="list-style: none">{{ $item }}</li>
                @endforeach
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <div class="card">
            <div class="card-header">
                <div class="col-12">
                    <div class="row">
                        @foreach ($selectData as $selectDatas)
                        @endforeach
                        {{-- <div class="col-6">
                            <a href="{{ route('partListPage') }}" class="btn btn-outline-primary"><i class="fas fa-angle-left me-2"></i>Back</a>
                        </div> --}}
                        <div class="col-12">
                            @if (!empty($selectDatas->incoming_report_ids))
                                <h2 class="text-end d-none d-md-block">View Detail for scopes</h2>
                                <h4 class="text-center d-md-none ">View Detail for scopes</h4>
                            @else
                                @if (!empty($selectDatas->item_batchNo))
                                    <h2 class="text-end d-none d-md-block">View Detail for disposible items</h2>
                                    <h4 class="text-center d-md-none ">View Detail for disposible items</h4>
                                @else
                                    @if (!empty($selectDatas->item_companyname))
                                        <h2 class="text-end d-none d-md-block">View Detail for others</h2>
                                        <h4 class="text-center d-md-none ">View Detail for others</h4>
                                    @else
                                        <h2 class="text-end d-none d-md-block">View Detail for parts</h2>
                                        <h4 class="text-center d-md-none ">View Detail for parts</h4>
                                    @endif
                                @endif
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body">
                @if ($selectData->isEmpty())
                @else
                    @if (!empty($selectDatas->incoming_report_ids))
                        <div class="col-md-10 py-2 px-2">
                            <div class="row px-2 py-2">
                                <div class="col-12">
                                    <div class="d-md-flex flex-md-row align-items-md-start py-2">
                                        <label class="lable1 text-end mx-2 mt-1 d-none d-md-inline" for=""
                                            style="width:300px;">Item Description:</label>
                                        <label class="lable2 text-start mx-2 mt-1  d-md-none " for="">Item
                                            Description
                                            :</label>
                                        <input type="text" class="form-control" placeholder="Ex, Scope"
                                            name="itemDetails" value="{{ $selectDatas->item_name }}" disabled>
                                    </div>
                                </div>
                                {{--  --}}
                                <div class="col-12">
                                    <div class="d-md-flex flex-md-row align-items-md-start py-2">
                                        <label class="lable1 text-end mx-2 mt-1 d-none d-md-inline" for=""
                                            style="width:300px;">Quantity:</label>
                                        <label class="lable2 text-start mx-2 mt-1  d-md-none " for="">Quantity
                                            :</label>
                                        <input type="text" class="form-control" placeholder="Ex, 123465"
                                            name="itemQuantity" value="{{ $selectDatas->item_qtv }}" disabled>
                                    </div>
                                </div>
                                {{--  --}}
                                <div class="col-12">
                                    <div class="d-md-flex flex-md-row align-items-md-start py-2">
                                        <label class="lable1 text-end mx-2 mt-1 d-none d-md-inline" for=""
                                            style="width:300px;">Serial Number:</label>
                                        <label class="lable2 text-start mx-2 mt-1  d-md-none " for="">Serial
                                            Number
                                            :</label>
                                        <input type="text" class="form-control" placeholder="Ex, 12345678"
                                            name="itemSerialNo" value="{{ $selectDatas->item_srno }}" disabled>
                                    </div>
                                </div>
                                {{--  --}}
                                <div class="col-12">
                                    <div class="d-md-flex flex-md-row align-items-md-start py-2">
                                        <label class="lable1 text-end mx-2 mt-1 d-none d-md-inline" for=""
                                            style="width:300px;">Model Number:</label>
                                        <label class="lable2 text-start mx-2 mt-1  d-md-none " for="">Model
                                            Number
                                            :</label>
                                        <input type="text" class="form-control" placeholder="Ex, cf-140L"
                                            name="itemModel" value="{{ $selectDatas->item_model }}" disabled>
                                    </div>
                                </div>
                                {{--  --}}
                                <div class="col-12">
                                    <div class="d-md-flex flex-md-row align-items-md-start py-2">
                                        <label class="lable1 text-end mx-2 mt-1 d-none d-md-inline" for=""
                                            style="width:300px;">Incoming Date:</label>
                                        <label class="lable2 text-start mx-2 mt-1  d-md-none " for="">Incoming
                                            Date
                                            :</label>
                                        <input type="date" class="form-control" placeholder="Ex, 0000-00-00"
                                            name="itemIncomingDate" value="{{ $selectDatas->item_incomingdate }}"
                                            disabled>
                                    </div>
                                </div>
                                {{--  --}}
                            </div>
                        </div>
                    @else
                        @if (!empty($selectDatas->item_batchNo))
                            <div class="col-md-10 py-2 px-2">
                                <div class="row px-2 py-2">
                                    <div class="col-12">
                                        <div class="d-md-flex flex-md-row align-items-md-start py-2">
                                            <label class="lable1 text-end mx-2 mt-1 d-none d-md-inline" for=""
                                                style="width:300px;">Item Name:</label>
                                            <label class="lable2 text-start mx-2 mt-1  d-md-none " for="">Item
                                                Name
                                                :</label>
                                            <input type="text" class="form-control" placeholder="Ex, item name"
                                                name="itemDescription" value="{{ $selectDatas->item_name }}" disabled>
                                        </div>
                                    </div>
                                    {{--  --}}
                                    <div class="col-12">
                                        <div class="d-md-flex flex-md-row align-items-md-start py-2">
                                            <label class="lable1 text-end mx-2 mt-1 d-none d-md-inline" for=""
                                                style="width:300px;">Quantity:</label>
                                            <label class="lable2 text-start mx-2 mt-1  d-md-none "
                                                for="">Quantity
                                                :</label>
                                            <input type="text" class="form-control" placeholder="Ex, 123465"
                                                name="itemQuantity" value="{{ $selectDatas->item_qtv }}" disabled>
                                        </div>
                                    </div>
                                    {{--  --}}
                                    @if (empty($selectDatas->size))
                                    @else
                                        <div class="col-12">
                                            <div class="d-md-flex flex-md-row align-items-md-start py-2">
                                                <label class="lable1 text-end mx-2 mt-1 d-none d-md-inline"
                                                    for="" style="width:300px;">Sizes:</label>
                                                <label class="lable2 text-start mx-2 mt-1  d-md-none "
                                                    for="">Sizes
                                                    :</label>
                                                <input type="text" class="form-control" placeholder="Ex, 2mm"
                                                    name="itemSizes" value="{{ $selectDatas->size }}" disabled>
                                            </div>
                                        </div>
                                    @endif
                                    {{--  --}}
                                    <div class="col-12">
                                        <div class="d-md-flex flex-md-row align-items-md-start py-2">
                                            <label class="lable1 text-end mx-2 mt-1 d-none d-md-inline" for=""
                                                style="width:300px;">Item Batch Number:</label>
                                            <label class="lable2 text-start mx-2 mt-1  d-md-none " for="">Item
                                                Batch Number
                                                :</label>
                                            <input type="text" class="form-control" placeholder="Ex, abc123"
                                                name="itemBatchNo" value="{{ $selectDatas->item_batchNo }}" disabled>
                                        </div>
                                    </div>
                                    {{--  --}}
                                    <div class="col-12">
                                        <div class="d-md-flex flex-md-row align-items-md-start py-2">
                                            <label class="lable1 text-end mx-2 mt-1 d-none d-md-inline" for=""
                                                style="width:300px;">Item Expire Date:</label>
                                            <label class="lable2 text-start mx-2 mt-1  d-md-none " for="">Item
                                                Expire Date
                                                :</label>
                                            <input type="date" class="form-control" placeholder="Ex, 0000 00 00"
                                                name="itemExpDate" value="{{ $selectDatas->item_expDate }}" disabled>
                                        </div>
                                    </div>
                                    {{--  --}}
                                    <div class="col-12">
                                        <div class="d-md-flex flex-md-row align-items-md-start py-2">
                                            <label class="lable1 text-end mx-2 mt-1 d-none d-md-inline" for=""
                                                style="width:300px;">Incoming Date:</label>
                                            <label class="lable2 text-start mx-2 mt-1  d-md-none "
                                                for="">Incoming Date
                                                :</label>
                                            <input type="date" class="form-control" placeholder="Ex, 0000-00-00"
                                                name="itemIncomingDate" value="{{ $selectDatas->item_incomingdate }}"
                                                disabled>
                                        </div>
                                    </div>
                                    {{--  --}}
                                </div>
                            </div>
                        @else
                            @if (!empty($selectDatas->item_companyname))
                                <div class="col-md-10 py-2 px-2">
                                    <div class="row px-2 py-2">
                                        <div class="col-12">
                                            <div class="d-md-flex flex-md-row align-items-md-start py-2">
                                                <label class="lable1 text-end mx-2 mt-1 d-none d-md-inline"
                                                    for="" style="width:300px;">Item Description:</label>
                                                <label class="lable2 text-start mx-2 mt-1  d-md-none "
                                                    for="">Item Description
                                                    :</label>
                                                <input type="text" class="form-control"
                                                    placeholder="Ex, Washer , Light source" name="itemDetails"
                                                    value="{{ $selectDatas->item_name }}" disabled>
                                            </div>
                                        </div>
                                        {{--  --}}
                                        <div class="col-12">
                                            <div class="d-md-flex flex-md-row align-items-md-start py-2">
                                                <label class="lable1 text-end mx-2 mt-1 d-none d-md-inline"
                                                    for="" style="width:300px;">Quantity:</label>
                                                <label class="lable2 text-start mx-2 mt-1  d-md-none "
                                                    for="">Quantity
                                                    :</label>
                                                <input type="text" class="form-control" placeholder="Ex, 123465"
                                                    name="itemQuantity" value="{{ $selectDatas->item_qtv }}"
                                                    disabled>
                                            </div>
                                        </div>
                                        {{--  --}}
                                        <div class="col-12">
                                            <div class="d-md-flex flex-md-row align-items-md-start py-2">
                                                <label class="lable1 text-end mx-2 mt-1 d-none d-md-inline"
                                                    for="" style="width:300px;">Serial Number:</label>
                                                <label class="lable2 text-start mx-2 mt-1  d-md-none "
                                                    for="">Serial Number
                                                    :</label>
                                                <input type="text" class="form-control" placeholder="Ex, 12345678"
                                                    name="itemSerialNo" value="{{ $selectDatas->item_srno }}"
                                                    disabled>
                                            </div>
                                        </div>
                                        {{--  --}}
                                        <div class="col-12">
                                            <div class="d-md-flex flex-md-row align-items-md-start py-2">
                                                <label class="lable1 text-end mx-2 mt-1 d-none d-md-inline"
                                                    for="" style="width:300px;">Model Number:</label>
                                                <label class="lable2 text-start mx-2 mt-1  d-md-none "
                                                    for="">Model Number
                                                    :</label>
                                                <input type="text" class="form-control" placeholder="Ex, cf-140L"
                                                    name="itemModel" value="{{ $selectDatas->item_model }}" disabled>
                                            </div>
                                        </div>
                                        {{--  --}}
                                        <div class="col-12">
                                            <div class="d-md-flex flex-md-row align-items-md-start py-2">
                                                <label class="lable1 text-end mx-2 mt-1 d-none d-md-inline"
                                                    for="" style="width:300px;">Incoming Date:</label>
                                                <label class="lable2 text-start mx-2 mt-1  d-md-none "
                                                    for="">Incoming Date
                                                    :</label>
                                                <input type="date" class="form-control"
                                                    placeholder="Ex, 0000-00-00" name="itemIncomingDate"
                                                    value="{{ $selectDatas->item_incomingdate }}" disabled>
                                            </div>
                                        </div>
                                        {{--  --}}
                                        {{--  --}}
                                        <div class="col-12">
                                            <div class="d-md-flex flex-md-row align-items-md-start py-2">
                                                <label class="lable1 text-end mx-2 mt-1 d-none d-md-inline"
                                                    for="" style="width:300px;">Company Name:</label>
                                                <label class="lable2 text-start mx-2 mt-1  d-md-none "
                                                    for="">Company Name
                                                    :</label>
                                                <input type="text" class="form-control"
                                                    placeholder="Ex, demo company" name="itemCompanyName"
                                                    value="{{ $selectDatas->item_companyname }}" disabled>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @else
                                <div class="col-md-10 py-2 px-2">
                                    <div class="row px-2 py-2">
                                        <div class="col-12">
                                            <div class="d-md-flex flex-md-row align-items-md-start py-2">
                                                <label class="lable1 text-end mx-2 mt-1 d-none d-md-inline"
                                                    for="" style="width:300px;">Item Description:</label>
                                                <label class="lable2 text-start mx-2 mt-1  d-md-none "
                                                    for="">Item Description
                                                    :</label>
                                                <textarea name="itemDescription" id="itemDescription" cols="30" rows="3" class="form-control"
                                                    placeholder="Ex, demo items" disabled>{{ $selectDatas->item_name }}</textarea>
                                            </div>
                                        </div>
                                        {{--  --}}
                                        <div class="col-12">
                                            <div class="d-md-flex flex-md-row align-items-md-start py-2">
                                                <label class="lable1 text-end mx-2 mt-1 d-none d-md-inline"
                                                    for="" style="width:300px;">Quantity:</label>
                                                <label class="lable2 text-start mx-2 mt-1  d-md-none "
                                                    for="">Quantity
                                                    :</label>
                                                <input type="text" class="form-control" placeholder="Ex, 123465"
                                                    name="itemQuantity" value="{{ $selectDatas->item_qtv }}"
                                                    disabled>
                                            </div>
                                        </div>
                                        {{--  --}}
                                        @if (empty($selectDatas->size))
                                        @else
                                            <div class="col-12">
                                                <div class="d-md-flex flex-md-row align-items-md-start py-2">
                                                    <label class="lable1 text-end mx-2 mt-1 d-none d-md-inline"
                                                        for="" style="width:300px;">Sizes:</label>
                                                    <label class="lable2 text-start mx-2 mt-1  d-md-none "
                                                        for="">Sizes
                                                        :</label>
                                                    <input type="text" class="form-control" placeholder="Ex, 2mm"
                                                        name="itemSizes" value="{{ $selectDatas->size }}" disabled>
                                                </div>
                                            </div>
                                        @endif
                                        {{--  --}}
                                        <div class="col-12">
                                            <div class="d-md-flex flex-md-row align-items-md-start py-2">
                                                <label class="lable1 text-end mx-2 mt-1 d-none d-md-inline"
                                                    for="" style="width:300px;">Incoming Date:</label>
                                                <label class="lable2 text-start mx-2 mt-1  d-md-none "
                                                    for="">Incoming Date
                                                    :</label>
                                                <input type="date" class="form-control"
                                                    placeholder="Ex, 0000-00-00" name="itemIncomingDate"
                                                    value="{{ $selectDatas->item_incomingdate }}" disabled>
                                            </div>
                                        </div>
                                        {{--  --}}
                                    </div>
                                </div>
                            @endif
                        @endif
                    @endif
                @endif
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
