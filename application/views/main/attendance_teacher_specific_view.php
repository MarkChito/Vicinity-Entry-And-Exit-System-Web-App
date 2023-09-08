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
                                                <tr>
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