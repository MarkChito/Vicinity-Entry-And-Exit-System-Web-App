    <div class="content-wrapper" id="attendance_interface">
        <!-- Header -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-lg-6 col-10">
                        <h1 class="m-0"><?= $current_tab ?></h1>
                    </div>
                    <div class="col-lg-6 col-2" style="text-align: right;">
                        <a href="#" class="btn btn-success" data-toggle="modal" data-target="#add_new_visitor" id="btn_add_new_visitor"><i class="fas fa-users"></i><span id="new_visitor">&nbsp; Visitor</span></a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main Content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <!-- Scan RFID -->
                    <div class="col-lg-5 col-12">
                        <div class="card">
                            <!-- <div class="card-header">
                                <span class="card-title text-muted text-bold" id="scan_rfid_header">RFID Reader is ready ...</span>
                            </div> -->
                            <div class="card-body">
                                <img src="<?= base_url() ?>dist/img/scan_rfid_gif.gif" id="scan_rfid_image" width="100%" height="auto" alt="Scan RFID Image">
                            </div>
                            <div class="card-footer">
                                <form action="" method="post" id="attendance_rfid_number">
                                    <input type="number" class="form-control" id="input_attendance_rfid_number" placeholder="Enter RFID Number" autofocus>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- Personal Information and Personal Attendance Record-->
                    <div class="col-lg-7 col-12">
                        <!-- Personal Information -->
                        <div class="card">
                            <div class="card-header">
                                <span class="card-title text-muted text-bold"><i class="fas fa-user-alt"></i>&nbsp; Personal Information</span>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-8">
                                        <h1 class="profile-username text-center text-bold w-100" style="font-size: x-large;" id="attendance_name"><?= strtoupper("Users's Name") ?></h1>
                                        <p class="text-center text-muted" id="attendance_occupation">User Type</p>
                                        <div id="other_personal_details">
                                            <div class="form-group">
                                                <label for="" class="col-form-label d-inline" id="employee_student_id_label">RFID Number: </label>
                                                <p class="text-center form-control" style="font-size: large;" id="attendance_employee_student_id">User's RFID Number</p>
                                            </div>

                                            <div class="form-group">
                                                <label for="" class="col-form-label d-inline">Gender: </label>
                                                <p class="text-center form-control" style="font-size: large;" id="attendance_gender">User's Gender</p>
                                            </div>
                                            <div class="form-group">
                                                <label for="" class="col-form-label d-inline">Marital Status: </label>
                                                <p class="text-center form-control" style="font-size: large;" id="attendance_marital_status">User's Marital Status</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <img class="img-bordered-sm" id="attendance_image" src="<?= base_url() ?>dist/img/default_user_image.webp" width="100%" height="300" alt="Profile Image">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Personal Attendance Record -->
                        <div class="card">
                            <div class="card-header">
                                <span class="card-title text-muted text-bold"><i class="fas fa-tasks"></i>&nbsp; <span id="user_attendance_title">User's Attendance Records</span></span>
                            </div>
                            <div class="card-body">
                                <table id="attendance_list" class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>Date</th>
                                            <th>Time In (Morning)</th>
                                            <th>Time Out (Morning)</th>
                                            <th>Time In (Afternoon)</th>
                                            <th>Time Out (Afternoon)</th>
                                        </tr>
                                    </thead>
                                    <tbody id="attendance_data">
                                        <!-- Data from AJAX -->
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>