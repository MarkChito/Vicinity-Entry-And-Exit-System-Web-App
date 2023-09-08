<?php
    $data_from = $this->input->get("data_from");
    
    $id = null;
    $student_id = null;
    $first_name = null;
    $middle_name = null;
    $last_name = null;
    $name = null;
    $rfid_number = null;
    $strand = null;
    $year = null;
    $section = null;
    $email_address = null;
    $mobile_number = null;
    $image = null;
    $birthday = null;
    $home_address = null;
    $current_address = null;
    $gender = null;
    $marital_status = null;
    $nationality = null;
    $mobile_number = null;
    $email_address = null;
    $facebook_account = null;
    $other_email_address = null;
    $guardian_name = null;
    $guardian_mobile_number = null;

    if ($student_list_personal)
    {
        foreach ($student_list_personal as $student_list_personal_row)
        {
            $id = $student_list_personal_row->id;
            $first_name = $student_list_personal_row->first_name." ";
            $middle_name = "";
            $original_middle_name = $student_list_personal_row->middle_name;
            $last_name = $student_list_personal_row->last_name;

            if ($student_list_personal_row->middle_name)
            {
                $middle_name = substr($student_list_personal_row->middle_name, 0, 1).". ";
            }

            $name = $first_name.$middle_name.$last_name;

            $student_id = $student_list_personal_row->student_id;
            $rfid_number = $student_list_personal_row->rfid_number;
            $strand = $student_list_personal_row->strand;
            $year = $student_list_personal_row->year;
            $section = $student_list_personal_row->section;
            $email_address = $student_list_personal_row->email_address;
            $mobile_number = $student_list_personal_row->mobile_number;
            $image = $student_list_personal_row->image;
            $birthday = $student_list_personal_row->birthday;
            $home_address = $student_list_personal_row->home_address;
            $current_address = $student_list_personal_row->current_address;
            $gender = $student_list_personal_row->gender;
            $marital_status = $student_list_personal_row->marital_status;
            $nationality = $student_list_personal_row->nationality;
            $mobile_number = $student_list_personal_row->mobile_number;
            $email_address = $student_list_personal_row->email_address;
            $facebook_account = $student_list_personal_row->facebook_account;
            $other_email_address = $student_list_personal_row->other_email_address;
            $guardian_name = $student_list_personal_row->guardian_name;
            $guardian_mobile_number = $student_list_personal_row->guardian_mobile_number;
            $teachers = $student_list_personal_row->teachers;
        }
    }
?>
    
    <div class="content-wrapper">
        <!-- Header -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-lg-6 col-10">
                        <h1 class="m-0"><?= $current_tab ?></h1>
                    </div>
                    <div class="col-lg-6 col-2">
                        <?php if ($this->input->get("data_from") == "c4ca4238a0b923820dcc509a6f75849b"): ?>
                            <a href="<?= base_url() ?>main/manage_student" class="m-0 float-right" id="btn_back_to_manage_student">Back to Manage Student &nbsp;<i class="fas fa-arrow-right"></i></a>
                        <?php else: ?>
                            <a href="<?= base_url() ?>main/attendance_student" class="m-0 float-right" id="btn_back_to_manage_student">Back to Student Attendance Record &nbsp;<i class="fas fa-arrow-right"></i></a>
                        <?php endif ?>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main Content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-3">
                        <div class="card card-primary card-outline">
                            <div class="card-body box-profile">
                                <div class="text-center">
                                    <img title="Click to view image" data-placement="right" class="rounded-circle img-bordered-sm view_image" width="100" height="100" data-toggle="modal" data-target="#view_profile_picture" style="cursor: pointer;" src="<?php if ($image) { echo base_url()."dist/img/user_upload/".$image; } else { echo base_url()."dist/img/default_user_image.webp"; } ?>" img_src="<?php if ($image) { echo base_url()."dist/img/user_upload/".$image; } else { echo base_url()."dist/img/default_user_image.webp"; } ?>" alt="User profile picture" >
                                </div>

                                <h3 class="profile-username text-center"><?= $name ?></h3>

                                <p class="text-muted text-center"><?php if ($student_id) {echo $student_id;} else {echo "Not Yet Available";} ?></p>

                                <ul class="list-group list-group-unbordered mb-3">
                                    <li class="list-group-item">
                                        <b>RFID Number</b> <span class="float-right"><?= $rfid_number ?></span>
                                    </li>
                                    <li class="list-group-item">
                                        <b>Strand</b> <span class="float-right"><?= $strand ?></span>
                                    </li>
                                    <li class="list-group-item">
                                        <b>Grade & Section</b> <span class="float-right"><?= $year." - ".$section ?></span>
                                    </li>
                                </ul>
                                
                                <a href="#" class="btn btn-primary btn-block student_list_row" is_personal="1" student_id="<?= $id ?>" student_first_name="<?= substr($first_name, 0, -1) ?>" student_middle_name="<?= $original_middle_name ?>" student_last_name="<?= $last_name ?>" student_rfid_number="<?= $rfid_number ?>" student_course="<?= $strand ?>" student_year="<?= $year ?>" student_section="<?= $section ?>" student_email_address="<?= $email_address ?>" student_mobile_number="<?= $mobile_number ?>" student_image="<?= $image ?>" student_teachers="<?= $teachers ?>" data-toggle="modal" data-target="#edit_student">
                                    <b>Edit Primary Information</b>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-9">
                        <!-- Personal Information -->
                        <div class="card">
                            <div class="card-header mt-2 mb-2">
                                <span class="card-title text-muted text-bold"><i class="fas fa-user-alt"></i>&nbsp; Personal Information</span>
                                <a href="#" id="btn_edit_student_personal_information" data-toggle="modal" data-target="#edit_student_personal_information" student_primary_id="<?= $id ?>" student_id="<?= $student_id ?>" student_first_name="<?= substr($first_name, 0, -1) ?>" student_middle_name="<?= $original_middle_name ?>"  student_last_name="<?= $last_name ?>"student_birthday="<?= $birthday ?>" student_gender="<?= $gender ?>" student_marital_status="<?= $marital_status ?>" student_nationality="<?= $nationality ?>" student_home_address="<?= $home_address ?>" student_current_address="<?= $current_address ?>"><i class="fas fa-pencil-alt float-right"></i></a>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-6 col-12">
                                        <div class="row">
                                            <div class="col-6">
                                                <b>Student ID</b>
                                            </div>
                                            <div class="col-6">
                                                <p><?php if ($student_id) { echo $student_id; } else { echo "Not Yet Available"; } ?></p>
                                            </div>
                                            <div class="col-6">
                                                <b>Name</b>
                                            </div>
                                            <div class="col-6">
                                                <p><?= $name ?></p>
                                            </div>
                                            <div class="col-6">
                                                <b>Marital Status</b>
                                            </div>
                                            <div class="col-6">
                                                <p><?php if ($marital_status) { echo $marital_status; } else { echo "Not Yet Available"; } ?></p>
                                            </div>
                                            <div class="col-6">
                                                <b>Home Address</b>
                                            </div>
                                            <div class="col-6">
                                                <p><?php if ($home_address) { echo $home_address; } else { echo "Not Yet Available"; } ?></p>
                                            </div>
                                            
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-12">
                                        <div class="row">
                                            <div class="col-6">
                                                <b>Birthday</b>
                                            </div>
                                            <div class="col-6">
                                                <p><?php if ($birthday) { echo date("F d, Y", strtotime($birthday)); } else { echo "Not Yet Available"; } ?></p>
                                            </div>
                                            <div class="col-6">
                                                <b>Gender</b>
                                            </div>
                                            <div class="col-6">
                                                <p><?php if ($gender) { echo $gender; } else { echo "Not Yet Available"; } ?></p>
                                            </div>
                                            <div class="col-6">
                                                <b>Nationality</b>
                                            </div>
                                            <div class="col-6">
                                                <p><?php if ($nationality) { echo $nationality; } else { echo "Not Yet Available"; } ?></p>
                                            </div>
                                            <div class="col-6">
                                                <b>Current Address</b>
                                            </div>
                                            <div class="col-6">
                                                <p><?php if ($current_address) { echo $current_address; } else { echo "Not Yet Available"; } ?></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Contact Information -->
                        <div class="card">
                            <div class="card-header mt-2 mb-2">
                                <span class="card-title text-muted text-bold"><i class="fas fa-id-card-alt"></i>&nbsp; Contact Details</span>
                                <?php if ($email_address || $mobile_number || $facebook_account || $other_email_address || $guardian_name || $guardian_mobile_number): ?>
                                    <a href="#" id="btn_edit_student_contact_details" data-toggle="modal" data-target="#edit_student_contact_details" mobile_number="<?= $mobile_number ?>" email_address="<?= $email_address ?>" facebook_account="<?= $facebook_account ?>" other_email_address="<?= $other_email_address ?>" guardian_name="<?= $guardian_name ?>" guardian_mobile_number="<?= $guardian_mobile_number ?>" student_id="<?= $id ?>"><i class="fas fa-pencil-alt float-right"></i></a>
                                <?php else: ?>
                                    <a href="#" id="btn_edit_student_contact_details" data-toggle="modal" data-target="#edit_student_contact_details" student_id="<?= $id ?>"><i class="fas fa-plus float-right"></i></a>
                                <?php endif; ?>
                            </div>
                            <div class="card-body">
                                <?php if ($email_address || $mobile_number || $facebook_account || $other_email_address || $guardian_name || $guardian_mobile_number): ?>
                                    <div class="row">
                                        <div class="col-lg-6 col-12">
                                            <div class="row">
                                                <div class="col-6">
                                                    <b>Mobile Number</b>
                                                </div>
                                                <div class="col-6">
                                                    <p><?php if ($mobile_number) { echo $mobile_number; } else { echo "Not Yet Available"; } ?></p>
                                                </div>
                                                <div class="col-6">
                                                    <b>Email Address</b>
                                                </div>
                                                <div class="col-6">
                                                    <p><?php if ($email_address) { echo $email_address; } else { echo "Not Yet Available"; } ?></p>
                                                </div>
                                                <div class="col-6">
                                                    <b>Guardian's Name</b>
                                                </div>
                                                <div class="col-6">
                                                    <p><?php if ($guardian_name) { echo $guardian_name; } else { echo "Not Yet Available"; } ?></p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-12">
                                            <div class="row">
                                                <div class="col-6">
                                                    <b>Facebook Account</b>
                                                </div>
                                                <div class="col-6">
                                                    <p><?php if ($facebook_account) { echo $facebook_account; } else { echo "Not Yet Available"; } ?></p>
                                                </div>
                                                <div class="col-6">
                                                    <b>Other Email Address</b>
                                                </div>
                                                <div class="col-6">
                                                    <p><?php if ($other_email_address) { echo $other_email_address; } else { echo "Not Yet Available"; } ?></p>
                                                </div>
                                                <div class="col-6">
                                                    <b>Guardian's Mobile Number</b>
                                                </div>
                                                <div class="col-6">
                                                    <p><?php if ($guardian_mobile_number) { echo $guardian_mobile_number; } else { echo "Not Yet Available"; } ?></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php else: ?>
                                    <div class="text-center mt-4 mb-4">
                                        <i class="fas fa-id-card-alt fa-3x text-muted"></i>
                                        <h4 class="text-muted mb-4 mt-2"><?= $name ?> has not added any contact information</h4>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                        <!-- Education -->
                        <div class="card">
                            <div class="card-header mt-2 mb-2">
                                <span class="card-title text-muted text-bold"><i class="fas fa-graduation-cap"></i>&nbsp; Education</span>
                                <a href="#" id="btn_add_education" data-toggle="modal" data-target="#add_student_educational_background" student_id="<?= $id ?>"><i class="fas fa-plus float-right"></i></a>
                            </div>
                            <div class="card-body">
                                <?php $GET_EDUCATIONAL_BACKROUND = $this->main_model->MOD_GET_EDUCATIONAL_BACKROUND($id); ?>
                                <?php if ($GET_EDUCATIONAL_BACKROUND): ?>
                                    <ul class="list-group">
                                        <?php foreach ($GET_EDUCATIONAL_BACKROUND as $GET_EDUCATIONAL_BACKROUND_ROW): ?>     
                                            <li class="list-group-item w-100" style="border:none !important;">
                                                <div class="row">
                                                    <div class="col-11">
                                                        <h5><?= $GET_EDUCATIONAL_BACKROUND_ROW->school_name ?></h5>
                                                        <h6><?= $GET_EDUCATIONAL_BACKROUND_ROW->strand_course ?></h6>
                                                        <span><?= $GET_EDUCATIONAL_BACKROUND_ROW->from_year ?> - <?= $GET_EDUCATIONAL_BACKROUND_ROW->to_year ?></span>
                                                    </div>
                                                    <div class="col-1">
                                                        <a href="#" class="btn btn-sm btn-light text-center" data-toggle="dropdown">
                                                            <i class="fas fa-ellipsis-v"></i>
                                                        </a>
                                                
                                                        <div class="dropdown-menu dropdown-menu-right">
                                                            <a class="dropdown-item btn_edit_education" href="#" data-toggle="modal" data-target="#edit_student_educational_background" education_id="<?= $GET_EDUCATIONAL_BACKROUND_ROW->id ?>" edit_primary_id="<?= $GET_EDUCATIONAL_BACKROUND_ROW->primary_id ?>" edit_school_name="<?= $GET_EDUCATIONAL_BACKROUND_ROW->school_name ?>" edit_strand_course="<?= $GET_EDUCATIONAL_BACKROUND_ROW->strand_course ?>" edit_from_year="<?= $GET_EDUCATIONAL_BACKROUND_ROW->from_year ?>" edit_to_year="<?= $GET_EDUCATIONAL_BACKROUND_ROW->to_year ?>" edit_user_type="<?= $GET_EDUCATIONAL_BACKROUND_ROW->user_type ?>">Edit</a>
                                                            <a class="dropdown-item text-danger delete_educational_background" style="cursor: pointer" delete_key="<?= $GET_EDUCATIONAL_BACKROUND_ROW->id ?>" student_id="<?= $GET_EDUCATIONAL_BACKROUND_ROW->primary_id ?>" user_type="<?= $GET_EDUCATIONAL_BACKROUND_ROW->user_type ?>">Delete</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                        <?php endforeach; ?>
                                    </ul>
                                <?php else: ?>
                                    <div class="text-center mt-4 mb-4">
                                        <i class="fas fa-graduation-cap fa-3x text-muted"></i>
                                        <h4 class="text-muted mb-4 mt-2"><?= $name ?> has not added any educational background</h4>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                        <!-- Skills -->
                        <div class="card">
                            <div class="card-header mt-2 mb-2">
                                <span class="card-title text-muted text-bold"><i class="fas fa-book-open"></i>&nbsp; Skills</span>
                                <a href="#" id="btn_add_skills" data-toggle="modal" data-target="#add_student_skills" student_id="<?= $id ?>"><i class="fas fa-plus float-right"></i></a>
                            </div>
                            <div class="card-body">
                                <?php $GET_SKILL_DETAILS = $this->main_model->MOD_GET_SKILL_DETAILS($id); ?>
                                <?php if ($GET_SKILL_DETAILS): ?>
                                    <ul class="list-group">
                                        <?php foreach ($GET_SKILL_DETAILS as $GET_SKILL_DETAILS_ROW): ?>     
                                            <li class="list-group-item w-100" style="border:none !important;">
                                                <div class="row">
                                                    <div class="col-11">
                                                        <?php
                                                            $skill_level_badge = null;

                                                            if ($GET_SKILL_DETAILS_ROW->skill_level == "Novice")
                                                            {
                                                                $skill_level_badge = "success";
                                                            }
                                                            
                                                            if ($GET_SKILL_DETAILS_ROW->skill_level == "Advanced Beginner")
                                                            {
                                                                $skill_level_badge = "primary";
                                                            }
                                                            
                                                            if ($GET_SKILL_DETAILS_ROW->skill_level == "Competent")
                                                            {
                                                                $skill_level_badge = "info";
                                                            }
                                                            
                                                            if ($GET_SKILL_DETAILS_ROW->skill_level == "Proficient")
                                                            {
                                                                $skill_level_badge = "warning";
                                                            }
                                                            
                                                            if ($GET_SKILL_DETAILS_ROW->skill_level == "Expert")
                                                            {
                                                                $skill_level_badge = "danger";
                                                            }
                                                        ?>
                                                        <h6 class="d-inline"><?= $GET_SKILL_DETAILS_ROW->skill_name ?></h6>
                                                        <span class="badge badge-<?= $skill_level_badge ?> ml-2"><?= $GET_SKILL_DETAILS_ROW->skill_level ?></span>
                                                    </div>
                                                    <div class="col-1">
                                                        <a href="#" class="btn btn-sm btn-light text-center" data-toggle="dropdown">
                                                            <i class="fas fa-ellipsis-v"></i>
                                                        </a>
                                                
                                                        <div class="dropdown-menu dropdown-menu-right">
                                                            <a class="dropdown-item btn_edit_skills" href="#" data-toggle="modal" data-target="#edit_student_skills" skill_id="<?= $GET_SKILL_DETAILS_ROW->id ?>" edit_primary_id="<?= $GET_SKILL_DETAILS_ROW->primary_id ?>" edit_skill_name="<?= $GET_SKILL_DETAILS_ROW->skill_name ?>" edit_skill_level="<?= $GET_SKILL_DETAILS_ROW->skill_level ?>" edit_user_type="<?= $GET_SKILL_DETAILS_ROW->user_type ?>">Edit</a>
                                                            <a class="dropdown-item text-danger delete_student_skill" style="cursor: pointer" delete_key="<?= $GET_SKILL_DETAILS_ROW->id ?>" student_id="<?= $GET_SKILL_DETAILS_ROW->primary_id ?>" user_type="<?= $GET_SKILL_DETAILS_ROW->user_type ?>">Delete</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                        <?php endforeach; ?>
                                    </ul>
                                <?php else: ?>
                                    <div class="text-center mt-4 mb-4">
                                        <i class="fas fa-book-open fa-3x text-muted"></i>
                                        <h4 class="text-muted mb-4 mt-2"><?= $name ?> has not added any skills</h4>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>