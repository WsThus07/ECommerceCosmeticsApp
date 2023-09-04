@extends('admin.layouts.template')
@section('page_title')
Admin - All SubCategory
@endsection
@section('content')
<div class="container-xxl flex-grow-1 mt-5">
    <div class="d-flex justify-content-center">
        <h4 class="fw-bold py-3 mb-4 ">
          <span class="text-muted fw-light">Page/</span> All Sub Categories
        </h4>
      </div>
      @if(session()->has('message'))
      <div class="alert alert-success">
        {{  session()->get('message') }}
      </div>
      @endif
    <!-- Hoverable Table rows -->
    <div class="card">
      <h5 class="card-header">Available Sub Category Information</h5>
      
      <div class="table-responsive text-nowrap">
        <table class="table table-hover">
          <thead>
            <tr>
              <th>Id</th>
              <th>Sub Category Name</th>
              <th>Category Name</th>
              <th>Product</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody class="table-border-bottom-0">
            @foreach ($allsubcategories as  $subcategory)


            <tr>
              <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>{{ $subcategory->id }}</strong></td>
              <td>{{ $subcategory->subcategory_name }}</td>
              <td>{{ $subcategory->category_name }}</td>
              <td>{{ $subcategory->product_count }}</td>
              <td>
                <div class="dropdown">
                  <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                    <i class="bx bx-dots-vertical-rounded"></i>
                  </button>
                  <div class="dropdown-menu">
                    <a class="dropdown-item" href="{{ route('editsubcategory', $subcategory->id) }}"
                      ><i class="bx bx-edit-alt me-1"></i> Edit</a
                    >
                    <a class="dropdown-item" href="{{  route('deletesubcategory',$subcategory->id) }}"
                      ><i class="bx bx-trash me-1"></i> Delete</a
                    >
                  </div>
                </div>
              </td>
            </tr>

            @endforeach
          </tbody>
        </table>
      </div>
    </div>

</div>
@endsection
