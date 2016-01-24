<?php defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: Ashley Kodya
 * Date: 1/14/16
 * Time: 9:05 PM
 */

class SignupForm extends CI_Controller

{
    public function index() {
        // Load the Form helper which provides methods to assist
        // working with forms.
        $this->load->helper("form");
        // Load the form validation classes
        $this->load->library("form_validation");

        // As you have loaded the validation classes, you can now
        // apply rules to the fields you want validated. The
        // functions below take three arguments:
        //     1. The name of form field
        //     2. The human name of the field to be displayed in
        //        the event of an error
        //     3. The names of the validation rules to apply
        $this->form_validation->set_rules("firstname", "First Name",
            "required");
        $this->form_validation->set_rules("lastname", "Last Name",
            "required");
        $this->form_validation->set_rules("email", "Email Address",
            "required|valid_email");
        $this->form_validation->set_rules("dob", "Date of Birth",
            "required");
        $this->form_validation->set_rules("zip", "Zip Code",
            "required");
        $this->form_validation->set_rules("username", "Username",
            "required");
        $this->form_validation->set_rules("password", "Password",
            "required");
        $this->form_validation->set_rules("confpassword", "Confirm Password",
            "required");
        $this->form_validation->set_rules("profile", "Profile Picture",
            "required");

        // Check whether the form validates. If not, present the
        // form view otherwise present the success view.
        if ($this->form_validation->run() == false) {
            $this->load->view("signup_view");
        }
        else {
            $salt = "SuperSaltHash"; //helps us create salt hash for password
            $firstname = $_POST['firstname']; //get POST values from form - first name
            $lastname = $_POST['lastname']; //get POST values from form - last name
            $email = $_POST['email']; //get POST values from form - email
            $dob = $_POST['dob']; //get POST values from form - dob
            $zip = $_POST['zip']; //get post values from form - zip code
            $username = $_POST['username']; // gets post values for username
            $password = md5($_POST['password'] . $salt); //gets post values for password Hashed

            $data = array("firstname" => $firstname,
                "lastname" => $lastname, "email" => $email, "dob" => $dob, "zip" => $zip, "username" => $username, "password" => $password);
            $this->load->model("SignupformModel");
            $this->SignupformModel->insert_address($data);
            $this->load->view("formsuccess");
        }
    }
}
