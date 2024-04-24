@extends('web.layouts.default')
@section('keywords'){{$keywords??'Castnet'}}@endsection
@section('content')
@php
$setting = appSetting();
@endphp
    <!-- Breadcrumb Start -->
    <section class="section_breadcrumb partners_sponsors_bg">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <h2 class="breadcrumb_title">User Dashboard</h2>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb End -->
    <!-- Dashboard Start -->
    <section class="section_dashboard">
        <div class="container-fluid px-0">
            <div class="row g-0">
                <div class="col-12">
                    <div class="d-flex flex-column flex-lg-row gap-3">
                        <div class="dashboard_side flex-lg-grow-1">
                            <div class="profile-box">
                                <img src="assets/web/images/dashboard_profile.png" alt="profile" class="profile-img">
                                <h3 class="profile-text">Admin Name</h3>
                            </div>
                            <div class="d-flex gap-4 gap-lg-0 align-items-center justify-content-center flex-lg-column flex-wrap w-lg-100">
                                <a href="#" class="dashboard-link">
                                    <div class="dashboard-links">
                                        <div class="d-flex align-items-center gap-2 gap-lg-4">
                                            <img src="assets/web/images/icon_user.png" alt="icon" class="icons">
                                            <span>member</span>
                                        </div>
                                    </div>
                                </a>
                                <a href="#" class="dashboard-link">
                                    <div class="dashboard-links">
                                        <div class="d-flex align-items-center gap-2 gap-lg-4">
                                            <img src="assets/web/images/icon_user.png" alt="icon" class="icons">
                                            <span>sponser</span>
                                        </div>
                                    </div>
                                </a>
                                <a href="#" class="dashboard-link">
                                    <div class="dashboard-links">
                                        <div class="d-flex align-items-center gap-2 gap-lg-4">
                                            <img src="assets/web/images/icon_group.png" alt="icon" class="icons">
                                            <span>partner</span>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="dashboard_content flex-lg-grow-1">
                            <section class="section_content">
                                <div class="container-fluid">
                                    <div class="row mb-5">
                                        <div class="col-12">
                                            <h2 class="section_title">Member Detail</h2>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-10 mx-auto">
                                            <form action="#">
                                                <div class="row gy-4 gy-lg-0 gx-lg-5">
                                                    <div class="col-lg-6">
                                                        <div class="input-box">
                                                            <label for="input1">Organization Name:</label>
                                                            <div class="input-group">
                                                                <input type="text" id="input1" class="form-control" placeholder="Lorem Ipsum is simply dummy.">
                                                                <div class="input-group-text">
                                                                    <a href="#">
                                                                        <img src="assets/web/images/icon_edit.png" alt="edit" class="img-fluid">
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="input-box">
                                                            <label for="input1">Organization Name:</label>
                                                            <div class="input-group">
                                                                <input type="text" id="input1" class="form-control" placeholder="Lorem Ipsum is simply dummy.">
                                                                <div class="input-group-text">
                                                                    <a href="#">
                                                                        <img src="assets/web/images/icon_edit.png" alt="edit" class="img-fluid">
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="input-box">
                                                            <label for="input1">Organization Name:</label>
                                                            <div class="input-group">
                                                                <input type="text" id="input1" class="form-control" placeholder="Lorem Ipsum is simply dummy.">
                                                                <div class="input-group-text">
                                                                    <a href="#">
                                                                        <img src="assets/web/images/icon_edit.png" alt="edit" class="img-fluid">
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="input-box">
                                                            <label for="input1">Organization Name:</label>
                                                            <div class="input-group">
                                                                <input type="text" id="input1" class="form-control" placeholder="Lorem Ipsum is simply dummy.">
                                                                <div class="input-group-text">
                                                                    <a href="#">
                                                                        <img src="assets/web/images/icon_edit.png" alt="edit" class="img-fluid">
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="input-box">
                                                            <label for="input1">Organization Name:</label>
                                                            <div class="input-group">
                                                                <input type="text" id="input1" class="form-control" placeholder="Lorem Ipsum is simply dummy.">
                                                                <div class="input-group-text">
                                                                    <a href="#">
                                                                        <img src="assets/web/images/icon_edit.png" alt="edit" class="img-fluid">
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="input-box">
                                                            <label for="input1">Organization Name:</label>
                                                            <div class="input-group">
                                                                <input type="text" id="input1" class="form-control" placeholder="Lorem Ipsum is simply dummy.">
                                                                <div class="input-group-text">
                                                                    <a href="#">
                                                                        <img src="assets/web/images/icon_edit.png" alt="edit" class="img-fluid">
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="input-box">
                                                            <label for="input1">Organization Name:</label>
                                                            <div class="input-group">
                                                                <input type="text" id="input1" class="form-control" placeholder="Lorem Ipsum is simply dummy.">
                                                                <div class="input-group-text">
                                                                    <a href="#">
                                                                        <img src="assets/web/images/icon_edit.png" alt="edit" class="img-fluid">
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="input-box">
                                                            <label for="input1">Organization Name:</label>
                                                            <div class="input-group">
                                                                <input type="text" id="input1" class="form-control" placeholder="Lorem Ipsum is simply dummy.">
                                                                <div class="input-group-text">
                                                                    <a href="#">
                                                                        <img src="assets/web/images/icon_edit.png" alt="edit" class="img-fluid">
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="input-box">
                                                            <label for="input1">Organization Name:</label>
                                                            <div class="input-group">
                                                                <input type="text" id="input1" class="form-control" placeholder="Lorem Ipsum is simply dummy.">
                                                                <div class="input-group-text">
                                                                    <a href="#">
                                                                        <img src="assets/web/images/icon_edit.png" alt="edit" class="img-fluid">
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="input-box">
                                                            <label for="input1">Organization Name:</label>
                                                            <div class="input-group">
                                                                <input type="text" id="input1" class="form-control" placeholder="Lorem Ipsum is simply dummy.">
                                                                <div class="input-group-text">
                                                                    <a href="#">
                                                                        <img src="assets/web/images/icon_edit.png" alt="edit" class="img-fluid">
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="input-box">
                                                            <label for="input1">Organization Name:</label>
                                                            <div class="input-group">
                                                                <input type="text" id="input1" class="form-control" placeholder="Lorem Ipsum is simply dummy.">
                                                                <div class="input-group-text">
                                                                    <a href="#">
                                                                        <img src="assets/web/images/icon_edit.png" alt="edit" class="img-fluid">
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="input-box">
                                                            <label for="input1">Organization Name:</label>
                                                            <div class="input-group">
                                                                <input type="text" id="input1" class="form-control" placeholder="Lorem Ipsum is simply dummy.">
                                                                <div class="input-group-text">
                                                                    <a href="#">
                                                                        <img src="assets/web/images/icon_edit.png" alt="edit" class="img-fluid">
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="input-box">
                                                            <label for="input1">Organization Name:</label>
                                                            <div class="input-group">
                                                                <input type="text" id="input1" class="form-control" placeholder="Lorem Ipsum is simply dummy.">
                                                                <div class="input-group-text">
                                                                    <a href="#">
                                                                        <img src="assets/web/images/icon_edit.png" alt="edit" class="img-fluid">
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="input-box">
                                                            <label for="input1">Organization Name:</label>
                                                            <div class="input-group">
                                                                <input type="text" id="input1" class="form-control" placeholder="Lorem Ipsum is simply dummy.">
                                                                <div class="input-group-text">
                                                                    <a href="#">
                                                                        <img src="assets/web/images/icon_edit.png" alt="edit" class="img-fluid">
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </section>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Dashboard End -->
@stop


