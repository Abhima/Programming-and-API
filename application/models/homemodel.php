 <?php 
	/**
	* 
	*/
	class Homemodel extends CI_Model
	{

		public function checkCustomerBalance($customerid)
		{
			$this -> db -> select('cubalance');
	      	$this -> db -> from('customer');
	      	$this -> db -> where('customerid', $customerid);

	      	$q = $this -> db -> get();
	     
	      	if( $q->num_rows() )
	      	{
	        	return $q->row()->cubalance;
	     	}
	      	else
	      	{
	        	return false;
	      	}


		}
		public function checkValidAccount($coaccountnumber)
		{
			$this -> db -> select('*');
	      	$this -> db -> from('companies');
	      	$this -> db -> where('coaccountnumber', $coaccountnumber);

	      	$q = $this -> db -> get();
	     
	      	if( $q->num_rows() )
	      	{
	        	return $q->row()->companyid;
	     	}
	      	else
	      	{
	        	return false;
	      	}
		}

		public function checKBankID($bankid)
		{
			$this -> db -> select('*');
	      	$this -> db -> from('banks');
	      	$this -> db -> where('bankid', $bankid);

	      	$q = $this -> db -> get();
	     
	      	if( $q->num_rows() )
	      	{
	        	return $q->row()->bankid;
	     	}
	      	else
	      	{
	        	return false;
	      	}
		}

		public function invoice_save($data)
	    {
	      	if($this->db->insert("invoice",$data))
	      	{
	        	$insert_id = $this->db->insert_id();

   				return  $insert_id;
	      	}
	      	else
	      	{
	        	return false;
	      	}
	    }

	   	public function payAmount($camt, $saved)
	    {
	    	$query = $this->db->query("UPDATE customer JOIN invoice
	    								ON customer.customerid = invoice.customerid
	    								JOIN companies
	    								ON companies.companyid = invoice.companyid
	    								SET customer.cubalance = customer.cubalance - $camt,
	    									companies.cobalance = companies.cobalance + $camt
	    								WHERE invoice.invoiceid = $saved
	    							");
	    }

	    public function transaction_save($data)
	    {
	      	if($this->db->insert("transactions",$data))
	      	{
	        	$insert_id = $this->db->insert_id();

   				return  $insert_id;
	      	}
	      	else
	      	{
	        	return false;
	      	}
	    }

	    public function transferAmount($camt, $saved)
	    {
	    	$query = $this->db->query("UPDATE customer JOIN transactions
	    							ON customer.customerid = transactions.customerid
	    							JOIN banks
	    							ON banks.bankid = transactions.bankid
									SET customer.cubalance = customer.cubalance - $camt,
										banks.balance = banks.balance + $camt
									WHERE transactions.transactionid = $saved
	    						");
	    }
	 
	}
?>