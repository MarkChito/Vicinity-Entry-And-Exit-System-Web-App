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
                                            <th>Strand</th>
                                            <th>Grade & Section</th>
                                            <th>Date</th>
                                            <th>Time In (Morning)</th>
                                            <th>Time Out (Morning)</th>
                                            <th>Time In (Afternoon)</th>
                                            <th>Time Out (Afternoon)</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if ($student_attendance): ?>
                                            <?php foreach ($student_attendance as $student_attendance_row): ?>
                                                <?php $student_data = $this->main_model->MOD_GET_STUDENT_DATA_BY_ID($student_attendance_row->primary_id); ?>
                                                <?php if ($student_data): ?>
                                                    <?php foreach ($student_data as $student_data_row): ?>
                                                        <?php 
                                                            $first_name = $student_data_row->first_name." "; 
                                                            $middle_name = ""; 
                                                            $last_name = $student_data_row->last_name;

                                                            if ($student_data_row->middle_name)
                                                            {
                                                                $middle_name = substr($student_data_row->middle_name, 0, 1).". ";
                                                            }

                                                            $name = $first_name.$middle_name.$last_name;
                                                            $strand = $student_data_row->strand;
                                                            $year = $student_data_row->year;
                                                            $section = $student_data_row->section;
                                                        ?>
                                                    <?php endforeach; ?>
                                                <?php endif; ?>
                                                <tr>
                                                    <td>
                                                        <a title="Click to view full Profile Information" class="user_list_name" href="<?= base_url() ?>main/student_personal_info?id=<?= $student_attendance_row->primary_id ?>&data_from=ce23c96cb515b311d79a164f96e435b7"><?= $name ?></a>
                                                    </td>
                                                    <td><?= $strand ?></td>
                                                    <td><?= $year." - ".$section ?></td>
                                                    <td><?= date("F j, Y", strtotime($student_attendance_row->date_created)) ?></td>
                                                    <td><?php if ($student_attendance_row->time_in) { echo date("h:i A", strtotime($student_attendance_row->time_in)); } else { echo "Not Yet Available"; } ?></td>
                                                    <td><?php if ($student_attendance_row->time_out) { echo date("h:i A", strtotime($student_attendance_row->time_out)); } else { echo "Not Yet Available"; } ?></td>
                                                    <td><?php if ($student_attendance_row->time_in_afternoon) { echo date("h:i A", strtotime($student_attendance_row->time_in_afternoon)); } else { echo "Not Yet Available"; } ?></td>
                                                    <td><?php if ($student_attendance_row->time_out_afternoon) { echo date("h:i A", strtotime($student_attendance_row->time_out_afternoon)); } else { echo "Not Yet Available"; } ?></td>
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