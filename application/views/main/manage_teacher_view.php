<div class="content-wrapper">
    <!-- Header -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-lg-6 col-10">
                    <h1 class="m-0"><?= $current_tab ?></h1>
                </div>
                <div class="col-lg-6 col-2" style="text-align: right;">
                    <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#add_new_teacher"><i class="fas fa-plus"></i><span id="new_teacher">&nbsp; New Teacher</span></a>
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
                            <table id="teacher_list" class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>RFID Number</th>
                                        <th>Email Address</th>
                                        <th>Mobile Number</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if ($teacher_list): ?>
                                        <?php foreach ($teacher_list as $teacher_list_row): ?>
                                            <?php
                                                $original_middle_name = $teacher_list_row->middle_name;

                                                $first_name = $teacher_list_row->first_name." ";
                                                $middle_name = "";

                                                if ($teacher_list_row->middle_name)
                                                {
                                                    $middle_name = substr($teacher_list_row->middle_name, 0, 1).". ";
                                                }

                                                $last_name = $teacher_list_row->last_name;

                                                $name = $first_name.$middle_name.$last_name;

                                                $GET_TEACHER_USER_ACCOUNT = $this->main_model->MOD_GET_TEACHER_USER_ACCOUNT($teacher_list_row->user_account_id);

                                                if ($GET_TEACHER_USER_ACCOUNT)
                                                {
                                                    foreach ($GET_TEACHER_USER_ACCOUNT as $GET_TEACHER_USER_ACCOUNT_ROW)
                                                    {
                                                        $teacher_username = $GET_TEACHER_USER_ACCOUNT_ROW->username;
                                                    }
                                                }
                                            ?>
                                            <tr>
                                                <td>
                                                    <img title="Click to view image" img_src="<?php if ($teacher_list_row->image) { echo base_url()."dist/img/user_upload/".$teacher_list_row->image; } else { echo base_url()."dist/img/default_user_image.webp"; } ?>" style="cursor: pointer;" class="rounded-circle img-bordered-sm view_image" width="35" height="35" src="<?php if ($teacher_list_row->image) { echo base_url()."dist/img/user_upload/".$teacher_list_row->image; } else { echo base_url()."dist/img/default_user_image.webp"; } ?>" data-toggle="modal" data-target="#view_profile_picture">
                                                    <a class="user_list_name" href="<?= base_url() ?>main/teacher_personal_info?id=<?= $teacher_list_row->id ?>&data_from=4f8ed9af3796cb50194eca8f73f39639" title="Click to view full Profile Information">
                                                        &nbsp;&nbsp;<?= $name ?>
                                                    </a>
                                                </td>
                                                <td is_personal="0" title="Click to edit information" style="cursor: pointer;" teacher_id="<?= $teacher_list_row->id ?>" teacher_user_account_id="<?= $teacher_list_row->user_account_id ?>" teacher_first_name="<?= substr($first_name, 0, -1) ?>" teacher_middle_name="<?= $original_middle_name ?>" teacher_last_name="<?= $last_name ?>" teacher_rfid_number="<?= $teacher_list_row->rfid_number ?>" teacher_email_address="<?= $teacher_list_row->email_address ?>" teacher_mobile_number="<?= $teacher_list_row->mobile_number ?>" teacher_image="<?= $teacher_list_row->image ?>" teacher_username="<?= $teacher_username ?>" class="teacher_list_row" data-toggle="modal" data-target="#edit_teacher"><?= $teacher_list_row->rfid_number ?></td>
                                                <td is_personal="0" title="Click to edit information" style="cursor: pointer;" teacher_id="<?= $teacher_list_row->id ?>" teacher_user_account_id="<?= $teacher_list_row->user_account_id ?>" teacher_first_name="<?= substr($first_name, 0, -1) ?>" teacher_middle_name="<?= $original_middle_name ?>" teacher_last_name="<?= $last_name ?>" teacher_rfid_number="<?= $teacher_list_row->rfid_number ?>" teacher_email_address="<?= $teacher_list_row->email_address ?>" teacher_mobile_number="<?= $teacher_list_row->mobile_number ?>" teacher_image="<?= $teacher_list_row->image ?>" teacher_username="<?= $teacher_username ?>" class="teacher_list_row" data-toggle="modal" data-target="#edit_teacher"><?php if ($teacher_list_row->email_address) {echo $teacher_list_row->email_address;} else {echo "Not Yet Available";} ?></td>
                                                <td is_personal="0" title="Click to edit information" style="cursor: pointer;" teacher_id="<?= $teacher_list_row->id ?>" teacher_user_account_id="<?= $teacher_list_row->user_account_id ?>" teacher_first_name="<?= substr($first_name, 0, -1) ?>" teacher_middle_name="<?= $original_middle_name ?>" teacher_last_name="<?= $last_name ?>" teacher_rfid_number="<?= $teacher_list_row->rfid_number ?>" teacher_email_address="<?= $teacher_list_row->email_address ?>" teacher_mobile_number="<?= $teacher_list_row->mobile_number ?>" teacher_image="<?= $teacher_list_row->image ?>" teacher_username="<?= $teacher_username ?>" class="teacher_list_row" data-toggle="modal" data-target="#edit_teacher"><?php if ($teacher_list_row->mobile_number) {echo $teacher_list_row->mobile_number;} else {echo "Not Yet Available";} ?></td>
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