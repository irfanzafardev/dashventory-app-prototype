@extends('administrator.layouts.main')

@section('breadcrumb')
<nav aria-label="breadcrumb">
  <ol class="breadcrumb bg-transparent pt-4">
    <li class="breadcrumb-item text-dark" aria-current="page">
      <a href="/">
        Dashboard
      </a>
    </li>
    <li class="breadcrumb-item text-dark active" aria-current="page">
      Stock
    </li>
  </ol>
</nav>
@endsection

@section('container')
<!-- Page Heading -->
<div class="page-heading heading bg-darkblue d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-white">Daily Stock List</h1>
</div>

<ul class="nav nav-tabs" id="myTab" role="tablist">
  <li class="nav-item" role="presentation">
    <a class="nav-link py-2 px-3 active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">
      Today
    </a>
  </li>
  <li class="nav-item" role="presentation">
    <a class="nav-link py-2 px-3" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">
      All
    </a>
  </li>
</ul>
<div class="tab-content" id="myTabContent">
  <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
    <!-- DataTales Today's input -->
    <div class="card my-4">
      <div class="card-header py-3">
        <h6 class="m-0 text-dark">Latest input</h6>
      </div>
      <div class="card-body">
        @if ($message = Session::get('success'))
          <div class="alert alert-primary" role="alert">
            {{ $message }}
          </div>
        @endif
        @if (session('error'))
          <div class="alert alert-danger">
            {{ session('error') }}
          </div>
        @endif
        <a href="/administrator/stocks/create" class="btn btn-primary bg-darkblue d-none px-4 mb-3">
          Add Data
        </a>
        <div class="table-responsive">
          <table
            class="table table-bordered"
            id="dataTable"
            width="100%"
            cellspacing="0"
          >
            <thead>
              <tr>
                <th>No</th>
                <th>Transact Code</th>
                <th>Company</th>
                <th>Date</th>
                <th>Product Name</th>
                <th>UOM</th>
                <th>Qty</th>
                <th>Unit Price</th>
                <th>Value</th>
                <th>Option</th>
              </tr>
            </thead>
            <tfoot>
              <tr>
                <th>No</th>
                <th>Transact Code</th>
                <th>Company</th>
                <th>Date</th>
                <th>Product Name</th>
                <th>UOM</th>
                <th>Qty</th>
                <th>Unit Price</th>
                <th>Value</th>
                <th>Option</th>
              </tr>
            </tfoot>
            <tbody>
              @foreach ($stocks as $stock)
              <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $stock->stock_code }}</td>
                <td>{{ $stock->company }}</td>
                <td>{{ $stock->date }}</td>
                <td>{{ $stock->product->product_name }}</td>
                <td>{{ $stock->product->unit->unit_symbol }}</td>
                <td>{{ number_format($stock->quantity, 0)}}</td>
                <td>Rp. {{ number_format($stock->product->unit_price, 2) }}</td>
                <td>Rp. {{ number_format($stock->value, 2) }}</td>
                <td>
                  <a href="/administrator/stocks/{{ $stock->id }}/edit">Edit</a>
                  <a href="#" class="deleteStockIn text-danger" data-id="{{ $stock->id }}" data-name="{{ $stock->product->product_name }}">Delete</a>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
  <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
    <!-- DataTales Today's input -->
    <div class="card my-4">
      <div class="card-header py-3">
        <h6 class="m-0 text-dark">All input</h6>
      </div>
      <div class="card-body">
        @if ($message = Session::get('success'))
          <div class="alert alert-primary" role="alert">
            {{ $message }}
          </div>
        @endif
        @if (session('error'))
          <div class="alert alert-danger">
            {{ session('error') }}
          </div>
        @endif
        <div class="table-responsive">
          <table
            class="table table-bordered display"
            id="dataTable"
            width="100%"
            cellspacing="0"
          >
            <thead>
              <tr>
                <th>No</th>
                <th>Transact Code</th>
                <th>Company</th>
                <th>Date</th>
                <th>Product Name</th>
                <th>UOM</th>
                <th>Qty</th>
                <th>Unit Price</th>
                <th>Value</th>
                <th>Option</th>
              </tr>
            </thead>
            <tfoot>
              <tr>
                <th>No</th>
                <th>Transact Code</th>
                <th>Company</th>
                <th>Date</th>
                <th>Product Name</th>
                <th>UOM</th>
                <th>Qty</th>
                <th>Unit Price</th>
                <th>Value</th>
                <th>Option</th>
              </tr>
            </tfoot>
            <tbody>
              @foreach ($allStocks as $allStock)
              <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $allStock->stock_code }}</td>
                <td>{{ $allStock->company }}</td>
                <td>{{ $allStock->date }}</td>
                <td>{{ $allStock->product->product_name }}</td>
                <td>{{ $allStock->product->unit->unit_symbol }}</td>
                <td>{{ number_format($allStock->quantity, 0)}}</td>
                <td>Rp. {{ number_format($allStock->product->unit_price, 2) }}</td>
                <td>Rp. {{ number_format($allStock->value, 2) }}</td>
                <td>
                  <a href="/administrator/stocks/{{ $allStock->id }}/edit">Edit</a>
                  <a href="#" class="deleteStockIn text-danger" data-id="{{ $allStock->id }}" data-name="{{ $allStock->product->product_name }}">Delete</a>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>

<script>
  $(document).ready(function() {
    $('table.display').DataTable({
      aLengthMenu: [
          [25, 50, 100, 200, -1],
          [25, 50, 100, 200, "All"]
      ],
      // iDisplayLength: -1
    });
  });

  $('.deleteStockIn').click( function(){
      var stockid = $(this).attr('data-id')
      var stockname = $(this).attr('data-name')
      swal({
        title: "Are you sure?",
        text: "Once deleted, you will not be able to recover "+stockname+" ",
        icon: "warning",
        buttons: true,
        dangerMode: true,
      })
      .then((willDelete) => {
        if (willDelete) {
          window.location = "/administrator/deletestock/"+stockid+""
          swal("Your file has been deleted!", {
            icon: "success",
          });
        } else {
          swal("Your file is safe!");
        }
      });
    })
</script>
@endsection