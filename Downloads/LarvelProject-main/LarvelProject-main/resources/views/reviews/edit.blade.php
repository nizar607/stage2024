@extends('layouts.app_front')

@section('content')
    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
    <!-- Hero Section -->
    <!-- Hero Section with Form -->
    <div class="hero-section position-relative"
        style="background: url('{{ asset('assets/images/partner.png') }}') no-repeat center center; background-size: cover; padding: 80px 0 120px;">
        <!-- Overlay -->
        <div style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0, 0, 0, 0.5);"></div>

        <!-- Text Content -->
        <div class="container text-center text-white position-relative mb-5"
            style="background-color: rgba(0, 0, 0, 0.7); padding: 20px; border-radius: 10px;">
            <h1 class="display-4" style="font-size: 3rem; font-weight: bold; text-shadow: 2px 2px 10px rgba(0, 0, 0, 0.8);">
                Partner with Us to Help the Homeless</h1>
            <p class="lead" style="font-size: 1.4rem; text-shadow: 2px 2px 8px rgba(0, 0, 0, 0.7);">Join our community by
                adding your restaurant to help distribute surplus food to those in need.</p>
        </div>


        <!-- Content with Form -->
        <div class="container text-white position-relative">

            <div class="card mb-5">


                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body p-3">

                            <label for="title" class="form-label">
                                <i class="mdi mdi-storefront"></i> text
                            </label>

                            <div id="editor" class="bg-white" style="height: 200px;"></div>
                            @error('text')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>


                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body p-4">
                            <form action="{{ route('reviews.update', $review->id) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')

                                <!-- Review Title -->
                                <div class="form-group mb-4">

                                    <label for="title" class="form-label">
                                        <i class="mdi mdi-storefront"></i> Title
                                    </label>
                                    <input name="title" id="title" class="form-control rounded-pill shadow-sm"
                                        type="text" placeholder="Enter review title" value="{{ $review->title }}">
                                    @error('title')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                {{-- <div class="form-group mb-3">
                                    <label for="image" class="form-label"><i class="mdi mdi-image"></i> Review
                                        Image</label>
                                    <input type="file" name="image" class="form-control">
                                </div> --}}


                                <input type="hidden" name="text" id="contentInput" class="form-control rounded-pill shadow-sm"
                                    type="text" placeholder="Enter review title" value="{{ $review->text }}">

                                <div class="d-grid">
                                    <button type="submit" class="btn btn-lg btn-success rounded-pill shadow-sm">
                                        <i class="mdi mdi-send"></i> Update
                                    </button>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>

            </div>


        </div>
    </div>
    <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
    <script>
        // Initialize Quill editor
        var quill = new Quill('#editor', {
            theme: 'snow', // Specify theme in options
            modules: {
                toolbar: [
                    [{
                        'header': [1, 2, false]
                    }], // Headers
                    ['bold', 'italic', 'underline'], // Formatting options
                    [{
                        'list': 'ordered'
                    }, {
                        'list': 'bullet'
                    }], // Lists
                    ['clean'] // Remove formatting button
                ]
            }
        });

        quill.on('text-change', function() {
            var quillContent = quill.root.innerHTML; // Get content from Quill editor
            if (quillContent.replace(/<[^>]*>?/gm, '').trim().length == 0)
                document.getElementById('contentInput').value = '';
            else
                document.getElementById('contentInput').value = quillContent; // Update hidden input value
        });

        quill.root.innerHTML = document.getElementById('contentInput').value; // Set hidden input value on page load
        document.getElementById('myForm').addEventListener('submit', function() {
            var quillContent = quill.root.innerHTML; // Get content
            document.getElementById('contentInput').value = quillContent; // Set hidden input value
        });
    </script>
@endsection
