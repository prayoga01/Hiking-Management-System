@extends('layouts.user')

@section('content')
    <!-- ======= Breadcrumbs Section ======= -->
    <section class="breadcrumbs">
        <div class="container">

            <div class="d-flex justify-content-between align-items-center">
                <h2>Mountan Details</h2>
                <ol>
                    <li><a href="/index">Home</a></li>
                    <li><a href="/index">Mountain</a></li>
                    <li>Mountain Details</li>
                </ol>
            </div>

        </div>
    </section><!-- Breadcrumbs Section -->
    <!-- ======= Portfolio Details Section ======= -->
    <section id="portfolio-details" class="portfolio-details">
        <div class="container">

            <div class="row gy-4">

                <div class="col-lg-8">
                    <div class="portfolio-details-slider swiper">
                        <div class="swiper-slide">
                            <img src="{{ asset('storage/' . $mountain->mountain_img) }}" alt="...">
                        </div>
                    </div>

                    <table class="table text-center mt-5">
                        <thead>
                            <tr>
                                <th scope="col">Price</th>
                                <th scope="col">Maximum Climbers</th>
                                <th scope="col">Date Able</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($ables as $able)
                                <tr>
                                    <td>RM {{ $able->price }}</td>
                                    <td>{{ $able->max_people }}</td>
                                    <td>{{ $able->date_able }}</td>
                                    <td>
                                        @if ($mountain->check_active == '1')
                                            <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                                data-bs-target="#exampleModal">
                                                Launch demo modal
                                            </button>
                                        @elseif($mountain->check_active == '0')
                                            <button type="button" class="badge bg-secondary" disabled>Not able for
                                                now</button>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="col-lg-4">
                    <div class="portfolio-info">
                        <h3>{{ $mountain->nm_mountain }}</h3>
                        <ul>
                            <li>
                                <strong>Status</strong>:
                                @if ($mountain->check_active == '1')
                                    <span class="badge text-bg-success">Active</span>
                                @elseif($mountain->check_active == '0')
                                    <span class="badge text-bg-warning">Inactive</span>
                                @endif
                            </li>
                            <li>
                                <strong>Location</strong>: {{ $mountain->address_mountain }}
                            </li>
                        </ul>
                    </div>
                    <div class="portfolio-description">
                        <h2>About {{ $mountain->nm_mountain }}</h2>
                        <p>
                            {!! $mountain->content !!}
                        </p>
                    </div>
                </div>

            </div>

        </div>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="container">
                            <div class="row justify-content-center my-2">
                                <div class="col-md-4">
                                    <h4 class="modal-title fs-5" id="exampleModalLabel">Add Quantity</h4>
                                </div>
                                <div class="col-md-8">
                                    <div class="col-lg-4 col-md-4 mb-4 mb-lg-0">
                                        <!-- Quantity -->
                                        <div class="d-flex mb-4" style="max-width: 300px">
                                            <button class="btn btn-primary px-3 me-2" id="removeButtonn"
                                                onclick="this.parentNode.querySelector('input[type=number]').stepDown()">
                                                <i class="fas fa-minus"></i>
                                            </button>

                                            <div class="form-outline">
                                                <input id="form1" min="0" name="quantity" value="1"
                                                    type="number" class="form-control" />
                                                <label class="form-label" for="form1">Quantity</label>
                                            </div>

                                            <button class="btn btn-primary px-3 ms-2" id="addButtonn"
                                                onclick="this.parentNode.querySelector('input[type=number]').stepUp()">
                                                <i class="fas fa-plus"></i>
                                            </button>
                                        </div>
                                        <!-- Quantity -->
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary">Add</button>
                        </div>
                    </div>
                </div>
            </div>
    </section><!-- End Portfolio Details Section -->

   
@endsection
