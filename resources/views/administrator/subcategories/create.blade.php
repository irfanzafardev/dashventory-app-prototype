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
      <a href="/administrator/products">
        Subcategory
      </a>
    </li>
    <li class="breadcrumb-item text-dark active" aria-current="page">
      Create
    </li>
  </ol>
</nav>
@endsection

@section('container')
<!-- Page Heading -->
<div class="page-heading heading bg-darkblue d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-white">Sub Category Form</h1>
</div>

<!-- AddData-form -->
<div class="row">
  <div class="col-12">
    <form method="post" action="/administrator/subcategories">
      @csrf
      <div class="row">
        <div class="col-6">
          <div class="form-group mb-3">
            <label for="subcategory" class="form-label">Sub Category Name</label>
            <input
              type="text"
              class="form-control @error('subcategory') is-invalid @enderror"
              name="subcategory_name"
              id="subcategory"
              placeholder="Enter subcategory name"
              value="{{ old('subcategory_name') }}"
              required
            />
            @error('category')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
            @enderror
          </div>
          <div class="form-group mb-3">
            <label for="group" class="form-label">Product Class</label>
            <select 
            class="form-control form-select class-select @error('group') is-invalid @enderror" 
            id="group" 
            required>
              <option value="">Choose product class</option>
              @foreach ($groups as $group)
                @if (old('group_id') === $group->id)
                  <option value="{{ $group->id }}" selected>{{ $group->group_name }}</option>
                @else
                  <option value="{{ $group->id }}">{{ $group->group_name }}</option>                 
                @endif
              @endforeach
            </select>
            @error('group')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
            @enderror
          </div>
          <div class="form-group d-none mb-3">
            <label for="class" class="form-label">Class</label>
            <input
              type="text"
              class="form-control"
              name="class"
              id="class-read"
              readonly
            />
          </div>
          <div class="form-group mb-3" id="categoryview">
            <label for="category" class="form-label">Product Category</label> <br>
            <select class="form-control form-select category-select" name="category_id" id="category" required></select>
          </div>
          <button type="submit" class="btn btn-primary ms-3 bg-darkblue float-end">Submit</button>
          <a href="/administrator/subcategories" class="btn btn btn-light float-end">Cancel</a>
        </div>
      </div>
    </form>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script>
  $(document).ready(function() {
    $("#group").change(function(){
      $("#categoryview").removeClass("d-none");
    });

    $(".class-select").on("input", function () {
      var $variable = $('#group option:selected').html();
      document.getElementById("class-read").value = $variable;
    });

    $('#group').on('change', function() {
      var groupID = $(this).val();
      if(groupID) {
          $.ajax({
              url: '/getCategoryAdmin/'+groupID,
              type: "GET",
              data : {"_token":"{{ csrf_token() }}"},
              dataType: "json",
              success:function(data)
              {
                if(data) {
                    $('#category').empty();
                    $('#category').append('<option value="">Choose category</option>'); 
                    $.each(data, function(key, category){
                      $('select[name="category_id"]').append('<option value="'+ category.id +'">' + category.category_name+ '</option>');
                    });
                }else {
                    $('#category').empty();
                }
            }
          });
      }else{
        $('#category').empty();
      }
    });

    $('.class-select').select2();
    $('.category-select').select2();
  });
</script>
@endsection