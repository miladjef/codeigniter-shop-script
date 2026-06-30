<?php

class MY_Model extends CI_Model{

    protected $tables = array();
    protected $table = "";
    public function __construct()
    {
        parent::__construct();
        $this->tables = array(
            /**Base Tables**/
            'banks' => 'banks',
            'carts' => 'carts',
            'city' => 'city',
            'config' => 'config',
            'contact' => 'contact',
            'customers' => 'customers',
            'hits' => 'hits',
            'manufacturers' => 'manufacturers',
            'orders' => 'orders',
            'orders_payments' => 'orders_payments',
            'orders_status' => 'orders_status',
            'users' => 'users',
            'payments' => 'payments',
            'products' => 'products',
            'product_groups' => 'product_groups',
            'product_pics' => 'product_pics',
            'province' => 'province',
            'shipping_methods' => 'shipping_methods',
            'suggested_products' => 'suggested_products',
            'emails' => 'emails'
        );
    }
    
    /************************************* MM *******************************
     * @param $table
     * @param $data
     * @return mixed
     * This function is a general function for inserting data to a table
     */
    public function insert($table , $data)
    {
        return $this->db->insert($table , $data);
    }
    
    /************************************* MM *******************************
     * @param $table
     * @param string $selectArray
     * @param array $conditionArray
     * @param string $orderBy
     * @param string $groupBy
     * @return mixed
     * A General Function for select everything/some fields from a table by condition and order by a field
     */
    public function select($table , $selectArray = "*" , $conditionArray = array() , $orderBy = "id" , $groupBy = "")
    {
        $this->db->select($selectArray)->from($table)->where($conditionArray)->order_by($orderBy)->group_by($groupBy);
        $query = $this->db->get();
        $result = $query->result_array();
        if(is_array($result))
            return $result;
        else
            return $this->db->error()['message'];
    }
    
    /************************************* MM ******************************* 
     * @param $table
     * @param $data
     * @param $conditionArray
     * @return mixed
     * This function is general function for updating some records of a table in the basis of condition and data
     */
    public function update($table , $data , $conditionArray)
    {
        $this->db->where($conditionArray);
        return $this->db->update($table , $data);
    }

    /************************************* MM *******************************
     * @param $table
     * @param $conditionArray
     * @return mixed
     * This function is a general function for deleting some records from the table in database in the basis of condition array
     */
    public function delete($table , $conditionArray)
    {
        return $this->db->delete($table , $conditionArray);
    }

    /************************************* MM *******************************
     * @param $table
     * @param $field
     * @param array $condition
     * @return mixed
     */
    public function getTableField($table , $field , $condition = array()){
        $info = current(self::select($table , "*" , $condition));
        return (is_array($info) && array_key_exists($field, $info)) ? $info[$field] : null;
    }
	/************************************* MM *******************************
     * @param $table
     * @param $condition
     * @return array
     */
    public function getRow($table , $condition){
        $result = self::select($table , "*" , $condition);
        return (!empty($result) && is_array($result)) ? current($result) : false;
    }

    /************************************* MM *******************************
     * @param $query
     * @return mixed
     * This function is used for calling a stored procedure or a function and returning the result and errorcode as an array
     * purpose: Executing Stored Procedures and running functions
     * Note: It can be used for select too when the query is written manually
     */
    public function sp($query, $binds = array())
    {
        $query = str_replace("EXEC" , "" , $query);
        $query = str_replace("Execute" , "" , $query);
        $q = $this->db->query($query, $binds);

        if($q)
            return $q->result_array();
        else
            return false;
    }

    /************************************* MM *******************************
     * @param $table
     * @param $field
     * @param $condition_array
     * this method is used for returning the maximum value of a field on a table
     */
    public function select_max($table , $field , $condition_array = array()){
        $this->db->select_max($field)->where($condition_array);
        $query = $this->db->get($table);
        return $query->result_array();
    }
    
    /************************************* MM *******************************
     * @param $query
     * @return mixed
     * This function is a public function for some operations like insert, update and delete that have true/false result
     */
    public function query($query)
    {
        return $this->db->query($query);
    }

    /************************************* MM *******************************
     * @param $table
     * @param $id
     * @return bool
     * This function is used for checking that whether the field in a record by gotten id is exists at database->table or not
     */
    public function isFieldExists($table , $id)
    {
        $this->db->select("*")->from($table)->where(array("id"=>$id));
        $q = $this->db->get();
        if($q->num_rows()>0)
            return true;
        else
            return false;
    }

    /************************************* MM *******************************
     * @param $table
     * @param $condition
     * This function is used for checking that whether the field in a record by gotten id is exists at database->table or not
     * @return bool
     */
    public function lastRow($table , $condition = array())
    {
        $this->db->select("*")->from($table)->where($condition)->order_by("id" , "desc")->limit(1);
        $q = $this->db->get();
        return current($q->result_array());
    }

    /************************************* MM *******************************
     * @param $tableName
     * @param $field
     * @param $dataField
     * @return bool
     */
    public function isUnique($tableName , $field , $dataField){
        $result = self::select($tableName , "*" , array($field => $dataField));
        return (empty($result));
    }

    /************************************* MM *******************************
     * @param $tables
     * @return bool
     */
    public function truncate_tables($tables){
        if(!empty($tables)){
            foreach($tables as $table){
                if($this->db->empty_table($table))
                    continue;
                else
                    return false;
            }
        }
        return true;
    }

    
	
	/************************************* MM *******************************
     * @param $table
     * @param $data
     * @return mixed
     * This function is a general function for inserting data to a table and returning the inserted row
     */
    public function insert_by_return($table , $data){
        if($this->db->insert($table , $data)){
            $insert_id = $this->db->insert_id();
            if($insert_id){
                return self::getRow($table, array('id' => $insert_id));
            }
            return self::lastRow($table);
        }
        return false;
    }
	
	/************************************* MM *******************************
     * @param $query
     * @return mixed
     * This function is a common function for running the queries related to select
     */
    public function fetchQuery($query, $binds = array())
    {
        $q = $this->db->query($query, $binds);
        return $q ? $q->result_array() : array();
    }
	 /************************************* MM *******************************
     * @param $mainTable
     * @param $secondaryTable
     * @param $neededFields
     * @param #joinStatus
     * @param $conditionArray
     * @param string $joinType
     * this function is used for executing a join command
     */
    public  function join($mainTable , $secondaryTable , $neededFields , $joinStatus,$conditionArray=array() , $joinType = 'Inner'){
        $this->db->select($neededFields);
        $this->db->from($mainTable);
        $this->db->join($secondaryTable,$joinStatus , $joinType);
       $this->db->where($conditionArray);

        $query = $this->db->get();
        return $query->result_array();
    }
	
	 /************************************* MM *******************************
     * @param $table
     * @param $from
     * @param $rowCount
     * @param $where
     * @param $sortField
     * @param $sortMethod
     * @return string
     */
    public function table_rows($table , $from , $rowCount, $where='' , $sortField='' , $sortMethod='' ){

        $MainSQL ="
                    Declare @sql nvarchar(max)=null,
                    @CountSTR nvarchar(max),
                    @TotalRow int; ";
        $TotalRow = "Select @TotalRow = count(*) From ".$table." Where 1=1 ";
        if ($where!='' && $where !=NULL)
               $TotalRow .= " AND " .$where;
        $TotalRow .= ";";
        $MainSQL .= $TotalRow;


        $MainSQL .= "Select @TotalRow TotalRows ,* From ".$table." Where 1=1 ";
        if ($where!= NULL && $where !='')
               $MainSQL .= " AND ".$where;
        $MainSQL .=" Order By ". $sortField;
        if ($sortMethod!=NULL && $sortMethod !='')
            $MainSQL .=' ' . $sortMethod;
        $MainSQL .=" Offset ".$from."  rows
        fetch next ".$rowCount." rows only";
        return $MainSQL;
        //execute (MainSQL)
    }
}