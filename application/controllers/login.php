<?php if (! defined('BASEPATH')) exit('No direct script access allowed');
	
	class Login extends MY_Controller 
	{
		public function index()
		{
			$this->load->view('loginview');

		}

		public function verifypin()
		{
			$this->load->library('form_validation');

			$this->form_validation->set_rules('cardnumber', 'Cardnumber', 'required|trim|xss_clean|max_length[4]');
			$this->form_validation->set_rules('pin', 'Pin', 'required|trim|xss_clean');

			$this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');

			if ( $this->form_validation->run()) 
			{
				//success
				$cardnumber= $this->input->post('cardnumber');
				$pin= $this->input->post('pin');

				$this->load->model('loginmodel');

				$login_id = $this->loginmodel->login_valid($cardnumber, $pin);
				
				if ($login_id) 
				{
					//if valid, login user.
					$this->session->set_userdata('user_id', $login_id);
					$this->session->set_userdata('cardnumber', $cardnumber);
			
					return redirect('home');
				}
				else
				{
					//authentication failed.
					$data = $this->loginmodel->login_attempt_check($cardnumber);
					if ($data) 
					{
						$this->load->view('account_blocked_view');
					}
					else
					{
						$this->session->set_flashdata('error', '*  Login Failed! Invalid pin number'); 
						return redirect('login');
					}
				}
			}
			else
			{
				//failed try again.
				$this->load->view('loginview');
			}
		}
		public function logout()
	     {
	        $this->session->unset_userdata('user_id');
	        return redirect('login'); 

		}
	}
?>