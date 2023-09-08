        <!-- Footer -->
            <footer class="main-footer">
                <strong>Copyright &copy; <span class="getFullYear"></span> <a href="<?= base_url()."main" ?>">Vicinity Entry and Exit System</a>.</strong>
                All rights reserved.
                <div class="float-right d-none d-sm-inline-block">
                    <b>Version</b> 2.0.0
                </div>
            </footer>
        </div>
        
        <!-- Logout Modal-->
        <div class="modal fade" id="logout" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title text-dark" id="exampleModalLongTitle">Logout?</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        Are you sure?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                        <button type="button" class="btn btn-success" id="btn_logout">Logout</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Add New Student Modal-->
        <div class="modal fade" id="add_new_student" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title text-dark" id="exampleModalLongTitle">Add New Student</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="<?= base_url() ?>main/insert_student" method="post" enctype="multipart/form-data">
                        <div class="modal-body">
                            <div class="text-center">
                                <img id="user_img_2" class="rounded-circle img-bordered-sm" width="200" height="200" src="<?= base_url() ?>dist/img/default_user_image.webp">
                            </div>
                            <div class="form-group mt-3">
                                <div class="input-group">
                                    <div class="custom-file" style="width: 400px;">
                                        <input type="file" class="custom-file-input fileficker" id="user_img_attachment_2" name="user_img_attachment_2" accept=".jpg, .jpeg, .png, .gif, .webp">
                                        <label class="file-label" for="user_img_attachment_2" id="user_img_label_2">Choose file</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-4 col-12">
                                    <div class="form-group mb-3">
                                        <label class="col-form-label" for="student_first_name">First Name</label>
                                        <input type="text" class="form-control" id="student_first_name" name="student_first_name" placeholder="Enter First Name" required>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-12">
                                    <div class="form-group mb-3">
                                        <label class="col-form-label" for="student_middle_name">Middle Name (Optional)</label>
                                        <input type="text" class="form-control" id="student_middle_name" name="student_middle_name" placeholder="Enter Middle Name">
                                    </div>
                                </div>
                                <div class="col-lg-4 col-12">
                                    <div class="form-group mb-3">
                                        <label class="col-form-label" for="student_last_name">Last Name</label>
                                        <input type="text" class="form-control" id="student_last_name" name="student_last_name" placeholder="Enter Last Name" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-4 col-12">
                                    <div class="form-group mb-3">
                                        <label class="col-form-label d-block" for="student_teachers">Teachers</label>
                                        <select id="student_teachers" name="student_teachers" placeholder="Select Teachers" data-search="true" data-silent-initial-value-set="true" multiple>
                                            <?php $GET_TEACHER_DATA = $this->main_model->MOD_GET_TEACHER_DATA(); ?>
                                            <?php if ($GET_TEACHER_DATA): ?>
                                                <?php foreach ($GET_TEACHER_DATA as $GET_TEACHER_DATA_ROW): ?>
                                                    <option value="<?= $GET_TEACHER_DATA_ROW->id ?>"><?= $GET_TEACHER_DATA_ROW->first_name." ".$GET_TEACHER_DATA_ROW->last_name ?></option>
                                                <?php endforeach; ?>
                                            <?php endif; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-8 col-12">
                                    <div class="form-group mb-3">
                                        <label class="col-form-label" for="student_rfid_number">RFID Number</label>
                                        <input type="number" class="form-control" id="student_rfid_number" name="student_rfid_number" placeholder="Enter RFID Number" required>
                                        <small class="text-danger d-none" id="warning_rfid_in_use_add_student">This RFID Number is already in use.</small>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-4 col-12">
                                    <div class="form-group mb-3">
                                        <label class="col-form-label" for="student_course">Strand</label>
                                        <select name="student_course" id="student_course" class="custom-select form-control" required>
                                            <option selected value disabled>-- Select Strand --</option>
                                            <option value="None (Junior High School)">None (Junior High School)</option>
                                            <option value="GAS (General Academic Strand)">GAS (General Academic Strand)</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-12">
                                    <div class="form-group mb-3">
                                        <label class="col-form-label" for="student_year">Grade</label>
                                        <select name="student_year" id="student_year" class="custom-select form-control" disabled required>
                                            <option value="Select a Strand First" selected disabled>-- Select a Strand First --</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-12">
                                    <div class="form-group mb-3">
                                        <label class="col-form-label" for="student_section">Section</label>
                                        <input type="text" class="form-control" id="student_section" name="student_section" placeholder="Enter Section" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6 col-12">
                                    <div class="form-group mb-3">
                                        <label class="col-form-label" for="student_email_address">Email Address (Optional)</label>
                                        <input type="email" class="form-control" id="add_student_email_address" name="add_student_email_address" placeholder="Enter Email Address">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-12">
                                    <div class="form-group mb-3">
                                        <label class="col-form-label" for="add_student_mobile_number">Mobile Number (Optional)</label>
                                        <input type="number" class="form-control" id="add_student_mobile_number" name="add_student_mobile_number" placeholder="Enter Mobile Number">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-success">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Edit Student Modal-->
        <div class="modal fade" id="edit_student" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title text-dark" id="exampleModalLongTitle">Edit Student</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="<?= base_url() ?>main/update_student" method="post" enctype="multipart/form-data">
                        <div class="modal-body">
                            <div class="text-center">
                                <img id="edit_user_img_2" class="rounded-circle img-bordered-sm" width="200" height="200" src="<?= base_url() ?>dist/img/default_user_image.webp">
                            </div>
                            <div class="form-group mt-3">
                                <div class="input-group">
                                    <div class="custom-file" style="width: 400px;">
                                        <input type="file" class="custom-file-input fileficker" id="edit_user_img_attachment_2" name="edit_user_img_attachment_2" accept=".jpg, .jpeg, .png, .gif, .webp">
                                        <label class="custom-file-label" for="edit_user_img_attachment_2" id="edit_user_img_label_2">Choose file</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-4 col-12">
                                    <div class="form-group mb-3">
                                        <label class="col-form-label" for="edit_student_first_name">First Name</label>
                                        <input type="text" class="form-control" id="edit_student_first_name" name="edit_student_first_name" placeholder="Enter First Name" required>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-12">
                                    <div class="form-group mb-3">
                                        <label class="col-form-label" for="edit_student_middle_name">Middle Name (Optional)</label>
                                        <input type="text" class="form-control" id="edit_student_middle_name" name="edit_student_middle_name" placeholder="Enter Middle Name">
                                    </div>
                                </div>
                                <div class="col-lg-4 col-12">
                                    <div class="form-group mb-3">
                                        <label class="col-form-label" for="edit_student_last_name">Last Name</label>
                                        <input type="text" class="form-control" id="edit_student_last_name" name="edit_student_last_name" placeholder="Enter Last Name" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-4 col-12">
                                    <div class="form-group mb-3">
                                        <label class="col-form-label d-block" for="edit_student_teachers">Teachers</label>
                                        <select id="edit_student_teachers" name="edit_student_teachers" placeholder="Select Teachers" data-search="true" data-silent-initial-value-set="true" multiple>
                                            <?php $GET_TEACHER_DATA = $this->main_model->MOD_GET_TEACHER_DATA(); ?>
                                            <?php if ($GET_TEACHER_DATA): ?>
                                                <?php foreach ($GET_TEACHER_DATA as $GET_TEACHER_DATA_ROW): ?>
                                                    <option value="<?= $GET_TEACHER_DATA_ROW->id ?>"><?= $GET_TEACHER_DATA_ROW->first_name." ".$GET_TEACHER_DATA_ROW->last_name ?></option>
                                                <?php endforeach; ?>
                                            <?php endif; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-8 col-12">
                                    <div class="form-group mb-3">
                                        <label class="col-form-label" for="edit_student_rfid_number">RFID Number</label>
                                        <input type="number" class="form-control" id="edit_student_rfid_number" name="edit_student_rfid_number" placeholder="Enter RFID Number" required>
                                        <small class="text-danger d-none" id="warning_rfid_in_use">This RFID Number is already in use.</small>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-4 col-12">
                                    <div class="form-group mb-3">
                                        <label class="col-form-label" for="edit_student_course">Strand</label>
                                        <select name="edit_student_course" id="edit_student_course" class="custom-select form-control" required>
                                            <option selected value disabled>-- Select Strand --</option>
                                            <option value="None (Junior High School)">None (Junior High School)</option>
                                            <option value="GAS (General Academic Strand)">GAS (General Academic Strand)</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-12">
                                    <div class="form-group mb-3">
                                        <label class="col-form-label" for="edit_student_year">Grade</label>
                                        <select name="edit_student_year" id="edit_student_year" class="custom-select form-control" required></select>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-12">
                                    <div class="form-group mb-3">
                                        <label class="col-form-label" for="edit_student_section">Section</label>
                                        <input type="text" class="form-control" id="edit_student_section" name="edit_student_section" placeholder="Enter Section" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6 col-12">
                                    <div class="form-group mb-3">
                                        <label class="col-form-label" for="edit_student_email_address">Email Address (Optional)</label>
                                        <input type="email" class="form-control" id="edit_student_email_address" name="edit_student_email_address" placeholder="Enter Email Address">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-12">
                                    <div class="form-group mb-3">
                                        <label class="col-form-label" for="edit_student_mobile_number">Mobile Number (Optional)</label>
                                        <input type="number" class="form-control" id="edit_student_mobile_number" name="edit_student_mobile_number" placeholder="Enter Mobile Number">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <input type="hidden" id="edit_student_id" name="edit_student_id">
                            <input type="hidden" id="edit_student_old_rfid_number" name="edit_student_old_rfid_number">
                            <input type="hidden" id="edit_student_old_image" name="edit_student_old_image">
                            <input type="hidden" id="student_is_personal" name="student_is_personal">
                            <input type="hidden" id="student_data_from" name="student_data_from">

                            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-success">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        
        <!-- Edit Student Personal Information Modal-->
        <div class="modal fade" id="edit_student_personal_information" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title text-dark" id="exampleModalLongTitle">Edit Personal Information</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="<?= base_url() ?>main/update_student_personal_information" method="post" enctype="multipart/form-data">
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="col-form-label" for="personal_student_id">Student ID</label>
                                        <input type="text" class="form-control" id="personal_student_id" name="personal_student_id" placeholder="Enter Student ID">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-4 col-12">
                                    <div class="form-group">
                                        <label class="col-form-label" for="personal_student_first_name">First Name</label>
                                        <input type="text" class="form-control" id="personal_student_first_name" name="personal_student_first_name" placeholder="Enter First Name" required>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-12">
                                    <div class="form-group">
                                        <label class="col-form-label" for="personal_student_middle_name">Middle Name (Optional)</label>
                                        <input type="text" class="form-control" id="personal_student_middle_name" name="personal_student_middle_name" placeholder="Enter Middle Name">
                                    </div>
                                </div>
                                <div class="col-lg-4 col-12">
                                    <div class="form-group">
                                        <label class="col-form-label" for="personal_student_last_name">Last Name</label>
                                        <input type="text" class="form-control" id="personal_student_last_name" name="personal_student_last_name" placeholder="Enter Last Name" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6 col-12">
                                    <div class="form-group">
                                        <label class="col-form-label" for="personal_student_birthday">Birthday</label>
                                        <input type="date" class="form-control" id="personal_student_birthday" name="personal_student_birthday">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-12">
                                    <div class="form-group">
                                        <label class="col-form-label" for="personal_student_gender">Gender</label>
                                        <select name="personal_student_gender" id="personal_student_gender" class="custom-select">
                                            <option value selected disabled>-- Select Gender --</option>
                                            <option value="Male">Male</option>
                                            <option value="Female">Female</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6 col-12">
                                    <div class="form-group">
                                        <label class="col-form-label" for="personal_student_marital_status">Marital Status</label>
                                        <select name="personal_student_marital_status" id="personal_student_marital_status" class="custom-select">
                                            <option value selected disabled>-- Select Marital Status --</option>
                                            <option value="Single">Single</option>
                                            <option value="Married">Married</option>
                                            <option value="Widowed">Widowed</option>
                                            <option value="Divorced">Divorced</option>
                                            <option value="Separated">Separated</option>
                                            <option value="Domestic Partnership">Domestic Partnership</option>
                                            <option value="Civil Union">Civil Union</option>
                                            <option value="Annulled">Annulled</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-12">
                                    <div class="form-group">
                                        <label class="col-form-label" for="personal_student_nationality">Nationality</label>
                                        <select name="personal_student_nationality" id="personal_student_nationality" class="custom-select">
                                            <option value selected disabled>-- Select Nationality --</option>
                                            <option value="American">American</option>
                                            <option value="Brazillian">Brazillian</option>
                                            <option value="British">British</option>
                                            <option value="Chinese">Chinese</option>
                                            <option value="Filipino">Filipino</option>
                                            <option value="French">French</option>
                                            <option value="German">German</option>
                                            <option value="Indian">Indian</option>
                                            <option value="Japanese">Japanese</option>
                                            <option value="Mexican">Mexican</option>
                                            <option value="Russian">Russian</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group mb-0">
                                        <label class="col-form-label" for="personal_student_home_address">Home Address</label>
                                        <textarea name="personal_student_home_address" id="personal_student_home_address" class="form-control" placeholder="Enter Home Address"></textarea>
                                    </div>
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input " id="same_current_address">
                                        <label class="form-check-label" for="same_current_address">Same As Current Address</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="col-form-label" for="personal_student_current_address">Current Address</label>
                                        <textarea name="personal_student_current_address" id="personal_student_current_address" class="form-control" placeholder="Enter Current Address"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <input type="hidden" name="personal_student_primary_id" id="personal_student_primary_id">
                            <input type="hidden" name="personal_old_student_id" id="personal_old_student_id">
                            <input type="hidden" name="data_from" id="data_from">
                            
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-success">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Edit Student Contact Details Modal-->
        <div class="modal fade" id="edit_student_contact_details" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title text-dark" id="exampleModalLongTitle">Edit Contact Details</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="<?= base_url() ?>main/update_student_contact_details" method="post" enctype="multipart/form-data">
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-lg-6 col-12">
                                    <div class="form-group">
                                        <label class="col-form-label" for="student_mobile_number">Mobile Number</label>
                                        <input type="number" class="form-control" id="student_mobile_number" name="student_mobile_number" placeholder="Enter Mobile Number">
                                        <small id="emailHelp" class="form-text text-muted">Personal Mobile Number</small>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-12">
                                    <div class="form-group">
                                        <label class="col-form-label" for="student_email_address">Email Address</label>
                                        <input type="email" class="form-control" id="student_email_address" name="student_email_address" placeholder="Enter Email">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6 col-12">
                                    <div class="form-group">
                                        <label class="col-form-label" for="student_guardian_name">Guardian's Name</label>
                                        <input type="text" class="form-control" id="student_guardian_name" name="student_guardian_name" placeholder="Enter Guardian's Name">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-12">
                                    <div class="form-group">
                                        <label class="col-form-label" for="student_guardian_mobile_number">Guardian's Mobile Number</label>
                                        <input type="number" class="form-control" id="student_guardian_mobile_number" name="student_guardian_mobile_number" placeholder="Enter Guardian's Mobile Number">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="col-form-label" for="student_facebook_account">Facebook Account</label>
                                        <input type="text" class="form-control" id="student_facebook_account" name="student_facebook_account" placeholder="Enter Facebook Account">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="col-form-label" for="student_other_email_address">Other Email Address</label>
                                        <input type="email" class="form-control" id="student_other_email_address" name="student_other_email_address" placeholder="Enter Other Email Address">
                                        <small id="emailHelp" class="form-text text-muted">Other email address like Yahoo, Skype, etc.</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <input type="hidden" name="contact_student_primary_id" id="contact_student_primary_id">
                            <input type="hidden" name="contact_data_from" id="contact_data_from">
                            
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-success">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        
        <!-- Add Student Education Modal-->
        <div class="modal fade" id="add_student_educational_background" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title text-dark" id="exampleModalLongTitle">Add Education Details</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="<?= base_url() ?>main/add_student_education" method="post" enctype="multipart/form-data">
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="col-form-label" for="education_student_school_name">School Name</label>
                                        <input type="text" class="form-control" id="education_student_school_name" name="education_student_school_name" placeholder="Enter School Name" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="col-form-label" for="education_student_strand_course">Strand / Course Taken</label>
                                        <input type="text" class="form-control" id="education_student_strand_course" name="education_student_strand_course" placeholder="Enter Strand or Course Taken" required>
                                        <small id="emailHelp" class="form-text text-muted">If none, please specify the degree. Example "Elementary"</small>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6 col-12">
                                    <div class="form-group">
                                        <label class="col-form-label" for="education_student_from_year">From Year</label>
                                        <input type="number" min="1800" max="2099" step="1" class="form-control" id="education_student_from_year" name="education_student_from_year" placeholder="Enter Year" required>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-12">
                                    <div class="form-group">
                                        <label class="col-form-label" for="education_student_to_year">To Year</label>
                                        <input type="number" min="1800" max="2099" step="1" class="form-control" id="education_student_to_year" name="education_student_to_year" placeholder="Enter Year" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <input type="hidden" name="education_student_primary_id" id="education_student_primary_id">
                            <input type="hidden" name="education_data_from" id="education_data_from">
                            
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-success">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        
        <!-- Edit Student Education Modal-->
        <div class="modal fade" id="edit_student_educational_background" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title text-dark" id="exampleModalLongTitle">Edit Education Details</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="<?= base_url() ?>main/update_student_education" method="post" enctype="multipart/form-data">
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="col-form-label" for="edit_education_student_school_name">School Name</label>
                                        <input type="text" class="form-control" id="edit_education_student_school_name" name="edit_education_student_school_name" placeholder="Enter School Name" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="col-form-label" for="edit_education_student_strand_course">Strand / Course Taken</label>
                                        <input type="text" class="form-control" id="edit_education_student_strand_course" name="edit_education_student_strand_course" placeholder="Enter Strand or Course Taken" required>
                                        <small id="emailHelp" class="form-text text-muted">If none, please specify the degree. Example "Elementary"</small>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6 col-12">
                                    <div class="form-group">
                                        <label class="col-form-label" for="edit_education_student_from_year">From Year</label>
                                        <input type="number" min="1800" max="2099" step="1" class="form-control" id="edit_education_student_from_year" name="edit_education_student_from_year" placeholder="Enter Year" required>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-12">
                                    <div class="form-group">
                                        <label class="col-form-label" for="edit_education_student_to_year">To Year</label>
                                        <input type="number" min="1800" max="2099" step="1" class="form-control" id="edit_education_student_to_year" name="edit_education_student_to_year" placeholder="Enter Year" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <input type="hidden" name="edit_education_student_primary_id" id="edit_education_student_primary_id">
                            <input type="hidden" name="edit_education_id" id="edit_education_id">
                            <input type="hidden" name="edit_education_data_from" id="edit_education_data_from">
                            <input type="hidden" name="edit_education_user_type" id="edit_education_user_type">
                            
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-success">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Add Student Skill Modal-->
        <div class="modal fade" id="add_student_skills" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title text-dark" id="exampleModalLongTitle">Add Skill Details</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="<?= base_url() ?>main/add_student_skills" method="post" enctype="multipart/form-data">
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="col-form-label" for="skill_name">Skill</label>
                                        <input type="text" class="form-control" id="skill_name" name="skill_name" placeholder="Enter Skill" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="col-form-label" for="skill_level">Level</label>
                                        <select name="skill_level" id="skill_level" class="form-control custom-select" required>
                                            <option value selected disabled>-- Select Level --</option>
                                            <option value="Novice">Novice</option>
                                            <option value="Advanced Beginner">Advanced Beginner</option>
                                            <option value="Competent">Competent</option>
                                            <option value="Proficient">Proficient</option>
                                            <option value="Expert">Expert</option>
                                        </select>
                                        <div id="skill_description_wrapper" class="d-none">
                                            <p></p>
                                            <p class="mb-0"><strong>Skill Description</strong> (<em><span id="skill_description_title">Novice</span></em>)</p>
                                            <ul id="skill_description"></ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <input type="hidden" name="skill_student_primary_id" id="skill_student_primary_id">
                            <input type="hidden" name="skill_data_from" id="skill_data_from">
                            
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-success">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        
        <!-- Edit Student Skill Modal-->
        <div class="modal fade" id="edit_student_skills" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title text-dark" id="exampleModalLongTitle">Edit Skill Details</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="<?= base_url() ?>main/update_student_skills" method="post" enctype="multipart/form-data">
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="col-form-label" for="edit_skill_name">Skill</label>
                                        <input type="text" class="form-control" id="edit_skill_name" name="edit_skill_name" placeholder="Enter Skill" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="col-form-label" for="edit_skill_level">Level</label>
                                        <select name="edit_skill_level" id="edit_skill_level" class="form-control custom-select" required>
                                            <option value selected disabled>-- Select Level --</option>
                                            <option value="Novice">Novice</option>
                                            <option value="Advanced Beginner">Advanced Beginner</option>
                                            <option value="Competent">Competent</option>
                                            <option value="Proficient">Proficient</option>
                                            <option value="Expert">Expert</option>
                                        </select>
                                        <div id="edit_skill_description_wrapper" class="d-none">
                                            <p></p>
                                            <p class="mb-0"><strong>Skill Description</strong> (<em><span id="edit_skill_description_title">Novice</span></em>)</p>
                                            <ul id="edit_skill_description"></ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <input type="hidden" name="edit_skill_student_primary_id" id="edit_skill_student_primary_id">
                            <input type="hidden" name="edit_skill_id" id="edit_skill_id">
                            <input type="hidden" name="edit_skill_data_from" id="edit_skill_data_from">
                            <input type="hidden" name="edit_skill_user_type" id="edit_skill_user_type">
                            
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-success">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Add New Teacher Modal-->
        <div class="modal fade" id="add_new_teacher" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title text-dark" id="exampleModalLongTitle">Add New Teacher</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="<?= base_url() ?>main/insert_teacher" method="post" enctype="multipart/form-data" id="insert_teacher_form">
                        <div class="modal-body">
                            <div class="text-center">
                                <img id="user_img_4" class="rounded-circle img-bordered-sm" width="200" height="200" src="<?= base_url() ?>dist/img/default_user_image.webp">
                            </div>
                            <div class="form-group mt-3">
                                <div class="input-group">
                                    <div class="custom-file" style="width: 400px;">
                                        <input type="file" class="custom-file-input fileficker" id="user_img_attachment_4" name="user_img_attachment_4" accept=".jpg, .jpeg, .png, .gif, .webp">
                                        <label class="custom-file-label" for="user_img_attachment_4" id="user_img_label_4">Choose file</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-4 col-12">
                                    <div class="form-group mb-3">
                                        <label class="col-form-label" for="teacher_first_name">First Name</label>
                                        <input type="text" class="form-control" id="teacher_first_name" name="teacher_first_name" placeholder="Enter First Name" required>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-12">
                                    <div class="form-group mb-3">
                                        <label class="col-form-label" for="teacher_middle_name">Middle Name (Optional)</label>
                                        <input type="text" class="form-control" id="teacher_middle_name" name="teacher_middle_name" placeholder="Enter Middle Name">
                                    </div>
                                </div>
                                <div class="col-lg-4 col-12">
                                    <div class="form-group mb-3">
                                        <label class="col-form-label" for="teacher_last_name">Last Name</label>
                                        <input type="text" class="form-control" id="teacher_last_name" name="teacher_last_name" placeholder="Enter Last Name" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-4 col-12">
                                    <div class="form-group mb-3">
                                        <label class="col-form-label" for="teacher_rfid_number">RFID Number</label>
                                        <input type="number" class="form-control" id="teacher_rfid_number" name="teacher_rfid_number" placeholder="Enter RFID Number" required>
                                        <small class="text-danger d-none" id="warning_rfid_in_use_add_teacher">This RFID Number is already in use.</small>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-12">
                                    <div class="form-group mb-3">
                                        <label class="col-form-label" for="teacher_email_address">Email Address (Optional)</label>
                                        <input type="email" class="form-control" id="teacher_email_address" name="teacher_email_address" placeholder="Enter Email Address">
                                    </div>
                                </div>
                                <div class="col-lg-4 col-12">
                                    <div class="form-group mb-3">
                                        <label class="col-form-label" for="teacher_mobile_number">Mobile Number (Optional)</label>
                                        <input type="number" class="form-control" id="teacher_mobile_number" name="teacher_mobile_number" placeholder="Enter Mobile Number">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-4 col-12">
                                    <div class="form-group mb-3">
                                        <label class="col-form-label" for="teacher_username">Username</label>
                                        <input type="text" class="form-control" id="teacher_username" name="teacher_username" placeholder="Enter Username" required>
                                        <small class="text-danger d-none" id="teacher_username_error">This username is already taken</small>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-12">
                                    <div class="form-group mb-3">
                                        <label class="col-form-label" for="teacher_password">Password</label>
                                        <input type="password" class="form-control" id="teacher_password" name="teacher_password" placeholder="Enter Password" required>
                                        <small class="text-danger d-none" id="password_error_teacher">Passwords do not match</small>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-12">
                                    <div class="form-group mb-3">
                                        <label class="col-form-label" for="teacher_confirm_password">Confirm Password</label>
                                        <input type="password" class="form-control" id="teacher_confirm_password" name="teacher_confirm_password" placeholder="Confirm Password" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-success">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        
        <!-- Edit Teacher Modal-->
        <div class="modal fade" id="edit_teacher" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title text-dark" id="exampleModalLongTitle">Edit Teacher</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="<?= base_url() ?>main/update_teacher" method="post" enctype="multipart/form-data" id="update_teacher_form">
                        <div class="modal-body">
                            <div class="text-center">
                                <img id="user_img_5" class="rounded-circle img-bordered-sm" width="200" height="200" src="<?= base_url() ?>dist/img/default_user_image.webp">
                            </div>
                            <div class="form-group mt-3">
                                <div class="input-group">
                                    <div class="custom-file" style="width: 400px;">
                                        <input type="file" class="custom-file-input fileficker" id="user_img_attachment_5" name="user_img_attachment_5" accept=".jpg, .jpeg, .png, .gif, .webp">
                                        <label class="custom-file-label" for="user_img_attachment_5" id="user_img_label_5">Choose file</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-4 col-12">
                                    <div class="form-group mb-3">
                                        <label class="col-form-label" for="edit_teacher_first_name">First Name</label>
                                        <input type="text" class="form-control" id="edit_teacher_first_name" name="edit_teacher_first_name" placeholder="Enter First Name" required>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-12">
                                    <div class="form-group mb-3">
                                        <label class="col-form-label" for="edit_teacher_middle_name">Middle Name (Optional)</label>
                                        <input type="text" class="form-control" id="edit_teacher_middle_name" name="edit_teacher_middle_name" placeholder="Enter Middle Name">
                                    </div>
                                </div>
                                <div class="col-lg-4 col-12">
                                    <div class="form-group mb-3">
                                        <label class="col-form-label" for="edit_teacher_last_name">Last Name</label>
                                        <input type="text" class="form-control" id="edit_teacher_last_name" name="edit_teacher_last_name" placeholder="Enter Last Name" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-4 col-12">
                                    <div class="form-group mb-3">
                                        <label class="col-form-label" for="edit_teacher_rfid_number">RFID Number</label>
                                        <input type="number" class="form-control" id="edit_teacher_rfid_number" name="edit_teacher_rfid_number" placeholder="Enter RFID Number" required>
                                        <small class="text-danger d-none" id="warning_rfid_in_use_edit_teacher">This RFID Number is already in use.</small>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-12">
                                    <div class="form-group mb-3">
                                        <label class="col-form-label" for="edit_teacher_email_address">Email Address (Optional)</label>
                                        <input type="email" class="form-control" id="edit_teacher_email_address" name="edit_teacher_email_address" placeholder="Enter Email Address">
                                    </div>
                                </div>
                                <div class="col-lg-4 col-12">
                                    <div class="form-group mb-3">
                                        <label class="col-form-label" for="edit_teacher_mobile_number">Mobile Number (Optional)</label>
                                        <input type="number" class="form-control" id="edit_teacher_mobile_number" name="edit_teacher_mobile_number" placeholder="Enter Mobile Number">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-4 col-12">
                                    <div class="form-group mb-3">
                                        <label class="col-form-label" for="edit_teacher_username">Username</label>
                                        <input type="text" class="form-control" id="edit_teacher_username" name="edit_teacher_username" placeholder="Enter Username" required>
                                        <small class="text-danger d-none" id="edit_teacher_username_error">This username is already taken</small>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-12">
                                    <div class="form-group mb-3">
                                        <label class="col-form-label" for="edit_teacher_password">Password</label>
                                        <input type="password" class="form-control" id="edit_teacher_password" name="edit_teacher_password" placeholder="Enter Password">
                                        <small class="text-danger d-none" id="edit_password_error_teacher">Passwords do not match</small>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-12">
                                    <div class="form-group mb-3">
                                        <label class="col-form-label" for="edit_teacher_confirm_password">Confirm Password</label>
                                        <input type="password" class="form-control" id="edit_teacher_confirm_password" name="edit_teacher_confirm_password" placeholder="Confirm Password">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <input type="hidden" name="edit_teacher_data_from" id="edit_teacher_data_from">
                            <input type="hidden" name="edit_teacher_old_rfid_number" id="edit_teacher_old_rfid_number">
                            <input type="hidden" name="edit_teacher_is_personal" id="edit_teacher_is_personal">
                            <input type="hidden" name="edit_teacher_id" id="edit_teacher_id">
                            <input type="hidden" name="edit_teacher_user_account_id" id="edit_teacher_user_account_id">
                            <input type="hidden" name="edit_teacher_old_image" id="edit_teacher_old_image">

                            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-success">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Edit Teacher Personal Information Modal-->
        <div class="modal fade" id="edit_teacher_personal_information" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title text-dark" id="exampleModalLongTitle">Edit Personal Information</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="<?= base_url() ?>main/update_teacher_personal_information" method="post" enctype="multipart/form-data">
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="col-form-label" for="personal_teacher_id">Teacher ID</label>
                                        <input type="text" class="form-control" id="personal_teacher_id" name="personal_teacher_id" placeholder="Enter Teacher ID">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-4 col-12">
                                    <div class="form-group">
                                        <label class="col-form-label" for="personal_teacher_first_name">First Name</label>
                                        <input type="text" class="form-control" id="personal_teacher_first_name" name="personal_teacher_first_name" placeholder="Enter First Name" required>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-12">
                                    <div class="form-group">
                                        <label class="col-form-label" for="personal_teacher_middle_name">Middle Name (Optional)</label>
                                        <input type="text" class="form-control" id="personal_teacher_middle_name" name="personal_teacher_middle_name" placeholder="Enter Middle Name">
                                    </div>
                                </div>
                                <div class="col-lg-4 col-12">
                                    <div class="form-group">
                                        <label class="col-form-label" for="personal_teacher_last_name">Last Name</label>
                                        <input type="text" class="form-control" id="personal_teacher_last_name" name="personal_teacher_last_name" placeholder="Enter Last Name" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6 col-12">
                                    <div class="form-group">
                                        <label class="col-form-label" for="personal_teacher_birthday">Birthday</label>
                                        <input type="date" class="form-control" id="personal_teacher_birthday" name="personal_teacher_birthday">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-12">
                                    <div class="form-group">
                                        <label class="col-form-label" for="personal_teacher_gender">Gender</label>
                                        <select name="personal_teacher_gender" id="personal_teacher_gender" class="custom-select">
                                            <option value selected disabled>-- Select Gender --</option>
                                            <option value="Male">Male</option>
                                            <option value="Female">Female</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6 col-12">
                                    <div class="form-group">
                                        <label class="col-form-label" for="personal_teacher_marital_status">Marital Status</label>
                                        <select name="personal_teacher_marital_status" id="personal_teacher_marital_status" class="custom-select">
                                            <option value selected disabled>-- Select Marital Status --</option>
                                            <option value="Single">Single</option>
                                            <option value="Married">Married</option>
                                            <option value="Widowed">Widowed</option>
                                            <option value="Divorced">Divorced</option>
                                            <option value="Separated">Separated</option>
                                            <option value="Domestic Partnership">Domestic Partnership</option>
                                            <option value="Civil Union">Civil Union</option>
                                            <option value="Annulled">Annulled</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-12">
                                    <div class="form-group">
                                        <label class="col-form-label" for="personal_teacher_nationality">Nationality</label>
                                        <select name="personal_teacher_nationality" id="personal_teacher_nationality" class="custom-select">
                                            <option value selected disabled>-- Select Nationality --</option>
                                            <option value="American">American</option>
                                            <option value="Brazillian">Brazillian</option>
                                            <option value="British">British</option>
                                            <option value="Chinese">Chinese</option>
                                            <option value="Filipino">Filipino</option>
                                            <option value="French">French</option>
                                            <option value="German">German</option>
                                            <option value="Indian">Indian</option>
                                            <option value="Japanese">Japanese</option>
                                            <option value="Mexican">Mexican</option>
                                            <option value="Russian">Russian</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group mb-0">
                                        <label class="col-form-label" for="personal_teacher_home_address">Home Address</label>
                                        <textarea name="personal_teacher_home_address" id="personal_teacher_home_address" class="form-control" placeholder="Enter Home Address"></textarea>
                                    </div>
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input " id="teacher_same_current_address">
                                        <label class="form-check-label" for="teacher_same_current_address">Same As Current Address</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="col-form-label" for="personal_teacher_current_address">Current Address</label>
                                        <textarea name="personal_teacher_current_address" id="personal_teacher_current_address" class="form-control" placeholder="Enter Current Address"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <input type="hidden" name="personal_teacher_primary_id" id="personal_teacher_primary_id">
                            <input type="hidden" name="personal_teacher_data_from" id="personal_teacher_data_from">
                            <input type="hidden" name="personal_old_teacher_id" id="personal_old_teacher_id">
                            
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-success">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Edit Teacher Contact Details Modal-->
        <div class="modal fade" id="edit_teacher_contact_details" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title text-dark" id="exampleModalLongTitle">Edit Contact Details</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="<?= base_url() ?>main/update_teacher_contact_details" method="post" enctype="multipart/form-data">
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-lg-6 col-12">
                                    <div class="form-group">
                                        <label class="col-form-label" for="contact_teacher_mobile_number">Mobile Number</label>
                                        <input type="number" class="form-control" id="contact_teacher_mobile_number" name="contact_teacher_mobile_number" placeholder="Enter Mobile Number">
                                        <small id="emailHelp" class="form-text text-muted">Personal Mobile Number</small>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-12">
                                    <div class="form-group">
                                        <label class="col-form-label" for="contact_teacher_email_address">Email Address</label>
                                        <input type="email" class="form-control" id="contact_teacher_email_address" name="contact_teacher_email_address" placeholder="Enter Email">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6 col-12">
                                    <div class="form-group">
                                        <label class="col-form-label" for="teacher_guardian_name">Guardian's Name</label>
                                        <input type="text" class="form-control" id="teacher_guardian_name" name="teacher_guardian_name" placeholder="Enter Guardian's Name">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-12">
                                    <div class="form-group">
                                        <label class="col-form-label" for="teacher_guardian_mobile_number">Guardian's Mobile Number</label>
                                        <input type="number" class="form-control" id="teacher_guardian_mobile_number" name="teacher_guardian_mobile_number" placeholder="Enter Guardian's Mobile Number">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="col-form-label" for="teacher_facebook_account">Facebook Account</label>
                                        <input type="text" class="form-control" id="teacher_facebook_account" name="teacher_facebook_account" placeholder="Enter Facebook Account">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="col-form-label" for="teacher_other_email_address">Other Email Address</label>
                                        <input type="email" class="form-control" id="teacher_other_email_address" name="teacher_other_email_address" placeholder="Enter Other Email Address">
                                        <small id="emailHelp" class="form-text text-muted">Other email address like Yahoo, Skype, etc.</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <input type="hidden" name="contact_teacher_primary_id" id="contact_teacher_primary_id">
                            <input type="hidden" name="contact_teacher_data_from" id="contact_teacher_data_from">
                            
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-success">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Add Teacher Education Modal-->
        <div class="modal fade" id="add_teacher_educational_background" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title text-dark" id="exampleModalLongTitle">Add Education Details</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="<?= base_url() ?>main/add_teacher_education" method="post" enctype="multipart/form-data">
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="col-form-label" for="education_teacher_school_name">School Name</label>
                                        <input type="text" class="form-control" id="education_teacher_school_name" name="education_teacher_school_name" placeholder="Enter School Name" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="col-form-label" for="education_teacher_strand_course">Strand / Course Taken</label>
                                        <input type="text" class="form-control" id="education_teacher_strand_course" name="education_teacher_strand_course" placeholder="Enter Strand or Course Taken" required>
                                        <small id="emailHelp" class="form-text text-muted">If none, please specify the degree. Example "Elementary"</small>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6 col-12">
                                    <div class="form-group">
                                        <label class="col-form-label" for="education_teacher_from_year">From Year</label>
                                        <input type="number" min="1800" max="2099" step="1" class="form-control" id="education_teacher_from_year" name="education_teacher_from_year" placeholder="Enter Year" required>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-12">
                                    <div class="form-group">
                                        <label class="col-form-label" for="education_teacher_to_year">To Year</label>
                                        <input type="number" min="1800" max="2099" step="1" class="form-control" id="education_teacher_to_year" name="education_teacher_to_year" placeholder="Enter Year" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <input type="hidden" name="education_teacher_primary_id" id="education_teacher_primary_id">
                            <input type="hidden" name="education_teacher_data_from" id="education_teacher_data_from">
                            
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-success">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Add Teacher Skill Modal-->
        <div class="modal fade" id="add_teacher_skills" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title text-dark" id="exampleModalLongTitle">Add Skill Details</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="<?= base_url() ?>main/add_teacher_skills" method="post" enctype="multipart/form-data">
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="col-form-label" for="teacher_skill_name">Skill</label>
                                        <input type="text" class="form-control" id="teacher_skill_name" name="teacher_skill_name" placeholder="Enter Skill" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="col-form-label" for="teacher_skill_level">Level</label>
                                        <select name="teacher_skill_level" id="teacher_skill_level" class="form-control custom-select" required>
                                            <option value selected disabled>-- Select Level --</option>
                                            <option value="Novice">Novice</option>
                                            <option value="Advanced Beginner">Advanced Beginner</option>
                                            <option value="Competent">Competent</option>
                                            <option value="Proficient">Proficient</option>
                                            <option value="Expert">Expert</option>
                                        </select>
                                        <div id="teacher_skill_description_wrapper" class="d-none">
                                            <p></p>
                                            <p class="mb-0"><strong>Skill Description</strong> (<em><span id="teacher_skill_description_title">Novice</span></em>)</p>
                                            <ul id="teacher_skill_description"></ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <input type="hidden" name="skill_teacher_primary_id" id="skill_teacher_primary_id">
                            <input type="hidden" name="skill_teacher_data_from" id="skill_teacher_data_from">
                            
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-success">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Edit Admin Profile Modal-->
        <div class="modal fade" id="edit_admin_profile" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title text-dark" id="exampleModalLongTitle">Edit Account Details</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="<?= base_url() ?>main/update_admin_profile" method="post" enctype="multipart/form-data" id="edit_admin_form">
                        <div class="modal-body">
                            <div class="text-center">
                                <img id="user_img_3" class="rounded-circle img-bordered-sm" width="200" height="200" src="<?= base_url() ?>dist/img/default_user_image.webp">
                            </div>
                            <div class="form-group mt-3">
                                <div class="input-group">
                                    <div class="custom-file" style="width: 400px;">
                                        <input type="file" class="custom-file-input fileficker" id="user_img_attachment_3" name="user_img_attachment_3" accept=".jpg, .jpeg, .png, .gif, .webp">
                                        <label class="custom-file-label" for="user_img_attachment_3" id="user_img_label_3">Choose file</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6 col-12">
                                    <div class="form-group mb-3">
                                        <label class="col-form-label" for="edit_admin_name">Name</label>
                                        <input type="text" class="form-control" id="edit_admin_name" name="edit_admin_name" placeholder="Enter Name" required>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-12">
                                    <div class="form-group mb-3">
                                        <label class="col-form-label" for="edit_admin_username">Username</label>
                                        <input type="text" class="form-control" id="edit_admin_username" name="edit_admin_username" placeholder="Enter Username" required>
                                        <small class="text-danger d-none" id="edit_admin_username_error">This username is already used</small>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6 col-12">
                                    <div class="form-group mb-3">
                                        <label class="col-form-label" for="edit_admin_password">Password</label>
                                        <input type="password" class="form-control" id="edit_admin_password" name="edit_admin_password" placeholder="Enter Password">
                                        <small class="text-danger d-none" id="password_error">Passwords do not match</small>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-12">
                                    <div class="form-group mb-3">
                                        <label class="col-form-label" for="edit_admin_confirm_password">Confirm Password</label>
                                        <input type="password" class="form-control" id="edit_admin_confirm_password" name="edit_admin_confirm_password" placeholder="Confirm Password">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <input type="hidden" name="edit_admin_id" id="edit_admin_id">
                            
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-success">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Add New Visitor Modal-->
        <div class="modal fade" id="add_new_visitor" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title text-dark" id="add_visitor_title">Add New Visitor</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="<?= base_url() ?>main/insert_visitor" method="post" enctype="multipart/form-data" id="insert_visitor_form">
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-lg-6 col-12">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="visitor_time_in_out" id="visitor_time_in" value="Time In" checked>
                                        <label class="form-check-label" for="visitor_time_in">Time In</label>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-12">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="visitor_time_in_out" id="visitor_time_out" value="Time Out">
                                        <label class="form-check-label" for="visitor_time_out">Time Out</label>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-lg-6 col-12" id="visitor_name_div">
                                    <div class="form-group mb-3">
                                        <label class="col-form-label" for="visitor_name">Name</label>
                                        <input type="text" class="form-control" name="visitor_name" id="visitor_name" placeholder="Enter Name">
                                        <small class="text-danger d-none" id="visitor_name_error">Cannot Leave Blank</small>
                                        <small class="text-danger d-none" id="visitor_name_error_not_time_in">This name hasn't Time In</small>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-12" id="visitor_mobile_number_div">
                                    <div class="form-group mb-3">
                                        <label class="col-form-label" for="visitor_mobile_number">Mobile Number</label>
                                        <input type="number" class="form-control" id="visitor_mobile_number" name="visitor_mobile_number" placeholder="Enter Mobile Number">
                                        <small class="text-danger d-none" id="visitor_mobile_number_error">Cannot Leave Blank</small>
                                    </div>
                                </div>
                            </div>
                            <div class="row" id="to_be_hidden">
                                <div class="col-12">
                                    <div class="form-group mb-3">
                                        <label class="col-form-label" for="visitor_purpose">Purpose of Visit</label>
                                        <textarea name="visitor_purpose" id="visitor_purpose" rows="5" class="form-control" placeholder="Enter Purpose of Visit"></textarea>
                                        <small class="text-danger d-none" id="visitor_purpose_error">Cannot Leave Blank</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                            <button type="button" class="btn btn-success" id="btn_add_update_visitor">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- View Profile Picture Modal-->
        <div class="modal fade" id="view_profile_picture" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                <div class="modal-content" style="background-color: transparent !important;">
                    <img src="" id="proof_img_container" alt="" style="text-align: center; width: 100%">
                </div>
            </div>
        </div>

        <!-- Export Data Modal-->
        <div class="modal fade" id="export_data_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title text-dark" id="exampleModalLongTitle">Export Data</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="attendance_filename">Filename</label>
                            <input type="text" id="attendance_filename" class="form-control" placeholder="Enter a Filename">
                            <small id="filename_help" class="form-text text-danger d-none">Invalid Filename</small>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-success" id="btn_export_data">Export</button>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- About the Developers Modal-->
        <div class="modal fade" id="about_the_developers_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title text-dark" id="exampleModalLongTitle">Vicinity Entry and Exit System</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="card">
                            <div class="card-header">
                                <span class="card-title text-muted text-bold"><i class="fas fa-bookmark"></i>&nbsp; System Developers</span>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-9">
                                        <p>Jazrel E. Gasid - <b>Leader</b></p>
                                        <p>Monica G. Manes - <b>Member</b></p>
                                        <p>Anna Marie B. Belleza - <b>Member</b></p>
                                        <p>Rafael S. Matos - <b>Member</b></p>
                                        <p>Edmar D. Bellen - <b>Member</b></p>
                                    </div>
                                    <div class="col-3">
                                        <img data-placement="right" class="img-fluid" src="<?= base_url() ?>dist/img/logo.png" alt="Logo">
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer text-sm">
                                <strong>Copyright &copy; <span class="getFullYear"></span> <a href="<?= base_url()."main" ?>">Vicinity Entry and Exit System</a>.</strong>
                                All rights reserved.
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>

        <?php
            if ($current_tab == "Student Personal Profile")
            {
                $data_from = $data_from;
            }

            else
            {
                $data_from = "0";
            }
        ?>

        <?php if ($this->session->userdata('success')): ?>
            <script>
                Swal.fire(
                    '<?php echo $this->session->userdata('success'); ?>',
                    '',
                    'success'
                )
            </script>

            <?php $this->session->unset_userdata('success'); ?>
        
        <?php endif; ?>
        
        <?php if ($this->session->userdata('error')): ?>
            <script>
                Swal.fire(
                    '<?php echo $this->session->userdata('error'); ?>',
                    '',
                    'error'
                )
            </script>

            <?php $this->session->unset_userdata('error'); ?>
        
        <?php endif; ?>

        <?php if ($this->session->userdata('login_success')) : ?>

            <script>
                var message = "<?= $this->session->userdata('login_success') ?>";

                var Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 2000
                });

                Toast.fire({
                    icon: 'info',
                    title: '' + message
                });
            </script>

            <?php $this->session->unset_userdata('login_success'); ?>
            <?php $this->session->unset_userdata('current_url'); ?>

        <?php endif; ?>

        <!-- Custom Javascript -->
        <script>
            $(document).ready(function(){
                var base_url = "<?= base_url() ?>";
                var current_tab = "<?= $current_tab ?>";
                var data_from = "<?= $this->input->get("data_from") ?>";
                var current_time = new Date().getHours();
                var greetings = "";
                var is_greetings = true;
                var is_prevent_from_submit = false;
                var score = 0;

                var global_rfid_number = "";
                var global_username = "";

                var url_get_students_data = base_url + "main/get_students_data";
                var url_get_teachers_data = base_url + "main/get_teachers_data";
                var url_get_user_data_student = base_url + "main/get_user_data_student";
                var url_get_user_data_teacher = base_url + "main/get_user_data_teacher";
                var url_check_user_attendance = base_url + "main/check_user_attendance";
                var url_get_attendance_data = base_url + "main/get_attendance_data";
                var url_get_user_account_data = base_url + "main/get_user_account_data";
                var url_get_visitor_data = base_url + "main/get_visitor_data";
                
                var month_name = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];

                var is_checked = false;
                var is_opened = true;
                var is_modal_opened = false;
                var time_in_out_status = "Time In";
                var visitor_data_length = 0;
                var is_time_out = false;
                var errors = 0;
                var global_is_current_address = false;

                check_screen_size();
                enable_tooltip();

                $(".getFullYear").html(new Date().getFullYear());

                VirtualSelect.init({ 
                  ele: '#student_teachers' 
                });
                
                VirtualSelect.init({ 
                  ele: '#edit_student_teachers',
                  multi: true
                });

                if (current_tab == "Attendance")
                {
                    check_input_rfid_focus();
                }

                $(window).resize(function(){
                    check_screen_size();
                })

                $("#btn_add_update_visitor").click(function(){

                    var name = $("#visitor_name").val();
                    var mobile_number = $("#visitor_mobile_number").val();
                    var purpose = $("#visitor_purpose").val();

                    if (!is_time_out)
                    {
                        if (!name)
                        {
                            $("#visitor_name").attr("class", "form-control is-invalid");
                            $("#visitor_name_error").attr("class", "text-danger");

                            errors++;
                        }

                        if (!mobile_number)
                        {
                            $("#visitor_mobile_number").attr("class", "form-control is-invalid");
                            $("#visitor_mobile_number_error").attr("class", "text-danger");

                            errors++;
                        }

                        if (!purpose)
                        {
                            $("#visitor_purpose").attr("class", "form-control is-invalid");
                            $("#visitor_purpose_error").attr("class", "text-danger");

                            errors++;
                        }

                        if (errors == 0)
                        {
                            $("#insert_visitor_form").submit();
                        }
                    }

                    else
                    {
                        get_visitor_data(url_get_visitor_data, name).then(function(visitor_data){

                            if (visitor_data.length > 0)
                            {
                                $("#insert_visitor_form").submit();
                            }

                            else
                            {
                                $("#visitor_name").attr("class", "form-control is-invalid");

                                if (!name)
                                {
                                    $("#visitor_name_error").attr("class", "text-danger");
                                }

                                else
                                {
                                    $("#visitor_name_error_not_time_in").attr("class", "text-danger");
                                }
                            }
                        })
                    }
                })

                $("#visitor_name").on("change", function(){

                    errors = 0;

                    $(this).attr("class", "form-control");
                    $("#visitor_name_error").attr("class", "d-none");
                    $("#visitor_name_error_not_time_in").attr("class", "d-none");

                })
                
                $("#visitor_mobile_number").on("change", function(){

                    errors = 0;

                    $(this).attr("class", "form-control");

                    $("#visitor_mobile_number_error").attr("class", "d-none");

                })
                
                $("#visitor_purpose").on("change", function(){

                    errors = 0;

                    $(this).attr("class", "form-control");

                    $("#visitor_purpose_error").attr("class", "d-none");

                })
                
                $("#visitor_name").on("keypress", function(){

                    errors = 0;

                    $(this).attr("class", "form-control");

                    $("#visitor_name_error").attr("class", "d-none");
                    $("#visitor_name_error_not_time_in").attr("class", "d-none");

                })
                
                $("#visitor_mobile_number").on("keypress", function(){

                    errors = 0;

                    $(this).attr("class", "form-control");

                    $("#visitor_mobile_number_error").attr("class", "d-none");

                })
                
                $("#visitor_purpose").on("keypress", function(){

                    errors = 0;

                    $(this).attr("class", "form-control");

                    $("#visitor_purpose_error").attr("class", "d-none");

                })
                
                $("#visitor_name").on("keydown", function(){

                    errors = 0;

                    $(this).attr("class", "form-control");

                    $("#visitor_name_error").attr("class", "d-none");
                    $("#visitor_name_error_not_time_in").attr("class", "d-none");

                })
                
                $("#visitor_mobile_number").on("keydown", function(){

                    errors = 0;

                    $(this).attr("class", "form-control");

                    $("#visitor_mobile_number_error").attr("class", "d-none");

                })
                
                $("#visitor_purpose").on("keydown", function(){

                    errors = 0;

                    $(this).attr("class", "form-control");

                    $("#visitor_purpose_error").attr("class", "d-none");

                })
                
                $('input[name="visitor_time_in_out"]').change(function() {
                    time_in_out_status = $(this).val()
                    
                    if ($(this).is(':checked')) 
                    {
                        if (time_in_out_status == "Time In")
                        {
                            is_time_out = false;

                            $("#to_be_hidden").attr("class", "row");
                            $("#visitor_mobile_number_div").attr("class", "col-lg-6 col-12");
                            $("#visitor_name_div").attr("class", "col-lg-6 col-12");
                            $("#btn_add_update_visitor").html("Save");
                            $("#add_visitor_title").html("Add New Visitor");
                        }

                        else
                        {
                            is_time_out = true;

                            $("#to_be_hidden").attr("class", "collapse");
                            $("#visitor_mobile_number_div").attr("class", "collapse");
                            $("#visitor_name_div").attr("class", "col-12");
                            $("#btn_add_update_visitor").html("Update");
                            $("#add_visitor_title").html("Update Existing Visitor Record");
                        }

                        $("#visitor_name").val(null);

                        $("#visitor_name").attr("class", "form-control");
                        $("#visitor_name_error").attr("class", "d-none");
                        $("#visitor_name_error_not_time_in").attr("class", "d-none");

                        $("#visitor_mobile_number").attr("class", "form-control");
                        $("#visitor_mobile_number_error").attr("class", "d-none");

                        $("#visitor_purpose").attr("class", "form-control");
                        $("#visitor_purpose_error").attr("class", "d-none");
                    }
                });

                $("#teacher_username").on("keyup", function(){
                    var username = $(this).val();

                    get_user_account_data(url_get_user_account_data, username).then(function(user_account_data){

                        if (user_account_data.length > 0)
                        {
                            if (username != global_username)
                            {
                                $("#teacher_username").attr("class", "form-control is-invalid");
                                $("#teacher_username_error").attr("class", "text-danger");
                            }

                            else
                            {
                                $("#teacher_username").attr("class", "form-control");
                                $("#teacher_username_error").attr("class", "d-none");
                            }
                        }

                        else
                        {
                            $("#teacher_username").attr("class", "form-control");
                            $("#teacher_username_error").attr("class", "d-none");
                        }
                    })
                })
                
                $("#edit_teacher_username").on("keyup", function(){
                    var username = $(this).val();

                    get_user_account_data(url_get_user_account_data, username).then(function(user_account_data){

                        if (user_account_data.length > 0)
                        {
                            if (username != global_username)
                            {
                                $("#edit_teacher_username").attr("class", "form-control is-invalid");
                                $("#edit_teacher_username_error").attr("class", "text-danger");
                            }

                            else
                            {
                                $("#edit_teacher_username").attr("class", "form-control");
                                $("#edit_teacher_username_error").attr("class", "d-none");
                            }
                        }

                        else
                        {
                            $("#edit_teacher_username").attr("class", "form-control");
                            $("#edit_teacher_username_error").attr("class", "d-none");
                        }
                    })
                })

                $("#edit_admin_username").on("keyup", function(){
                    var username = $(this).val();
                    
                    get_user_account_data(url_get_user_account_data, username).then(function(user_account_data){

                        if (user_account_data.length > 0)
                        {
                            if (username != global_username)
                            {
                                $("#edit_admin_username").attr("class", "form-control is-invalid");
                                $("#edit_admin_username_error").attr("class", "text-danger");
                            }

                            else
                            {
                                $("#edit_admin_username").attr("class", "form-control");
                                $("#edit_admin_username_error").attr("class", "d-none");
                            }
                        }

                        else
                        {
                            $("#edit_admin_username").attr("class", "form-control");
                            $("#edit_admin_username_error").attr("class", "d-none");
                        }
                    })
                })

                $("#add_new_visitor").on("hidden.bs.modal", function(){
                    is_modal_opened = false;
                })
                
                $("#edit_admin_profile").on("hidden.bs.modal", function(){
                    is_modal_opened = false;
                })

                $(".nav-link").click(function(){
                    $(this).children(".tab_spinner").attr("class", "spinner-border spinner-border-sm text-success float-right tab_spinner");
                })

                $("#teacher_password").on("keyup", function(e){
                    var password = $(this).val();
                    var confirm_password = $("#teacher_confirm_password").val();

                    if (password && confirm_password)
                    {
                        if (password != confirm_password)
                        {
                            $(this).attr("class", "form-control");
                            $("#teacher_confirm_password").attr("class", "form-control");
                            
                            $("#password_error_teacher").attr("class", "d-none");
                        }

                        else
                        {
                            $(this).attr("class", "form-control is-valid");
                            $("#teacher_confirm_password").attr("class", "form-control is-valid");
                        }
                    }

                    if (e.keyCode == 8)
                    {
                        if (password && confirm_password)
                        {
                            if (password != confirm_password)
                            {
                                $(this).attr("class", "form-control");
                                $("#teacher_confirm_password").attr("class", "form-control");
                                
                                $("#password_error_teacher").attr("class", "d-none");
                            }

                            else
                            {
                                $(this).attr("class", "form-control is-valid");
                                $("#teacher_confirm_password").attr("class", "form-control is-valid");
                            }
                        }
                    }
                })
                
                $("#teacher_confirm_password").on("keyup", function(e){
                    var password = $("#teacher_password").val();
                    var confirm_password = $(this).val();

                    if (password && confirm_password || e.keyCode == 8)
                    {
                        if (password != confirm_password )
                        {
                            $("#teacher_password").attr("class", "form-control");
                            $(this).attr("class", "form-control");
                            
                            $("#password_error_teacher").attr("class", "d-none");
                        }

                        else
                        {
                            $("#teacher_password").attr("class", "form-control is-valid");
                            $(this).attr("class", "form-control is-valid");
                        }
                    }

                    if (e.keyCode == 8)
                    {
                        if (password && confirm_password || e.keyCode == 8)
                        {
                            if (password != confirm_password )
                            {
                                $("#teacher_password").attr("class", "form-control");
                                $(this).attr("class", "form-control");
                                
                                $("#password_error_teacher").attr("class", "d-none");
                            }

                            else
                            {
                                $("#teacher_password").attr("class", "form-control is-valid");
                                $(this).attr("class", "form-control is-valid");
                            }
                        }
                    }
                })
                
                $("#edit_teacher_password").on("keyup", function(e){
                    var password = $(this).val();
                    var confirm_password = $("#edit_teacher_confirm_password").val();

                    if (password && confirm_password)
                    {
                        if (password != confirm_password)
                        {
                            $(this).attr("class", "form-control");
                            $("#edit_teacher_confirm_password").attr("class", "form-control");
                            
                            $("#edit_password_error_teacher").attr("class", "d-none");
                        }

                        else
                        {
                            $(this).attr("class", "form-control is-valid");
                            $("#edit_teacher_confirm_password").attr("class", "form-control is-valid");
                        }
                    }

                    if (e.keyCode == 8)
                    {
                        if (password && confirm_password)
                        {
                            if (password != confirm_password)
                            {
                                $(this).attr("class", "form-control");
                                $("#edit_teacher_confirm_password").attr("class", "form-control");
                                
                                $("#edit_password_error_teacher").attr("class", "d-none");
                            }

                            else
                            {
                                $(this).attr("class", "form-control is-valid");
                                $("#edit_teacher_confirm_password").attr("class", "form-control is-valid");
                            }
                        }
                    }
                })
                
                $("#edit_teacher_confirm_password").on("keyup", function(e){
                    var password = $("#edit_teacher_password").val();
                    var confirm_password = $(this).val();

                    if (password && confirm_password || e.keyCode == 8)
                    {
                        if (password != confirm_password )
                        {
                            $("#edit_teacher_password").attr("class", "form-control");
                            $(this).attr("class", "form-control");
                            
                            $("#edit_password_error_teacher").attr("class", "d-none");
                        }

                        else
                        {
                            $("#edit_teacher_password").attr("class", "form-control is-valid");
                            $(this).attr("class", "form-control is-valid");
                        }
                    }

                    if (e.keyCode == 8)
                    {
                        if (password && confirm_password || e.keyCode == 8)
                        {
                            if (password != confirm_password )
                            {
                                $("#edit_teacher_password").attr("class", "form-control");
                                $(this).attr("class", "form-control");
                                
                                $("#edit_password_error_teacher").attr("class", "d-none");
                            }

                            else
                            {
                                $("#edit_teacher_password").attr("class", "form-control is-valid");
                                $(this).attr("class", "form-control is-valid");
                            }
                        }
                    }
                })

                $("#insert_teacher_form").submit(function(e){
                    var password = $("#teacher_password").val();
                    var confirm_password = $("#teacher_confirm_password").val();

                    if (password != confirm_password)
                    {
                        e.preventDefault();

                        $("#teacher_password").attr("class", "form-control is-invalid");
                        $("#teacher_confirm_password").attr("class", "form-control is-invalid");
                        
                        $("#password_error_teacher").attr("class", "text-danger");
                    }

                    else
                    {
                        return true;
                    }
                })
                
                $("#update_teacher_form").submit(function(e){
                    var password = $("#edit_teacher_password").val();
                    var confirm_password = $("#edit_teacher_confirm_password").val();

                    if (password != confirm_password)
                    {
                        e.preventDefault();

                        $("#edit_teacher_password").attr("class", "form-control is-invalid");
                        $("#edit_teacher_confirm_password").attr("class", "form-control is-invalid");
                        
                        $("#edit_password_error_teacher").attr("class", "text-danger");
                    }

                    else
                    {
                        return true;
                    }
                })
                
                $("#edit_admin_password").on("keyup", function(e){
                    var password = $(this).val();
                    var confirm_password = $("#edit_admin_confirm_password").val();

                    if (password && confirm_password)
                    {
                        if (password != confirm_password)
                        {
                            $(this).attr("class", "form-control");
                            $("#edit_admin_confirm_password").attr("class", "form-control");
                        }

                        else
                        {
                            $(this).attr("class", "form-control is-valid");
                            $("#edit_admin_confirm_password").attr("class", "form-control is-valid");
                        }

                        $("#password_error").attr("class", "d-none");
                    }

                    if (e.keyCode == 8)
                    {
                        if (password && confirm_password)
                        {
                            if (password != confirm_password)
                            {
                                $(this).attr("class", "form-control");
                                $("#edit_admin_confirm_password").attr("class", "form-control");
                            }

                            else
                            {
                                $(this).attr("class", "form-control is-valid");
                                $("#edit_admin_confirm_password").attr("class", "form-control is-valid");
                            }

                            $("#password_error").attr("class", "d-none");
                        }
                    }
                })
                
                $("#edit_admin_confirm_password").on("keyup", function(e){
                    var password = $("#edit_admin_password").val();
                    var confirm_password = $(this).val();

                    if (password && confirm_password || e.keyCode == 8)
                    {
                        if (password != confirm_password )
                        {
                            $("#edit_admin_password").attr("class", "form-control");
                            $(this).attr("class", "form-control");
                        }

                        else
                        {
                            $("#edit_admin_password").attr("class", "form-control is-valid");
                            $(this).attr("class", "form-control is-valid");
                        }

                        $("#password_error").attr("class", "d-none");
                    }

                    if (e.keyCode == 8)
                    {
                        if (password && confirm_password || e.keyCode == 8)
                        {
                            if (password != confirm_password )
                            {
                                $("#edit_admin_password").attr("class", "form-control");
                                $(this).attr("class", "form-control");
                            }

                            else
                            {
                                $("#edit_admin_password").attr("class", "form-control is-valid");
                                $(this).attr("class", "form-control is-valid");
                            }

                            $("#password_error").attr("class", "d-none");
                        }
                    }
                })

                $("#edit_admin_form").submit(function(e){
                    var password = $("#edit_admin_password").val();
                    var confirm_password = $("#edit_admin_confirm_password").val();

                    if (password != confirm_password)
                    {
                        e.preventDefault();

                        $("#edit_admin_password").attr("class", "form-control is-invalid");
                        $("#edit_admin_confirm_password").attr("class", "form-control is-invalid");
                        
                        $("#password_error").attr("class", "text-danger");
                    }

                    else
                    {
                        return true;
                    }
                })

                $("#btn_add_skills").click(function(){
                    var student_id = $(this).attr("student_id");

                    $("#skill_student_primary_id").val(student_id);
                    $("#skill_data_from").val(data_from);
                })
                
                $("#btn_add_teacher_skills").click(function(){
                    var teacher_id = $(this).attr("teacher_id");

                    $("#skill_teacher_primary_id").val(teacher_id);
                    $("#skill_teacher_data_from").val(data_from);
                })

                $("#btn_add_new_visitor").click(function(){
                    is_modal_opened = true;
                })

                $("#btn_edit_admin_profile").click(function(){
                    is_modal_opened = true;

                    var id = $(this).attr("admin_id");
                    var name = $(this).attr("admin_name");
                    var user_type = $(this).attr("admin_user_type");
                    var image = $(this).attr("admin_image");
                    var username = $(this).attr("admin_username");

                    global_username = username;

                    $("#edit_admin_id").val(id);
                    $("#edit_admin_name").val(name);
                    $("#edit_admin_user_type").val(user_type);
                    $("#user_img_3").attr("src", image);
                    $("#edit_admin_username").val(username);
                })
                
                $(".btn_edit_skills").click(function(){
                    var skill_id = $(this).attr("skill_id");
                    var primary_id = $(this).attr("edit_primary_id");
                    var skill_name = $(this).attr("edit_skill_name");
                    var skill_level = $(this).attr("edit_skill_level");
                    var user_type = $(this).attr("edit_user_type");

                    $("#edit_skill_name").val(skill_name);
                    $("#edit_skill_level").val(skill_level);
                    
                    $("#edit_skill_id").val(skill_id);
                    $("#edit_skill_student_primary_id").val(primary_id);
                    $("#edit_skill_data_from").val(data_from);
                    $("#edit_skill_user_type").val(user_type);

                    if (skill_level == "Novice")
                    {
                        $("#edit_skill_description_wrapper").attr("class", "");
                        $("#edit_skill_description_title").html(skill_level);
                        $("#edit_skill_description").empty();
                        $("#edit_skill_description").append('<li>Has minimal or textbook knowledge without connecting it to prctice.</li>');
                        $("#edit_skill_description").append('<li>Needs close supervision or guidance.</li>');
                        $("#edit_skill_description").append('<li>Tends to look at actions in isolation.</li>');
                    }
                    
                    if (skill_level == "Advanced Beginner")
                    {
                        $("#edit_skill_description_wrapper").attr("class", "");
                        $("#edit_skill_description_title").html(skill_level);
                        $("#edit_skill_description").empty();
                        $("#edit_skill_description").append('<li>Has basic knowledge of key aspects of the practice.</li>');
                        $("#edit_skill_description").append('<li>Straightforward are likely to be done to an acceptable standard.</li>');
                        $("#edit_skill_description").append('<li>Is able to achieve some steps using his own judgement, but needs supervision for overall task.</li>');
                        $("#edit_skill_description").append('<li>Appreciates complex situations, but is only able to achieve partial resolution.</li>');
                        $("#edit_skill_description").append('<li>Sees action as a series of steps.</li>');
                    }
                    
                    if (skill_level == "Competent")
                    {
                        $("#edit_skill_description_wrapper").attr("class", "");
                        $("#edit_skill_description_title").html(skill_level);
                        $("#edit_skill_description").empty();
                        $("#edit_skill_description").append('<li>Has good working and background knowledge of the are of practice.</li>');
                        $("#edit_skill_description").append('<li>Results can be achieved for open tasks, though may lack refinement.</li>');
                        $("#edit_skill_description").append('<li>Is able to achieve most tasks using own judgement.</li>');
                        $("#edit_skill_description").append('<li>Copes with complex situations through deliberate analysis and planning.</li>');
                        $("#edit_skill_description").append('<li>Sees actions at least partly in terms of long term goals.</li>');
                    }
                    
                    if (skill_level == "Proficient")
                    {
                        $("#edit_skill_description_wrapper").attr("class", "");
                        $("#edit_skill_description_title").html(skill_level);
                        $("#edit_skill_description").empty();
                        $("#edit_skill_description").append('<li>Depth of understanding of discipline and area of practice.</li>');
                        $("#edit_skill_description").append('<li>Fully acceptable standards are achieved routinely, and results are also achieved for open tasks.</li>');
                        $("#edit_skill_description").append('<li>Able to take full responsibility for own work (and that of others where applicable).</li>');
                        $("#edit_skill_description").append('<li>Deals with complex situations holistically, confident descision-making.</li>');
                        $("#edit_skill_description").append('<li>Sees the overall picture and how individual actions fit within it.</li>');
                    }
                    
                    if (skill_level == "Expert")
                    {
                        $("#edit_skill_description_wrapper").attr("class", "");
                        $("#edit_skill_description_title").html(skill_level);
                        $("#edit_skill_description").empty();
                        $("#edit_skill_description").append('<li>Authoritative knowledge of the discipline and deep tacit understanding accross areas of practice.</li>');
                        $("#edit_skill_description").append('<li>Excelence achieved with relative ease.</li>');
                        $("#edit_skill_description").append('<li>Able to take responsibility for going beyond existing standards and creating own interpretations.</li>');
                        $("#edit_skill_description").append('<li>Holistic grasp of complex situations. Moves between intuitive and analytical approaches with ease.</li>');
                        $("#edit_skill_description").append('<li>Sees overall picture and alternative approaches, has a vision of what may be possible.</li>');
                    }
                })

                $("#edit_skill_level").on("change", function(){
                    var skill_level = $(this).val();                       
                                            
                    if (skill_level == "Novice")
                    {
                        $("#edit_skill_description_wrapper").attr("class", "");
                        $("#edit_skill_description_title").html(skill_level);
                        $("#edit_skill_description").empty();
                        $("#edit_skill_description").append('<li>Has minimal or textbook knowledge without connecting it to prctice.</li>');
                        $("#edit_skill_description").append('<li>Needs close supervision or guidance.</li>');
                        $("#edit_skill_description").append('<li>Tends to look at actions in isolation.</li>');
                    }
                    
                    if (skill_level == "Advanced Beginner")
                    {
                        $("#edit_skill_description_wrapper").attr("class", "");
                        $("#edit_skill_description_title").html(skill_level);
                        $("#edit_skill_description").empty();
                        $("#edit_skill_description").append('<li>Has basic knowledge of key aspects of the practice.</li>');
                        $("#edit_skill_description").append('<li>Straightforward are likely to be done to an acceptable standard.</li>');
                        $("#edit_skill_description").append('<li>Is able to achieve some steps using his own judgement, but needs supervision for overall task.</li>');
                        $("#edit_skill_description").append('<li>Appreciates complex situations, but is only able to achieve partial resolution.</li>');
                        $("#edit_skill_description").append('<li>Sees action as a series of steps.</li>');
                    }
                    
                    if (skill_level == "Competent")
                    {
                        $("#edit_skill_description_wrapper").attr("class", "");
                        $("#edit_skill_description_title").html(skill_level);
                        $("#edit_skill_description").empty();
                        $("#edit_skill_description").append('<li>Has good working and background knowledge of the are of practice.</li>');
                        $("#edit_skill_description").append('<li>Results can be achieved for open tasks, though may lack refinement.</li>');
                        $("#edit_skill_description").append('<li>Is able to achieve most tasks using own judgement.</li>');
                        $("#edit_skill_description").append('<li>Copes with complex situations through deliberate analysis and planning.</li>');
                        $("#edit_skill_description").append('<li>Sees actions at least partly in terms of long term goals.</li>');
                    }
                    
                    if (skill_level == "Proficient")
                    {
                        $("#edit_skill_description_wrapper").attr("class", "");
                        $("#edit_skill_description_title").html(skill_level);
                        $("#edit_skill_description").empty();
                        $("#edit_skill_description").append('<li>Depth of understanding of discipline and area of practice.</li>');
                        $("#edit_skill_description").append('<li>Fully acceptable standards are achieved routinely, and results are also achieved for open tasks.</li>');
                        $("#edit_skill_description").append('<li>Able to take full responsibility for own work (and that of others where applicable).</li>');
                        $("#edit_skill_description").append('<li>Deals with complex situations holistically, confident descision-making.</li>');
                        $("#edit_skill_description").append('<li>Sees the overall picture and how individual actions fit within it.</li>');
                    }
                    
                    if (skill_level == "Expert")
                    {
                        $("#edit_skill_description_wrapper").attr("class", "");
                        $("#edit_skill_description_title").html(skill_level);
                        $("#edit_skill_description").empty();
                        $("#edit_skill_description").append('<li>Authoritative knowledge of the discipline and deep tacit understanding accross areas of practice.</li>');
                        $("#edit_skill_description").append('<li>Excelence achieved with relative ease.</li>');
                        $("#edit_skill_description").append('<li>Able to take responsibility for going beyond existing standards and creating own interpretations.</li>');
                        $("#edit_skill_description").append('<li>Holistic grasp of complex situations. Moves between intuitive and analytical approaches with ease.</li>');
                        $("#edit_skill_description").append('<li>Sees overall picture and alternative approaches, has a vision of what may be possible.</li>');
                    }
                })
                
                $("#skill_level").on("change", function(){
                    var skill_level = $(this).val();                       
                                            
                    if (skill_level == "Novice")
                    {
                        $("#skill_description_wrapper").attr("class", "");
                        $("#skill_description_title").html(skill_level);
                        $("#skill_description").empty();
                        $("#skill_description").append('<li>Has minimal or textbook knowledge without connecting it to prctice.</li>');
                        $("#skill_description").append('<li>Needs close supervision or guidance.</li>');
                        $("#skill_description").append('<li>Tends to look at actions in isolation.</li>');
                    }
                    
                    if (skill_level == "Advanced Beginner")
                    {
                        $("#skill_description_wrapper").attr("class", "");
                        $("#skill_description_title").html(skill_level);
                        $("#skill_description").empty();
                        $("#skill_description").append('<li>Has basic knowledge of key aspects of the practice.</li>');
                        $("#skill_description").append('<li>Straightforward are likely to be done to an acceptable standard.</li>');
                        $("#skill_description").append('<li>Is able to achieve some steps using his own judgement, but needs supervision for overall task.</li>');
                        $("#skill_description").append('<li>Appreciates complex situations, but is only able to achieve partial resolution.</li>');
                        $("#skill_description").append('<li>Sees action as a series of steps.</li>');
                    }
                    
                    if (skill_level == "Competent")
                    {
                        $("#skill_description_wrapper").attr("class", "");
                        $("#skill_description_title").html(skill_level);
                        $("#skill_description").empty();
                        $("#skill_description").append('<li>Has good working and background knowledge of the are of practice.</li>');
                        $("#skill_description").append('<li>Results can be achieved for open tasks, though may lack refinement.</li>');
                        $("#skill_description").append('<li>Is able to achieve most tasks using own judgement.</li>');
                        $("#skill_description").append('<li>Copes with complex situations through deliberate analysis and planning.</li>');
                        $("#skill_description").append('<li>Sees actions at least partly in terms of long term goals.</li>');
                    }
                    
                    if (skill_level == "Proficient")
                    {
                        $("#skill_description_wrapper").attr("class", "");
                        $("#skill_description_title").html(skill_level);
                        $("#skill_description").empty();
                        $("#skill_description").append('<li>Depth of understanding of discipline and area of practice.</li>');
                        $("#skill_description").append('<li>Fully acceptable standards are achieved routinely, and results are also achieved for open tasks.</li>');
                        $("#skill_description").append('<li>Able to take full responsibility for own work (and that of others where applicable).</li>');
                        $("#skill_description").append('<li>Deals with complex situations holistically, confident descision-making.</li>');
                        $("#skill_description").append('<li>Sees the overall picture and how individual actions fit within it.</li>');
                    }
                    
                    if (skill_level == "Expert")
                    {
                        $("#skill_description_wrapper").attr("class", "");
                        $("#skill_description_title").html(skill_level);
                        $("#skill_description").empty();
                        $("#skill_description").append('<li>Authoritative knowledge of the discipline and deep tacit understanding accross areas of practice.</li>');
                        $("#skill_description").append('<li>Excelence achieved with relative ease.</li>');
                        $("#skill_description").append('<li>Able to take responsibility for going beyond existing standards and creating own interpretations.</li>');
                        $("#skill_description").append('<li>Holistic grasp of complex situations. Moves between intuitive and analytical approaches with ease.</li>');
                        $("#skill_description").append('<li>Sees overall picture and alternative approaches, has a vision of what may be possible.</li>');
                    }
                })
                
                $("#teacher_skill_level").on("change", function(){
                    var skill_level = $(this).val();                       
                                            
                    if (skill_level == "Novice")
                    {
                        $("#teacher_skill_description_wrapper").attr("class", "");
                        $("#teacher_skill_description_title").html(skill_level);
                        $("#teacher_skill_description").empty();
                        $("#teacher_skill_description").append('<li>Has minimal or textbook knowledge without connecting it to prctice.</li>');
                        $("#teacher_skill_description").append('<li>Needs close supervision or guidance.</li>');
                        $("#teacher_skill_description").append('<li>Tends to look at actions in isolation.</li>');
                    }
                    
                    if (skill_level == "Advanced Beginner")
                    {
                        $("#teacher_skill_description_wrapper").attr("class", "");
                        $("#teacher_skill_description_title").html(skill_level);
                        $("#teacher_skill_description").empty();
                        $("#teacher_skill_description").append('<li>Has basic knowledge of key aspects of the practice.</li>');
                        $("#teacher_skill_description").append('<li>Straightforward are likely to be done to an acceptable standard.</li>');
                        $("#teacher_skill_description").append('<li>Is able to achieve some steps using his own judgement, but needs supervision for overall task.</li>');
                        $("#teacher_skill_description").append('<li>Appreciates complex situations, but is only able to achieve partial resolution.</li>');
                        $("#teacher_skill_description").append('<li>Sees action as a series of steps.</li>');
                    }
                    
                    if (skill_level == "Competent")
                    {
                        $("#teacher_skill_description_wrapper").attr("class", "");
                        $("#teacher_skill_description_title").html(skill_level);
                        $("#teacher_skill_description").empty();
                        $("#teacher_skill_description").append('<li>Has good working and background knowledge of the are of practice.</li>');
                        $("#teacher_skill_description").append('<li>Results can be achieved for open tasks, though may lack refinement.</li>');
                        $("#teacher_skill_description").append('<li>Is able to achieve most tasks using own judgement.</li>');
                        $("#teacher_skill_description").append('<li>Copes with complex situations through deliberate analysis and planning.</li>');
                        $("#teacher_skill_description").append('<li>Sees actions at least partly in terms of long term goals.</li>');
                    }
                    
                    if (skill_level == "Proficient")
                    {
                        $("#teacher_skill_description_wrapper").attr("class", "");
                        $("#teacher_skill_description_title").html(skill_level);
                        $("#teacher_skill_description").empty();
                        $("#teacher_skill_description").append('<li>Depth of understanding of discipline and area of practice.</li>');
                        $("#teacher_skill_description").append('<li>Fully acceptable standards are achieved routinely, and results are also achieved for open tasks.</li>');
                        $("#teacher_skill_description").append('<li>Able to take full responsibility for own work (and that of others where applicable).</li>');
                        $("#teacher_skill_description").append('<li>Deals with complex situations holistically, confident descision-making.</li>');
                        $("#teacher_skill_description").append('<li>Sees the overall picture and how individual actions fit within it.</li>');
                    }
                    
                    if (skill_level == "Expert")
                    {
                        $("#teacher_skill_description_wrapper").attr("class", "");
                        $("#teacher_skill_description_title").html(skill_level);
                        $("#teacher_skill_description").empty();
                        $("#teacher_skill_description").append('<li>Authoritative knowledge of the discipline and deep tacit understanding accross areas of practice.</li>');
                        $("#teacher_skill_description").append('<li>Excelence achieved with relative ease.</li>');
                        $("#teacher_skill_description").append('<li>Able to take responsibility for going beyond existing standards and creating own interpretations.</li>');
                        $("#teacher_skill_description").append('<li>Holistic grasp of complex situations. Moves between intuitive and analytical approaches with ease.</li>');
                        $("#teacher_skill_description").append('<li>Sees overall picture and alternative approaches, has a vision of what may be possible.</li>');
                    }
                })

                $('.delete_educational_background').click(function(){
                    var delete_key = $(this).attr('delete_key');
                    var student_id = $(this).attr('student_id');
                    var user_type = $(this).attr('user_type');

                    Swal.fire({
                        title: 'Are you sure?',
                        text: "You won't be able to revert this!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Yes, delete it!'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location.href = base_url + "main/delete_educational_background?delete_key=" + delete_key + "&student_id=" + student_id + "&data_from=" + data_from + "&user_type=" + user_type;
                        }
                    })
                })
                
                $('.delete_student_skill').click(function(){
                    var delete_key = $(this).attr('delete_key');
                    var student_id = $(this).attr('student_id');
                    var user_type = $(this).attr('user_type');

                    Swal.fire({
                        title: 'Are you sure?',
                        text: "You won't be able to revert this!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Yes, delete it!'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location.href = base_url + "main/delete_student_skill?delete_key=" + delete_key + "&student_id=" + student_id + "&data_from=" + data_from + "&user_type=" + user_type;
                        }
                    })
                })

                $("#btn_add_education").click(function(){
                    var student_id = $(this).attr("student_id");
                    
                    $("#education_student_primary_id").val(student_id);
                    $("#education_data_from").val(data_from);
                })

                $(".btn_edit_education").click(function(){
                    var id = $(this).attr("education_id");
                    var primary_id = $(this).attr("edit_primary_id");
                    var school_name = $(this).attr("edit_school_name");
                    var strand_course = $(this).attr("edit_strand_course");
                    var from_year = $(this).attr("edit_from_year");
                    var to_year = $(this).attr("edit_to_year");
                    var user_type = $(this).attr("edit_user_type");

                    $("#edit_education_student_school_name").val(school_name);
                    $("#edit_education_student_strand_course").val(strand_course);
                    $("#edit_education_student_from_year").val(from_year);
                    $("#edit_education_student_to_year").val(to_year);

                    $("#edit_education_student_primary_id").val(primary_id);
                    $("#edit_education_id").val(id);
                    $("#edit_education_data_from").val(data_from);
                    $("#edit_education_user_type").val(user_type);
                })

                $("#btn_add_teacher_education").click(function(){
                    var teacher_id = $(this).attr("teacher_id");
                    
                    $("#education_teacher_primary_id").val(teacher_id);
                    $("#education_teacher_data_from").val(data_from);
                })

                $("#student_course").change(function(){

                    var student_course = $(this).val();

                    if (student_course == "None (Junior High School)")
                    {
                        $("#student_year").attr("disabled", false);
                        
                        $("#student_year option[value='Select a Strand First']").remove();
                        $("#student_year option[value='Select Grade']").remove();
                        $('#student_year option[value="7"]').remove();
                        $('#student_year option[value="8"]').remove();
                        $('#student_year option[value="9"]').remove();
                        $('#student_year option[value="10"]').remove();
                        $('#student_year option[value="11"]').remove();
                        $('#student_year option[value="12"]').remove();

                        $("#student_year").append('<option value="Select Grade" selected disabled>-- Select Grade --</option>');
                        $("#student_year").append('<option value="7">7</option>');
                        $("#student_year").append('<option value="8">8</option>');
                        $("#student_year").append('<option value="9">9</option>');
                        $("#student_year").append('<option value="10">10</option>');
                    }
                    
                    if (student_course == "GAS (General Academic Strand)")
                    {
                        $("#student_year").attr("disabled", false);

                        $("#student_year option[value='Select a Strand First']").remove();
                        $("#student_year option[value='Select Grade']").remove();
                        $('#student_year option[value="7"]').remove();
                        $('#student_year option[value="8"]').remove();
                        $('#student_year option[value="9"]').remove();
                        $('#student_year option[value="10"]').remove();
                        $('#student_year option[value="11"]').remove();
                        $('#student_year option[value="12"]').remove();

                        $("#student_year").append('<option value="Select Grade" selected disabled>-- Select Grade --</option>');
                        $("#student_year").append('<option value="11">11</option>');
                        $("#student_year").append('<option value="12">12</option>');
                    }

                })
                
                $("#edit_student_course").change(function(){

                    var student_course = $(this).val();

                    if (student_course == "None (Junior High School)")
                    {
                        $("#edit_student_year").attr("disabled", false);
                        
                        $("#edit_student_year option[value='Select a Strand First']").remove();
                        $("#edit_student_year option[value='Select Grade']").remove();
                        $('#edit_student_year option[value="7"]').remove();
                        $('#edit_student_year option[value="8"]').remove();
                        $('#edit_student_year option[value="9"]').remove();
                        $('#edit_student_year option[value="10"]').remove();
                        $('#edit_student_year option[value="11"]').remove();
                        $('#edit_student_year option[value="12"]').remove();

                        $("#edit_student_year").append('<option value="Select Grade" selected disabled>-- Select Grade --</option>');
                        $("#edit_student_year").append('<option value="7">7</option>');
                        $("#edit_student_year").append('<option value="8">8</option>');
                        $("#edit_student_year").append('<option value="9">9</option>');
                        $("#edit_student_year").append('<option value="10">10</option>');
                    }
                    
                    if (student_course == "GAS (General Academic Strand)")
                    {
                        $("#edit_student_year").attr("disabled", false);

                        $("#edit_student_year option[value='Select a Strand First']").remove();
                        $("#edit_student_year option[value='Select Grade']").remove();
                        $('#edit_student_year option[value="7"]').remove();
                        $('#edit_student_year option[value="8"]').remove();
                        $('#edit_student_year option[value="9"]').remove();
                        $('#edit_student_year option[value="10"]').remove();
                        $('#edit_student_year option[value="11"]').remove();
                        $('#edit_student_year option[value="12"]').remove();

                        $("#edit_student_year").append('<option value="Select Grade" selected disabled>-- Select Grade --</option>');
                        $("#edit_student_year").append('<option value="11">11</option>');
                        $("#edit_student_year").append('<option value="12">12</option>');
                    }

                })

                $("#btn_logout").click(function(){
                    location.href = base_url + "login/logout_admin";
                })
                
                $("#btn_pushmenu").click(function(){
                    
                    if (is_opened)
                    {
                        is_opened = false;

                        $("#favicon").attr("style", "height: auto; width: 50px !important; padding-top: 10px");
                    }

                    else
                    {
                        is_opened = true;

                        $("#favicon").attr("style", "height: auto; width: 200px !important; padding-top: 10px");
                    }
                })

                $(".view_image").click(function(){
                    img_src = $(this).attr("img_src");

                    $("#proof_img_container").attr("src", img_src);
                })

                $("#btn_activate").click(function(){
                    var id = $(this).attr("teacher_id");

                    Swal.fire({
                        title: 'Are you sure?',
                        text: "You are going to activate this employee!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Activate'
                    }).then((result) => {
                        if (result.isConfirmed) 
                        {
                            location.href = base_url + "main/activate_employee?teacher_id=" + id;
                        }
                    })
                })
                
                $("#btn_terminate").click(function(){
                    var id = $(this).attr("teacher_id");

                    Swal.fire({
                        title: 'Are you sure?',
                        text: "You are going to terminate this employee!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Terminate'
                    }).then((result) => {
                        if (result.isConfirmed) 
                        {
                            location.href = base_url + "main/terminate_employee?teacher_id=" + id;
                        }
                    })
                })

                $("#user_img_attachment").change(function() {
                    displayFileInfo(this);
                })
                
                $("#user_img_attachment_2").change(function(){
                    displayFileInfoStudent(this);
                })
                
                $("#user_img_attachment_3").change(function(){
                    displayFileInfoAdmin(this);
                })
                
                $("#user_img_attachment_4").change(function(){
                    displayFileInfoTeacher(this);
                })
                
                $("#user_img_attachment_5").change(function(){
                    displayFileInfoEditTeacher(this);
                })
                
                $("#edit_user_img_attachment").change(function(){
                    displayFileInfoUpdate(this);
                })
                
                $("#edit_user_img_attachment_2").change(function(){
                    displayFileInfoStudentUpdate(this);
                })

                $(".student_list_row").click(function(){
                    
                    var student_id = $(this).attr("student_id");
                    var student_first_name = $(this).attr("student_first_name");
                    var student_middle_name = $(this).attr("student_middle_name");
                    var student_last_name = $(this).attr("student_last_name");
                    var student_rfid_number = $(this).attr("student_rfid_number");
                    var student_course = $(this).attr("student_course");
                    var student_year = $(this).attr("student_year");
                    var student_section = $(this).attr("student_section");
                    var student_email_address = $(this).attr("student_email_address");
                    var student_mobile_number = $(this).attr("student_mobile_number");
                    var student_image = $(this).attr("student_image");
                    var student_teachers = $(this).attr("student_teachers");

                    var is_personal = $(this).attr("is_personal");
                    
                    global_rfid_number = student_rfid_number;

                    if (student_course == "GAS (General Academic Strand)")
                    {
                        $("#edit_student_year").empty();
                        $("#edit_student_year").append('<option value="Select Grade" selected disabled>-- Select Grade --</option>');
                        $("#edit_student_year").append('<option value="11">11</option>');
                        $("#edit_student_year").append('<option value="12">12</option>');
                    }
                    
                    else
                    {
                        $("#edit_student_year").empty();
                        $("#edit_student_year").append('<option value="Select Grade" selected disabled>-- Select Grade --</option>');
                        $("#edit_student_year").append('<option value="7">7</option>');
                        $("#edit_student_year").append('<option value="8">8</option>');
                        $("#edit_student_year").append('<option value="9">9</option>');
                        $("#edit_student_year").append('<option value="10">10</option>');
                    }

                    $("#student_data_from").val(data_from);
                    $("#edit_student_id").val(student_id);
                    $("#edit_student_old_rfid_number").val(student_rfid_number);
                    $("#edit_student_old_image").val(student_image);
                    $("#student_is_personal").val(is_personal);

                    $("#edit_student_first_name").val(student_first_name);
                    $("#edit_student_middle_name").val(student_middle_name);
                    $("#edit_student_last_name").val(student_last_name);
                    $("#edit_student_rfid_number").val(student_rfid_number);
                    $("#edit_student_course").val(student_course);
                    $("#edit_student_year").val(student_year);
                    $("#edit_student_section").val(student_section);
                    $("#edit_student_email_address").val(student_email_address);
                    $("#edit_student_mobile_number").val(student_mobile_number);
                    
                    var values = student_teachers.split(",");
                    
                    document.querySelector('#edit_student_teachers').setValue(values);
                    
                    if (student_image)
                    {
                        $("#edit_user_img_2").attr("src", base_url + "dist/img/user_upload/" + student_image);
                    }

                    else
                    {
                        $("#edit_user_img_2").attr("src", base_url + "dist/img/default_user_image.webp");
                    }

                    $("#btn_re_enroll_student").attr("student_id", student_id);
                    $("#btn_re_enroll_student").attr("is_personal", is_personal);
                })
                
                $(".teacher_list_row").click(function(){
                    var teacher_id = $(this).attr("teacher_id");
                    var teacher_user_account_id = $(this).attr("teacher_user_account_id");
                    var teacher_first_name = $(this).attr("teacher_first_name");
                    var teacher_middle_name = $(this).attr("teacher_middle_name");
                    var teacher_last_name = $(this).attr("teacher_last_name");
                    var teacher_rfid_number = $(this).attr("teacher_rfid_number");
                    var teacher_email_address = $(this).attr("teacher_email_address");
                    var teacher_mobile_number = $(this).attr("teacher_mobile_number");
                    var teacher_username = $(this).attr("teacher_username");
                    var teacher_image = $(this).attr("teacher_image");
                    
                    var is_personal = $(this).attr("is_personal");
                    
                    global_rfid_number = teacher_rfid_number;
                    global_username = teacher_username;

                    $("#edit_teacher_id").val(teacher_id);
                    $("#edit_teacher_user_account_id").val(teacher_user_account_id);
                    $("#edit_teacher_old_rfid_number").val(teacher_rfid_number);
                    $("#edit_teacher_old_image").val(teacher_image);
                    
                    $("#edit_teacher_first_name").val(teacher_first_name);
                    $("#edit_teacher_middle_name").val(teacher_middle_name);
                    $("#edit_teacher_last_name").val(teacher_last_name);
                    $("#edit_teacher_rfid_number").val(teacher_rfid_number);
                    $("#edit_teacher_email_address").val(teacher_email_address);
                    $("#edit_teacher_mobile_number").val(teacher_mobile_number);
                    $("#edit_teacher_username").val(teacher_username);
                    $("#edit_teacher_data_from").val(data_from);
                    $("#edit_teacher_is_personal").val(is_personal);
                    
                    if (teacher_image)
                    {
                        $("#user_img_5").attr("src", base_url + "dist/img/user_upload/" + teacher_image);
                    }

                    else
                    {
                        $("#user_img_5").attr("src", base_url + "dist/img/default_user_image.webp");
                    }
                })

                $("#btn_re_enroll_student").click(function(){
                    var id = $(this).attr("student_id");
                    var is_personal = $(this).attr("is_personal");

                    Swal.fire({
                        title: 'Are you sure?',
                        text: "You are going to re-enroll this student!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Re-enroll'
                    }).then((result) => {
                        if (result.isConfirmed) 
                        {
                            if (is_personal == "1")
                            {
                                location.href = base_url + "main/re_enroll_student?student_id=" + id + "&is_personal=" + is_personal + "&data_from=" + data_from;
                            }

                            else
                            {
                                location.href = base_url + "main/re_enroll_student?student_id=" + id + "&is_personal=" + is_personal;
                            }
                        }
                    })
                })

                $("#btn_add_to_active_list").click(function(){
                    var id = $(this).attr("student_id");

                    Swal.fire({
                        title: 'Are you sure?',
                        text: "You are going to add this student to active list!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Add to Active List'
                    }).then((result) => {
                        if (result.isConfirmed) 
                        {
                            location.href = base_url + "main/add_to_active_list?student_id=" + id;
                        }
                    })
                })
                
                $("#btn_remove_from_active_list").click(function(){
                    var id = $(this).attr("student_id");

                    Swal.fire({
                        title: 'Are you sure?',
                        text: "You are going to remove this student from active list!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Remove from Active List'
                    }).then((result) => {
                        if (result.isConfirmed) 
                        {
                            location.href = base_url + "main/remove_from_active_list?student_id=" + id;
                        }
                    })
                })

                $("#student_list").DataTable({
                    "responsive": true, 
                    "lengthChange": true, 
                    "bPaginate": true,
                    "bLengthChange": true,
                    "bFilter": true,
                    "bInfo": false,
                    "bAutoWidth": false,
                    "targets": 'no-sort',
                    "bSort": false,
                    "order": []
                })
                
                $("#teacher_list").DataTable({
                    "responsive": true, 
                    "lengthChange": true, 
                    "bPaginate": true,
                    "bLengthChange": true,
                    "bFilter": true,
                    "bInfo": false,
                    "bAutoWidth": false,
                    "targets": 'no-sort',
                    "bSort": false,
                    "order": []
                })
                
                $("#attendance_record_table").DataTable({
                    "responsive": true, 
                    "lengthChange": true, 
                    "bPaginate": true,
                    "bLengthChange": true,
                    "bFilter": true,
                    "bInfo": false,
                    "bAutoWidth": false,
                    "targets": 'no-sort',
                    "bSort": false,
                    "order": [],
                    "language": {
                        "searchPlaceholder": "Enter Month or Year"
                    }
                })

                $("#btn_add_to_active_list_personal").click(function(){
                    var id = $(this).attr("student_id");
                    
                    Swal.fire({
                        title: 'Are you sure?',
                        text: "You are going to add this student to active list!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Add to Active List'
                    }).then((result) => {
                        if (result.isConfirmed) 
                        {
                            location.href = base_url + "main/add_to_active_list_personal?student_id=" + id + "&data_from=" + data_from;
                        }
                    })
                })
                
                $("#btn_remove_from_active_list_personal").click(function(){
                    var id = $(this).attr("student_id");
                    
                    Swal.fire({
                        title: 'Are you sure?',
                        text: "You are going to remove this student from active list!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Remove from Active List'
                    }).then((result) => {
                        if (result.isConfirmed) 
                        {
                            location.href = base_url + "main/remove_from_active_list_personal?student_id=" + id + "&data_from=" + data_from;
                        }
                    })
                })

                $("#btn_edit_student_personal_information").click(function(){
                    id = $(this).attr("student_primary_id");
                    student_id = $(this).attr("student_id");
                    student_first_name = $(this).attr("student_first_name");
                    student_middle_name = $(this).attr("student_middle_name");
                    student_last_name = $(this).attr("student_last_name");
                    birthday = $(this).attr("student_birthday");
                    gender = $(this).attr("student_gender");
                    marital_status = $(this).attr("student_marital_status");
                    nationality = $(this).attr("student_nationality");
                    home_address = $(this).attr("student_home_address");
                    current_address = $(this).attr("student_current_address");
                    old_student_id = $(this).attr("student_id");

                    $("#data_from").val(data_from);
                    $("#personal_student_primary_id").val(id);
                    $("#personal_student_id").val(student_id);
                    $("#personal_student_first_name").val(student_first_name);
                    $("#personal_student_middle_name").val(student_middle_name);
                    $("#personal_student_last_name").val(student_last_name);
                    $("#personal_student_birthday").val(birthday);
                    $("#personal_student_gender").val(gender);
                    $("#personal_student_marital_status").val(marital_status);
                    $("#personal_student_nationality").val(nationality);
                    $("#personal_student_home_address").val(home_address);
                    $("#personal_student_current_address").val(current_address);
                    $("#personal_old_student_id").val(old_student_id);
                })
                
                $("#btn_edit_teacher_personal_information").click(function(){
                    id = $(this).attr("teacher_primary_id");
                    teacher_id = $(this).attr("teacher_id");
                    teacher_first_name = $(this).attr("teacher_first_name");
                    teacher_middle_name = $(this).attr("teacher_middle_name");
                    teacher_last_name = $(this).attr("teacher_last_name");
                    birthday = $(this).attr("teacher_birthday");
                    gender = $(this).attr("teacher_gender");
                    marital_status = $(this).attr("teacher_marital_status");
                    nationality = $(this).attr("teacher_nationality");
                    home_address = $(this).attr("teacher_home_address");
                    current_address = $(this).attr("teacher_current_address");
                    old_teacher_id = $(this).attr("teacher_id");

                    $("#personal_teacher_data_from").val(data_from);
                    $("#personal_teacher_primary_id").val(id);
                    $("#personal_teacher_id").val(teacher_id);
                    $("#personal_teacher_first_name").val(teacher_first_name);
                    $("#personal_teacher_middle_name").val(teacher_middle_name);
                    $("#personal_teacher_last_name").val(teacher_last_name);
                    $("#personal_teacher_birthday").val(birthday);
                    $("#personal_teacher_gender").val(gender);
                    $("#personal_teacher_marital_status").val(marital_status);
                    $("#personal_teacher_nationality").val(nationality);
                    $("#personal_teacher_home_address").val(home_address);
                    $("#personal_teacher_current_address").val(current_address);
                    $("#personal_old_teacher_id").val(old_teacher_id);
                })

                $("#btn_edit_student_contact_details").click(function(){
                    var id = $(this).attr("student_id");
                    var mobile_number = $(this).attr("mobile_number");
                    var email_address = $(this).attr("email_address");
                    var facebook_account = $(this).attr("facebook_account");
                    var other_email_address = $(this).attr("other_email_address");
                    var guardian_name = $(this).attr("guardian_name");
                    var guardian_mobile_number = $(this).attr("guardian_mobile_number");
                    
                    $("#contact_data_from").val(data_from);
                    $("#contact_student_primary_id").val(id);
                    $("#student_mobile_number").val(mobile_number);
                    $("#student_email_address").val(email_address);
                    $("#student_facebook_account").val(facebook_account);
                    $("#student_other_email_address").val(other_email_address);
                    $("#student_guardian_name").val(guardian_name);
                    $("#student_guardian_mobile_number").val(guardian_mobile_number);
                })
                
                $("#btn_edit_teacher_contact_details").click(function(){
                    var id = $(this).attr("teacher_id");
                    var mobile_number = $(this).attr("mobile_number");
                    var email_address = $(this).attr("email_address");
                    var facebook_account = $(this).attr("facebook_account");
                    var other_email_address = $(this).attr("other_email_address");
                    var guardian_name = $(this).attr("guardian_name");
                    var guardian_mobile_number = $(this).attr("guardian_mobile_number");
                    
                    $("#contact_teacher_data_from").val(data_from);
                    $("#contact_teacher_primary_id").val(id);
                    $("#contact_teacher_mobile_number").val(mobile_number);
                    $("#contact_teacher_email_address").val(email_address);
                    $("#teacher_facebook_account").val(facebook_account);
                    $("#teacher_other_email_address").val(other_email_address);
                    $("#teacher_guardian_name").val(guardian_name);
                    $("#teacher_guardian_mobile_number").val(guardian_mobile_number);
                })

                $("#edit_student_rfid_number").keydown(function(e){

                    if (e.keyCode == 13)
                    {
                        var rfid_number = $(this).val();

                        get_students_data(url_get_students_data, rfid_number).then(function(students_data){

                            if (rfid_number != global_rfid_number)
                            {
                                if (students_data.length > 0)
                                {
                                    $("#edit_student_rfid_number").attr("class", "form-control is-invalid");
                                    $("#warning_rfid_in_use").attr("class", "text-danger");
                                }

                                else
                                {
                                    // $("#edit_student_rfid_number").attr("class", "form-control");
                                    // $("#warning_rfid_in_use").attr("class", "text-danger d-none");
                                    get_teachers_data(url_get_teachers_data, rfid_number).then(function(teachers_data){

                                        if (rfid_number != global_rfid_number)
                                        {
                                            if (teachers_data.length > 0)
                                            {
                                                $("#edit_student_rfid_number").attr("class", "form-control is-invalid");
                                                $("#warning_rfid_in_use").attr("class", "text-danger");
                                            }

                                            else
                                            {
                                                $("#edit_student_rfid_number").attr("class", "form-control");
                                                $("#warning_rfid_in_use").attr("class", "text-danger d-none");
                                            }
                                        }
                                    })
                                }
                            }

                            else
                            {
                                $("#edit_student_rfid_number").attr("class", "form-control");
                                $("#warning_rfid_in_use").attr("class", "text-danger d-none");
                            }
                        })

                        e.preventDefault();
                    }
                })
                
                $("#edit_student_rfid_number").on("keyup", function(e){
                    
                    var rfid_number = $(this).val();

                    get_students_data(url_get_students_data, rfid_number).then(function(students_data){

                        if (rfid_number != global_rfid_number)
                        {
                            if (students_data.length > 0)
                            {
                                $("#edit_student_rfid_number").attr("class", "form-control is-invalid");
                                $("#warning_rfid_in_use").attr("class", "text-danger");
                            }

                            else
                            {
                                // $("#edit_student_rfid_number").attr("class", "form-control");
                                // $("#warning_rfid_in_use").attr("class", "text-danger d-none");
                                get_teachers_data(url_get_teachers_data, rfid_number).then(function(teachers_data){

                                    if (rfid_number != global_rfid_number)
                                    {
                                        if (teachers_data.length > 0)
                                        {
                                            $("#edit_student_rfid_number").attr("class", "form-control is-invalid");
                                            $("#warning_rfid_in_use").attr("class", "text-danger");
                                        }

                                        else
                                        {
                                            $("#edit_student_rfid_number").attr("class", "form-control");
                                            $("#warning_rfid_in_use").attr("class", "text-danger d-none");
                                        }
                                    }
                                })
                            }
                        }

                        else
                        {
                            $("#edit_student_rfid_number").attr("class", "form-control");
                            $("#warning_rfid_in_use").attr("class", "text-danger d-none");
                        }
                    })
                })
                
                $("#student_rfid_number").on("keyup", function(e){
                    
                    var rfid_number = $(this).val();

                    get_students_data(url_get_students_data, rfid_number).then(function(students_data){

                        if (rfid_number != global_rfid_number)
                        {
                            if (students_data.length > 0)
                            {
                                $("#student_rfid_number").attr("class", "form-control is-invalid");
                                $("#warning_rfid_in_use_add_student").attr("class", "text-danger");
                            }

                            else
                            {
                                get_teachers_data(url_get_teachers_data, rfid_number).then(function(teachers_data){

                                    if (rfid_number != global_rfid_number)
                                    {
                                        if (teachers_data.length > 0)
                                        {
                                            $("#student_rfid_number").attr("class", "form-control is-invalid");
                                            $("#warning_rfid_in_use_add_student").attr("class", "text-danger");
                                        }

                                        else
                                        {
                                            $("#student_rfid_number").attr("class", "form-control");
                                            $("#warning_rfid_in_use_add_student").attr("class", "text-danger d-none");
                                        }
                                    }

                                    else
                                    {
                                        $("#student_rfid_number").attr("class", "form-control");
                                        $("#warning_rfid_in_use_add_student").attr("class", "text-danger d-none");
                                    }
                                })

                                // $("#student_rfid_number").attr("class", "form-control");
                                // $("#warning_rfid_in_use_add_student").attr("class", "text-danger d-none");
                            }
                        }

                        else
                        {
                            $("#student_rfid_number").attr("class", "form-control");
                            $("#warning_rfid_in_use_add_student").attr("class", "text-danger d-none");
                        }
                    })
                })
                
                $("#student_rfid_number").keydown(function(e){
                    if (e.keyCode == 13)
                    {
                        var rfid_number = $(this).val();

                        get_students_data(url_get_students_data, rfid_number).then(function(students_data){

                            if (rfid_number != global_rfid_number)
                            {
                                if (students_data.length > 0)
                                {
                                    $("#student_rfid_number").attr("class", "form-control is-invalid");
                                    $("#warning_rfid_in_use_add_student").attr("class", "text-danger");
                                }

                                else
                                {
                                    get_teachers_data(url_get_teachers_data, rfid_number).then(function(teachers_data){

                                        if (rfid_number != global_rfid_number)
                                        {
                                            if (teachers_data.length > 0)
                                            {
                                                $("#student_rfid_number").attr("class", "form-control is-invalid");
                                                $("#warning_rfid_in_use_add_student").attr("class", "text-danger");
                                            }

                                            else
                                            {
                                                $("#student_rfid_number").attr("class", "form-control");
                                                $("#warning_rfid_in_use_add_student").attr("class", "text-danger d-none");
                                            }
                                        }

                                        else
                                        {
                                            $("#student_rfid_number").attr("class", "form-control");
                                            $("#warning_rfid_in_use_add_student").attr("class", "text-danger d-none");
                                        }
                                    })

                                    // $("#student_rfid_number").attr("class", "form-control");
                                    // $("#warning_rfid_in_use_add_student").attr("class", "text-danger d-none");
                                }
                            }

                            else
                            {
                                $("#student_rfid_number").attr("class", "form-control");
                                $("#warning_rfid_in_use_add_student").attr("class", "text-danger d-none");
                            }
                        })
                        e.preventDefault();
                    }
                })

                $("#teacher_rfid_number").on("keyup", function(e){
                    
                    var rfid_number = $(this).val();

                    get_students_data(url_get_students_data, rfid_number).then(function(students_data){

                        if (rfid_number != global_rfid_number)
                        {
                            if (students_data.length > 0)
                            {
                                $("#teacher_rfid_number").attr("class", "form-control is-invalid");
                                $("#warning_rfid_in_use_add_teacher").attr("class", "text-danger");
                            }

                            else
                            {
                                get_teachers_data(url_get_teachers_data, rfid_number).then(function(teachers_data){

                                    if (rfid_number != global_rfid_number)
                                    {
                                        if (teachers_data.length > 0)
                                        {
                                            $("#teacher_rfid_number").attr("class", "form-control is-invalid");
                                            $("#warning_rfid_in_use_add_teacher").attr("class", "text-danger");
                                        }

                                        else
                                        {
                                            $("#teacher_rfid_number").attr("class", "form-control");
                                            $("#warning_rfid_in_use_add_teacher").attr("class", "text-danger d-none");
                                        }
                                    }

                                    else
                                    {
                                        $("#teacher_rfid_number").attr("class", "form-control");
                                        $("#warning_rfid_in_use_add_teacher").attr("class", "text-danger d-none");
                                    }
                                })

                                // $("#teacher_rfid_number").attr("class", "form-control");
                                // $("#warning_rfid_in_use_add_teacher").attr("class", "text-danger d-none");
                            }
                        }

                        else
                        {
                            $("#student_rfid_number").attr("class", "form-control");
                            $("#warning_rfid_in_use_add_student").attr("class", "text-danger d-none");
                        }
                    })
                })
                
                $("#teacher_rfid_number").keydown(function(e){
                    if (e.keyCode == 13)
                    {
                        var rfid_number = $(this).val();

                        get_students_data(url_get_students_data, rfid_number).then(function(students_data){

                            if (rfid_number != global_rfid_number)
                            {
                                if (students_data.length > 0)
                                {
                                    $("#teacher_rfid_number").attr("class", "form-control is-invalid");
                                    $("#warning_rfid_in_use_add_teacher").attr("class", "text-danger");
                                }

                                else
                                {
                                    get_teachers_data(url_get_teachers_data, rfid_number).then(function(teachers_data){

                                        if (rfid_number != global_rfid_number)
                                        {
                                            if (teachers_data.length > 0)
                                            {
                                                $("#teacher_rfid_number").attr("class", "form-control is-invalid");
                                                $("#warning_rfid_in_use_add_teacher").attr("class", "text-danger");
                                            }

                                            else
                                            {
                                                $("#teacher_rfid_number").attr("class", "form-control");
                                                $("#warning_rfid_in_use_add_teacher").attr("class", "text-danger d-none");
                                            }
                                        }

                                        else
                                        {
                                            $("#teacher_rfid_number").attr("class", "form-control");
                                            $("#warning_rfid_in_use_add_teacher").attr("class", "text-danger d-none");
                                        }
                                    })

                                    // $("#teacher_rfid_number").attr("class", "form-control");
                                    // $("#warning_rfid_in_use_add_teacher").attr("class", "text-danger d-none");
                                }
                            }

                            else
                            {
                                $("#student_rfid_number").attr("class", "form-control");
                                $("#warning_rfid_in_use_add_student").attr("class", "text-danger d-none");
                            }
                        })
                        e.preventDefault();
                    }
                })
                
                $("#edit_teacher_rfid_number").on("keyup", function(e){
                    
                    var rfid_number = $(this).val();

                    get_students_data(url_get_students_data, rfid_number).then(function(students_data){

                        if (rfid_number != global_rfid_number)
                        {
                            if (students_data.length > 0)
                            {
                                $("#edit_teacher_rfid_number").attr("class", "form-control is-invalid");
                                $("#warning_rfid_in_use_edit_teacher").attr("class", "text-danger");
                            }

                            else
                            {
                                get_teachers_data(url_get_teachers_data, rfid_number).then(function(teachers_data){

                                    if (rfid_number != global_rfid_number)
                                    {
                                        if (teachers_data.length > 0)
                                        {
                                            $("#edit_teacher_rfid_number").attr("class", "form-control is-invalid");
                                            $("#warning_rfid_in_use_edit_teacher").attr("class", "text-danger");
                                        }

                                        else
                                        {
                                            $("#edit_teacher_rfid_number").attr("class", "form-control");
                                            $("#warning_rfid_in_use_edit_teacher").attr("class", "text-danger d-none");
                                        }
                                    }

                                    else
                                    {
                                        $("#edit_teacher_rfid_number").attr("class", "form-control");
                                        $("#warning_rfid_in_use_edit_teacher").attr("class", "text-danger d-none");
                                    }
                                })

                                // $("#edit_teacher_rfid_number").attr("class", "form-control");
                                // $("#warning_rfid_in_use_edit_teacher").attr("class", "text-danger d-none");
                            }
                        }

                        else
                        {
                            $("#edit_student_rfid_number").attr("class", "form-control");
                            $("#warning_rfid_in_use_edit_student").attr("class", "text-danger d-none");
                        }
                    })
                })
                
                $("#edit_teacher_rfid_number").keydown(function(e){
                    if (e.keyCode == 13)
                    {
                        var rfid_number = $(this).val();

                        get_students_data(url_get_students_data, rfid_number).then(function(students_data){

                            if (rfid_number != global_rfid_number)
                            {
                                if (students_data.length > 0)
                                {
                                    $("#edit_teacher_rfid_number").attr("class", "form-control is-invalid");
                                    $("#warning_rfid_in_use_edit_teacher").attr("class", "text-danger");
                                }

                                else
                                {
                                    get_teachers_data(url_get_teachers_data, rfid_number).then(function(teachers_data){

                                        if (rfid_number != global_rfid_number)
                                        {
                                            if (teachers_data.length > 0)
                                            {
                                                $("#edit_teacher_rfid_number").attr("class", "form-control is-invalid");
                                                $("#warning_rfid_in_use_edit_teacher").attr("class", "text-danger");
                                            }

                                            else
                                            {
                                                $("#edit_teacher_rfid_number").attr("class", "form-control");
                                                $("#warning_rfid_in_use_edit_teacher").attr("class", "text-danger d-none");
                                            }
                                        }

                                        else
                                        {
                                            $("#edit_teacher_rfid_number").attr("class", "form-control");
                                            $("#warning_rfid_in_use_edit_teacher").attr("class", "text-danger d-none");
                                        }
                                    })

                                    // $("#edit_teacher_rfid_number").attr("class", "form-control");
                                    // $("#warning_rfid_in_use_edit_teacher").attr("class", "text-danger d-none");
                                }
                            }

                            else
                            {
                                $("#edit_student_rfid_number").attr("class", "form-control");
                                $("#warning_rfid_in_use_edit_student").attr("class", "text-danger d-none");
                            }
                        })
                        
                        e.preventDefault();
                    }
                })

                $("#attendance_list").DataTable({
                    "responsive": true, 
                    "lengthChange": false, 
                    "bPaginate": false,
                    "bLengthChange": false,
                    "bFilter": false,
                    "bInfo": false,
                    "bAutoWidth": false,
                    "targets": 'no-sort',
                    "bSort": false,
                    "order": []
                })
                
                $("#attendance_rfid_number").submit(function(e){
                    e.preventDefault();

                    var rfid_number =  $("#input_attendance_rfid_number").val();

                    check_time();
                    
                    if (is_greetings)
                    {
                        is_greetings = false;

                        check_user_attendance(url_check_user_attendance, rfid_number).then(function(user_attendance){
                            
                            var status = "";

                            if (user_attendance.length > 0)
                            {
                                status = user_attendance[0].status;

                                if (status == "0")
                                {
                                    Swal.fire({
                                        html: '<h5>You have already taken attendance today</h5>',
                                        icon: 'error',
                                        showConfirmButton: false,
                                        showCancelButton: false,
                                        buttonsStyling: false,
                                        timer: 2000,
                                        timerProgressBar: true,
                                        willOpen: () => {
                                            Swal.showLoading();
                                        },
                                        willClose: () => {
                                            is_greetings = true;

                                            $("#input_attendance_rfid_number").val("");
                                            $("#input_attendance_rfid_number").focus();
                                        }
                                    });
                                }

                                else
                                {
                                    // Time out Morning
                                    insert_update_attendance(rfid_number, status);
                                }
                            }

                            else
                            {
                                // Time in Morning
                                insert_update_attendance(rfid_number, status);
                            }
                        })
                    }

                    else
                    {
                        Swal.close();
                        
                        is_greetings = true;

                        $("#input_attendance_rfid_number").val("");
                        $("#input_attendance_rfid_number").focus();
                    }
                })

                $("#same_current_address").click(function(){

                    var home_address = $("#personal_student_home_address").val();

                    if (!is_checked)
                    {
                        $("#personal_student_current_address").val(home_address);
                        
                        global_is_current_address = true;
                        is_checked = true;
                    }

                    else
                    {
                        $("#personal_student_current_address").val("");

                        global_is_current_address = false;
                        is_checked = false;
                    }

                })
                
                $("#personal_student_home_address").on("keyup", function(){
                    
                    if (global_is_current_address)
                    {
                        var home_address = $(this).val();

                        $("#personal_student_current_address").val(home_address);
                    }
                })

                $("#teacher_same_current_address").click(function(){

                    var home_address = $("#personal_teacher_home_address").val();

                    if (!is_checked)
                    {
                        $("#personal_teacher_current_address").val(home_address);
                        
                        global_is_current_address = true;
                        is_checked = true;
                    }

                    else
                    {
                        $("#personal_teacher_current_address").val("");

                        global_is_current_address = false;
                        is_checked = false;
                    }

                })
                
                $("#personal_teacher_home_address").on("keyup", function(){
                    
                    if (global_is_current_address)
                    {
                        var home_address = $(this).val();

                        $("#personal_teacher_current_address").val(home_address);
                    }
                })

                $('#calendar').datetimepicker({
                    format: 'L',
                    inline: true
                })

                $("#attendance_filename").on("keyup", function(){

                    $("#attendance_filename").attr("class", "form-control");
                    $("#filename_help").attr("class", "form-text text-danger d-none");
                })

                $('#btn_export_data').click(function(){

                    var filename = $("#attendance_filename").val();

                    if (filename.includes(".") || !filename)
                    {
                        $("#attendance_filename").attr("class", "form-control is-invalid");
                        $("#filename_help").attr("class", "form-text text-danger");
                    }

                    else
                    {
                        export_data(filename + ".xlsx");
                    }
                })

                function check_time()
                {
                    if (parseInt(current_time) < 12 || parseInt(current_time) == 24)
                    {
                        greetings = "Good Morning";
                    }
                    
                    if (parseInt(current_time) < 18 && parseInt(current_time) >= 12)
                    {
                        greetings = "Good Afternoon";
                    }
                    
                    if (parseInt(current_time) < 24 && parseInt(current_time) >= 18)
                    {
                        greetings = "Good Evening";
                    }
                }

                function check_input_rfid_focus()
                {
                    var counter = 0;

                    setInterval(function(){
                            
                        if (document.hasFocus())
                        {
                            if (!is_modal_opened)
                            {
                                $("#input_attendance_rfid_number").focus();
                            }
                            // $("#scan_rfid_header").html("RFID Reader is ready ...");
                            
                            // if (counter < 2)
                            // {
                            //     $("#scan_rfid_image").attr("src", base_url + "dist/img/scan_rfid_gif.gif");
                            // }
                        }

                        else
                        {
                            // $("#scan_rfid_header").html("Unable to scan RFID Cards right now ...");
                            // $("#scan_rfid_image").attr("src", base_url + "dist/img/invalid_scan_rfid_gif.webp");

                            counter = 0;
                        }

                        counter++;
                    }, 100);
                }

                function enable_tooltip()
                {
                    $(".users-list-name").tooltip();
                    $(".view_image").tooltip();
                    $(".teacher_list_row").tooltip();
                    $(".student_list_row").tooltip();
                    $(".user_list_name").tooltip();
                    $("#about_the_developers").tooltip();
                }

                function insert_update_attendance(rfid_number, status)
                {
                    get_user_data_student(url_get_user_data_student, rfid_number).then(function(user_data_student){

                        if (user_data_student.length > 0)
                        {
                            is_data_found = true;
                            
                            Array.from(user_data_student).forEach(function(user_data_student_row){
                                var first_name = user_data_student_row.first_name + " ";
                                var middle_name = "";

                                if (user_data_student_row.middle_name)
                                {
                                    middle_name = String(user_data_student_row.middle_name).substring(0, 1) + ". ";
                                }

                                var last_name = user_data_student_row.last_name;
                                
                                var name = first_name + middle_name + last_name;
                                var student_id = user_data_student_row.student_id;
                                var occupation = "Student";
                                var rfid = user_data_student_row.rfid_number;
                                var course = user_data_student_row.strand;
                                var year_and_section = user_data_student_row.year + "-" + user_data_student_row.section;
                                var image = user_data_student_row.image;
                                var mobile_number = user_data_student_row.mobile_number;
                                var gender = user_data_student_row.gender;
                                var marital_status = user_data_student_row.marital_status;

                                var user_image = "";

                                $("#user_attendance_title").html(name + "'s Attendance Records");
                                $("#attendance_name").html(name);

                                if (occupation)
                                {
                                    $("#attendance_occupation").html(occupation);
                                }

                                else
                                {
                                    $("#attendance_occupation").html("Not Yet Available");
                                }
                                
                                if (rfid)
                                {
                                    $("#attendance_employee_student_id").html(rfid);
                                }

                                else
                                {
                                    $("#attendance_employee_student_id").html("Not Yet Available");
                                }

                                if (gender)
                                {
                                    $("#attendance_gender").html(gender);
                                }

                                else
                                {
                                    $("#attendance_gender").html("Not Yet Available");
                                }
                                
                                if (marital_status)
                                {
                                    $("#attendance_marital_status").html(marital_status);
                                }

                                else
                                {
                                    $("#attendance_marital_status").html("Not Yet Available");
                                }
                                
                                if (image)
                                {
                                    $("#attendance_image").attr("src", base_url + "dist/img/user_upload/" + image);

                                    user_image = base_url + "dist/img/user_upload/" + image;
                                }

                                else
                                {
                                    $("#attendance_image").attr("src", base_url + "dist/img/default_user_image.webp");

                                    user_image = base_url + "dist/img/default_user_image.webp";
                                }

                                if (status == "3" || status == "1")
                                {
                                    Swal.fire({
                                        title: "",
                                        html: `
                                            <div class="text-center">
                                                <img class="img-fluid img-bordered-sm mb-4 w-50" src="`+ user_image +`">
                                                <p class="lead">`+ greetings +` <b>`+ name +`</b>. Hope you have a nice day with us. Bye!</p>   
                                            </div>
                                        `,
                                        padding: "3em",
                                        showConfirmButton: false,
                                        showCancelButton: false,
                                        buttonsStyling: false,
                                        timer: 2000,
                                        timerProgressBar: true,
                                        willOpen: () => {
                                            Swal.showLoading();
                                        },
                                        willClose: () => {
                                            is_greetings = true;

                                            $("#input_attendance_rfid_number").val("");
                                            $("#input_attendance_rfid_number").focus();
                                        }
                                    })
                                }

                                else
                                {
                                    Swal.fire({
                                        title: "",
                                        html: `
                                            <div class="text-center">
                                                <img class="img-fluid img-bordered-sm mb-4 w-50" src="`+ user_image +`">
                                                <br>
                                                <p class="lead">`+ greetings +` <b>`+ name +`</b>. Welcome to Tamban National High School.</p>
                                            </div>
                                        `,
                                        padding: "3em",
                                        showConfirmButton: false,
                                        showCancelButton: false,
                                        buttonsStyling: false,
                                        timer: 2000,
                                        timerProgressBar: true,
                                        willOpen: () => {
                                            Swal.showLoading();
                                        },
                                        willClose: () => {
                                            is_greetings = true;

                                            $("#input_attendance_rfid_number").val("");
                                            $("#input_attendance_rfid_number").focus();
                                        }
                                    })
                                }
                            })

                            // Display Attendance
                            get_attendance_data(url_get_attendance_data, rfid_number).then(function(attendance_data){
                                if (attendance_data.length > 0)
                                {
                                    if (is_data_found)
                                    {
                                        $("#attendance_data").empty();

                                        $("#attendance_data").append(`
                                            <tr>
                                                <td colspan="5" class="text-center">
                                                    <img src="`+base_url+`dist/img/loading.gif">
                                                </td>
                                            </tr>
                                        `)

                                        setTimeout(function(){
                                            $("#attendance_data").empty();

                                            Array.from(attendance_data).forEach(function(attendance_data_row){
                                                var db_date_created = new Date(attendance_data_row.date_created);
                                                var date_created = String(month_name[db_date_created.getMonth()]) + " " + String(db_date_created.getDate()) + ", " + String(db_date_created.getFullYear());

                                                var db_time_in = new Date(attendance_data_row.time_in);
                                                var time_of_the_day_time_in = "AM";
                                                var format_hour_time_in = 12;

                                                if (db_time_in.getHours() >= 12 && db_time_in.getHours() < 24)
                                                {
                                                    time_of_the_day_time_in = "PM";

                                                    format_hour_time_in = db_time_in.getHours() - 12;
                                                }

                                                if (db_time_in.getHours() == 24)
                                                {
                                                    time_of_the_day_time_in = "AM";

                                                    format_hour_time_in = 12;
                                                }
                                                
                                                if (db_time_in.getHours() >= 1 && db_time_in.getHours() < 12)
                                                {
                                                    time_of_the_day_time_in = "AM";

                                                    format_hour_time_in = db_time_in.getHours();
                                                }

                                                if (format_hour_time_in == 0)
                                                {
                                                    format_hour_time_in = 12;
                                                }

                                                var time_in = String(String("00" + format_hour_time_in).slice(-2) + ":" + String("00" + db_time_in.getMinutes()).slice(-2) + " " + time_of_the_day_time_in);

                                                if (attendance_data_row.time_out)
                                                {
                                                    var db_time_out = new Date(attendance_data_row.time_out);
                                                    var time_of_the_day_time_out = "AM";
                                                    var format_hour_time_out = 12;

                                                    if (db_time_out.getHours() >= 12 && db_time_out.getHours() < 24)
                                                    {
                                                        time_of_the_day_time_out = "PM";

                                                        format_hour_time_out = db_time_out.getHours() - 12;
                                                    }

                                                    if (db_time_out.getHours() == 24)
                                                    {
                                                        time_of_the_day_time_out = "AM";

                                                        format_hour_time_out = 12;
                                                    }
                                                    
                                                    if (db_time_out.getHours() >= 1 && db_time_out.getHours() < 12)
                                                    {
                                                        time_of_the_day_time_out = "AM";

                                                        format_hour_time_out = db_time_out.getHours();
                                                    }

                                                    if (format_hour_time_out == 0)
                                                    {
                                                        format_hour_time_out = 12;
                                                    }

                                                    var time_out = String(String("00" + format_hour_time_out).slice(-2) + ":" + String("00" + db_time_out.getMinutes()).slice(-2) + " " + time_of_the_day_time_out);
                                                }

                                                else
                                                {
                                                    time_out = "Not Yet Available";
                                                }
                                                
                                                if (attendance_data_row.time_in_afternoon)
                                                {
                                                    var db_time_in_afternoon = new Date(attendance_data_row.time_in_afternoon);
                                                    var time_of_the_day_time_in_afternoon = "AM";
                                                    var format_hour_time_in_afternoon = 12;

                                                    if (db_time_in_afternoon.getHours() >= 12 && db_time_in_afternoon.getHours() < 24)
                                                    {
                                                        time_of_the_day_time_in_afternoon = "PM";

                                                        format_hour_time_in_afternoon = db_time_in_afternoon.getHours() - 12;
                                                    }

                                                    if (db_time_in_afternoon.getHours() == 24)
                                                    {
                                                        time_of_the_day_time_in_afternoon = "AM";

                                                        format_hour_time_in_afternoon = 12;
                                                    }
                                                    
                                                    if (db_time_in_afternoon.getHours() >= 1 && db_time_in_afternoon.getHours() < 12)
                                                    {
                                                        time_of_the_day_time_in_afternoon = "AM";

                                                        format_hour_time_in_afternoon = db_time_in_afternoon.getHours();
                                                    }

                                                    if (format_hour_time_in_afternoon == 0)
                                                    {
                                                        format_hour_time_in_afternoon = 12;
                                                    }

                                                    var time_in_afternoon = String(String("00" + format_hour_time_in_afternoon).slice(-2) + ":" + String("00" + db_time_in_afternoon.getMinutes()).slice(-2) + " " + time_of_the_day_time_in_afternoon);
                                                }

                                                else
                                                {
                                                    time_in_afternoon = "Not Yet Available"
                                                }
                                                
                                                if (attendance_data_row.time_out_afternoon)
                                                {
                                                    var db_time_out_afternoon = new Date(attendance_data_row.time_out_afternoon);
                                                    var time_of_the_day_time_out_afternoon = "AM";
                                                    var format_hour_time_out_afternoon = 12;

                                                    if (db_time_out_afternoon.getHours() >= 12 && db_time_out_afternoon.getHours() < 24)
                                                    {
                                                        time_of_the_day_time_out_afternoon = "PM";

                                                        format_hour_time_out_afternoon = db_time_out_afternoon.getHours() - 12;
                                                    }

                                                    if (db_time_out_afternoon.getHours() == 24)
                                                    {
                                                        time_of_the_day_time_out_afternoon = "AM";

                                                        format_hour_time_out_afternoon = 12;
                                                    }
                                                    
                                                    if (db_time_out_afternoon.getHours() >= 1 && db_time_out_afternoon.getHours() < 12)
                                                    {
                                                        time_of_the_day_time_out_afternoon = "AM";

                                                        format_hour_time_out_afternoon = db_time_out_afternoon.getHours();
                                                    }

                                                    if (format_hour_time_out_afternoon == 0)
                                                    {
                                                        format_hour_time_out_afternoon = 12;
                                                    }

                                                    var time_out_afternoon = String(String("00" + format_hour_time_out_afternoon).slice(-2) + ":" + String("00" + db_time_out_afternoon.getMinutes()).slice(-2) + " " + time_of_the_day_time_out_afternoon);
                                                }

                                                else
                                                {
                                                    time_out_afternoon = "Not Yet Available"
                                                }

                                                $("#attendance_data").append(`
                                                    <tr>
                                                        <td>`+ date_created +`</td>
                                                        <td>`+ time_in +`</td>
                                                        <td>`+ time_out +`</td>
                                                        <td>`+ time_in_afternoon +`</td>
                                                        <td>`+ time_out_afternoon +`</td>
                                                    </tr>
                                                `)
                                            })
                                        }, 1000)
                                    }
                                }
                            })
                        }

                        else
                        {
                            get_user_data_teacher(url_get_user_data_teacher, rfid_number).then(function(user_data_teacher){
                                is_data_found = true;

                                if (user_data_teacher.length > 0)
                                {
                                    Array.from(user_data_teacher).forEach(function(user_data_teacher_row){
                                        var first_name = user_data_teacher_row.first_name + " ";
                                        var middle_name = "";

                                        if (user_data_teacher_row.middle_name)
                                        {
                                            middle_name = String(user_data_teacher_row.middle_name).substring(0, 1) + ". ";
                                        }

                                        var last_name = user_data_teacher_row.last_name;
                                        
                                        var name = first_name + middle_name + last_name;
                                        var occupation = "Teacher";
                                        var rfid = user_data_teacher_row.rfid_number;
                                        var image = user_data_teacher_row.image;
                                        var mobile_number = user_data_teacher_row.mobile_number;
                                        var gender = user_data_teacher_row.gender;
                                        var marital_status = user_data_teacher_row.marital_status;

                                        var user_image = "";

                                        $("#user_attendance_title").html(name + "'s Attendance Records");
                                        $("#attendance_name").html(name);

                                        if (occupation)
                                        {
                                            $("#attendance_occupation").html(occupation);
                                        }

                                        else
                                        {
                                            $("#attendance_occupation").html("Not Yet Available");
                                        }
                                        
                                        if (rfid)
                                        {
                                            $("#attendance_employee_student_id").html(rfid);
                                        }

                                        else
                                        {
                                            $("#attendance_employee_student_id").html("Not Yet Available");
                                        }

                                        if (gender)
                                        {
                                            $("#attendance_gender").html(gender);
                                        }

                                        else
                                        {
                                            $("#attendance_gender").html("Not Yet Available");
                                        }
                                        
                                        if (marital_status)
                                        {
                                            $("#attendance_marital_status").html(marital_status);
                                        }

                                        else
                                        {
                                            $("#attendance_marital_status").html("Not Yet Available");
                                        }
                                        
                                        if (image)
                                        {
                                            $("#attendance_image").attr("src", base_url + "dist/img/user_upload/" + image);

                                            user_image = base_url + "dist/img/user_upload/" + image;
                                        }

                                        else
                                        {
                                            $("#attendance_image").attr("src", base_url + "dist/img/default_user_image.webp");

                                            user_image = base_url + "dist/img/default_user_image.webp";
                                        }

                                        if (status == "3" || status == "1")
                                        {
                                            Swal.fire({
                                                title: "",
                                                html: `
                                                    <div class="text-center">
                                                        <img class="img-fluid img-bordered-sm mb-4 w-50" src="`+ user_image +`">
                                                        <p class="lead">`+ greetings +` <b>`+ name +`</b>. Hope you have a nice day with us. Bye!</p> 
                                                    </div>
                                                `,
                                                padding: "3em",
                                                showConfirmButton: false,
                                                showCancelButton: false,
                                                buttonsStyling: false,
                                                timer: 2000,
                                                timerProgressBar: true,
                                                willOpen: () => {
                                                    Swal.showLoading();
                                                },
                                                willClose: () => {
                                                    is_greetings = true;

                                                    $("#input_attendance_rfid_number").val("");
                                                    $("#input_attendance_rfid_number").focus();
                                                }
                                            })
                                        }

                                        else
                                        {
                                            Swal.fire({
                                                title: "",
                                                html: `
                                                    <div class="text-center">
                                                        <img class="img-fluid img-bordered-sm mb-4 w-50" src="`+ user_image +`">
                                                        <br>
                                                        <p class="lead">`+ greetings +` <b>`+ name +`</b>. Welcome to Tamban National High School.</p>
                                                    </div>
                                                `,
                                                padding: "3em",
                                                showConfirmButton: false,
                                                showCancelButton: false,
                                                buttonsStyling: false,
                                                timer: 2000,
                                                timerProgressBar: true,
                                                willOpen: () => {
                                                    Swal.showLoading();
                                                },
                                                willClose: () => {
                                                    is_greetings = true;

                                                    $("#input_attendance_rfid_number").val("");
                                                    $("#input_attendance_rfid_number").focus();
                                                }
                                            })
                                        }
                                    })

                                    // Display Attendance Teacher
                                    get_attendance_data(url_get_attendance_data, rfid_number).then(function(attendance_data){
                                        if (attendance_data.length > 0)
                                        {
                                            if (is_data_found)
                                            {
                                                $("#attendance_data").empty();

                                                $("#attendance_data").append(`
                                                    <tr>
                                                        <td colspan="5" class="text-center">
                                                            <img src="`+base_url+`dist/img/loading.gif">
                                                        </td>
                                                    </tr>
                                                `)

                                                setTimeout(function(){
                                                    $("#attendance_data").empty();

                                                    Array.from(attendance_data).forEach(function(attendance_data_row){
                                                        var db_date_created = new Date(attendance_data_row.date_created);
                                                        var date_created = String(month_name[db_date_created.getMonth()]) + " " + String(db_date_created.getDate()) + ", " + String(db_date_created.getFullYear());

                                                        var db_time_in = new Date(attendance_data_row.time_in);
                                                        var time_of_the_day_time_in = "AM";
                                                        var format_hour_time_in = 12;

                                                        if (db_time_in.getHours() >= 12 && db_time_in.getHours() < 24)
                                                        {
                                                            time_of_the_day_time_in = "PM";

                                                            format_hour_time_in = db_time_in.getHours() - 12;
                                                        }

                                                        if (db_time_in.getHours() == 24)
                                                        {
                                                            time_of_the_day_time_in = "AM";

                                                            format_hour_time_in = 12;
                                                        }
                                                        
                                                        if (db_time_in.getHours() >= 1 && db_time_in.getHours() < 12)
                                                        {
                                                            time_of_the_day_time_in = "AM";

                                                            format_hour_time_in = db_time_in.getHours();
                                                        }

                                                        if (format_hour_time_in == 0)
                                                        {
                                                            format_hour_time_in = 12;
                                                        }

                                                        var time_in = String(String("00" + format_hour_time_in).slice(-2) + ":" + String("00" + db_time_in.getMinutes()).slice(-2) + " " + time_of_the_day_time_in);

                                                        if (attendance_data_row.time_out)
                                                        {
                                                            var db_time_out = new Date(attendance_data_row.time_out);
                                                            var time_of_the_day_time_out = "AM";
                                                            var format_hour_time_out = 12;

                                                            if (db_time_out.getHours() >= 12 && db_time_out.getHours() < 24)
                                                            {
                                                                time_of_the_day_time_out = "PM";

                                                                format_hour_time_out = db_time_out.getHours() - 12;
                                                            }

                                                            if (db_time_out.getHours() == 24)
                                                            {
                                                                time_of_the_day_time_out = "AM";

                                                                format_hour_time_out = 12;
                                                            }
                                                            
                                                            if (db_time_out.getHours() >= 1 && db_time_out.getHours() < 12)
                                                            {
                                                                time_of_the_day_time_out = "AM";

                                                                format_hour_time_out = db_time_out.getHours();
                                                            }

                                                            if (format_hour_time_out == 0)
                                                            {
                                                                format_hour_time_out = 12;
                                                            }

                                                            var time_out = String(String("00" + format_hour_time_out).slice(-2) + ":" + String("00" + db_time_out.getMinutes()).slice(-2) + " " + time_of_the_day_time_out);
                                                        }

                                                        else
                                                        {
                                                            time_out = "Not Yet Available";
                                                        }
                                                        
                                                        if (attendance_data_row.time_in_afternoon)
                                                        {
                                                            var db_time_in_afternoon = new Date(attendance_data_row.time_in_afternoon);
                                                            var time_of_the_day_time_in_afternoon = "AM";
                                                            var format_hour_time_in_afternoon = 12;

                                                            if (db_time_in_afternoon.getHours() >= 12 && db_time_in_afternoon.getHours() < 24)
                                                            {
                                                                time_of_the_day_time_in_afternoon = "PM";

                                                                format_hour_time_in_afternoon = db_time_in_afternoon.getHours() - 12;
                                                            }

                                                            if (db_time_in_afternoon.getHours() == 24)
                                                            {
                                                                time_of_the_day_time_in_afternoon = "AM";

                                                                format_hour_time_in_afternoon = 12;
                                                            }
                                                            
                                                            if (db_time_in_afternoon.getHours() >= 1 && db_time_in_afternoon.getHours() < 12)
                                                            {
                                                                time_of_the_day_time_in_afternoon = "AM";

                                                                format_hour_time_in_afternoon = db_time_in_afternoon.getHours();
                                                            }

                                                            if (format_hour_time_in_afternoon == 0)
                                                            {
                                                                format_hour_time_in_afternoon = 12;
                                                            }

                                                            var time_in_afternoon = String(String("00" + format_hour_time_in_afternoon).slice(-2) + ":" + String("00" + db_time_in_afternoon.getMinutes()).slice(-2) + " " + time_of_the_day_time_in_afternoon);
                                                        }

                                                        else
                                                        {
                                                            time_in_afternoon = "Not Yet Available"
                                                        }
                                                        
                                                        if (attendance_data_row.time_out_afternoon)
                                                        {
                                                            var db_time_out_afternoon = new Date(attendance_data_row.time_out_afternoon);
                                                            var time_of_the_day_time_out_afternoon = "AM";
                                                            var format_hour_time_out_afternoon = 12;

                                                            if (db_time_out_afternoon.getHours() >= 12 && db_time_out_afternoon.getHours() < 24)
                                                            {
                                                                time_of_the_day_time_out_afternoon = "PM";

                                                                format_hour_time_out_afternoon = db_time_out_afternoon.getHours() - 12;
                                                            }

                                                            if (db_time_out_afternoon.getHours() == 24)
                                                            {
                                                                time_of_the_day_time_out_afternoon = "AM";

                                                                format_hour_time_out_afternoon = 12;
                                                            }
                                                            
                                                            if (db_time_out_afternoon.getHours() >= 1 && db_time_out_afternoon.getHours() < 12)
                                                            {
                                                                time_of_the_day_time_out_afternoon = "AM";

                                                                format_hour_time_out_afternoon = db_time_out_afternoon.getHours();
                                                            }

                                                            if (format_hour_time_out_afternoon == 0)
                                                            {
                                                                format_hour_time_out_afternoon = 12;
                                                            }

                                                            var time_out_afternoon = String(String("00" + format_hour_time_out_afternoon).slice(-2) + ":" + String("00" + db_time_out_afternoon.getMinutes()).slice(-2) + " " + time_of_the_day_time_out_afternoon);
                                                        }

                                                        else
                                                        {
                                                            time_out_afternoon = "Not Yet Available"
                                                        }

                                                        $("#attendance_data").append(`
                                                            <tr>
                                                                <td>`+ date_created +`</td>
                                                                <td>`+ time_in +`</td>
                                                                <td>`+ time_out +`</td>
                                                                <td>`+ time_in_afternoon +`</td>
                                                                <td>`+ time_out_afternoon +`</td>
                                                            </tr>
                                                        `)
                                                    })
                                                }, 1000)
                                            }
                                        }
                                    })
                                }

                                else
                                {
                                    Swal.fire({
                                        html: '<h5>There is no registered user on that card</h5>',
                                        icon: 'error',
                                        showConfirmButton: false,
                                        showCancelButton: false,
                                        buttonsStyling: false,
                                        timer: 2000,
                                        timerProgressBar: true,
                                        willOpen: () => {
                                            Swal.showLoading();
                                        },
                                        willClose: () => {
                                            is_greetings = true;

                                            $("#input_attendance_rfid_number").val("");
                                            $("#input_attendance_rfid_number").focus();
                                        }
                                    });

                                    is_data_found = false;
                                }
                            })
                        }
                    })
                }

                function displayFileInfo(uploader) 
                {
                    if (uploader.files && uploader.files[0]) 
                    {
                        $('#user_img_label').text(uploader.files[0].name);
                        $('#user_img').attr('src', window.URL.createObjectURL(uploader.files[0]));
                    }
                }
                
                function displayFileInfoStudent(uploader) 
                {
                    if (uploader.files && uploader.files[0]) 
                    {
                        $('#user_img_label_2').text(uploader.files[0].name);
                        $('#user_img_2').attr('src', window.URL.createObjectURL(uploader.files[0]));
                    }
                }
                
                function displayFileInfoAdmin(uploader) 
                {
                    if (uploader.files && uploader.files[0]) 
                    {
                        $('#user_img_label_3').text(uploader.files[0].name);
                        $('#user_img_3').attr('src', window.URL.createObjectURL(uploader.files[0]));
                    }
                }
                
                function displayFileInfoTeacher(uploader) 
                {
                    if (uploader.files && uploader.files[0]) 
                    {
                        $('#user_img_label_4').text(uploader.files[0].name);
                        $('#user_img_4').attr('src', window.URL.createObjectURL(uploader.files[0]));
                    }
                }
                
                function displayFileInfoEditTeacher(uploader) 
                {
                    if (uploader.files && uploader.files[0]) 
                    {
                        $('#user_img_label_5').text(uploader.files[0].name);
                        $('#user_img_5').attr('src', window.URL.createObjectURL(uploader.files[0]));
                    }
                }
                
                function displayFileInfoStudentUpdate(uploader) 
                {
                    if (uploader.files && uploader.files[0]) 
                    {
                        $('#edit_user_img_label_2').text(uploader.files[0].name);
                        $('#edit_user_img_2').attr('src', window.URL.createObjectURL(uploader.files[0]));
                    }
                }
                
                function displayFileInfoUpdate(uploader) 
                {
                    if (uploader.files && uploader.files[0]) 
                    {
                        $('#edit_user_img_label').text(uploader.files[0].name);
                        $('#edit_user_img').attr('src', window.URL.createObjectURL(uploader.files[0]));
                    }
                }

                function check_screen_size()
                {
                    var screen_width = window.innerWidth;

                    if (screen_width <= 768)
                    {
                        $("#new_teacher").html("");
                        $("#new_visitor").html("");
                        $("#new_student").html("");
                        $("#export_data").html("");
                        $("#btn_more_info_total").attr("class", "small-box-footer d-none");
                        $("#btn_more_info_active").attr("class", "small-box-footer d-none");
                        $("#btn_more_info_terminated").attr("class", "small-box-footer d-none");
                        $("#btn_more_info_total_student").attr("class", "small-box-footer d-none");
                        $("#btn_more_info_active_student").attr("class", "small-box-footer d-none");
                        $("#btn_more_info_removed_student").attr("class", "small-box-footer d-none");
                        $("#btn_back_to_manage_student").html("<i class='fas fa-arrow-right'></i>");
                        $("#btn_back_to_manage_teacher").html("<i class='fas fa-arrow-right'></i>");
                        $("#other_personal_details").attr("class", "d-none");
                        $("#div_show_attendance_record").attr("class", "d-none");
                        $("#attendance_image").attr("height", "100%");
                    }

                    else
                    {
                        $("#new_teacher").html("&nbsp; New Teacher");
                        $("#new_visitor").html("&nbsp; Visitors");
                        $("#new_student").html("&nbsp; New Student");
                        $("#export_data").html("&nbsp; Export Data");
                        $("#btn_more_info_total").attr("class", "small-box-footer");
                        $("#btn_more_info_active").attr("class", "small-box-footer");
                        $("#btn_more_info_terminated").attr("class", "small-box-footer");
                        $("#btn_more_info_total_student").attr("class", "small-box-footer");
                        $("#btn_more_info_active_student").attr("class", "small-box-footer");
                        $("#btn_more_info_removed_student").attr("class", "small-box-footer");

                        if (data_from == "4f8ed9af3796cb50194eca8f73f39639")
                        {
                            $("#btn_back_to_manage_teacher").html("Back to Manage Teacher &nbsp;<i class='fas fa-arrow-right'></i>");
                        }
                        
                        else
                        {
                            $("#btn_back_to_manage_teacher").html("Back to Teacher Attendance Record &nbsp;<i class='fas fa-arrow-right'></i>");
                        }
                        
                        if (data_from == "ce23c96cb515b311d79a164f96e435b7")
                        {
                            $("#btn_back_to_manage_student").html("Back to Student Attendance Record &nbsp;<i class='fas fa-arrow-right'></i>");
                        }
                        
                        else
                        {
                            $("#btn_back_to_manage_student").html("Back to Manage Student &nbsp;<i class='fas fa-arrow-right'></i>");
                        }
                        
                        $("#other_personal_details").attr("class", "");
                        $("#div_show_attendance_record").attr("class", "col-12");
                        $("#attendance_image").attr("height", "300");
                    }
                }
                
                function export_data(filename)
                {
                    var table = document.getElementById("attendance_record_table");

                    TableToExcel.convert(table, {
                        name: filename,
                        sheet: {
                            name: 'Sheet 1'
                        }
                    })

                    var modal = $("#export_data_modal");

                    modal.modal('hide');
                }

                async function get_user_data_student(url, rfid_number) 
                {
                    var formData = new FormData();

                    formData.append('rfid_number', rfid_number);
                    
                    const response = await fetch(url, {
                        method: 'POST',
                        body: formData
                    });

                    return response.json();
                }
                
                async function get_visitor_data(url, name) 
                {
                    var formData = new FormData();

                    formData.append('name', name);
                    
                    const response = await fetch(url, {
                        method: 'POST',
                        body: formData
                    });

                    return response.json();
                }
                
                async function get_user_data_teacher(url, rfid_number) 
                {
                    var formData = new FormData();

                    formData.append('rfid_number', rfid_number);
                    
                    const response = await fetch(url, {
                        method: 'POST',
                        body: formData
                    });

                    return response.json();
                }
                
                async function get_user_account_data(url, username) 
                {
                    var formData = new FormData();

                    formData.append('username', username);
                    
                    const response = await fetch(url, {
                        method: 'POST',
                        body: formData
                    });

                    return response.json();
                }
                
                async function check_user_attendance(url, rfid_number) 
                {
                    var formData = new FormData();

                    formData.append('rfid_number', rfid_number);
                    
                    const response = await fetch(url, {
                        method: 'POST',
                        body: formData
                    });

                    return response.json();
                }
                
                async function get_attendance_data(url, rfid_number) 
                {
                    var formData = new FormData();

                    formData.append('rfid_number', rfid_number);
                    
                    const response = await fetch(url, {
                        method: 'POST',
                        body: formData
                    });

                    return response.json();
                }
                
                async function get_students_data(url, rfid_number) 
                {
                    var formData = new FormData();

                    formData.append('rfid_number', rfid_number);
                    
                    const response = await fetch(url, {
                        method: 'POST',
                        body: formData
                    });

                    return response.json();
                }
                
                async function get_teachers_data(url, rfid_number) 
                {
                    var formData = new FormData();

                    formData.append('rfid_number', rfid_number);
                    
                    const response = await fetch(url, {
                        method: 'POST',
                        body: formData
                    });

                    return response.json();
                }
                
                async function update_notification_badge(url) 
                {
                    var formData = new FormData();
                    
                    const response = await fetch(url, {
                        method: 'POST',
                        body: formData
                    });
                }
            })
        </script>
        
    </body>

    </html>