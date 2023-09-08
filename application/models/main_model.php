<?php

class main_model extends CI_Model
{   
    public function MOD_GET_VISITOR_DATA_BY_NAME($name)
    {
        $sql = "SELECT * FROM `tbl_info_visitor` WHERE `name`=? AND `time_out` IS NULL";
        $query = $this->db->query($sql,array($name));
        
        return $query->result();
    }
    
    public function MOD_GET_ADMIN_INFO($id)
    {
        $sql = "SELECT * FROM `tbl_info_useraccounts` WHERE `id`=?";
        $query = $this->db->query($sql,array($id));
        
        return $query->result();
    }
    
    public function MOD_GET_STUDENT_DATA()
    {
        $sql = "SELECT * FROM `tbl_info_student`";
        $query = $this->db->query($sql,array());
        
        return $query->result();
    }

    public function MOD_TEACHER_LIST()
    {
        $sql = "SELECT * FROM `tbl_info_teacher` ORDER BY `id` DESC";
        $query = $this->db->query($sql,array());
        
        return $query->result();
    }
    
    public function MOD_GET_TEACHER_DATA()
    {
        $sql = "SELECT * FROM `tbl_info_teacher` ORDER BY `first_name` ASC";
        $query = $this->db->query($sql,array());
        
        return $query->result();
    }
    
    public function MOD_STUDENT_LIST()
    {
        $sql = "SELECT * FROM `tbl_info_student` ORDER BY `id` DESC";
        $query = $this->db->query($sql,array());
        
        return $query->result();
    }
    
    public function MOD_GET_STUDENT_DATA_BY_ID($id)
    {
        $sql = "SELECT * FROM `tbl_info_student` WHERE `id`=?";
        $query = $this->db->query($sql,array($id));
        
        return $query->result();
    }
    
    public function MOD_GET_TEACHER_DATA_BY_ID($id)
    {
        $sql = "SELECT * FROM `tbl_info_teacher` WHERE `id`=?";
        $query = $this->db->query($sql,array($id));
        
        return $query->result();
    }
    
    public function MOD_GET_TEACHER_DATA_BY_USER_ACCOUNT_ID($id)
    {
        $sql = "SELECT * FROM `tbl_info_teacher` WHERE `user_account_id`=?";
        $query = $this->db->query($sql,array($id));
        
        return $query->result();
    }
    
    public function MOD_TEACHER_LIST_ACTIVE()
    {
        $sql = "SELECT * FROM `tbl_info_teacher` ORDER BY `first_name` ASC";
        $query = $this->db->query($sql,array());
        
        return $query->result();
    }
    
    public function MOD_TEACHER_LIST_TERMINATED()
    {
        $sql = "SELECT * FROM `tbl_info_teacher` ORDER BY `first_name` ASC";
        $query = $this->db->query($sql,array());
        
        return $query->result();
    }
    
    public function MOD_TEACHER_LIST_PERSONAL($id)
    {
        $sql = "SELECT * FROM `tbl_info_teacher` WHERE `id`=?";
        $query = $this->db->query($sql,array($id));
        
        return $query->result();
    }
    
    public function MOD_STUDENT_LIST_PERSONAL($id)
    {
        $sql = "SELECT * FROM `tbl_info_student` WHERE `id`=?";
        $query = $this->db->query($sql,array($id));
        
        return $query->result();
    }
    
    public function MOD_CHECK_RFID_NUMBER_TEACHER($rfid_number)
    {
        $sql = "SELECT * FROM `tbl_info_teacher` WHERE `rfid_number`=?";
        $query = $this->db->query($sql,array($rfid_number));
        
        return $query->result();
    }
    
    public function MOD_CHECK_RFID_NUMBER_STUDENT($rfid_number)
    {
        $sql = "SELECT * FROM `tbl_info_student` WHERE `rfid_number`=?";
        $query = $this->db->query($sql,array($rfid_number));
        
        return $query->result();
    }
    
    public function MOD_GET_STUDENTS_DATA($rfid_number)
    {
        $sql = "SELECT * FROM `tbl_info_student` WHERE `rfid_number`=?";
        $query = $this->db->query($sql,array($rfid_number));
        
        return $query->result();
    }
    
    public function MOD_GET_TEACHERS_DATA($rfid_number)
    {
        $sql = "SELECT * FROM `tbl_info_teacher` WHERE `rfid_number`=?";
        $query = $this->db->query($sql,array($rfid_number));
        
        return $query->result();
    }
    
    public function MOD_GET_TEACHER_USER_ACCOUNT($id)
    {
        $sql = "SELECT * FROM `tbl_info_useraccounts` WHERE `id`=?";
        $query = $this->db->query($sql,array($id));
        
        return $query->result();
    }
    
    public function MOD_GET_EDUCATIONAL_BACKROUND($id)
    {
        $sql = "SELECT * FROM `tbl_info_educationalbackground` WHERE `primary_id`=? AND `user_type`='Student'";
        $query = $this->db->query($sql,array($id));
        
        return $query->result();
    }
    
    public function MOD_GET_EDUCATIONAL_TEACHER_BACKROUND($id)
    {
        $sql = "SELECT * FROM `tbl_info_educationalbackground` WHERE `primary_id`=? AND `user_type`='Teacher'";
        $query = $this->db->query($sql,array($id));
        
        return $query->result();
    }
    
    public function MOD_GET_SKILL_DETAILS($id)
    {
        $sql = "SELECT * FROM `tbl_info_skill` WHERE `primary_id`=? AND `user_type`='Student'";
        $query = $this->db->query($sql,array($id));
        
        return $query->result();
    }
    
    public function MOD_GET_TEACHER_SKILL_DETAILS($id)
    {
        $sql = "SELECT * FROM `tbl_info_skill` WHERE `primary_id`=? AND `user_type`='Teacher'";
        $query = $this->db->query($sql,array($id));
        
        return $query->result();
    }
    
    public function MOD_TEACHER_ATTENDANCE()
    {
        $sql = "SELECT * FROM `tbl_info_attendance` WHERE `type`='Teacher' ORDER BY `id` DESC";
        $query = $this->db->query($sql,array());
        
        return $query->result();
    }
    
    public function MOD_TEACHER_ATTENDANCE_SPECIFIC($teacher_id)
    {
        $sql = "SELECT * FROM `tbl_info_attendance` WHERE `type`='Teacher' AND `primary_id`=? ORDER BY `id` DESC";
        $query = $this->db->query($sql,array($teacher_id));
        
        return $query->result();
    }
    
    public function MOD_STUDENT_ATTENDANCE()
    {
        $sql = "SELECT * FROM `tbl_info_attendance` WHERE `type`='Student' ORDER BY `id` DESC";
        $query = $this->db->query($sql,array());
        
        return $query->result();
    }
    
    public function MOD_VISITOR_ATTENDANCE()
    {
        $sql = "SELECT * FROM `tbl_info_visitor` ORDER BY `id` DESC";
        $query = $this->db->query($sql,array());
        
        return $query->result();
    }
    
    public function MOD_STUDENT_DATA($id)
    {
        $sql = "SELECT * FROM `tbl_info_student` WHERE `id`=?";
        $query = $this->db->query($sql,array($id));
        
        return $query->result();
    }
    
    public function MOD_GET_TEACHER_LOGIN_ACCOUNT()
    {
        $sql = "SELECT * FROM `tbl_info_useraccounts`";
        $query = $this->db->query($sql,array());
        
        return $query->result();
    }
    
    public function MOD_GET_USER_ACCOUNT_DATA($username)
    {
        $sql = "SELECT * FROM `tbl_info_useraccounts` WHERE `username`=?";
        $query = $this->db->query($sql,array($username));
        
        return $query->result();
    }
    
    public function MOD_GET_USER_ACCOUNT_DATA_BY_ID($id)
    {
        $sql = "SELECT * FROM `tbl_info_useraccounts` WHERE `id`=?";
        $query = $this->db->query($sql,array($id));
        
        return $query->result();
    }
    
    public function MOD_GET_VISITOR_DATA($name, $date_created)
    {
        $sql = "SELECT * FROM `tbl_info_visitor` WHERE `name`=? AND `date_created`=? AND `time_in` IS NOT NULL AND `time_out` IS NULL";
        $query = $this->db->query($sql,array($name, $date_created));
        
        return $query->result();
    }

    public function MOD_INSERT_TEACHER($first_name, $middle_name, $last_name, $rfid_number, $email_address, $mobile_number, $image, $user_account_id)
    {
        $sql = "INSERT INTO `tbl_info_teacher` (`first_name`, `middle_name`, `last_name`, `rfid_number`, `email_address`, `mobile_number`, `image`, `user_account_id`) VALUES (?,?,?,?,?,?,?,?)";
        
        $this->db->query($sql,array($first_name, $middle_name, $last_name, $rfid_number, $email_address, $mobile_number, $image, $user_account_id));
    }
    
    public function MOD_UPDATE_TEACHER($first_name, $original_middle_name, $last_name, $rfid_number, $email_address, $mobile_number, $image, $id)
    {
        $sql = "UPDATE `tbl_info_teacher` SET `first_name`=?, `middle_name`=?, `last_name`=?, `rfid_number`=?, `email_address`=?, `mobile_number`=?, `image`=? WHERE `id`=?";
        
        $this->db->query($sql,array($first_name, $original_middle_name, $last_name, $rfid_number, $email_address, $mobile_number, $image, $id));
    }

    public function MOD_INSERT_VISITOR($date_created, $name, $mobile_number, $purpose, $time_now)
    {
        $sql = "INSERT INTO `tbl_info_visitor` (`date_created`, `name`, `mobile_number`, `purpose`, `time_in`, `status`) VALUES (?,?,?,?,?,'1')";
        
        $this->db->query($sql,array($date_created, $name, $mobile_number, $purpose, $time_now));
    }
    
    public function MOD_UPDATE_VISITOR($time_now, $id)
    {
        $sql = "UPDATE `tbl_info_visitor` SET `time_out`=?, `status`='0' WHERE `id`=?";
        
        $this->db->query($sql,array($time_now, $id));
    }
    
    public function MOD_ACTIVATE_EMPLOYEE($id)
    {
        $sql = "UPDATE `tbl_info_teacher` SET `status`='1' WHERE `id`=?";
        
        $this->db->query($sql,array($id));
    }
    
    public function MOD_UPDATE_TEACHER_USER_ACCOUNT($name, $username, $password, $id)
    {
        $sql = "UPDATE `tbl_info_useraccounts` SET `name`=?, `username`=?, `password`=? WHERE `id`=?";
        
        $this->db->query($sql,array($name, $username, $password, $id));
    }
    
    public function MOD_UPDATE_TEACHER_USER_ACCOUNT_NO_PASSWORD($name, $username, $id)
    {
        $sql = "UPDATE `tbl_info_useraccounts` SET `name`=?, `username`=? WHERE `id`=?";
        
        $this->db->query($sql,array($name, $username, $id));
    }
    
    public function MOD_INSERT_TEACHER_LOGIN_ACCOUNT($name, $username, $password, $image)
    {
        $sql = "INSERT INTO `tbl_info_useraccounts` (`name`, `username`, `password`, `image`, `user_type`) VALUES (?,?,?,?,'Teacher')";
        
        $this->db->query($sql,array($name, $username, $password, $image));
    }
    
    public function MOD_UPDATE_STUDENT_SKILLS($skill_name, $skill_level, $id)
    {
        $sql = "UPDATE `tbl_info_skill` SET `skill_name`=?, `skill_level`=? WHERE `id`=?";
        
        $this->db->query($sql,array($skill_name, $skill_level, $id));
    }
    
    public function MOD_UPDATE_STUDENT_EDUCATION($school_name, $strand_course, $from_year, $to_year, $id)
    {
        $sql = "UPDATE `tbl_info_educationalbackground` SET `school_name`=?, `strand_course`=?, `from_year`=?, `to_year`=? WHERE `id`=?";
        
        $this->db->query($sql,array($school_name, $strand_course, $from_year, $to_year, $id));
    }
    
    public function MOD_DELETE_EDUCATIONAL_BACKGROUND($id)
    {
        $sql = "DELETE FROM `tbl_info_educationalbackground` WHERE `id`=?";
        
        $this->db->query($sql,array($id));
    }
    
    public function MOD_DELETE_STUDENT_SKILL($id)
    {
        $sql = "DELETE FROM `tbl_info_skill` WHERE `id`=?";
        
        $this->db->query($sql,array($id));
    }
    
    public function MOD_TERMINATE_EMPLOYEE($id)
    {
        $sql = "UPDATE `tbl_info_teacher` SET `status`='0' WHERE `id`=?";
        
        $this->db->query($sql,array($id));
    }

    public function MOD_UPDATE_TEACHER_PERSONAL_INFORMATION($employee_id, $first_name, $middle_name, $last_name, $birthday, $gender, $marital_status, $nationality, $home_address, $current_address, $id)
    {
        $sql = "UPDATE `tbl_info_teacher` SET `teacher_id`=?, `first_name`=?, `middle_name`=?, `last_name`=?, `birthday`=?, `gender`=?, `marital_status`=?, `nationality`=?, `home_address`=?, `current_address`=? WHERE `id`=?";
        
        $this->db->query($sql,array($employee_id, $first_name, $middle_name, $last_name, $birthday, $gender, $marital_status, $nationality, $home_address, $current_address, $id));
    }
    
    public function MOD_UPDATE_TEACHER_PERSONAL_INFORMATION_NO_BIRTHDAY($employee_id, $first_name, $middle_name, $last_name, $gender, $marital_status, $nationality, $home_address, $current_address, $id)
    {
        $sql = "UPDATE `tbl_info_teacher` SET `teacher_id`=?, `first_name`=?, `middle_name`=?, `last_name`=?, `gender`=?, `marital_status`=?, `nationality`=?, `home_address`=?, `current_address`=? WHERE `id`=?";
        
        $this->db->query($sql,array($employee_id, $first_name, $middle_name, $last_name, $gender, $marital_status, $nationality, $home_address, $current_address, $id));
    }

    public function MOD_UPDATE_TEACHER_CONTACT_DETAILS($mobile_number, $email_address, $facebook_account, $guardian_name, $guardian_mobile_number, $other_email_address, $id)
    {
        $sql = "UPDATE `tbl_info_teacher` SET `mobile_number`=?, `email_address`=?, `facebook_account`=?, `guardian_name`=?, `guardian_mobile_number`=?, `other_email_address`=? WHERE `id`=?";
        
        $this->db->query($sql,array($mobile_number, $email_address, $facebook_account, $guardian_name, $guardian_mobile_number, $other_email_address, $id));
    }

    public function MOD_INSERT_STUDENT($first_name, $middle_name, $last_name, $rfid_number, $course, $year, $section, $email_address, $mobile_number, $image, $teachers)
    {
        $sql = "INSERT INTO `tbl_info_student` (`first_name`, `middle_name`, `last_name`, `rfid_number`, `strand`, `year`, `section`, `email_address`, `mobile_number`, `image`, `teachers`) VALUES (?,?,?,?,?,?,?,?,?,?,?)";
        
        $this->db->query($sql,array($first_name, $middle_name, $last_name, $rfid_number, $course, $year, $section, $email_address, $mobile_number, $image, $teachers));
    }

    public function MOD_ADD_STUDENT_EDUCATION($id, $school_name, $strand_course, $from_year, $to_year)
    {
        $sql = "INSERT INTO `tbl_info_educationalbackground`(`primary_id`, `school_name`, `strand_course`, `from_year`, `to_year`, `user_type`) VALUES (?,?,?,?,?, 'Student')";
        
        $this->db->query($sql,array($id, $school_name, $strand_course, $from_year, $to_year));
    }
    
    public function MOD_ADD_TEACHER_EDUCATION($id, $school_name, $strand_course, $from_year, $to_year)
    {
        $sql = "INSERT INTO `tbl_info_educationalbackground`(`primary_id`, `school_name`, `strand_course`, `from_year`, `to_year`, `user_type`) VALUES (?,?,?,?,?, 'Teacher')";
        
        $this->db->query($sql,array($id, $school_name, $strand_course, $from_year, $to_year));
    }
    
    public function MOD_UPDATE_STUDENT($first_name, $middle_name, $last_name, $rfid_number, $course, $year, $section, $email_address, $mobile_number, $image, $teachers, $id)
    {
        $sql = "UPDATE `tbl_info_student` SET `first_name`=?, `middle_name`=?, `last_name`=?, `rfid_number`=?, `strand`=?, `year`=?, `section`=?, `email_address`=?, `mobile_number`=?, `image`=?, `teachers`=? WHERE `id`=?";
        
        $this->db->query($sql,array($first_name, $middle_name, $last_name, $rfid_number, $course, $year, $section, $email_address, $mobile_number, $image, $teachers, $id));
    }

    public function MOD_ADD_TO_ACTIVE_LIST($id)
    {
        $sql = "UPDATE `tbl_info_student` SET `status`='1' WHERE `id`=?";
        
        $this->db->query($sql,array($id));
    }
    
    public function MOD_REMOVE_FROM_ACTIVE_LIST($id)
    {
        $sql = "UPDATE `tbl_info_student` SET `status`='0' WHERE `id`=?";
        
        $this->db->query($sql,array($id));
    }
    
    public function MOD_SET_REENROLL_STATUS($id)
    {
        $sql = "UPDATE `tbl_info_student` SET `status`='2' WHERE `id`=?";
        
        $this->db->query($sql,array($id));
    }

    public function MOD_STUDENT_LIST_ACTIVE()
    {
        $sql = "SELECT * FROM `tbl_info_student`";
        $query = $this->db->query($sql,array());
        
        return $query->result();
    }
    
    public function MOD_STUDENT_LIST_REMOVED()
    {
        $sql = "SELECT * FROM `tbl_info_student`";
        $query = $this->db->query($sql,array());
        
        return $query->result();
    }

    public function MOD_UPDATE_STUDENT_PERSONAL_INFORMATION($student_id, $first_name, $middle_name, $last_name, $birthday, $gender, $marital_status, $nationality, $home_address, $current_address, $id)
    {
        $sql = "UPDATE `tbl_info_student` SET `student_id`=?, `first_name`=?, `middle_name`=?, `last_name`=?, `birthday`=?, `gender`=?, `marital_status`=?, `nationality`=?, `home_address`=?, `current_address`=? WHERE `id`=?";
        
        $this->db->query($sql,array($student_id, $first_name, $middle_name, $last_name, $birthday, $gender, $marital_status, $nationality, $home_address, $current_address, $id));
    }
    
    public function MOD_UPDATE_STUDENT_PERSONAL_INFORMATION_NO_BIRTHDAY($student_id, $first_name, $middle_name, $last_name, $gender, $marital_status, $nationality, $home_address, $current_address, $id)
    {
        $sql = "UPDATE `tbl_info_student` SET `student_id`=?, `first_name`=?, `middle_name`=?, `last_name`=?, `gender`=?, `marital_status`=?, `nationality`=?, `home_address`=?, `current_address`=? WHERE `id`=?";
        
        $this->db->query($sql,array($student_id, $first_name, $middle_name, $last_name, $gender, $marital_status, $nationality, $home_address, $current_address, $id));
    }

    public function MOD_UPDATE_STUDENT_CONTACT_DETAILS($mobile_number, $email_address, $facebook_account, $other_email_address, $guardian_name, $guardian_mobile_number, $id)
    {
        $sql = "UPDATE `tbl_info_student` SET `mobile_number`=?, `email_address`=?, `facebook_account`=?, `other_email_address`=?, `guardian_name`=?, `guardian_mobile_number`=? WHERE `id`=?";
        
        $this->db->query($sql,array($mobile_number, $email_address, $facebook_account, $other_email_address, $guardian_name, $guardian_mobile_number, $id));
    }

    public function MOD_CHECK_STUDENT_ID($student_id)
    {
        $sql = "SELECT * FROM `tbl_info_student` WHERE `student_id`=?";
        $query = $this->db->query($sql,array($student_id));
        
        return $query->result();
    }
    
    public function MOD_CHECK_EMPLOYEE_ID($employee_id)
    {
        $sql = "SELECT * FROM `tbl_info_teacher` WHERE `teacher_id`=?";
        $query = $this->db->query($sql,array($employee_id));
        
        return $query->result();
    }
    
    public function MOD_GET_USER_DATA_STUDENT($rfid_number)
    {
        $sql = "SELECT * FROM `tbl_info_student` WHERE `rfid_number`=?";
        $query = $this->db->query($sql,array($rfid_number));
        
        return $query->result();
    }
    
    public function MOD_GET_USER_DATA_TEACHER($rfid_number)
    {
        $sql = "SELECT * FROM `tbl_info_teacher` WHERE `rfid_number`=?";
        $query = $this->db->query($sql,array($rfid_number));
        
        return $query->result();
    }
    
    public function MOD_CHECK_USER_ATTENDANCE($rfid_number, $date_created)
    {
        $sql = "SELECT * FROM `tbl_info_attendance` WHERE `rfid_number`=? AND `date_created`=?";
        $query = $this->db->query($sql,array($rfid_number, $date_created));
        
        return $query->result();
    }
    
    public function MOD_LATEST_ENROLLED_STUDENTS()
    {
        $sql = "SELECT * FROM `tbl_info_student` ORDER BY `id` DESC LIMIT 6";
        $query = $this->db->query($sql,array());
        
        return $query->result();
    }
    
    public function MOD_LATEST_ENROLLED_STUDENTS_GRAPH()
    {
        $sql = "SELECT * FROM `tbl_info_student`";
        $query = $this->db->query($sql,array());
        
        return $query->result();
    }
    
    public function MOD_LAST_YEAR_ENROLLED_STUDENTS($month)
    {
        $current_year = date("Y");

        $starting_date = date("Y-m-d", strtotime($current_year."-".$month."-01 -1 year"));
        $finishing_date = date("Y-m-d", strtotime($current_year."-".$month."-31 -1 year"));

        $sql = "SELECT * FROM `tbl_info_student` WHERE `date_enrolled` BETWEEN ? AND ?";
        $query = $this->db->query($sql,array($starting_date, $finishing_date));
        
        return $query->result();
    }
    
    public function MOD_THIS_YEAR_ENROLLED_STUDENTS($month)
    {
        $current_year = date("Y");

        if ($month == "02")
        {
            $starting_date = date("Y-m-d", strtotime($current_year."-".$month."-01"));
            $finishing_date = date("Y-m-d", strtotime($current_year."-".$month."-28"));
        } 
        
        if ($month == "01" || $month == "03" || $month == "05" || $month == "07" || $month == "08" || $month == "10" || $month == "12")
        {
            $starting_date = date("Y-m-d", strtotime($current_year."-".$month."-01"));
            $finishing_date = date("Y-m-d", strtotime($current_year."-".$month."-31"));
        } 
        
        if ($month == "04" || $month == "06" || $month == "09" || $month == "11")
        {
            $starting_date = date("Y-m-d", strtotime($current_year."-".$month."-01"));
            $finishing_date = date("Y-m-d", strtotime($current_year."-".$month."-30"));
        } 

        $sql = "SELECT * FROM `tbl_info_student` WHERE `date_enrolled` BETWEEN ? AND ?";
        $query = $this->db->query($sql,array($starting_date, $finishing_date));
        
        return $query->result();
    }
    
    public function MOD_GET_ATTENDANCE_DATA($rfid_number)
    {
        $sql = "SELECT * FROM `tbl_info_attendance` WHERE `rfid_number`=? ORDER BY `id` DESC";
        $query = $this->db->query($sql,array($rfid_number));
        
        return $query->result();
    }

    public function MOD_UPDATE_ATTENDANCE($time_out, $status, $rfid_number, $date_created)
    {
        $sql = "UPDATE `tbl_info_attendance` SET `time_out`=?, `status`=? WHERE `rfid_number`=? AND `date_created`=?";
        
        $this->db->query($sql,array($time_out, $status, $rfid_number, $date_created));
    }
    
    public function MOD_UPDATE_ATTENDANCE_TIME_IN_AFTERNOON($time_out, $status, $rfid_number, $date_created)
    {
        $sql = "UPDATE `tbl_info_attendance` SET `time_in_afternoon`=?, `status`=? WHERE `rfid_number`=? AND `date_created`=?";
        
        $this->db->query($sql,array($time_out, $status, $rfid_number, $date_created));
    }
    
    public function MOD_UPDATE_ATTENDANCE_TIME_OUT_AFTERNOON($time_out, $status, $rfid_number, $date_created)
    {
        $sql = "UPDATE `tbl_info_attendance` SET `time_out_afternoon`=?, `status`=? WHERE `rfid_number`=? AND `date_created`=?";
        
        $this->db->query($sql,array($time_out, $status, $rfid_number, $date_created));
    }
    
    public function MOD_INSERT_ATTENDANCE($primary_id, $rfid_number, $name, $type, $date_created, $time_in, $status, $teachers)
    {
        $sql = "INSERT INTO `tbl_info_attendance` (`primary_id`, `rfid_number`, `name`, `type`, `date_created`, `time_in`, `status`, `teachers`) VALUES (?,?,?,?,?,?,?,?)";
        
        $this->db->query($sql,array($primary_id, $rfid_number, $name, $type, $date_created, $time_in, $status, $teachers));
    }
    
    public function MOD_INSERT_ATTENDANCE_TEACHER($primary_id, $rfid_number, $name, $type, $date_created, $time_in, $status)
    {
        $sql = "INSERT INTO `tbl_info_attendance` (`primary_id`, `rfid_number`, `name`, `type`, `date_created`, `time_in`, `status`) VALUES (?,?,?,?,?,?,?)";
        
        $this->db->query($sql,array($primary_id, $rfid_number, $name, $type, $date_created, $time_in, $status));
    }

    public function MOD_REENROLL_STUDENT($branch, $name, $rfid_number, $date_enrolled, $due_date, $expected_payment, $paid_amount, $status, $image, $student_id, $birthday, $gender, $marital_status, $nationality, $home_address, $current_address, $mobile_number, $email_address, $facebook_account, $other_email_address)
    {
        $sql = "INSERT INTO `tbl_info_student` (`branch`, `name`, `rfid_number`, `date_enrolled`, `due_date`, `expected_payment`, `paid_amount`, `status`, `image`, `student_id`, `birthday`, `gender`, `marital_status`, `nationality`, `home_address`, `current_address`, `mobile_number`, `email_address`, `facebook_account`, `other_email_address`) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";

        $this->db->query($sql,array($branch, $name, $rfid_number, $date_enrolled, $due_date, $expected_payment, $paid_amount, $status, $image, $student_id, $birthday, $gender, $marital_status, $nationality, $home_address, $current_address, $mobile_number, $email_address, $facebook_account, $other_email_address));
    }

    public function MOD_UPDATE_NOTIFICATION_BADGE()
    {
        $sql = "UPDATE `tbl_info_useraccounts` SET `is_viewed`='1'";

        $this->db->query($sql,array());
    }
    
    public function MOD_UPDATE_ADMIN($name, $username, $password, $image, $id)
    {
        $sql = "UPDATE `tbl_info_useraccounts` SET `name`=?, `username`=?, `password`=?, `image`=? WHERE `id`=?";

        $this->db->query($sql,array($name, $username, $password, $image, $id));
    }
    
    public function MOD_UPDATE_ADMIN_NO_PASSWORD($name, $username, $image, $id)
    {
        $sql = "UPDATE `tbl_info_useraccounts` SET `name`=?, `username`=?, `image`=? WHERE `id`=?";

        $this->db->query($sql,array($name, $username, $image, $id));
    }
    
    public function MOD_UPDATE_ADMIN_NO_IMAGE($name, $username, $password, $id)
    {
        $sql = "UPDATE `tbl_info_useraccounts` SET `name`=?, `username`=?, `password`=? WHERE `id`=?";

        $this->db->query($sql,array($name, $username, $password, $id));
    }
    
    public function MOD_UPDATE_ADMIN_NO_IMAGE_NO_PASSWORD($name, $username, $id)
    {
        $sql = "UPDATE `tbl_info_useraccounts` SET `name`=?, `username`=? WHERE `id`=?";

        $this->db->query($sql,array($name, $username, $id));
    }
    
    public function MOD_UPDATE_IS_VIEWED()
    {
        $sql = "UPDATE `tbl_info_useraccounts` SET `is_viewed`='0'";

        $this->db->query($sql,array());
    }
    
    public function MOD_ADD_STUDENT_SKILLS($id, $skill_name, $skill_level)
    {
        $sql = "INSERT INTO `tbl_info_skill` (`primary_id`, `skill_name`, `skill_level`, `user_type`) VALUES (?,?,?,'Student')";

        $this->db->query($sql,array($id, $skill_name, $skill_level));
    }
    
    public function MOD_ADD_TEACHER_SKILLS($id, $skill_name, $skill_level)
    {
        $sql = "INSERT INTO `tbl_info_skill` (`primary_id`, `skill_name`, `skill_level`, `user_type`) VALUES (?,?,?,'Teacher')";

        $this->db->query($sql,array($id, $skill_name, $skill_level));
    }
}
