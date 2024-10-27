@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card card-rounded">
            <div class="card-body">
                <h4 class="card-title">Back Office Dashboard</h4>
                <p class="card-description">
                    Overview of the back office system
                </p>

                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif

                <!-- Statistics Section -->
                <div class="statistics-details d-flex align-items-center justify-content-between">
                    <div>
                        <p class="statistics-title">Bounce Rate</p>
                        <h3 class="rate-percentage">32.53%</h3>
                        <p class="text-danger d-flex"><i class="mdi mdi-menu-down"></i><span>-0.5%</span></p>
                    </div>
                    <div>
                        <p class="statistics-title">Page Views</p>
                        <h3 class="rate-percentage">7,682</h3>
                        <p class="text-success d-flex"><i class="mdi mdi-menu-up"></i><span>+0.1%</span></p>
                    </div>
                    <div>
                        <p class="statistics-title">New Sessions</p>
                        <h3 class="rate-percentage">68.8%</h3>
                        <p class="text-danger d-flex"><i class="mdi mdi-menu-down"></i><span>-1.2%</span></p>
                    </div>
                    <div class="d-none d-md-block">
                        <p class="statistics-title">Avg. Time on Site</p>
                        <h3 class="rate-percentage">2m:35s</h3>
                        <p class="text-success d-flex"><i class="mdi mdi-menu-up"></i><span>+0.8%</span></p>
                    </div>
                </div>

                <!-- Chart Section -->
                <div class="row mt-4">
                    <div class="col-lg-8 d-flex flex-column">
                        <div class="row flex-grow">
                            <div class="col-12 grid-margin stretch-card">
                                <div class="card card-rounded">
                                    <div class="card-body">
                                        <div class="d-sm-flex justify-content-between align-items-start">
                                            <div>
                                                <h4 class="card-title card-title-dash">Performance Line Chart</h4>
                                                <h5 class="card-subtitle card-subtitle-dash">Track the performance of your key metrics</h5>
                                            </div>
                                            <div id="performanceLine-legend"></div>
                                        </div>
                                        <div class="chartjs-wrapper mt-4">
                                            <canvas id="performanceLine" width="400" height="200"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 d-flex flex-column">
                        <div class="row flex-grow">
                            <div class="col-md-6 col-lg-12 grid-margin stretch-card">
                                <div class="card bg-primary card-rounded">
                                    <div class="card-body pb-0">
                                        <h4 class="card-title card-title-dash text-white mb-4">Status Summary</h4>
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <p class="status-summary-light-white mb-1">Closed Value</p>
                                                <h2 class="text-info">357</h2>
                                            </div>
                                            <div class="col-sm-8">
                                                <div class="status-summary-chart-wrapper pb-4">
                                                    <canvas id="status-summary"></canvas>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-12 grid-margin stretch-card">
                                <div class="card card-rounded">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="d-flex justify-content-between align-items-center mb-2">
                                                    <div class="circle-progress-width">
                                                        <div id="totalVisitors" class="progressbar-js-circle pr-2"></div>
                                                    </div>
                                                    <div>
                                                        <p class="text-small mb-2">Total Visitors</p>
                                                        <h4 class="mb-0 fw-bold">26.80%</h4>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <div class="circle-progress-width">
                                                        <div id="visitperday" class="progressbar-js-circle pr-2"></div>
                                                    </div>
                                                    <div>
                                                        <p class="text-small mb-2">Visits per day</p>
                                                        <h4 class="mb-0 fw-bold">9065</h4>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Recent Activity Section -->
                <div class="row mt-4">
                    <div class="col-lg-8 d-flex flex-column">
                        <div class="card card-rounded">
                            <div class="card-body">
                                <h4 class="card-title">Recent Activity</h4>
                                <ul class="list-group">
                                    <li class="list-group-item">User X updated a record</li>
                                    <li class="list-group-item">User Y deleted a record</li>
                                    <li class="list-group-item">System backup completed</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 d-flex flex-column">
                        <div class="card card-rounded">
                            <div class="card-body">
                                <h4 class="card-title">Todo List</h4>
                                <ul class="todo-list">
                                    <li class="todo-item">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="" id="task1">
                                            <label class="form-check-label" for="task1"> Review the financial reports </label>
                                        </div>
                                    </li>
                                    <li class="todo-item">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="" id="task2">
                                            <label class="form-check-label" for="task2"> Schedule team meeting </label>
                                        </div>
                                    </li>
                                    <li class="todo-item">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="" id="task3">
                                            <label class="form-check-label" for="task3"> Finalize new project proposal </label>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Table Section -->
                <div class="row mt-4">
                    <div class="col-lg-12">
                        <div class="card card-rounded">
                            <div class="card-body">
                                <h4 class="card-title">System Usage Overview</h4>
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>User</th>
                                            <th>Usage (hours)</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>John Doe</td>
                                            <td>5 hours</td>
                                            <td><span class="badge badge-success">Active</span></td>
                                        </tr>
                                        <tr>
                                            <td>Jane Smith</td>
                                            <td>2 hours</td>
                                            <td><span class="badge badge-warning">Idle</span></td>
                                        </tr>
                                        <tr>
                                            <td>Robert Lee</td>
                                            <td>3 hours</td>
                                            <td><span class="badge badge-danger">Inactive</span></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Sidebar Navigation -->
                <div class="row mt-4">
                    <div class="col-lg-12">
                        <div class="card card-rounded">
                            <div class="card-body">
                                <ul class="nav nav-tabs">
                                    <li class="nav-item">
                                        <a class="nav-link active" href="{{ route('dashboard') }}">
                                            <i class="fas fa-fw fa-tachometer-alt"></i>
                                            <span>Dashboard</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('categories.index') }}">
                                            <i class="fas fa-fw fa-list"></i>
                                            <span>Categories</span>
                                        </a>
                                    </li>
                                    <!-- Add more admin menu items here -->
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection