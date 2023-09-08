<?php
defined('BASEPATH') OR exit('No direct script access allowed');

date_default_timezone_set("Asia/Manila");

class main extends CI_Controller {

  function __construct()
  {
    parent::__construct();

    $this->load->model('main_model');

    if (!$this->session->userdata('current_user_id'))
    {
        $this->session->set_userdata('current_url', current_url());
        $this->session->set_userdata('login_error', 'You must login first');

        redirect(base_url());
    }
  }

	public function index()
	{
    if ($this->session->userdata('current_user_type') == "Administrator")
    {
      redirect(base_url()."main/attendance");
    }

    else
    {
      redirect(base_url()."main/attendance_teacher_specific");
    }
	}
	
  public function dashboard()
	{
    $is_admin = $this->session->userdata('current_is_admin');

    if ($is_admin == 0)
    {
      redirect(base_url()."main/attendance");
    }

    $data['current_tab'] = "Dashboard";
    $data['latest_enrolled_students'] = $this->main_model->MOD_LATEST_ENROLLED_STUDENTS();
    $data['latest_enrolled_students_graph'] = $this->main_model->MOD_LATEST_ENROLLED_STUDENTS_GRAPH();

    $this->load->view('templates/header', $data);
		$this->load->view('main/dashboard_view');
    $this->load->view('templates/footer');
	}
  
  public function manage_student()
	{
    $data['current_tab'] = "Manage Student Account";
    $data['student_list'] = $this->main_model->MOD_STUDENT_LIST();
    $data['student_list_active'] = $this->main_model->MOD_STUDENT_LIST_ACTIVE();
    $data['student_list_removed'] = $this->main_model->MOD_STUDENT_LIST_REMOVED();

		$this->load->view('templates/header', $data);
		$this->load->view('main/manage_student_view');
    $this->load->view('templates/footer');
	}
  
  public function manage_teacher()
	{
    $data['current_tab'] = "Manage Teacher Account";
    $data['teacher_list'] = $this->main_model->MOD_TEACHER_LIST();

		$this->load->view('templates/header', $data);
		$this->load->view('main/manage_teacher_view');
    $this->load->view('templates/footer');
	}
  
  public function attendance() 
	{
    $data['current_tab'] = "Attendance";
    
		$this->load->view('templates/header', $data);
		$this->load->view('main/attendance_view');
    $this->load->view('templates/footer');
	}
  
  public function attendance_teacher_specific()
	{
    $data['current_tab'] = "My Personal Attendance";

    $teacher_id = null;

    $id = $this->session->userdata('current_user_id');

    $GET_TEACHER_DATA = $this->main_model->MOD_GET_TEACHER_DATA_BY_USER_ACCOUNT_ID($id);

    if ($GET_TEACHER_DATA)
    {
      foreach ($GET_TEACHER_DATA as $GET_TEACHER_DATA_ROW)
      {
        $teacher_id = $GET_TEACHER_DATA_ROW->id;
      }
    }

    $data['teacher_attendance'] = $this->main_model->MOD_TEACHER_ATTENDANCE_SPECIFIC($teacher_id);
    
		$this->load->view('templates/header', $data);
		$this->load->view('main/attendance_teacher_specific_view');
    $this->load->view('templates/footer');
	}

  public function attendance_student_specific()
	{
    $data['current_tab'] = "My Students Attendance";
    
    $id = $this->session->userdata('current_user_id');

    $GET_TEACHER_DATA = $this->main_model->MOD_GET_TEACHER_DATA_BY_USER_ACCOUNT_ID($id);

    if ($GET_TEACHER_DATA)
    {
      foreach ($GET_TEACHER_DATA as $GET_TEACHER_DATA_ROW)
      {
        $teacher_id = $GET_TEACHER_DATA_ROW->id;
      }
    }

    $data['student_attendance'] = $this->main_model->MOD_STUDENT_ATTENDANCE();
    $data['teacher_id'] = $teacher_id;
    
		$this->load->view('templates/header', $data);
		$this->load->view('main/attendance_student_specific_view');
    $this->load->view('templates/footer');
	}
  
  public function teacher_personal_info()
	{
    $id = $this->input->get("id");

    $data['current_tab'] = "Teacher Personal Profile";
    $data['data_from'] = $this->input->get("data_from");

    $data['teacher_list_personal'] = $this->main_model->MOD_TEACHER_LIST_PERSONAL($id);

		$this->load->view('templates/header', $data);
		$this->load->view('main/teacher_personal_info_view');
    $this->load->view('templates/footer');
	}
  
  public function student_personal_info()
	{
    $id = $this->input->get("id");
    
    $data['data_from'] = $this->input->get("data_from");
    $data['current_tab'] = "Student Personal Profile";
    $data['student_list_personal'] = $this->main_model->MOD_STUDENT_LIST_PERSONAL($id);

		$this->load->view('templates/header', $data);
		$this->load->view('main/student_personal_info_view');
    $this->load->view('templates/footer');
	}

  public function attendance_teacher()
	{
    $data['current_tab'] = "Teacher Attendance Record";
    $data['teacher_attendance'] = $this->main_model->MOD_TEACHER_ATTENDANCE();

		$this->load->view('templates/header', $data);
		$this->load->view('main/attendance_teacher_view');
    $this->load->view('templates/footer');
	}
  
  public function attendance_student()
	{
    $data['current_tab'] = "Student Attendance Record";
    $data['student_attendance'] = $this->main_model->MOD_STUDENT_ATTENDANCE();

		$this->load->view('templates/header', $data);
		$this->load->view('main/attendance_student_view');
    $this->load->view('templates/footer');
	}
  
  public function attendance_visitor()
	{
    $data['current_tab'] = "Visitor Attendance Record";
    $data['visitor_attendance'] = $this->main_model->MOD_VISITOR_ATTENDANCE();

		$this->load->view('templates/header', $data);
		$this->load->view('main/attendance_visitor_view');
    $this->load->view('templates/footer');
	}

  public function insert_teacher()
  {
    $first_name = $this->input->post("teacher_first_name");
    $middle_name = $this->input->post("teacher_middle_name");
    $last_name = $this->input->post("teacher_last_name");
    $rfid_number = $this->input->post("teacher_rfid_number");
    $email_address = $this->input->post("teacher_email_address");
    $mobile_number = $this->input->post("teacher_mobile_number");
    $username = $this->input->post("teacher_username");
    $password = md5($this->input->post("teacher_password"));
    
    $image = '';
    $is_error = '';

    $config['upload_path'] = './dist/img/user_upload';
		$config['allowed_types'] = 'jpg|png|jpeg|gif|webp';
		$config['max_size'] = '5000';

		$this->load->library('upload', $config);

		if((!empty($_FILES['user_img_attachment_4'])))
		{   
			$get_file_name = $_FILES['user_img_attachment_4']['name'];

			$_FILES['user_img_attachment_4']['name'] = $get_file_name;
		
			if($_FILES['user_img_attachment_4']['size'] != 0)
			{  
				if ($this->upload->do_upload('user_img_attachment_4'))
				{
					$data_upload = array('user_img_attachment_4' => $this->upload->data());
					$image = $data_upload['user_img_attachment_4']['file_name'];
				}

				else
				{
					$is_error = array('error' => $this->upload->display_errors());
				}
			}
		}

		if ($is_error)
		{
			$this->session->set_userdata('error', $is_error["error"]);
		}

    else
    {
      $is_rfid_exists_teacher = $this->main_model->MOD_CHECK_RFID_NUMBER_TEACHER($rfid_number);
      $is_rfid_exists_student = $this->main_model->MOD_CHECK_RFID_NUMBER_STUDENT($rfid_number);

      if ($is_rfid_exists_teacher || $is_rfid_exists_student)
      {
        $this->session->set_userdata('error', 'RFID Number already exists');
      }

      else
      {
        $original_middle_name = $middle_name;
        
        if ($middle_name)
        {
          $middle_name = substr($middle_name, 0, 1).". ";
        }

        $name = $first_name." ".$middle_name.$last_name;
        $user_account_id = null;

        $this->main_model->MOD_INSERT_TEACHER_LOGIN_ACCOUNT($name, $username, $password, $image);

        $GET_TEACHER_LOGIN_ACCOUNT = $this->main_model->MOD_GET_TEACHER_LOGIN_ACCOUNT();

        if ($GET_TEACHER_LOGIN_ACCOUNT)
        {
          foreach ($GET_TEACHER_LOGIN_ACCOUNT as $GET_TEACHER_LOGIN_ACCOUNT_ROW)
          {
            $user_account_id = $GET_TEACHER_LOGIN_ACCOUNT_ROW->id;
          }
        }

        $this->main_model->MOD_INSERT_TEACHER($first_name, $original_middle_name, $last_name, $rfid_number, $email_address, $mobile_number, $image, $user_account_id);

        $this->session->set_userdata('success', 'Successfully added to the database');
      }
    }

    redirect(base_url()."main/manage_teacher");
  }
  
  public function update_teacher()
  {
    $old_rfid_number = $this->input->post("edit_teacher_old_rfid_number");
    $data_from = $this->input->post("edit_teacher_data_from");
    $is_personal = $this->input->post("edit_teacher_is_personal");
    
    $id = $this->input->post("edit_teacher_id");
    $first_name = $this->input->post("edit_teacher_first_name");
    $middle_name = $this->input->post("edit_teacher_middle_name");
    $last_name = $this->input->post("edit_teacher_last_name");
    $rfid_number = $this->input->post("edit_teacher_rfid_number");
    $email_address = $this->input->post("edit_teacher_email_address");
    $mobile_number = $this->input->post("edit_teacher_mobile_number");
    
    $user_account_id = $this->input->post("edit_teacher_user_account_id");
    $username = $this->input->post("edit_teacher_username");
    $password = md5($this->input->post("edit_teacher_password"));

    $original_password = $this->input->post("edit_teacher_password");

    $image = '';
    $is_error = '';

    $config['upload_path'] = './dist/img/user_upload';
		$config['allowed_types'] = 'jpg|png|jpeg|gif|webp';
		$config['max_size'] = '5000';

		$this->load->library('upload', $config);

		if((!empty($_FILES['user_img_attachment_5'])))
		{   
			$get_file_name = $_FILES['user_img_attachment_5']['name'];

			$_FILES['user_img_attachment_5']['name'] = $get_file_name;
		
			if($_FILES['user_img_attachment_5']['size'] != 0)
			{  
				if ($this->upload->do_upload('user_img_attachment_5'))
				{
					$data_upload = array('user_img_attachment_5' => $this->upload->data());
					$image = $data_upload['user_img_attachment_5']['file_name'];
				}

				else
				{
					$is_error = array('error' => $this->upload->display_errors());
				}
			}
		}

    if (!$image)
    {
      $image = $this->input->post("edit_teacher_old_image");
    }

		if ($is_error)
		{
			$this->session->set_userdata('error', $is_error["error"]);
		}

    else
    {
      $is_rfid_exists_teacher = null;
      $is_rfid_exists_student = null;

      if ($old_rfid_number != $rfid_number)
      {
        $is_rfid_exists_teacher = $this->main_model->MOD_CHECK_RFID_NUMBER_TEACHER($rfid_number);
        $is_rfid_exists_student = $this->main_model->MOD_CHECK_RFID_NUMBER_STUDENT($rfid_number);
      }

      else
      {
        $rfid_number = $old_rfid_number;
      }

      if ($is_rfid_exists_teacher || $is_rfid_exists_student)
      {
        $this->session->set_userdata('error', 'RFID Number already exists');
      }

      else
      {
        $original_middle_name = $middle_name;

        if ($middle_name)
        {
          $middle_name = substr($middle_name, 0, 1).". ";
        }

        $name = $first_name." ".$middle_name.$last_name;

        if ($original_password)
        {
          $this->main_model->MOD_UPDATE_TEACHER_USER_ACCOUNT($name, $username, $password, $user_account_id);
        }

        else
        {
          $this->main_model->MOD_UPDATE_TEACHER_USER_ACCOUNT_NO_PASSWORD($name, $username, $user_account_id);
        }

        $this->main_model->MOD_UPDATE_TEACHER($first_name, $original_middle_name, $last_name, $rfid_number, $email_address, $mobile_number, $image, $id);

        $this->session->set_userdata('success', 'Successfully Updated');
      }
    }

    if ($is_personal == "1")
    {
      redirect(base_url()."main/teacher_personal_info?id=".$id."&data_from=".$data_from);
    }

    else
    {
      redirect(base_url()."main/manage_teacher");
    }
  }

  public function insert_visitor()
  {
    $date_created = date("Y-m-d");
    $time_now = date("Y-m-d H:i:s");

    $name = $this->input->post("visitor_name");
    $mobile_number = $this->input->post("visitor_mobile_number");
    $purpose = $this->input->post("visitor_purpose");
    
    $GET_VISITOR_DATA = $this->main_model->MOD_GET_VISITOR_DATA($name, $date_created);
    
    if ($GET_VISITOR_DATA)
    {
      foreach ($GET_VISITOR_DATA as $GET_VISITOR_DATA_ROW)
      {
        $id = $GET_VISITOR_DATA_ROW->id;
      }

      $this->main_model->MOD_UPDATE_VISITOR($time_now, $id);
    }

    else
    {
      $this->main_model->MOD_INSERT_VISITOR($date_created, $name, $mobile_number, $purpose, $time_now);
    }

    $this->session->set_userdata('success', 'Visitor Data is Successfully Recorded');
    
    redirect(base_url()."main/attendance");
  }
  
  public function activate_employee()
  {
    $id = $this->input->get("teacher_id");

    $this->main_model->MOD_ACTIVATE_EMPLOYEE($id);

    $this->session->set_userdata('success', 'Employee Successfully Activated');
    
    redirect(base_url()."main/manage_teacher");
  }
  
  public function terminate_employee()
  {
    $id = $this->input->get("teacher_id");

    $this->main_model->MOD_TERMINATE_EMPLOYEE($id);

    $this->session->set_userdata('success', 'Employee Successfully Terminated');
    
    redirect(base_url()."main/manage_teacher");
  }
  
  public function activate_employee_personal()
  {
    $id = $this->input->get("teacher_id");
    $data_from = $this->input->get("data_from");

    $this->main_model->MOD_ACTIVATE_EMPLOYEE($id);

    $this->session->set_userdata('success', 'Employee Successfully Activated');
    
    redirect(base_url()."main/teacher_personal_info?id=".$id."&data_from=".$data_from);
  }

  public function terminate_employee_personal()
  {
    $id = $this->input->get("teacher_id");
    $data_from = $this->input->get("data_from");

    $this->main_model->MOD_TERMINATE_EMPLOYEE($id);

    $this->session->set_userdata('success', 'Employee Successfully Terminated');
    
    redirect(base_url()."main/teacher_personal_info?id=".$id."&data_from=".$data_from);
  }

  public function update_teacher_personal_information()
  {
    $data_from = $this->input->post("personal_teacher_data_from");
    $id = $this->input->post("personal_teacher_primary_id");
    $employee_id = $this->input->post("personal_teacher_id");
    $first_name = $this->input->post("personal_teacher_first_name");
    $middle_name = $this->input->post("personal_teacher_middle_name");
    $last_name = $this->input->post("personal_teacher_last_name");
    $birthday = $this->input->post("personal_teacher_birthday");
    $gender = $this->input->post("personal_teacher_gender");
    $marital_status = $this->input->post("personal_teacher_marital_status");
    $nationality = $this->input->post("personal_teacher_nationality");
    $home_address = $this->input->post("personal_teacher_home_address");
    $current_address = $this->input->post("personal_teacher_current_address");
    $old_employee_id = $this->input->post("personal_old_teacher_id");
    
    $is_employee_id_exists = null;

    if ($employee_id && $employee_id != $old_employee_id)
    {
      $is_employee_id_exists = $this->main_model->MOD_CHECK_EMPLOYEE_ID($employee_id);
    }

    if ($is_employee_id_exists)
    {
      $this->session->set_userdata("error", "Teacher ID already exists");  
    }

    else
    {
      if ($birthday)
      {
        $this->main_model->MOD_UPDATE_TEACHER_PERSONAL_INFORMATION($employee_id, $first_name, $middle_name, $last_name, $birthday, $gender, $marital_status, $nationality, $home_address, $current_address, $id);
      }

      else
      {
        $this->main_model->MOD_UPDATE_TEACHER_PERSONAL_INFORMATION_NO_BIRTHDAY($employee_id, $first_name, $middle_name, $last_name, $gender, $marital_status, $nationality, $home_address, $current_address, $id);
      }

      $this->session->set_userdata("success", "Updated Successfully");
    }

    redirect(base_url()."main/teacher_personal_info?id=".$id."&data_from=".$data_from);
  }
  
  public function update_teacher_contact_details()
  {
    $data_from = $this->input->post("contact_teacher_data_from");
    $id = $this->input->post("contact_teacher_primary_id");
    $mobile_number = $this->input->post("contact_teacher_mobile_number");
    $email_address = $this->input->post("contact_teacher_email_address");
    $facebook_account = $this->input->post("teacher_facebook_account");
    $guardian_name = $this->input->post("teacher_guardian_name");
    $guardian_mobile_number = $this->input->post("teacher_guardian_mobile_number");
    $other_email_address = $this->input->post("teacher_other_email_address");

    $this->main_model->MOD_UPDATE_TEACHER_CONTACT_DETAILS($mobile_number, $email_address, $facebook_account, $guardian_name, $guardian_mobile_number, $other_email_address, $id);

    $this->session->set_userdata("success", "Updated Successfully");

    redirect(base_url()."main/teacher_personal_info?id=".$id."&data_from=".$data_from);
  }

  public function insert_student()
  {
    $first_name = $this->input->post("student_first_name");
    $middle_name = $this->input->post("student_middle_name");
    $last_name = $this->input->post("student_last_name");
    $rfid_number = $this->input->post("student_rfid_number");
    $course = $this->input->post("student_course");
    $year = $this->input->post("student_year");
    $section = $this->input->post("student_section");
    $teachers = $this->input->post("student_teachers");
    $email_address = $this->input->post("add_student_email_address");
    $mobile_number = $this->input->post("add_student_mobile_number");
    
    $image = '';
    $is_error = '';

    $config['upload_path'] = './dist/img/user_upload';
		$config['allowed_types'] = 'jpg|png|jpeg|gif|webp';
		$config['max_size'] = '5000';

		$this->load->library('upload', $config);

		if((!empty($_FILES['user_img_attachment_2'])))
		{   
			$get_file_name = $_FILES['user_img_attachment_2']['name'];

			$_FILES['user_img_attachment_2']['name'] = $get_file_name;
		
			if($_FILES['user_img_attachment_2']['size'] != 0)
			{  
				if ($this->upload->do_upload('user_img_attachment_2'))
				{
					$data_upload = array('user_img_attachment_2' => $this->upload->data());
					$image = $data_upload['user_img_attachment_2']['file_name'];
				}

				else
				{
					$is_error = array('error' => $this->upload->display_errors());
				}
			}
		}

		if ($is_error)
		{
			$this->session->set_userdata('error', $is_error["error"]);
		}

    else
    {
      $is_rfid_exists_student = $this->main_model->MOD_CHECK_RFID_NUMBER_STUDENT($rfid_number);

      if ($is_rfid_exists_student)
      {
        $this->session->set_userdata('error', 'RFID Number already exists');
      }

      else
      {
        $this->main_model->MOD_INSERT_STUDENT($first_name, $middle_name, $last_name, $rfid_number, $course, $year, $section, $email_address, $mobile_number, $image, $teachers);

        $this->session->set_userdata("success", "Successfully added to the database");
      }
    }

    redirect(base_url()."main/manage_student");
  }
  
  public function update_student()
  {
    $data_from = $this->input->post("student_data_from");
    $id = $this->input->post("edit_student_id");
    $first_name = $this->input->post("edit_student_first_name");
    $middle_name = $this->input->post("edit_student_middle_name");
    $last_name = $this->input->post("edit_student_last_name");
    $rfid_number = $this->input->post("edit_student_rfid_number");
    $course = $this->input->post("edit_student_course");
    $year = $this->input->post("edit_student_year");
    $section = $this->input->post("edit_student_section");
    $email_address = $this->input->post("edit_student_email_address");
    $mobile_number = $this->input->post("edit_student_mobile_number");
    $teachers = $this->input->post("edit_student_teachers");
    
    $old_rfid_number = $this->input->post("edit_student_old_rfid_number");
    $old_image = $this->input->post("edit_student_old_image");
    $is_personal = $this->input->post("student_is_personal");

    $image = '';
    $is_error = '';

    $is_rfid_exists_teacher = '';
    $is_rfid_exists_student = '';

    $config['upload_path'] = './dist/img/user_upload';
		$config['allowed_types'] = 'jpg|png|jpeg|gif|webp';
		$config['max_size'] = '5000';

		$this->load->library('upload', $config);

		if((!empty($_FILES['edit_user_img_attachment_2'])))
		{   
			$get_file_name = $_FILES['edit_user_img_attachment_2']['name'];

			$_FILES['edit_user_img_attachment_2']['name'] = $get_file_name;
		
			if($_FILES['edit_user_img_attachment_2']['size'] != 0)
			{  
				if ($this->upload->do_upload('edit_user_img_attachment_2'))
				{
					$data_upload = array('edit_user_img_attachment_2' => $this->upload->data());
					$image = $data_upload['edit_user_img_attachment_2']['file_name'];
				}

				else
				{
					$is_error = array('error' => $this->upload->display_errors());
				}
			}
		}

		if ($is_error)
		{
			$this->session->set_userdata('error', $is_error["error"]);
		}

    else
    {
      if ($rfid_number != $old_rfid_number)
      {
        $is_rfid_exists_student = $this->main_model->MOD_CHECK_RFID_NUMBER_STUDENT($rfid_number);
      }

      if ($is_rfid_exists_teacher || $is_rfid_exists_student)
      {
        $this->session->set_userdata('error', 'RFID Number already exists');
      }

      else
      {
        if (!$image)
        {
          $image = $old_image;
        }

        $this->main_model->MOD_UPDATE_STUDENT($first_name, $middle_name, $last_name, $rfid_number, $course, $year, $section, $email_address, $mobile_number, $image, $teachers, $id);

        $this->session->set_userdata("success", "Updated Successfully");
      }
    }

    if ($is_personal == "1")
    {
      redirect(base_url()."main/student_personal_info?id=".$id."&data_from=".$data_from);  
    }

    else
    {
      redirect(base_url()."main/manage_student");
    }
  }
  
  public function update_admin_profile()
  {
    $id = $this->input->post("edit_admin_id");
    $name = $this->input->post("edit_admin_name");
    $username = $this->input->post("edit_admin_username");
    $password = md5($this->input->post("edit_admin_password"));
    $original_password = $this->input->post("edit_admin_password");
    
    $image = '';
    $is_error = '';

    $config['upload_path'] = './dist/img/user_upload';
		$config['allowed_types'] = 'jpg|png|jpeg|gif|webp';
		$config['max_size'] = '5000';

		$this->load->library('upload', $config);

		if((!empty($_FILES['user_img_attachment_3'])))
		{   
			$get_file_name = $_FILES['user_img_attachment_3']['name'];

			$_FILES['user_img_attachment_3']['name'] = $get_file_name;
		
			if($_FILES['user_img_attachment_3']['size'] != 0)
			{  
				if ($this->upload->do_upload('user_img_attachment_3'))
				{
					$data_upload = array('user_img_attachment_3' => $this->upload->data());
					$image = $data_upload['user_img_attachment_3']['file_name'];
				}

				else
				{
					$is_error = array('error' => $this->upload->display_errors());
				}
			}
		}

		if ($is_error)
		{
			$this->session->set_userdata('error', $is_error["error"]);
		}

    else
    {
      if ($image)
      {
        if ($original_password)
        {
          $this->main_model->MOD_UPDATE_ADMIN($name, $username, $password, $image, $id);
        }

        else
        {
          $this->main_model->MOD_UPDATE_ADMIN_NO_PASSWORD($name, $username, $image, $id);
        }
      }

      else
      {
        if ($original_password)
        {
          $this->main_model->MOD_UPDATE_ADMIN_NO_IMAGE($name, $username, $password, $id);
        }

        else
        {
          $this->main_model->MOD_UPDATE_ADMIN_NO_IMAGE_NO_PASSWORD($name, $username, $id);
        }
      }

      redirect(base_url()."login/re_login_admin");
    }
  }

  public function add_to_active_list()
  {
    $id = $this->input->get("student_id");

    $this->main_model->MOD_ADD_TO_ACTIVE_LIST($id);

    $this->session->set_userdata('success', 'Student is successfully added to active list');
    
    redirect(base_url()."main/manage_student");
  }
  
  public function remove_from_active_list()
  {
    $id = $this->input->get("student_id");

    $this->main_model->MOD_REMOVE_FROM_ACTIVE_LIST($id);

    $this->session->set_userdata('success', 'Student is successfully removed from active list');
    
    redirect(base_url()."main/manage_student");
  }

  public function add_to_active_list_personal()
  {
    $id = $this->input->get("student_id");

    $data_from = $this->input->get("data_from");

    $this->main_model->MOD_ADD_TO_ACTIVE_LIST($id);

    $this->session->set_userdata('success', 'Student is successfully added to active list');
    
    redirect(base_url()."main/student_personal_info?id=".$id."&data_from=".$data_from);
  }

  public function remove_from_active_list_personal()
  {
    $id = $this->input->get("student_id");
    $data_from = $this->input->get("data_from");

    $this->main_model->MOD_REMOVE_FROM_ACTIVE_LIST($id);

    $this->session->set_userdata('success', 'Student is successfully removed from active list');
    
    redirect(base_url()."main/student_personal_info?id=".$id."&data_from=".$data_from);
  }

  public function update_student_personal_information()
  {
    $data_from = $this->input->post("data_from");

    $id = $this->input->post("personal_student_primary_id");
    $student_id = $this->input->post("personal_student_id");
    $first_name = $this->input->post("personal_student_first_name");
    $middle_name = $this->input->post("personal_student_middle_name");
    $last_name = $this->input->post("personal_student_last_name");
    $birthday = $this->input->post("personal_student_birthday");
    $gender = $this->input->post("personal_student_gender");
    $marital_status = $this->input->post("personal_student_marital_status");
    $nationality = $this->input->post("personal_student_nationality");
    $home_address = $this->input->post("personal_student_home_address");
    $current_address = $this->input->post("personal_student_current_address");
    $old_student_id = $this->input->post("personal_old_student_id");

    $is_student_id_exists = null;

    if ($student_id != $old_student_id)
    {
      $is_student_id_exists = $this->main_model->MOD_CHECK_STUDENT_ID($student_id);
    }

    if ($is_student_id_exists)
    {
      $this->session->set_userdata("error", "Student ID already exists");  
    }

    else
    {
      if (!$birthday)
      {
        $this->main_model->MOD_UPDATE_STUDENT_PERSONAL_INFORMATION_NO_BIRTHDAY($student_id, $first_name, $middle_name, $last_name, $gender, $marital_status, $nationality, $home_address, $current_address, $id);
      }

      else
      {
        $this->main_model->MOD_UPDATE_STUDENT_PERSONAL_INFORMATION($student_id, $first_name, $middle_name, $last_name, $birthday, $gender, $marital_status, $nationality, $home_address, $current_address, $id);
      }

      $this->session->set_userdata("success", "Updated Successfully");
    }

    redirect(base_url()."main/student_personal_info?id=".$id."&data_from=".$data_from);
  }

  public function update_student_contact_details()
  {
    $data_from = $this->input->post("contact_data_from");
    $id = $this->input->post("contact_student_primary_id");
    $mobile_number = $this->input->post("student_mobile_number");
    $email_address = $this->input->post("student_email_address");
    $facebook_account = $this->input->post("student_facebook_account");
    $other_email_address = $this->input->post("student_other_email_address");
    $guardian_name = $this->input->post("student_guardian_name");
    $guardian_mobile_number = $this->input->post("student_guardian_mobile_number");

    $this->main_model->MOD_UPDATE_STUDENT_CONTACT_DETAILS($mobile_number, $email_address, $facebook_account, $other_email_address, $guardian_name, $guardian_mobile_number, $id);

    $this->session->set_userdata("success", "Updated Successfully");

    redirect(base_url()."main/student_personal_info?id=".$id."&data_from=".$data_from);
  }
  
  public function delete_educational_background()
  {
    $id = $this->input->get("delete_key");
    $data_from = $this->input->get("data_from");
    $student_id = $this->input->get("student_id");
    $user_type = $this->input->get("user_type");

    $this->main_model->MOD_DELETE_EDUCATIONAL_BACKGROUND($id);

    $this->session->set_userdata("success", "Deleted Successfully");

    if ($user_type == "Student")
    {
      redirect(base_url()."main/student_personal_info?id=".$student_id."&data_from=".$data_from);
    }
    
    else
    {
      redirect(base_url()."main/teacher_personal_info?id=".$student_id."&data_from=".$data_from);
    }
  }
  
  public function delete_student_skill()
  {
    $id = $this->input->get("delete_key");
    $data_from = $this->input->get("data_from");
    $student_id = $this->input->get("student_id");
    $user_type = $this->input->get("user_type");

    $this->main_model->MOD_DELETE_STUDENT_SKILL($id);

    $this->session->set_userdata("success", "Deleted Successfully");

    if ($user_type == "Student")
    {
      redirect(base_url()."main/student_personal_info?id=".$student_id."&data_from=".$data_from);
    }
    
    else
    {
      redirect(base_url()."main/teacher_personal_info?id=".$student_id."&data_from=".$data_from);
    }
  }

  public function update_student_skills()
  {
    $data_from = $this->input->post("edit_skill_data_from");
    $id = $this->input->post("edit_skill_id");
    $student_id = $this->input->post("edit_skill_student_primary_id");
    $skill_name = $this->input->post("edit_skill_name");
    $skill_level = $this->input->post("edit_skill_level");
    $user_type = $this->input->post("edit_user_type");

    $this->main_model->MOD_UPDATE_STUDENT_SKILLS($skill_name, $skill_level, $id);

    $this->session->set_userdata("success", "Updated Successfully");

    if ($user_type == "Student")
    {
      redirect(base_url()."main/student_personal_info?id=".$student_id."&data_from=".$data_from);
    }
    
    else
    {
      redirect(base_url()."main/teacher_personal_info?id=".$student_id."&data_from=".$data_from);
    }
  }
  
  public function update_student_education()
  {
    $data_from = $this->input->post("edit_education_data_from");
    $id = $this->input->post("edit_education_id");
    $student_id = $this->input->post("edit_education_student_primary_id");
    $school_name = $this->input->post("edit_education_student_school_name");
    $strand_course = $this->input->post("edit_education_student_strand_course");
    $from_year = $this->input->post("edit_education_student_from_year");
    $to_year = $this->input->post("edit_education_student_to_year");
    $user_type = $this->input->post("edit_education_user_type");

    $this->main_model->MOD_UPDATE_STUDENT_EDUCATION($school_name, $strand_course, $from_year, $to_year, $id);

    $this->session->set_userdata("success", "Updated Successfully");

    if ($user_type == "Student")
    {
      redirect(base_url()."main/student_personal_info?id=".$student_id."&data_from=".$data_from);
    }
    
    else
    {
      redirect(base_url()."main/teacher_personal_info?id=".$student_id."&data_from=".$data_from);
    }
  }
  
  public function add_student_education()
  {
    $data_from = $this->input->post("education_data_from");
    $id = $this->input->post("education_student_primary_id");
    $school_name = $this->input->post("education_student_school_name");
    $strand_course = $this->input->post("education_student_strand_course");
    $from_year = $this->input->post("education_student_from_year");
    $to_year = $this->input->post("education_student_to_year");

    $this->main_model->MOD_ADD_STUDENT_EDUCATION($id, $school_name, $strand_course, $from_year, $to_year);

    $this->session->set_userdata("success", "Added Successfully");

    redirect(base_url()."main/student_personal_info?id=".$id."&data_from=".$data_from);
  }
  
  public function add_teacher_education()
  {
    $data_from = $this->input->post("education_teacher_data_from");
    $id = $this->input->post("education_teacher_primary_id");
    $school_name = $this->input->post("education_teacher_school_name");
    $strand_course = $this->input->post("education_teacher_strand_course");
    $from_year = $this->input->post("education_teacher_from_year");
    $to_year = $this->input->post("education_teacher_to_year");

    $this->main_model->MOD_ADD_TEACHER_EDUCATION($id, $school_name, $strand_course, $from_year, $to_year);

    $this->session->set_userdata("success", "Added Successfully");

    redirect(base_url()."main/teacher_personal_info?id=".$id."&data_from=".$data_from);
  }
  
  public function add_student_skills()
  {
    $data_from = $this->input->post("skill_data_from");
    $id = $this->input->post("skill_student_primary_id");
    $skill_name = $this->input->post("skill_name");
    $skill_level = $this->input->post("skill_level");

    $this->main_model->MOD_ADD_STUDENT_SKILLS($id, $skill_name, $skill_level);

    $this->session->set_userdata("success", "Added Successfully");

    redirect(base_url()."main/student_personal_info?id=".$id."&data_from=".$data_from);
  }
  
  public function add_teacher_skills()
  {
    $data_from = $this->input->post("skill_teacher_data_from");
    $id = $this->input->post("skill_teacher_primary_id");
    $skill_name = $this->input->post("teacher_skill_name");
    $skill_level = $this->input->post("teacher_skill_level");

    $this->main_model->MOD_ADD_TEACHER_SKILLS($id, $skill_name, $skill_level);

    $this->session->set_userdata("success", "Added Successfully");

    redirect(base_url()."main/teacher_personal_info?id=".$id."&data_from=".$data_from);
  }

  public function re_enroll_student()
  {
    $id = $this->input->get("student_id");
    $is_personal = $this->input->get("is_personal");
    $data_from = $this->input->get("data_from");

    $name = null;
    $rfid_number = null;
    $date_enrolled = date("Y-m-d");
    $due_date = date("Y-m-d");
    $expected_payment = 0;
    $paid_amount = 0;
    $status = 1;
    $image = null;
    $student_id = null;
    $birthday = null;
    $gender = null;
    $marital_status = null;
    $nationality = null;
    $home_address = null;
    $current_address = null;
    $mobile_number = null;
    $email_address = null;
    $facebook_account = null;
    $other_email_address = null;
    $branch = null;

    $student_data = $this->main_model->MOD_STUDENT_DATA($id);

    if ($student_data)
    {
      foreach ($student_data as $student_data_row)
      {
        $name = $student_data_row->name;
        $rfid_number = $student_data_row->rfid_number;
        $status = $student_data_row->status;
        $image = $student_data_row->image;
        $student_id = $student_data_row->student_id;
        $birthday = $student_data_row->birthday;
        $gender = $student_data_row->gender;
        $marital_status = $student_data_row->marital_status;
        $nationality = $student_data_row->nationality;
        $home_address = $student_data_row->home_address;
        $current_address = $student_data_row->current_address;
        $mobile_number = $student_data_row->mobile_number;
        $email_address = $student_data_row->email_address;
        $facebook_account = $student_data_row->facebook_account;
        $other_email_address = $student_data_row->other_email_address;
        $branch = $student_data_row->branch;
      }
    }

    $this->main_model->MOD_REENROLL_STUDENT($branch, $name, $rfid_number, $date_enrolled, $due_date, $expected_payment, $paid_amount, $status, $image, $student_id, $birthday, $gender, $marital_status, $nationality, $home_address, $current_address, $mobile_number, $email_address, $facebook_account, $other_email_address);
    
    $this->main_model->MOD_SET_REENROLL_STATUS($id);

    $this->session->set_userdata("success", "Successfully Re-enrolled");

    if ($is_personal == "0")
    {
      redirect(base_url()."main/manage_student");
    }

    else
    {
      redirect(base_url()."main/student_personal_info?id=".$id."&data_from=".$data_from);
    }
  }

  private function insert_update_attendance($rfid_number, $person_type)
  {
    $get_user_data = null;
    
    if ($person_type == "Student")
    {
      $get_user_data = $this->main_model->MOD_GET_USER_DATA_STUDENT($rfid_number);

      if ($get_user_data)
      {
        foreach ($get_user_data as $get_user_data_row)
        {
          $primary_id = $get_user_data_row->id;
          $first_name = $get_user_data_row->first_name." ";
          $middle_name = "";
          $last_name = $get_user_data_row->last_name;
          $teachers = $get_user_data_row->teachers;
          $type = $person_type;
          $date_created = date("Y-m-d");
          $time_now = date("Y-m-d H:i:s");

          if ($get_user_data_row->middle_name)
          {
            $middle_name = substr($get_user_data_row->middle_name, 0, 1).". ";
          }

          $name = $first_name.$middle_name.$last_name;
          
          $check_user_attendance = $this->main_model->MOD_CHECK_USER_ATTENDANCE($rfid_number, $date_created);

          if ($check_user_attendance)
          {
            foreach ($check_user_attendance as $check_user_attendance_row)
            {
              // Time out Morning
              if ($check_user_attendance_row->status == "3")
              {
                $this->main_model->MOD_UPDATE_ATTENDANCE($time_now, "2", $rfid_number, $date_created);
              }
              
              // Time in Afternoon
              if ($check_user_attendance_row->status == "2")
              {
                $this->main_model->MOD_UPDATE_ATTENDANCE_TIME_IN_AFTERNOON($time_now, "1", $rfid_number, $date_created);
              }
              
              // Time out Afternoon
              if ($check_user_attendance_row->status == "1")
              {
                $this->main_model->MOD_UPDATE_ATTENDANCE_TIME_OUT_AFTERNOON($time_now, "0", $rfid_number, $date_created);
              }
            }
          }

          else
          {
            // Time in Morning
            $this->main_model->MOD_INSERT_ATTENDANCE($primary_id, $rfid_number, $name, $type, $date_created, $time_now, "3", $teachers);
          }
        }
      }
    }
    else
    {
      $get_user_data_teacher = $this->main_model->MOD_GET_USER_DATA_TEACHER($rfid_number);

      if ($get_user_data_teacher)
      {
        foreach ($get_user_data_teacher as $get_user_data_teacher_row)
        {
          $primary_id = $get_user_data_teacher_row->id;
          $first_name = $get_user_data_teacher_row->first_name." ";
          $middle_name = "";
          $last_name = $get_user_data_teacher_row->last_name;
          $type = $person_type;
          $date_created = date("Y-m-d");
          $time_now = date("Y-m-d H:i:s");

          if ($get_user_data_teacher_row->middle_name)
          {
            $middle_name = substr($get_user_data_teacher_row->middle_name, 0, 1).". ";
          }

          $name = $first_name.$middle_name.$last_name;
          
          $check_user_attendance = $this->main_model->MOD_CHECK_USER_ATTENDANCE($rfid_number, $date_created);

          if ($check_user_attendance)
          {
            foreach ($check_user_attendance as $check_user_attendance_row)
            {
              // Time out Morning
              if ($check_user_attendance_row->status == "3")
              {
                $this->main_model->MOD_UPDATE_ATTENDANCE($time_now, "2", $rfid_number, $date_created);
              }
              
              // Time in Afternoon
              if ($check_user_attendance_row->status == "2")
              {
                $this->main_model->MOD_UPDATE_ATTENDANCE_TIME_IN_AFTERNOON($time_now, "1", $rfid_number, $date_created);
              }
              
              // Time out Afternoon
              if ($check_user_attendance_row->status == "1")
              {
                $this->main_model->MOD_UPDATE_ATTENDANCE_TIME_OUT_AFTERNOON($time_now, "0", $rfid_number, $date_created);
              }
            }
          }

          else
          {
            // Time in Morning
            $this->main_model->MOD_INSERT_ATTENDANCE_TEACHER($primary_id, $rfid_number, $name, $type, $date_created, $time_now, "3");
          }
        }
      }
    }
  }

  public function get_user_data_teacher()
  {
    $rfid_number = $this->input->post('rfid_number');
    
    $data = $this->main_model->MOD_GET_USER_DATA_TEACHER($rfid_number);
    
    echo json_encode($data);

    $this->insert_update_attendance($rfid_number, "Teacher");
  }
  
  public function get_user_data_student()
  {
    $rfid_number = $this->input->post('rfid_number');
    
    $data = $this->main_model->MOD_GET_USER_DATA_STUDENT($rfid_number);
    
    echo json_encode($data);

    $this->insert_update_attendance($rfid_number, "Student");
  }

  public function check_user_attendance()
  {
    $rfid_number = $this->input->post("rfid_number");
    $date_created = date("Y-m-d");

    $data = $this->main_model->MOD_CHECK_USER_ATTENDANCE($rfid_number, $date_created);

    echo json_encode($data);
  }
  
  public function get_attendance_data()
  {
    $rfid_number = $this->input->post("rfid_number");
    
    $data = $this->main_model->MOD_GET_ATTENDANCE_DATA($rfid_number);

    echo json_encode($data);
  }
  
  public function get_students_data()
  {
    $rfid_number = $this->input->post("rfid_number");
    
    $data = $this->main_model->MOD_GET_STUDENTS_DATA($rfid_number);
    
    echo json_encode($data);
  }
  
  public function get_teachers_data()
  {
    $rfid_number = $this->input->post("rfid_number");
    
    $data = $this->main_model->MOD_GET_TEACHERS_DATA($rfid_number);

    echo json_encode($data);
  }
  
  public function get_user_account_data()
  {
    $username = $this->input->post("username");
    
    $data = $this->main_model->MOD_GET_USER_ACCOUNT_DATA($username);

    echo json_encode($data);
  }
  
  public function get_visitor_data()
  {
    $name = $this->input->post("name");
    
    $data = $this->main_model->MOD_GET_VISITOR_DATA_BY_NAME($name);

    echo json_encode($data);
  }
  
  public function update_notification_badge()
  {
    $data = $this->main_model->MOD_UPDATE_NOTIFICATION_BADGE();
  }
}
