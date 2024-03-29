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
      Product Sub Category
    </li>
  </ol>
</nav>
@endsection

@section('container')
<!-- Page Heading -->
<div class="page-heading heading bg-darkblue d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-white">Subcategory List</h1>
</div>

<!-- DataTales Today's input -->
<div class="card my-4">
  <div class="card-header py-3">
    <h6 class="m-0 text-dark">Subcategory List</h6>
  </div>
  <div class="card-body">
    @if ($message = Session::get('success'))
      <div class="alert alert-primary" role="alert">
        {{ $message }}
      </div>
    @endif
    <a href="/administrator/subcategories/create" class="btn btn-primary bg-darkblue px-4 mb-3 d-none">
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
            <th class="col-1">No</th>
            <th>Product Class</th>
            <th>Product Category</th>
            <th>Subproduct Category</th>
            <th class="text-center">Option</th>
          </tr>
        </thead>
        <tfoot>
          <tr>
            <th>No</th>
            <th>Product Class</th>
            <th>Product Category</th>
            <th>Subproduct Category</th>
            <th class="text-center">Option</th>
          </tr>
        </tfoot>
        <tbody>
          @foreach ($subcategories as $subcategory)
          <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $subcategory->category->group->group_name }}</td>
            <td>{{ $subcategory->category->category_name }}</td>
            <td>{{ $subcategory->subcategory_name }}</td>
            <td class="text-center">
              <a href="/administrator/subcategories/{{ $subcategory->id }}/edit">Edit</a>
              <a href="#" class="delete text-danger" data-id="{{ $subcategory->id }}" data-name="{{ $subcategory->subcategory_name }}">Delete</a>
            </td>
          </tr>   
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>

<script>
  $('.delete').click( function(){
    var subcategoryId = $(this).attr('data-id')
    var subcategoryName = $(this).attr('data-name')
    swal({
      title: "Are you sure?",
      text: "Once deleted, you will not be able to recover "+subcategoryName+" ",
      icon: "warning",
      buttons: true,
      dangerMode: true,
    })
    .then((willDelete) => {
      if (willDelete) {
        window.location = "/administrator/removesubcategory/"+subcategoryId+""
        swal("The data has been deleted!", {
          icon: "success",
        });
      } else {
        swal("Your file is safe!");
      }
    });
  })
</script>
@endsection