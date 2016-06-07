<?php
 
class Users extends CI_Model
{
    private $_id;
    private $_email;
    private $_password;
    private $_firstName;
    private $_lastName;
    private $_created;

    function __constructor(){
            parent::_construct();
    }

    function login($email, $password)
    {

        $this->db->select('id, email, password');
        $this->db->from('user');
        $this->db->where('email', $email);
        $this->db->where('password', MD5($password));
        $this->db->limit(1);

        $query = $this->db->get();

        if($query->num_rows() == 1)
        {
            var_dump( $query->result() );
            return $query->result();

        }
        else
        {
          return false;
        }
    }

    /*
     * SET's & GET's
     * Set's and get's allow you to retrieve or set a private variable on an object
     */
    /**
     * @return int [$this->_id] Return this objects ID
     */
    public function getId()
    {
        return $this->_id;
    }

    /**
     * @param int Integer to set this objects ID to
     */
    public function setId($value)
    {
        $this->_id = $value;
    }

    /**
     USERNAME
     **/

    /**
     * @return string [$this->_username] Return this objects username
     */
    public function getEmail()
    {
        return $this->_email;
    }

    /**
     * @param string String to set this objects username to
     */
    public function setEmail($value)
    {
        $this->_email = $value;
    }

    /**
     PASSWORD
     **/
    /**
     * @return string [$this->_password] Return this objects password
     */
    public function getPassword()
    {
        return $this->_password;
    }

    /**
     * @param string String to set this objects password to
     */
    public function setPassword($value)
    {
        $this->_password = $value;
    }

    /**
     FIRSTNAME
     **/

    /**
     * @return string [$this->_firstName] Return this objects firstName
     */
    public function getFirstName()
    {
        return $this->_firstName;
    }

    /**
     * @param string String to set this objects firstName to
     */
    public function setFirstName($value)
    {
        $this->_firstName = $value;
    }

     /**
     LASTNAME
     **/

    /**
     * @return string [$this->_lastName] Return this objects lastName
     */
    public function getLastName()
    {
        return $this->_lastName;
    }

    /**
     * @param string String to set this objects lastName to
     */
    public function setLastName($value)
    {
        $this->_lastName = $value;
    }

    /**
     CREATED
     **/

    /**
     * @return string [$this->_created] Return this objects created
     */
    public function getCreated()
    {
        return $this->_created;
    }

    /**
     * @param string String to set this objects created to
     */
    public function setCreated($value)
    {
        $this->_created = $value;
    }

    /**
     *	Commit method, this will comment the entire object to the database
     */
    public function commit()
    {
        $data = array(
                    'email' => $this->_email,
                    'password' => $this->_password
        );

        if ($this->_id > 0) {
            //We have an ID so we need to update this object because it is not new
            if ($this->db->update("user", $data, array("id" => $this->_id))) {
                return true;
            }
        } else {
            //We dont have an ID meaning it is new and not yet in the database so we need to do an insert
            if ($this->db->insert("user", $data)) {
                //Now we can get the ID and update the newly created object
                $this->_id = $this->db->insert_id();
                return true;
            }
        }
        
        return false;
    }
    
   
	
}