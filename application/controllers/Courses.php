<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Courses extends CI_Controller {
	public function __construct()
    {
        parent::__construct();
        $this->load->model('Course_model');
        //$this->output->enable_profiler();
    }

	public function index()
	{
		$data['courses'] = $this->Course_model->get_all_courses();
		$this->load->view('course',$data);
	}

    public function show($id)
    {   
        $this->output->enable_profiler(TRUE); //enables the profiler
        $this->load->model("Course"); //loads the model
        $course = $this->Course->get_course_by_id($id);  //calls the get_course_by_id method
        var_dump($course);
    }

    public function add()
    {
        $this->form_validation->set_rules('course', '<strong><em>Course</em></strong>', 'required|trim|min_length[5]');

		if($this->form_validation->run() == FALSE)
        {
            $this->session->set_flashdata('add_course_errors', validation_errors());
            redirect(base_url());
        }
        else
        {

            $course_post = $this->input->post('course', TRUE);
            $description_post = $this->input->post('description');

            $this->session->set_flashdata("add_course_success", "<p class='success'><strong> $course_post has been added!</strong></p>");

            $this->Course_model->add_course($this->input->post(NULL, TRUE));
			// $add_course = $this->Course->add_course($course_details);
			// if($add_course === TRUE) {
			// 	echo "Course is added!";
			// }
            redirect(base_url());
        }
    }

	public function destroy($course_id)
	{
		$this->Course_model->delete_course($course_id);
		$this->session->set_flashdata("delete_success", "<p class='error'>Deleted successfully!</p>");
        redirect(base_url());
	}
	// checkifrecordexists
	// public function user_exists($user_id)
	// {
	// $this->db->where('user_id', $user_id);
	// $query = $this->db->get('sometablenamehere');
	// if($query->num_rows >= 1)
	// {
	// //if query finds one row relating to this user then execute code accordingly here
	// }
	// }
}
?>
