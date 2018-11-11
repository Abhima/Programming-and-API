 <?php 
	/**
	* 
	*/
	class Loginmodel extends CI_Model
	{

		public function login_valid($cardnumber, $pin)
		{
			//SELECT * FROM user_registered WHERE email = '$email' AND password = '$password'
			$this -> db -> select('*');
	      	$this -> db -> from('customer');
	      	$this -> db -> where('cardnumber', $cardnumber);
	      	$this -> db -> where('pin', $pin);
	     
	      	$q = $this -> db -> get();
	     
	      	if( $q->num_rows() )
	      	{
	        	return $q->row()->customerid;
	     	}
	      	else
	      	{
	        	return false;
	      	}
		}

		public function login_attempt_check($cardnumber)
		{
			$attempts = $this->db->where('cardnumber', $cardnumber)->get('customer')->row()->attempts;

		    if ($attempts > 2)
		    {
		        return $attempts;
		    }
		    else
		    {
		        $this->db->where('cardnumber', $cardnumber);
		        $this->db->set('attempts', ($attempts + 1), FALSE);
		        $this->db->update('customer');
		    }
		}
	}
?>