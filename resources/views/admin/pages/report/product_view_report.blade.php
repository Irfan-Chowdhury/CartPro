@extends('admin.main')
@section('admin_content')


<section>

    <div class="container-fluid mb-3 ml-3">
        <h2 class="font-weight-bold mt-3">Reports</h2>
        <br>
    </div>

    {{-- <div class="d-flex justify-content-between"> --}}

        <h4 class="mb-3 ml-4"> Products View Report </h4>
        <div class="table-responsive ml-3">
            <div class="row">
                <div class="col-md-8">
                    <table id="datatable1" class="table">
                        <thead>
                            <tr>
                                <th class="wd-15p">Product</th>
                                <th class="wd-15p">View</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Dell XPS 13 9380, 13.3" 4K UHD (3840X2160) Multi-Touch IPS Display, Intel Core i7-8565U</td>
                                <td>4715</td>
                            </tr>
                            <tr>
                                <td>Samsung Galaxy S20 (SM-G980F/DS) Dual SIM 128GB, 6.2" (International Version)</td>
                                <td>3959 </td>
                            </tr>
                            <tr>
                                <td>HP Spectre x360 2-in-1 15.6" 4K Ultra HD Touch-Screen Laptop, Intel i7 8th Gen</td>
                                <td>3755 </td>
                            </tr>
                            <tr>
                                <td>Long-sleeved Camisa Masculina Chemise Men Public Club Fancy Shirt</td>
                                <td>2884 </td>
                            </tr>
                            <tr>
                                <td>Apple MacBook Pro 2019 Model (13-Inch, Intel Core i5, 1.4Ghz, 8GB, 128GB)</td>
                                <td>5715</td>
                            </tr>

                        </tbody>
                    </table>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Filter</h4>
                            <form action="{{route('admin.reports.product_view_report')}}" method="get">

                                @if (isset($report_type))
                                    <input type="hidden" name="report_type" value="{{$report_type}}">
                                @endif

                                <div class="form-group mt-4">
                                    <h5 class="mt-2 card-subtitle mb-2 text-muted">Report Type</h5>
                                    <select name="report_type" class="form-control selectpicker" data-live-search="true" data-live-search-style="begins" onchange="location = this.value;">
                                        <option value="{{route('admin.reports.product_view_report')}}">Product View Report</option>
                                        <option value="{{route('admin.reports.coupon')}}">Coupon Report</option>
                                        <option value="{{route('admin.reports.customer_orders')}}">Customer Order Report</option>
                                        <option value="{{route('admin.reports.product_stock_report')}}">Product Stock Report</option>
                                        <option value="{{route('admin.reports.sales_report')}}">Sales Report</option>
                                        <option value="{{route('admin.reports.search_report')}}">Search Report</option>
                                        <option value="{{route('admin.reports.shipping_report')}}">Shpping Report</option>
                                        <option value="{{route('admin.reports.tax_report')}}">Tax Report</option>
                                        <option value="{{route('admin.reports.product_purchase_report')}}">Product Purchase Report</option>





                                    </select>
                                </div>

                                <div class="form-group mt-4">
                                    <label for="exampleInputEmail1">Product</label>
                                    <input type="text" class="form-control">
                                </div>

                                <div class="form-group mt-4">
                                    <label for="exampleInputEmail1">SKU</label>
                                    <input type="text" class="form-control">
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
