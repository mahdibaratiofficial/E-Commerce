@extends('layouts.admin.app')

@section('content')
    <div class="main-panel text-justify">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-md-12 grid-margin">
                    <div class="row">
                        <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                            <h3 class="font-weight-bold" id="test">خوش آمدی {{ Auth::user()->name ?? Auth::user()->username }}</h3>

                            <h6 class="font-weight-normal mb-0">
                                همه سیستم ها روان کار می کنند
                                <span class="text-primary">3 هشدار خوانده نشده!</span> شما
                                دارید!
                            </h6>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 grid-margin stretch-card">
                    <div class="card tale-bg">
                        <div class="card-people mt-auto">
                            <img src="images/dashboard/people.svg" alt="people" />
                            <div class="weather-info">
                                <div class="d-flex">
                                    <div>
                                        <h2 class="mb-0 font-weight-normal">
                                            <i class="icon-sun ml-2"></i>31<sup>C</sup>
                                        </h2>
                                    </div>
                                    <div class="mr-3">
                                        <h4 class="location font-weight-normal">تهران</h4>
                                        <h6 class="font-weight-normal">ایران</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 grid-margin transparent">
                    <div class="row">
                        <div class="col-md-6 mb-4 stretch-card transparent">
                            <div class="card card-tale">
                                <div class="card-body">
                                    <p class="mb-4">کاربران جدید</p>
                                    <p class="fs-30 mb-2">4006</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 mb-4 stretch-card transparent">
                            <div class="card card-dark-blue">
                                <div class="card-body">
                                    <p class="mb-4">آموزش های جدید</p>
                                    <p class="fs-30 mb-2">61344</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-4 mb-lg-0 stretch-card transparent">
                            <div class="card card-light-blue">
                                <div class="card-body">
                                    <p class="mb-4">خرید های جدید</p>
                                    <p class="fs-30 mb-2">34040</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 stretch-card transparent">
                            <div class="card card-light-danger">
                                <div class="card-body">
                                    <p class="mb-4">درآمد این ماه</p>
                                    <p class="fs-30 mb-2">47033</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <p class="card-title">جزئیات سفارش</p>
                            <p class="font-weight-500">
                                لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ
                                و با استفاده از طراحان گرافیک است چاپگرها و متون بلکه
                                روزنامه و مجله در ستون و سطرآنچنان که لازم است
                            </p>
                            <div class="d-flex flex-wrap mb-5">
                                <div class="mr-5 mt-3">
                                    <p class="text-muted">ارزش سفارش</p>
                                    <h3 class="text-primary fs-30 font-weight-medium">
                                        12.3k
                                    </h3>
                                </div>
                                <div class="mr-5 mt-3">
                                    <p class="text-muted">سفارشات</p>
                                    <h3 class="text-primary fs-30 font-weight-medium">
                                        14k
                                    </h3>
                                </div>
                                <div class="mr-5 mt-3">
                                    <p class="text-muted">کاربران</p>
                                    <h3 class="text-primary fs-30 font-weight-medium">
                                        71.56%
                                    </h3>
                                </div>
                                <div class="mt-3">
                                    <p class="text-muted">بارگیری ها</p>
                                    <h3 class="text-primary fs-30 font-weight-medium">
                                        34040
                                    </h3>
                                </div>
                            </div>
                            <canvas id="order-chart"></canvas>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between">
                                <p class="card-title">گزارش فروش</p>
                                <a href="#" class="text-info">View all</a>
                            </div>
                            <p class="font-weight-500">
                                لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ
                                و با استفاده از طراحان گرافیک است چاپگرها و متون بلکه
                                روزنامه و مجله در ستون و سطرآنچنان که لازم است
                            </p>
                            <div id="sales-legend" class="chartjs-legend mt-4 mb-2"></div>
                            <canvas id="sales-chart"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 grid-margin stretch-card">
                    <div class="card position-relative">
                        <div class="card-body">
                            <div id="detailedReports" class="carousel slide detailed-report-carousel position-static pt-2"
                                data-ride="carousel">
                                <div class="carousel-inner">
                                    <div class="carousel-item active">
                                        <div class="row">
                                            <div class="col-md-12 col-xl-3 d-flex flex-column justify-content-start">
                                                <div class="ml-xl-4 mt-3">
                                                    <p class="card-title">گزارش های دقیق</p>
                                                    <h1 class="text-primary">$34040</h1>
                                                    <h3 class="font-weight-500 mb-xl-4 text-primary">
                                                        آمریکای شمالی
                                                    </h3>
                                                    <p class="mb-2 mb-xl-0">
                                                        لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت
                                                        چاپ
                                                        و با استفاده از طراحان گرافیک است چاپگرها و متون بلکه
                                                        روزنامه و مجله در ستون و سطرآنچنان که لازم است
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="col-md-12 col-xl-9">
                                                <div class="row">
                                                    <div class="col-md-6 border-right">
                                                        <div class="table-responsive mb-3 mb-md-0 mt-3">
                                                            <table class="table table-borderless report-table">
                                                                <tr>
                                                                    <td class="text-muted">ایلینوی</td>
                                                                    <td class="w-100 px-0">
                                                                        <div class="progress progress-md mx-4">
                                                                            <div class="progress-bar bg-primary"
                                                                                role="progressbar" style="width: 70%"
                                                                                aria-valuenow="70" aria-valuemin="0"
                                                                                aria-valuemax="100"></div>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <h5 class="font-weight-bold mb-0">
                                                                            713
                                                                        </h5>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="text-muted">واشنگتن</td>
                                                                    <td class="w-100 px-0">
                                                                        <div class="progress progress-md mx-4">
                                                                            <div class="progress-bar bg-warning"
                                                                                role="progressbar" style="width: 30%"
                                                                                aria-valuenow="30" aria-valuemin="0"
                                                                                aria-valuemax="100"></div>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <h5 class="font-weight-bold mb-0">
                                                                            583
                                                                        </h5>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="text-muted">می سی سی پی</td>
                                                                    <td class="w-100 px-0">
                                                                        <div class="progress progress-md mx-4">
                                                                            <div class="progress-bar bg-danger"
                                                                                role="progressbar" style="width: 95%"
                                                                                aria-valuenow="95" aria-valuemin="0"
                                                                                aria-valuemax="100"></div>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <h5 class="font-weight-bold mb-0">
                                                                            924
                                                                        </h5>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="text-muted">کالیفرنیا</td>
                                                                    <td class="w-100 px-0">
                                                                        <div class="progress progress-md mx-4">
                                                                            <div class="progress-bar bg-info"
                                                                                role="progressbar" style="width: 60%"
                                                                                aria-valuenow="60" aria-valuemin="0"
                                                                                aria-valuemax="100"></div>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <h5 class="font-weight-bold mb-0">
                                                                            664
                                                                        </h5>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="text-muted">مریلند</td>
                                                                    <td class="w-100 px-0">
                                                                        <div class="progress progress-md mx-4">
                                                                            <div class="progress-bar bg-primary"
                                                                                role="progressbar" style="width: 40%"
                                                                                aria-valuenow="40" aria-valuemin="0"
                                                                                aria-valuemax="100"></div>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <h5 class="font-weight-bold mb-0">
                                                                            560
                                                                        </h5>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="text-muted">آلاسکا</td>
                                                                    <td class="w-100 px-0">
                                                                        <div class="progress progress-md mx-4">
                                                                            <div class="progress-bar bg-danger"
                                                                                role="progressbar" style="width: 75%"
                                                                                aria-valuenow="75" aria-valuemin="0"
                                                                                aria-valuemax="100"></div>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <h5 class="font-weight-bold mb-0">
                                                                            793
                                                                        </h5>
                                                                    </td>
                                                                </tr>
                                                            </table>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 mt-3 ltr">
                                                        <canvas id="north-america-chart"></canvas>
                                                        <div id="north-america-legend"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="carousel-item">
                                        <div class="row">
                                            <div class="col-md-12 col-xl-3 d-flex flex-column justify-content-start">
                                                <div class="ml-xl-4 mt-3">
                                                    <p class="card-title">Detailed Reports</p>
                                                    <h1 class="text-primary">$34040</h1>
                                                    <h3 class="font-weight-500 mb-xl-4 text-primary">
                                                        North America
                                                    </h3>
                                                    <p class="mb-2 mb-xl-0">
                                                        The total number of sessions within the date
                                                        range. It is the period time a user is
                                                        actively engaged with your website, page or
                                                        app, etc
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="col-md-12 col-xl-9">
                                                <div class="row">
                                                    <div class="col-md-6 border-right">
                                                        <div class="table-responsive mb-3 mb-md-0 mt-3">
                                                            <table class="table table-borderless report-table">
                                                                <tr>
                                                                    <td class="text-muted">Illinois</td>
                                                                    <td class="w-100 px-0">
                                                                        <div class="progress progress-md mx-4">
                                                                            <div class="progress-bar bg-primary"
                                                                                role="progressbar" style="width: 70%"
                                                                                aria-valuenow="70" aria-valuemin="0"
                                                                                aria-valuemax="100"></div>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <h5 class="font-weight-bold mb-0">
                                                                            713
                                                                        </h5>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="text-muted">Washington</td>
                                                                    <td class="w-100 px-0">
                                                                        <div class="progress progress-md mx-4">
                                                                            <div class="progress-bar bg-warning"
                                                                                role="progressbar" style="width: 30%"
                                                                                aria-valuenow="30" aria-valuemin="0"
                                                                                aria-valuemax="100"></div>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <h5 class="font-weight-bold mb-0">
                                                                            583
                                                                        </h5>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="text-muted">Mississippi</td>
                                                                    <td class="w-100 px-0">
                                                                        <div class="progress progress-md mx-4">
                                                                            <div class="progress-bar bg-danger"
                                                                                role="progressbar" style="width: 95%"
                                                                                aria-valuenow="95" aria-valuemin="0"
                                                                                aria-valuemax="100"></div>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <h5 class="font-weight-bold mb-0">
                                                                            924
                                                                        </h5>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="text-muted">California</td>
                                                                    <td class="w-100 px-0">
                                                                        <div class="progress progress-md mx-4">
                                                                            <div class="progress-bar bg-info"
                                                                                role="progressbar" style="width: 60%"
                                                                                aria-valuenow="60" aria-valuemin="0"
                                                                                aria-valuemax="100"></div>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <h5 class="font-weight-bold mb-0">
                                                                            664
                                                                        </h5>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="text-muted">Maryland</td>
                                                                    <td class="w-100 px-0">
                                                                        <div class="progress progress-md mx-4">
                                                                            <div class="progress-bar bg-primary"
                                                                                role="progressbar" style="width: 40%"
                                                                                aria-valuenow="40" aria-valuemin="0"
                                                                                aria-valuemax="100"></div>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <h5 class="font-weight-bold mb-0">
                                                                            560
                                                                        </h5>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="text-muted">Alaska</td>
                                                                    <td class="w-100 px-0">
                                                                        <div class="progress progress-md mx-4">
                                                                            <div class="progress-bar bg-danger"
                                                                                role="progressbar" style="width: 75%"
                                                                                aria-valuenow="75" aria-valuemin="0"
                                                                                aria-valuemax="100"></div>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <h5 class="font-weight-bold mb-0">
                                                                            793
                                                                        </h5>
                                                                    </td>
                                                                </tr>
                                                            </table>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 mt-3">
                                                        <canvas id="south-america-chart"></canvas>
                                                        <div id="south-america-legend"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <a class="carousel-control-prev" href="#detailedReports" role="button"
                                    data-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Previous</span>
                                </a>
                                <a class="carousel-control-next" href="#detailedReports" role="button"
                                    data-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Next</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-7 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <p class="card-title mb-0">Top Products</p>
                            <div class="table-responsive">
                                <table class="table table-striped table-borderless">
                                    <thead>
                                        <tr>
                                            <th>Product</th>
                                            <th>Price</th>
                                            <th>Date</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Search Engine Marketing</td>
                                            <td class="font-weight-bold">$362</td>
                                            <td>21 Sep 2018</td>
                                            <td class="font-weight-medium">
                                                <div class="badge badge-success">Completed</div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Search Engine Optimization</td>
                                            <td class="font-weight-bold">$116</td>
                                            <td>13 Jun 2018</td>
                                            <td class="font-weight-medium">
                                                <div class="badge badge-success">Completed</div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Display Advertising</td>
                                            <td class="font-weight-bold">$551</td>
                                            <td>28 Sep 2018</td>
                                            <td class="font-weight-medium">
                                                <div class="badge badge-warning">Pending</div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Pay Per Click Advertising</td>
                                            <td class="font-weight-bold">$523</td>
                                            <td>30 Jun 2018</td>
                                            <td class="font-weight-medium">
                                                <div class="badge badge-warning">Pending</div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>E-Mail Marketing</td>
                                            <td class="font-weight-bold">$781</td>
                                            <td>01 Nov 2018</td>
                                            <td class="font-weight-medium">
                                                <div class="badge badge-danger">Cancelled</div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Referral Marketing</td>
                                            <td class="font-weight-bold">$283</td>
                                            <td>20 Mar 2018</td>
                                            <td class="font-weight-medium">
                                                <div class="badge badge-warning">Pending</div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Social media marketing</td>
                                            <td class="font-weight-bold">$897</td>
                                            <td>26 Oct 2018</td>
                                            <td class="font-weight-medium">
                                                <div class="badge badge-success">Completed</div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-5 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">To Do Lists</h4>
                            <div class="list-wrapper pt-2">
                                <ul class="d-flex flex-column-reverse todo-list todo-list-custom">
                                    <li>
                                        <div class="form-check form-check-flat">
                                            <label class="form-check-label">
                                                <input class="checkbox" type="checkbox" />
                                                Meeting with Urban Team
                                            </label>
                                        </div>
                                        <i class="remove ti-close"></i>
                                    </li>
                                    <li class="completed">
                                        <div class="form-check form-check-flat">
                                            <label class="form-check-label">
                                                <input class="checkbox" type="checkbox" checked />
                                                Duplicate a project for new customer
                                            </label>
                                        </div>
                                        <i class="remove ti-close"></i>
                                    </li>
                                    <li>
                                        <div class="form-check form-check-flat">
                                            <label class="form-check-label">
                                                <input class="checkbox" type="checkbox" />
                                                Project meeting with CEO
                                            </label>
                                        </div>
                                        <i class="remove ti-close"></i>
                                    </li>
                                    <li class="completed">
                                        <div class="form-check form-check-flat">
                                            <label class="form-check-label">
                                                <input class="checkbox" type="checkbox" checked />
                                                Follow up of team zilla
                                            </label>
                                        </div>
                                        <i class="remove ti-close"></i>
                                    </li>
                                    <li>
                                        <div class="form-check form-check-flat">
                                            <label class="form-check-label">
                                                <input class="checkbox" type="checkbox" />
                                                Level up for Antony
                                            </label>
                                        </div>
                                        <i class="remove ti-close"></i>
                                    </li>
                                </ul>
                            </div>
                            <div class="add-items d-flex mb-0 mt-2">
                                <input type="text" class="form-control todo-list-input" placeholder="Add new task" />
                                <button class="add btn btn-icon text-primary todo-list-add-btn bg-transparent">
                                    <i class="icon-circle-plus"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 stretch-card grid-margin">
                    <div class="card">
                        <div class="card-body">
                            <p class="card-title mb-0">Projects</p>
                            <div class="table-responsive">
                                <table class="table table-borderless">
                                    <thead>
                                        <tr>
                                            <th class="pl-0 pb-2 border-bottom">Places</th>
                                            <th class="border-bottom pb-2">Orders</th>
                                            <th class="border-bottom pb-2">Users</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="pl-0">Kentucky</td>
                                            <td>
                                                <p class="mb-0">
                                                    <span class="font-weight-bold mr-2">65</span>(2.15%)
                                                </p>
                                            </td>
                                            <td class="text-muted">65</td>
                                        </tr>
                                        <tr>
                                            <td class="pl-0">Ohio</td>
                                            <td>
                                                <p class="mb-0">
                                                    <span class="font-weight-bold mr-2">54</span>(3.25%)
                                                </p>
                                            </td>
                                            <td class="text-muted">51</td>
                                        </tr>
                                        <tr>
                                            <td class="pl-0">Nevada</td>
                                            <td>
                                                <p class="mb-0">
                                                    <span class="font-weight-bold mr-2">22</span>(2.22%)
                                                </p>
                                            </td>
                                            <td class="text-muted">32</td>
                                        </tr>
                                        <tr>
                                            <td class="pl-0">North Carolina</td>
                                            <td>
                                                <p class="mb-0">
                                                    <span class="font-weight-bold mr-2">46</span>(3.27%)
                                                </p>
                                            </td>
                                            <td class="text-muted">15</td>
                                        </tr>
                                        <tr>
                                            <td class="pl-0">Montana</td>
                                            <td>
                                                <p class="mb-0">
                                                    <span class="font-weight-bold mr-2">17</span>(1.25%)
                                                </p>
                                            </td>
                                            <td class="text-muted">25</td>
                                        </tr>
                                        <tr>
                                            <td class="pl-0">Nevada</td>
                                            <td>
                                                <p class="mb-0">
                                                    <span class="font-weight-bold mr-2">52</span>(3.11%)
                                                </p>
                                            </td>
                                            <td class="text-muted">71</td>
                                        </tr>
                                        <tr>
                                            <td class="pl-0 pb-0">Louisiana</td>
                                            <td class="pb-0">
                                                <p class="mb-0">
                                                    <span class="font-weight-bold mr-2">25</span>(1.32%)
                                                </p>
                                            </td>
                                            <td class="pb-0">14</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 stretch-card grid-margin">
                    <div class="row">
                        <div class="col-md-12 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <p class="card-title">Charts</p>
                                    <div class="charts-data">
                                        <div class="mt-3">
                                            <p class="mb-0">Data 1</p>
                                            <div class="d-flex justify-content-between align-items-center">
                                                <div class="progress progress-md flex-grow-1 mr-4">
                                                    <div class="progress-bar bg-inf0" role="progressbar"
                                                        style="width: 95%" aria-valuenow="95" aria-valuemin="0"
                                                        aria-valuemax="100"></div>
                                                </div>
                                                <p class="mb-0">5k</p>
                                            </div>
                                        </div>
                                        <div class="mt-3">
                                            <p class="mb-0">Data 2</p>
                                            <div class="d-flex justify-content-between align-items-center">
                                                <div class="progress progress-md flex-grow-1 mr-4">
                                                    <div class="progress-bar bg-info" role="progressbar"
                                                        style="width: 35%" aria-valuenow="35" aria-valuemin="0"
                                                        aria-valuemax="100"></div>
                                                </div>
                                                <p class="mb-0">1k</p>
                                            </div>
                                        </div>
                                        <div class="mt-3">
                                            <p class="mb-0">Data 3</p>
                                            <div class="d-flex justify-content-between align-items-center">
                                                <div class="progress progress-md flex-grow-1 mr-4">
                                                    <div class="progress-bar bg-info" role="progressbar"
                                                        style="width: 48%" aria-valuenow="48" aria-valuemin="0"
                                                        aria-valuemax="100"></div>
                                                </div>
                                                <p class="mb-0">992</p>
                                            </div>
                                        </div>
                                        <div class="mt-3">
                                            <p class="mb-0">Data 4</p>
                                            <div class="d-flex justify-content-between align-items-center">
                                                <div class="progress progress-md flex-grow-1 mr-4">
                                                    <div class="progress-bar bg-info" role="progressbar"
                                                        style="width: 25%" aria-valuenow="25" aria-valuemin="0"
                                                        aria-valuemax="100"></div>
                                                </div>
                                                <p class="mb-0">687</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 stretch-card grid-margin grid-margin-md-0">
                            <div class="card data-icon-card-primary">
                                <div class="card-body">
                                    <p class="card-title text-white">Number of Meetings</p>
                                    <div class="row">
                                        <div class="col-8 text-white">
                                            <h3>34040</h3>
                                            <p class="text-white font-weight-500 mb-0">
                                                The total number of sessions within the date
                                                range.It is calculated as the sum .
                                            </p>
                                        </div>
                                        <div class="col-4 background-icon"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 stretch-card grid-margin">
                    <div class="card">
                        <div class="card-body">
                            <p class="card-title">Notifications</p>
                            <ul class="icon-data-list">
                                <li>
                                    <div class="d-flex">
                                        <img src="images/faces/face1.jpg" alt="user" />
                                        <div>
                                            <p class="text-info mb-1">Isabella Becker</p>
                                            <p class="mb-0">
                                                Sales dashboard have been created
                                            </p>
                                            <small>9:30 am</small>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="d-flex">
                                        <img src="images/faces/face2.jpg" alt="user" />
                                        <div>
                                            <p class="text-info mb-1">Adam Warren</p>
                                            <p class="mb-0">You have done a great job #TW111</p>
                                            <small>10:30 am</small>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="d-flex">
                                        <img src="images/faces/face3.jpg" alt="user" />
                                        <div>
                                            <p class="text-info mb-1">Leonard Thornton</p>
                                            <p class="mb-0">
                                                Sales dashboard have been created
                                            </p>
                                            <small>11:30 am</small>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="d-flex">
                                        <img src="images/faces/face4.jpg" alt="user" />
                                        <div>
                                            <p class="text-info mb-1">George Morrison</p>
                                            <p class="mb-0">
                                                Sales dashboard have been created
                                            </p>
                                            <small>8:50 am</small>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="d-flex">
                                        <img src="images/faces/face5.jpg" alt="user" />
                                        <div>
                                            <p class="text-info mb-1">Ryan Cortez</p>
                                            <p class="mb-0">Herbs are fun and easy to grow.</p>
                                            <small>9:00 am</small>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <p class="card-title">Advanced Table</p>
                            <div class="row">
                                <div class="col-12 ltr">
                                    <div class="table-responsive">
                                        <table id="example" class="display expandable-table" style="width: 100%">
                                            <thead>
                                                <tr>
                                                    <th>Quote#</th>
                                                    <th>Product</th>
                                                    <th>Business type</th>
                                                    <th>Policy holder</th>
                                                    <th>Premium</th>
                                                    <th>Status</th>
                                                    <th>Updated at</th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
        <footer class="footer">
            <div class="d-sm-flex justify-content-center justify-content-sm-between">
                <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">کپی رایت 2021
                    <a href="https://www.bootstrapdash.com/" target="_blank">سایت منبع</a>
                    همه حقوق نزد سایت منبع محفوظ است</span>
                <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">ساخت شده با دست و
                    <i class="ti-heart text-danger ml-1"></i></span>
            </div>
        </footer>
        <!-- partial -->
    </div>
@endsection
