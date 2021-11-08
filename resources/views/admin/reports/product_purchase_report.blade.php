@extends('admin.main')
@section('admin_content')


<section>

    <div class="container-fluid mb-3 ml-3">
        <h2 class="font-weight-bold mt-3">Reports</h2>
        <br>
    </div>

    {{-- <div class="d-flex justify-content-between"> --}}

        <h4 class="mb-3 ml-4">Product Purchase Report</h4>
        <div class="table-responsive ml-3">
            <div class="row">
                <div class="col-md-8">
                    <table id="datatable1" class="table">
                        <thead>
                            <tr>
                                <th class="wd-15p">Product</th>
                                <th class="wd-15p">Qty</th>
                                <th class="wd-15p">Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Apple MacBook Pro 2019 Model (13-Inch, Intel Core i5, 1.4Ghz, 8GB, 128GB)</td>
                                <td>117</td>
                                <td>$177,125.60</td>
                            </tr>
                            <tr>
                                <td>Oneplus 7 Pro GM1910 256GB, 8GB, Dual Sim, 6.67 inch, 48MP Main Lens Triple Camera</td>
                                <td>20</td>
                                <td>$9,000.00</td>
                            </tr>
                            <tr>
                                <td>HP Spectre x360 2-in-1 15.6" 4K Ultra HD Touch-Screen Laptop, Intel i7 8th Gen</td>
                                <td>229</td>
                                <td>$297,700.00</td>
                            </tr>
                            <tr>
                                <td>Dell XPS 13 9380, 13.3" 4K UHD (3840X2160) Multi-Touch IPS Display, Intel Core i7-8565U</td>
                                <td>496</td>
                                <td>$595,031.36</td>
                            </tr>
                            <tr>
                                <td>Huawei Kepler MateBook D 14" - AMD R5 - 8GB+256GB, Mystic Silver</td>
                                <td>664</td>
                                <td>$1,063,629.25</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Filter</h4>
                            <form action="{{route('admin.reports.product_purchase_report')}}" method="get">

                                <div class="form-group mt-4">
                                    <h5 class="mt-2 card-subtitle mb-2 text-muted">Report Type</h5>
                                    <select name="report_type" class="form-control selectpicker" data-live-search="true" data-live-search-style="begins" onchange="location = this.value;">
                                        <option value="{{route('admin.reports.product_purchase_report')}}">Product Purchase Report</option>
                                        <option value="{{route('admin.reports.coupon')}}">Coupon Report</option>
                                        <option value="{{route('admin.reports.customer_orders')}}">Customer Order Report</option>
                                        <option value="{{route('admin.reports.product_stock_report')}}">Product Stock report</option>
                                        <option value="{{route('admin.reports.product_view_report')}}">Product View Report</option>
                                        <option value="{{route('admin.reports.sales_report')}}">Sales Report</option>
                                        <option value="{{route('admin.reports.search_report')}}">Search Report</option>
                                        <option value="{{route('admin.reports.shipping_report')}}">Shpping Report</option>
                                        <option value="{{route('admin.reports.tax_report')}}">Tax Report</option>
                                    </select>
                                </div>

                                <div class="form-group mt-4">
                                    <label for="exampleInputEmail1">Start Date</label>
                                    <input type="date" class="form-control datepicker" id="exampleInputEmail1" aria-describedby="emailHelp"  name="start_date">
                                </div>

                                <div class="form-group mt-4">
                                    <label for="exampleInputEmail1">End Date</label>
                                    <input type="date" class="form-control datepicker" id="exampleInputEmail1" aria-describedby="emailHelp"  name="end_date">
                                </div>


                                <div class="form-group mt-4">
                                    <h5 class="mt-4 card-subtitle mb-2 text-muted">Order Status</h5>
                                    <select name="report_type" class="form-control" >
                                        <option value="">-- Select --</option>
                                        <option value="Pending">Pending</option>
                                        <option value="Pending">Processing</option>
                                        <option value="Pending">Cancaled</option>
                                        <option value="Pending">Refund</option>
                                        <option value="Pending">Deliver</option>
                                        <option value="Pending">Pending Payment</option>
                                    </select>
                                </div>

                                <div class="form-group mt-4">
                                    <label for="exampleInputEmail1">Product</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"  name="product">
                                </div>

                                <div class="form-group mt-4">
                                    <label for="exampleInputEmail1">SKU</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"  name="sku">
                                </div>

                                <button type="submit" class="mt-4 btn btn-success">Filter</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    {{-- </div> --}}

    {{-- <div class="row">
        <div class="col-md-8"></div>
        <div class="col-md-4">
        </div>
    </div> --}}


</section>

<script>
    $(function(){
      'use strict';

      $('#datatable1').DataTable({
        responsive: true,
        language: {
          searchPlaceholder: 'Search...',
          sSearch: '',
          lengthMenu: '_MENU_ items/page',
        }
      });

      $('#datatable2').DataTable({
        bLengthChange: false,
        searching: false,
        responsive: true
      });

      // Select2
      $('.dataTables_length select').select2({ minimumResultsForSearch: Infinity });

    });
  </script>
@endsection
