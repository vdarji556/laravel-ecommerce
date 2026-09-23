@extends('admin.app')

@section('title', 'Edit Category')

@section('content')

<div class="container-fluid">

    <!-- Header -->
    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>

            <h2 class="fw-bold mb-1">
                Edit Category
            </h2>

            <p class="text-muted mb-0">
                Update product category
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


            <!-- Update Form -->

            <form
                action="{{ route('admin.categories.update', $category->id) }}"
                method="POST"
                enctype="multipart/form-data"
            >

                @csrf

                @method('PUT')


                <!-- Category Name -->

                <div class="mb-3">

                    <label class="form-label">
                        Category Name
                    </label>

                    <input
                        type="text"
                        name="name"
                        class="form-control"
                        value="{{ old('name', $category->name) }}"
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
                    >{{ old('description', $category->description) }}</textarea>

                </div>


                <!-- Current Image -->

                <div class="mb-3">

                    <label class="form-label">
                        Current Image
                    </label>

                    <br>

                    @if($category->image)

                        <img
                            src="{{ asset('uploads/categories/' . $category->image) }}"
                            alt="{{ $category->name }}"
                            width="150"
                            height="100"
                            style="object-fit: cover;"
                            class="rounded border mb-2"
                        >

                    @else

                        <p class="text-muted">
                            No image available
                        </p>

                    @endif

                </div>


                <!-- New Image -->

                <div class="mb-3">

                    <label class="form-label">
                        Change Category Image
                    </label>

                    <input
                        type="file"
                        name="image"
                        class="form-control"
                        accept="image/*"
                    >

                    <small class="text-muted">
                        Leave empty if you don't want to change the image.
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

                        <option
                            value="1"
                            {{ old('status', $category->status) == 1 ? 'selected' : '' }}
                        >
                            Active
                        </option>

                        <option
                            value="0"
                            {{ old('status', $category->status) == 0 ? 'selected' : '' }}
                        >
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

                    Update Category

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