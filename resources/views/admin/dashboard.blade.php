@extends('admin.layouts.template')
@section('page_title')
Admin Dashboard
@endsection
@section('content')

<div class="container-xxl flex-grow-1 container-p-y">

    <div class="row">
  <!-- Card 1: Number of Customers -->
  <div class="col-md-6 col-lg-3 mb-4">
    <div class="card">
        <div class="card-body">
          <div class="card-title">
            <h5 class="d-block mb-1 text-primary">Total Customers</h5>
          </div>
          <div class="card-content d-flex justify-content-between align-items-center">
            <div>
              <h2 class="card-text mb-2">{{ $users }} </h2>
              <small class="text-muted">Customers</small>
            </div>
            <div><i class="menu-icon tf-icons bx bx-user-circle fs-2"></i></div>
            
           
          </div>
        </div>
      </div>
  </div>

  <!-- Card 2: Number of Sales -->
  <div class="col-md-6 col-lg-3 mb-4">
    <div class="card">
        <div class="card-body">
          <div class="card-title">
            <h5 class="d-block mb-1 text-primary">Sales</h5>
          </div>
          <div class="card-content d-flex justify-content-between align-items-center">
            <div>
              <h2 class="card-text mb-2">{{ $sales }} </h2>
              <small class="text-muted">Sales</small>
              
            </div>
            <div><i class="menu-icon tf-icons bx bx-dollar fs-2"></i></div>
            
           
          </div>
        </div>
      </div>
      
  </div>

  <!-- Card 3: Number of Products -->
  <div class="col-md-6 col-lg-3 mb-4">
    <div class="card">
        <div class="card-body">
          <div class="card-title">
            <h5 class="d-block mb-1 text-primary">Total Products</h5>
          </div>
          <div class="card-content d-flex justify-content-between align-items-center">
            <div>
              <h2 class="card-text mb-2">{{ $products }} </h2>
              <small class="text-muted">Products</small>
              
            </div>
            <div> <i class="menu-icon tf-icons bx bx-box fs-2"></i></div>
           
           
          </div>
        </div>
      </div>
  </div>

  <!-- Card 4: Number of Categories -->
  <div class="col-md-6 col-lg-3 mb-4">
    <div class="card">
        <div class="card-body">
          <div class="card-title">
            <h5 class="d-block mb-1 text-primary">Total Categories</h5>
          </div>
          <div class="card-content d-flex justify-content-between align-items-center">
            <div>
              <h2 class="card-text mb-2">{{ $categories }} </h2>
              <small class="text-muted">Categories</small>
            </div>
            <div> <i class="menu-icon tf-icons bx bx-list-ul fs-2"></i></div>
          </div>
        </div>
      </div>
  </div>
</div>

    <div class="row">
      <!-- Order Statistics -->
      <div class="col-md-6 mb-4">
        <div class="card h-100">
       
          <div class="card-header d-flex align-items-center justify-content-between pb-0">
            <div class="card-title mb-0">
              <h5 class="m-0 me-2">Order Statistics</h5>
              
            </div>
           
          </div>
          <div class="card-body">
            <div class="d-flex justify-content-between align-items-center mb-3">
              <div class="d-flex flex-column align-items-center gap-1">
                <h2 class="mb-2">{{ $orders }}</h2> <small class="text-muted"> Total of orders</small>
                
              </div>
              <div id="orderStatisticsChart"></div>
            </div>
            <ul class="p-0 m-0">
                @php
                foreach ($orderCounts as $orderCount) {
                    $categoryName = $orderCount->category_name;
                    $count = $orderCount->order_count;
                @endphp

            <li class="d-flex mb-4 pb-1">
                <div class="avatar flex-shrink-0 me-3">
                    <span class="avatar-initial rounded bg-label-primary"><i class="bx bx-mobile-alt"></i></span>
                </div>
                <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                    <div class="me-2">
                        <h6 class="mb-0">{{ $categoryName }}</h6>
                        <small class="text-muted">Category Description</small>
                    </div>
                    <div class="user-progress">
                        <small class="fw-semibold">{{ $count }}</small>
                    </div>
                </div>
            </li>

            @php
                }
            @endphp
            </ul>
          </div>
        </div>
      </div>
      <!--/ Order Statistics -->


      <!-- Transactions -->
      <div class="col-md-6 mb-4">
        <div class="card h-100">
          <div class="card-header d-flex align-items-center justify-content-between">
            <h5 class="card-title m-0 me-2">Sale Statistics</h5>
          </div>
          <div class="card-body">
           <div class="row">

    <div id="chart_div" style="width: 100%; height: 500px;"></div>
</div>
          </div>
        </div>
      </div>
      <!--/ Transactions -->
    </div>
  </div>
  @push('scripts')
  <script>
    google.charts.load('current', {'packages':['corechart']});
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
      var data = google.visualization.arrayToDataTable([
        ['Year', 'Sales'],
        ['2020',  1000],
        ['2021',  1170],
        ['2022',  660],
        ['2023',  1030]
      ]);

      var options = {
        title: 'Sales in the years',
        hAxis: {title: 'Year',  titleTextStyle: {color: '#333'}},
        vAxis: {minValue: 0}
      };

      var chart = new google.visualization.AreaChart(document.getElementById('chart_div'));
      chart.draw(data, options);
    }
  </script>
  @endpush
  <!-- / Content -->
@endsection
