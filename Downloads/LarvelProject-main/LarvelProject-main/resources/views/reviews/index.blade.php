@extends('layouts.app_front')

@section('content')
    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
    <div class="container mt-5">
        <!-- Text Content -->
        <div class="container text-center text-white position-relative mb-5"
            style="background-color: rgba(0, 0, 0, 0.7); padding: 20px; border-radius: 10px; background-image: url('https://blog.ipleaders.in/wp-content/uploads/2021/09/register-company-online-1.png'); min-height:300px;  background-repeat: no-repeat; background-size: cover;">

            <h1 class="display-4 text-white"
                style="font-size: 3rem; font-weight: bold; text-shadow: 2px 2px 10px rgba(0, 0, 0, 0.8);">
                My Reviews
            </h1>

            <p class="lead text-white" style="font-size: 1.4rem; text-shadow: 2px 2px 8px rgba(0, 0, 0, 0.7);">
                Manage your Reviews details for our platform.
            </p>

        </div>



        <div class="row mb-5">
            <div class="col-5">
                <h3 class="mb-4">{{ $association['nom'] }}</h3> <!-- Association Name -->
                <p><strong>Adresse:</strong> {{ $association['adresse'] }}</p> <!-- Association Address -->
                <p><strong>Téléphone:</strong> {{ $association['telephone'] }}</p> <!-- Association Phone -->
                <p><strong>Email:</strong> {{ $association['email'] }}</p> <!-- Association Email -->
            </div>
            <div class="col-auto d-flex align-items-center">
                <div class="vr" style="height: 100px;"></div> <!-- Vertical line with height -->
            </div>
            <div class="col-5 mb-4 text-center">
                <h3 class="mb-4">Rating:</h3>
                <span class="rating">
                    <i class="mdi mdi-star text-warning"></i>
                    <i class="mdi mdi-star text-warning"></i>
                    <i class="mdi mdi-star text-warning"></i>
                    <i class="mdi mdi-star-outline"></i> <!-- This can represent a missing star -->
                    <i class="mdi mdi-star-outline"></i>
                </span>
                <p class="mt-2 text-warning"><em>50 people rated this association</em></p>
            </div>

        </div>





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
                        <form action="{{ route('reviews.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <!-- Review Title -->
                            <div class="form-group mb-1">

                                <label for="title" class="form-label">
                                    <i class="mdi mdi-storefront"></i> Title
                                </label>
                                <input name="title" id="title" class="form-control rounded-pill shadow-sm"
                                    type="text" placeholder="Enter review title">
                                @error('title')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label for="image" class="form-label"><i class="mdi mdi-image"></i> Review Image</label>
                                <input type="file" name="image" class="form-control">
                                @error('image')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>


                            <input type="hidden" name="text" id="contentInput"
                                class="form-control rounded-pill shadow-sm" required type="text"
                                placeholder="Enter review title">

                            <div class="d-grid">
                                <button type="submit" class="btn btn-lg btn-success rounded-pill shadow-sm">
                                    <i class="mdi mdi-send"></i> Submit
                                </button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>

        </div>


        @foreach ($reviews as $review)
            <div class="row mb-4 bg-white p-4 my-3 position-relative">

                @if ($review->user->id == auth()->id())
                    <form action="{{ route('reviews.destroy', $review->id) }}" method="POST"
                        class="position-absolute d-flex justify-content-end " style="top: -15px; right: -25px;">
                        @csrf
                        @method('DELETE') <!-- This adds the DELETE method to the form -->
                        <button type="submit" class="btn btn-danger rounded-circle"
                            style="width: 40px; height: 40px; border-radius: 50%; padding: 0;">
                            <i class="menu-icon mdi mdi-delete"></i>
                        </button>
                    </form>
                @endif

                <div class="col-12 d-flex align-items-center">

                    <img src="https://media.istockphoto.com/id/1337144146/vector/default-avatar-profile-icon-vector.jpg?s=612x612&w=0&k=20&c=BIbFwuv7FxTWvh5S3vB6bkT0Qv8Vn8N5Ffseq84ClGI="
                        alt="User Avatar" class="rounded-circle me-3" style="width: 60px; height: 60px;">

                    <!-- Profile Image -->

                    <div class="col-auto">
                        <h5 class="mb-1">{{ $review->title }}
                            @if ($review->user->id == auth()->id())
                                <a href="{{ route('reviews.edit', $review->id) }}" style="text-decoration: none;">
                                    (<span style="text-decoration: underline">Edit</span>)
                                </a>
                            @endif
                        </h5>
                        <!-- Static Review Title -->
                        <div class="mb-0">{!! $review->text !!}</div> <!-- Static Review Text -->
                    </div>

                    <div class="col-auto ms-auto">
                        <img src="{{ asset('storage/' . $review->image) }}" alt="Association Image" class="rounded me-3"
                            style="width: 90px; height: 90px;">
                    </div>
                </div>
            </div>
        @endforeach


    </div>
    <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
    <script>
        var quill = new Quill('#editor', {
            theme: 'snow',
            modules: {
                toolbar: [
                    [{
                        'header': [1, 2, false]
                    }],
                    ['bold', 'italic', 'underline'],
                    [{
                        'list': 'ordered'
                    }, {
                        'list': 'bullet'
                    }],
                    ['clean']
                ]
            }
        });

        quill.on('text-change', function() {
            var quillContent = quill.root.innerHTML;
            document.getElementById('contentInput').value = quillContent;
        });

        document.getElementById('myForm').addEventListener('submit', function() {
            var quillContent = quill.root.innerHTML;
            document.getElementById('contentInput').value = quillContent;
        });
    </script>
@endsection
