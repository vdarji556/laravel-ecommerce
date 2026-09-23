@extends('admin.app')

@section('title', 'Add Category')

@section('content')

<div class="container-fluid">

    <!-- Header -->
    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>

            <h2 class="fw-bold mb-1">
                Add Category
            </h2>

            <p class="text-muted mb-0">
                Create a new product category
            </p>

        </div>


        <a
            href="{{ route('admin.categories') }}"
            class="btn btn-secondary"
        >
            <i class="bi bi-arrow-left"></i>
            Back
        </a>

    </div>


    <!-- Form Card -->
    <div class="card border-0 shadow-sm">

        <div class="card-body">


            <!-- Validation Errors -->

            @if($errors->any())

                <div class="alert alert-danger">

                    <ul class="mb-0">

                        @foreach($errors->all() as $error)

                            <li>
                                {{ $error }}
                            </li>

                        @endforeach

                    </ul>

                </div>

            @endif


            <form
                action="{{ route(
                    'admin.categories.store'
                ) }}"
                method="POST"
                enctype="multipart/form-data"
            >

                @csrf


                <!-- Category Name -->

                <div class="mb-3">

                    <label class="form-label">
                        Category Name
                    </label>

                    <input
                        type="text"
                        name="name"
                        class="form-control"
                        value="{{ old('name') }}"
                        placeholder="Enter category name"
                        required
                    >

                </div>


                <!-- Description -->

                <div class="mb-3">

                    <label class="form-label">
                        Description
                    </label>

                    <textarea
                        name="description"
                        class="form-control"
                        rows="4"
                        placeholder="Enter category description"
                    >{{ old('description') }}</textarea>

                </div>


                <!-- Image -->

                <div class="mb-3">

                    <label class="form-label">
                        Category Image
                    </label>

                    <input
                        type="file"
                        name="image"
                        class="form-control"
                        accept="image/*"
                    >

                    <small class="text-muted">
                        JPG, JPEG, PNG or WEBP. Maximum 2MB.
                    </small>

                </div>


                <!-- Status -->

                <div class="mb-4">

                    <label class="form-label">
                        Status
                    </label>

                    <select
                        name="status"
                        class="form-select"
                    >

                        <option value="1">
                            Active
                        </option>

                        <option value="0">
                            Inactive
                        </option>

                    </select>

                </div>


                <!-- Buttons -->

                <button
                    type="submit"
                    class="btn btn-primary"
                >

                    <i class="bi bi-check-lg"></i>

                    Save Category

                </button>


                <a
                    href="{{ route('admin.categories') }}"
                    class="btn btn-secondary"
                >

                    Cancel

                </a>

            </form>

        </div>

    </div>

</div>

@endsection