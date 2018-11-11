<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class Home extends My_Controller 
	{
		public function __construct()
		{
		    parent::__construct();

		    $this->load->helper('url');
		    $this->load->helper('form');

		     //session check using user id
		   	if (! $this->session->userdata('user_id'))
		      		return redirect('login');

		}
		public function index()
		{
			//displays options view page.
			$this->load->view('optionview');
		}

		public function billing()
		{ 
			//displays account insert page.
			$this->load->view('account_entry_view');
		}

		public function billing_account()
		{ 
			$this->load->library('form_validation');

			$this->form_validation->set_rules('coaccountnumber', 'Coaccountnumber', 'required|xss_clean');

			$this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');

			if ( $this->form_validation->run()) 
			{
				//success
				$coaccountnumber= $this->input->post('coaccountnumber');
					
				$this->load->model('homemodel');
				$data = $this->homemodel->checkValidAccount($coaccountnumber);
					
				if ($data) 
				{
					//valid account number, redirects to billing_details_view.
					$this->session->set_userdata('coaccountnumber', $coaccountnumber);
					$this->session->set_userdata('companyid', $data);
					$this->load->view('billing_detail_view');
				}
				else
				{
					//invalid account number, redirects to the same page.
					$this->session->set_flashdata('message', '*  Account number doesnot exist !'); 
					$this->load->view('account_entry_view');
				}
			}
			else
			{
				//failed try again.
				$this->load->view('account_entry_view');
			}
		}

		public function edit_billing_detail()
		{
			$this->load->view('billing_detail_view');
		}

		public function billing_detail()
		{
			$this->load->library('form_validation');

			$this->form_validation->set_rules('invoiceno', 'Invoiceno', 'required|xss_clean');

			$this->form_validation->set_rules('amount', 'Amount', 'required|xss_clean');

			$this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');

			if ( $this->form_validation->run()) 
			{
				$Submit = $this->input->post('Submit');
		      	if($Submit)
		      	{
		        	//success
		        	$customerid = $this->input->post('customerid');
		        	$companyid = $this->input->post('companyid');
		        	$invoiceno = $this->input->post('invoiceno');
		        	$amount = $this->input->post('amount');

		        	$this->load->model('homemodel');
			    	$checkamount = $this->homemodel->checkCustomerBalance($customerid);

			    	if ($checkamount < $amount) 
			    	{
			    		$this->load->view('insufficient_balance_billing_view');
			    	}
			    	else
			    	{
		        		$this->session->set_userdata('customerid', $customerid);
			        	$this->session->set_userdata('companyid', $companyid);
			          	$this->session->set_userdata('invoiceno', $invoiceno);
			          	$this->session->set_userdata('amount', $amount);
			          	
			          	$this->load->view('confirm_payment_view');
			        }
			    }
			    else
				{
					//failed.
					return redirect('billing_detail', 'refresh');
				}
			}
			else
			{
				//failed try again.
				$this->load->view('billing_detail_view');
			}
		}
		public function confirm_payment()
		{
			$customerid = $this->input->post('customerid');
	        $companyid = $this->input->post('companyid');
	        $invoiceno = $this->input->post('invoiceno');
	        $amount = $this->input->post('amount');

			$data = array(
		        'customerid' => $customerid,
		        'companyid' => $companyid,
		        'invoiceno' => $invoiceno,
		        'amount' => $amount
		        );
	        
		    $this->load->model('homemodel');
		    $saved = $this->homemodel->invoice_save($data);

		   	if($saved)
		    {
	        	$camt = $this->input->post('amount');
	        	
	        	$this->load->model('homemodel');
		    	$this->homemodel->payAmount($camt, $saved);

	          	$this->load->view('transaction_end_view');
		    }
		    else
		    {
	          	return redirect('confirm_payment', 'refresh');
		    }
		}
		public function transfer()
		{
			$this->load->view('transfer_view');
		}
		public function bank_list()
		{
			$this->load->library('form_validation');

			$this->form_validation->set_rules('bankid', 'Bankid', 'required');

			$this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');

			if ( $this->form_validation->run()) 
			{
				//success
				$bankid= $this->input->post('bankid');
					
				$this->load->model('homemodel');
				$bank = $this->homemodel->checKBankID($bankid);
					
				if ($bank) 
				{
					//valid account number, redirects to billing_details_view.
					$this->session->set_userdata('bankid', $bankid);
					$this->load->view('transfer_detail_view');
				}
				else
				{
					//invalid account number, redirects to the same page.
					$this->session->set_flashdata('error', 'Oh Snap! Bank code not found'); 
					$this->load->view('bank_list_view');
				}	
			}
			else
			{
				//failed.
				$this->load->view('bank_list_view');
			}
		}
		public function edit_transfer_detail()
		{
			$this->load->view('transfer_detail_view');
		}
		public function transfer_detail()
		{
	      	$this->load->library('form_validation');

			$this->form_validation->set_rules('accountno', 'Accountno', 'required|xss_clean');

			$this->form_validation->set_rules('amount', 'Amount', 'required|xss_clean');

			$this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');

			if ( $this->form_validation->run()) 
			{
		      	$Submit = $this->input->post('Submit');
		      	if($Submit)
		      	{
		        	//success
		        	$customerid = $this->input->post('customerid');
		        	$bankid = $this->input->post('bankid');
		        	$accountno = $this->input->post('accountno');
		        	$amount = $this->input->post('amount');

		        	$this->load->model('homemodel');
			    	$checkamount = $this->homemodel->checkCustomerBalance($customerid);

			    	if ($checkamount < $amount) 
			    	{
			    		$this->load->view('insufficient_balance_transfer_view');
			    	}
			    	else
			    	{
			        	$this->session->set_userdata('customerid', $customerid);
			          	$this->session->set_userdata('bankid', $bankid);
			        	$this->session->set_userdata('accountno', $accountno);
			          	$this->session->set_userdata('amount', $amount);
			          	
			          	$this->load->view('confirm_transfer_view');
			        }
			    }
			    else
				{
					//failed.
					return redirect('transfer_detail', 'refresh');
				}
			}
			else
			{
				//failed try again.
				$this->load->view('transfer_detail_view');
			}
		}
		public function confirm_transfer()
		{
			$customerid = $this->input->post('customerid');
	        $bankid = $this->input->post('bankid');
	        $accountno = $this->input->post('accountno');
	        $amount = $this->input->post('amount');
				
			$data = array(
		        'customerid' => $customerid,
		        'bankid' => $bankid,
		        'accountno' => $accountno,
		        'amount' => $amount
		        );
	        
		    $this->load->model('homemodel');
		    $saved = $this->homemodel->transaction_save($data);

		    if($saved)
		    {
	        	$camt = $this->input->post('amount');

	        	$this->load->model('homemodel');
		    	$this->homemodel->transferAmount($camt, $saved);

	          	$this->load->view('transaction_end_view');
		    }
		    else
		    {
	          	return redirect('confirm_transfer', 'refresh');
		    }
		}
	}
?>