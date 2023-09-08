    <div class="content-wrapper">
        <!-- Header -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-lg-6 col-10">
                        <h1 class="m-0"><?= $current_tab ?></h1>
                    </div>
                    <div class="col-lg-6 col-2" style="text-align: right;">
                        <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#add_new_student"><i class="fas fa-plus"></i><span id="new_student">&nbsp; New Student</span></a>
                    </div>
                </div>
            </div>
        </div>
    
        <!-- Main Content -->
        <section class="content">
            <div class="container-fluid">
                <!-- Table List Students -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <table id="student_list" class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>RFID Number</th>
                                            <th>Strand</th>
                                            <th>Grade</th>
                                            <th>Section</th>
                                            <th>Email Address</th>
                                            <th>Mobile Number</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if ($student_list): ?>
                                            <?php foreach ($student_list as $student_list_row): ?>
                                                <?php
                                                    $first_name = $student_list_row->first_name." ";
                                                    $middle_name = "";

                                                    if ($student_list_row->middle_name)
                                                    {
                                                        $middle_name = substr($student_list_row->middle_name, 0, 1).". ";
                                                    }

                                                    $last_name = $student_list_row->last_name;

                                                    $name = $first_name.$middle_name.$last_name;
                                                ?>
                                                <tr>
                                                    <td>
                                                        <img title="Click to view image" img_src="<?php if ($student_list_row->image) { echo base_url()."dist/img/user_upload/".$student_list_row->image; } else { echo base_url()."dist/img/default_user_image.webp"; } ?>" style="cursor: pointer;" class="rounded-circle img-bordered-sm view_image" width="35" height="35" src="<?php if ($student_list_row->image) { echo base_url()."dist/img/user_upload/".$student_list_row->image; } else { echo base_url()."dist/img/default_user_image.webp"; } ?>" data-toggle="modal" data-target="#view_profile_picture">
                                                        <a class="user_list_name" href="<?= base_url() ?>main/student_personal_info?id=<?= $student_list_row->id ?>&data_from=c4ca4238a0b923820dcc509a6f75849b" title="Click to view full Profile Information">
                                                            &nbsp;&nbsp;<?= $name ?>
                                                        </a>
                                                    </td>
                                                    <td is_personal="0" title="Click to edit information" style="cursor: pointer;" student_id="<?= $student_list_row->id ?>" student_first_name="<?= substr($first_name, 0, -1) ?>" student_middle_name="<?= $student_list_row->middle_name ?>" student_last_name="<?= $last_name ?>" student_rfid_number="<?= $student_list_row->rfid_number ?>" student_course="<?= $student_list_row->strand ?>" student_year="<?= $student_list_row->year ?>" student_section="<?= $student_list_row->section ?>" student_email_address="<?= $student_list_row->email_address ?>" student_mobile_number="<?= $student_list_row->mobile_number ?>" student_image="<?= $student_list_row->image ?>" student_teachers="<?= $student_list_row->teachers ?>" class="student_list_row" data-toggle="modal" data-target="#edit_student"><?= $student_list_row->rfid_number ?></td>
                                                    <td is_personal="0" title="Click to edit information" style="cursor: pointer;" student_id="<?= $student_list_row->id ?>" student_first_name="<?= substr($first_name, 0, -1) ?>" student_middle_name="<?= $student_list_row->middle_name ?>" student_last_name="<?= $last_name ?>" student_rfid_number="<?= $student_list_row->rfid_number ?>" student_course="<?= $student_list_row->strand ?>" student_year="<?= $student_list_row->year ?>" student_section="<?= $student_list_row->section ?>" student_email_address="<?= $student_list_row->email_address ?>" student_mobile_number="<?= $student_list_row->mobile_number ?>" student_image="<?= $student_list_row->image ?>" student_teachers="<?= $student_list_row->teachers ?>" class="student_list_row" data-toggle="modal" data-target="#edit_student"><?= $student_list_row->strand ?></td>
                                                    <td is_personal="0" title="Click to edit information" style="cursor: pointer;" student_id="<?= $student_list_row->id ?>" student_first_name="<?= substr($first_name, 0, -1) ?>" student_middle_name="<?= $student_list_row->middle_name ?>" student_last_name="<?= $last_name ?>" student_rfid_number="<?= $student_list_row->rfid_number ?>" student_course="<?= $student_list_row->strand ?>" student_year="<?= $student_list_row->year ?>" student_section="<?= $student_list_row->section ?>" student_email_address="<?= $student_list_row->email_address ?>" student_mobile_number="<?= $student_list_row->mobile_number ?>" student_image="<?= $student_list_row->image ?>" student_teachers="<?= $student_list_row->teachers ?>" class="student_list_row" data-toggle="modal" data-target="#edit_student"><?= $student_list_row->year ?></td>
                                                    <td is_personal="0" title="Click to edit information" style="cursor: pointer;" student_id="<?= $student_list_row->id ?>" student_first_name="<?= substr($first_name, 0, -1) ?>" student_middle_name="<?= $student_list_row->middle_name ?>" student_last_name="<?= $last_name ?>" student_rfid_number="<?= $student_list_row->rfid_number ?>" student_course="<?= $student_list_row->strand ?>" student_year="<?= $student_list_row->year ?>" student_section="<?= $student_list_row->section ?>" student_email_address="<?= $student_list_row->email_address ?>" student_mobile_number="<?= $student_list_row->mobile_number ?>" student_image="<?= $student_list_row->image ?>" student_teachers="<?= $student_list_row->teachers ?>" class="student_list_row" data-toggle="modal" data-target="#edit_student"><?= $student_list_row->section ?></td>
                                                    <td is_personal="0" title="Click to edit information" style="cursor: pointer;" student_id="<?= $student_list_row->id ?>" student_first_name="<?= substr($first_name, 0, -1) ?>" student_middle_name="<?= $student_list_row->middle_name ?>" student_last_name="<?= $last_name ?>" student_rfid_number="<?= $student_list_row->rfid_number ?>" student_course="<?= $student_list_row->strand ?>" student_year="<?= $student_list_row->year ?>" student_section="<?= $student_list_row->section ?>" student_email_address="<?= $student_list_row->email_address ?>" student_mobile_number="<?= $student_list_row->mobile_number ?>" student_image="<?= $student_list_row->image ?>" student_teachers="<?= $student_list_row->teachers ?>" class="student_list_row" data-toggle="modal" data-target="#edit_student"><?php if ($student_list_row->email_address) {echo $student_list_row->email_address;} else {echo "Not Yet Available";} ?></td>
                                                    <td is_personal="0" title="Click to edit information" style="cursor: pointer;" student_id="<?= $student_list_row->id ?>" student_first_name="<?= substr($first_name, 0, -1) ?>" student_middle_name="<?= $student_list_row->middle_name ?>" student_last_name="<?= $last_name ?>" student_rfid_number="<?= $student_list_row->rfid_number ?>" student_course="<?= $student_list_row->strand ?>" student_year="<?= $student_list_row->year ?>" student_section="<?= $student_list_row->section ?>" student_email_address="<?= $student_list_row->email_address ?>" student_mobile_number="<?= $student_list_row->mobile_number ?>" student_image="<?= $student_list_row->image ?>" student_teachers="<?= $student_list_row->teachers ?>" class="student_list_row" data-toggle="modal" data-target="#edit_student"><?php if ($student_list_row->mobile_number) {echo $student_list_row->mobile_number;} else {echo "Not Yet Available";} ?></td>
                                                </tr>
                                            <?php endforeach; ?>
                                        <?php endif; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>