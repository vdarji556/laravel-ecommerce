@extends('admin.app')

@section('title', 'Categories')

@section('content')

<div class="container-fluid">

    <!-- Header -->
    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>
            <h2 class="fw-bold mb-1">
                Categories
            </h2>

            <p class="text-muted mb-0">
                Manage your product categories
            </p>
        </div>

        <a
            href="{{ route('admin.categories.create') }}"
            class="btn btn-primary"
        >
            <i class="bi bi-plus-lg"></i>
            Add Category
        </a>

    </div>


    <!-- Success Message -->
    @if(session('success'))

        <div class="alert alert-success alert-dismissible fade show">

            {{ session('success') }}

            <button
                type="button"
                class="btn-close"
                data-bs-dismiss="alert"
            ></button>

        </div>

    @endif


    <!-- Category Table -->
    <div class="card border-0 shadow-sm">

        <div class="card-body">

            @if($categories->count() > 0)

                <div class="table-responsive">

                    <table class="table table-hover align-middle">

                        <thead>

                            <tr>

                                <th>#</th>

                                <th>Image</th>

                                <th>Name</th>

                                <th>Description</th>

                                <th>Status</th>

                                <th>Created</th>

                                <th>Action</th>

                            </tr>

                        </thead>

                        <tbody>

                            @foreach($categories as $category)

                                <tr>

                                    <td>
                                        {{ $loop->iteration }}
                                    </td>


                                    <!-- Image -->
                                    <td>

                                        @if($category->image)

                                            <img
                                                src="{{ asset(
                                                    'uploads/categories/' .
                                                    $category->image
                                                ) }}"
                                                width="60"
                                                height="60"
                                                style="
                                                    object-fit: cover;
                                                    border-radius: 8px;
                                                "
                                            >

                                        @else

                                            <span class="text-muted">
                                                No Image
                                            </span>

                                        @endif

                                    </td>


                                    <!-- Name -->
                                    <td>

                                        <strong>
                                            {{ $category->name }}
                                        </strong>

                                    </td>


                                    <!-- Description -->
                                    <td>

                                        {{ Str::limit(
                                            $category->description,
                                            50
                                        ) }}

                                    </td>


                                    <!-- Status -->
                                    <td>

                                        @if($category->status == 1)

                                            <span class="badge bg-success">
                                                Active
                                            </span>

                                        @else

                                            <span class="badge bg-danger">
                                                Inactive
                                            </span>

                                        @endif

                                    </td>


                                    <!-- Date -->
                                    <td>

                                        {{ $category->created_at?->format('d M Y') ?? 'N/A' }}  

                                    </td>


                                    <!-- Actions -->
                                    <td>

                                        <!-- Edit -->
                                        <a
                                            href="{{ route(
                                                'admin.categories.edit',
                                                $category->id
                                            ) }}"
                                            class="btn btn-sm btn-primary"
                                        >

                                            <i class="bi bi-pencil"></i>

                                        </a>


                                        <!-- Delete -->
                                        <form
                                            action="{{ route(
                                                'admin.categories.destroy',
                                                $category->id
                                            ) }}"
                                            method="POST"
                                            style="display:inline;"
                                            onsubmit="return confirm(
                                                'Are you sure you want to delete this category?'
                                            );"
                                        >

                                            @csrf

                                            @method('DELETE')

                                            <button
                                                type="submit"
                                                class="btn btn-sm btn-danger"
                                            >

                                                <i class="bi bi-trash"></i>

                                            </button>

                                        </form>

                                    </td>

                                </tr>

                            @endforeach

                        </tbody>

                    </table>

                </div>

            @else

                <div class="text-center py-5">

                    <i
                        class="bi bi-folder2-open"
                        style="font-size: 50px;"
                    ></i>

                    <h5 class="mt-3">
                        No Categories Found
                    </h5>

                    <p class="text-muted">
                        Start by adding your first category.
                    </p>

                    <a
                        href="{{ route(
                            'admin.categories.create'
                        ) }}"
                        class="btn btn-primary"
                    >
                        Add Category
                    </a>

                </div>

            @endif

        </div>

    </div>

</div>

@endsection