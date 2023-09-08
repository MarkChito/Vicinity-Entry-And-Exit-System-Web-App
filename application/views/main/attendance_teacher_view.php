<div class="content-wrapper">
        <!-- Header -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-lg-6 col-10">
                        <h1 class="m-0"><?= $current_tab ?></h1>
                    </div>
                    <div class="col-lg-6 col-2" style="text-align: right;">
                        <a href="#" class="btn btn-success" data-toggle="modal" data-target="#export_data_modal"><i class="fas fa-file-export"></i><span id="export_data">&nbsp; Export Data</span></a>
                    </div>
                </div>
            </div>
        </div>
    
        <!-- Main Content -->
        <section class="content">
            <div class="container-fluid">
                <!-- Table List Teachers -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <table id="attendance_record_table" class="table">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Date</th>
                                            <th>Time In (Morning)</th>
                                            <th>Time Out (Morning)</th>
                                            <th>Time In (Afternoon)</th>
                                            <th>Time Out (Afternoon)</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if ($teacher_attendance): ?>
                                            <?php foreach ($teacher_attendance as $teacher_attendance_row): ?>
                                                <?php $teacher_data = $this->main_model->MOD_GET_TEACHER_DATA_BY_ID($teacher_attendance_row->primary_id); ?>
                                                <?php if ($teacher_data): ?>
                                                    <?php foreach ($teacher_data as $teacher_data_row): ?>
                                                        <?php 
                                                            $first_name = $teacher_data_row->first_name." "; 
                                                            $middle_name = ""; 
                                                            $last_name = $teacher_data_row->last_name;

                                                            if ($teacher_data_row->middle_name)
                                                            {
                                                                $middle_name = substr($teacher_data_row->middle_name, 0, 1).". ";
                                                            }

                                                            $name = $first_name.$middle_name.$last_name;
                                                        ?>
                                                    <?php endforeach; ?>
                                                <?php endif; ?>
                                                <tr>
                                                    <td>
                                                        <a title="Click to view full Profile Information" class="user_list_name" href="<?= base_url() ?>main/teacher_personal_info?id=<?= $teacher_attendance_row->primary_id ?>&data_from=e331b65c3f827787f80515a64f697c48"><?= $name ?></a>
                                                    </td>
                                                    <td><?= date("F j, Y", strtotime($teacher_attendance_row->date_created)) ?></td>
                                                    <td><?php if ($teacher_attendance_row->time_in) { echo date("h:i A", strtotime($teacher_attendance_row->time_in)); } else { echo "Not Yet Available"; } ?></td>
                                                    <td><?php if ($teacher_attendance_row->time_out) { echo date("h:i A", strtotime($teacher_attendance_row->time_out)); } else { echo "Not Yet Available"; } ?></td>
                                                    <td><?php if ($teacher_attendance_row->time_in_afternoon) { echo date("h:i A", strtotime($teacher_attendance_row->time_in_afternoon)); } else { echo "Not Yet Available"; } ?></td>
                                                    <td><?php if ($teacher_attendance_row->time_out_afternoon) { echo date("h:i A", strtotime($teacher_attendance_row->time_out_afternoon)); } else { echo "Not Yet Available"; } ?></td>
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