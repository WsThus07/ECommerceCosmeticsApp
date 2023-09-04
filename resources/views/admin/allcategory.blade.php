@extends('admin.layouts.template')
@section('page_title')
Admin - All Categories
@endsection
@section('content')
<div class="container-xxl flex-grow-1 mt-5">
    <div class="d-flex justify-content-center">
        <h4 class="fw-bold py-3 mb-4 ">
          <span class="text-muted fw-light">Page/</span> All Categories
        </h4>
      </div>
       @if(session()->has('message'))
      <div class="alert alert-success">
        {{  session()->get('message') }}
      </div>
      @endif
    <!-- Hoverable Table rows -->
    <div class="card">
      <h5 class="card-header">Available Category Information</h5>
     
      <div class="table-responsive text-nowrap">
        <table class="table table-hover">
          <thead>
            <tr>
              <th>Id</th>
              <th>Category Name</th>
              <th>Sub Category</th>
              <th>Slug</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody class="table-border-bottom-0">
            @foreach ($categories as $category)


            <tr>
                <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>{{ $category->id }}</strong></td>
                <td>{{ $category->category_name }}</td>
                <td>{{ $category->subcategory_count }}</td>
                <td>{{ $category->slug }}</td>
                <td>
                  <div class="dropdown">
                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                      <i class="bx bx-dots-vertical-rounded"></i>
                    </button>
                    <div class="dropdown-menu">
                      <a class="dropdown-item" href="{{ route('editcategory', $category->id) }}"
                        ><i class="bx bx-edit-alt me-1"></i> Edit</a
                      >
                      <a class="dropdown-item" href="{{ route('deletecategory', $category->id) }}"
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
