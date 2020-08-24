<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard_model extends CI_Model 

{
	function __construct() 
	{
		parent::__construct();
		$this->load->database("default");
	}
	/* super admin*/
	public function get_employee_list(){
	$this->db->select('count(employee.e_id) as employees')->from('employee');
	$this->db->where('employee.status',1);
	return $this->db->get()->row_array();
	}
	public function get_glpayment_list(){
	$this->db->select('count(gl_payment.g_id) as glpayments')->from('gl_payment');
	$this->db->where('gl_payment.status',1);
	return $this->db->get()->row_array();
	}
	public function get_order_cum_invoice_list(){
	$this->db->select('count(order_cum_invoice.o_id) as invoices')->from('order_cum_invoice');
	$this->db->where('order_cum_invoice.status',1);
	return $this->db->get()->row_array();
	}
	public function get_se_st_expenses_list(){
	$this->db->select('count(expenses.e_id) as expenses')->from('expenses');
	$this->db->where('expenses.status',1);
	return $this->db->get()->row_array();
	}
	public function get_sales_bulletin_list(){
	$this->db->select('count(sales_bulletin.s_id) as sales_bulletins')->from('sales_bulletin');
	$this->db->where('sales_bulletin.status',1);
	return $this->db->get()->row_array();
	}
	
	public function get_transfer_to_other_camps_list(){
	$this->db->select('count(transfer_to_other_camps.t_id) as transfer')->from('transfer_to_other_camps');
	$this->db->where('transfer_to_other_camps.status',1);
	return $this->db->get()->row_array();
	}
	
	public function get_godown_stock_point_list(){
	$this->db->select('count(godown_stock.g_id) as godown_stocks')->from('godown_stock');
	$this->db->where('godown_stock.status',1);
	return $this->db->get()->row_array();
	}
	
	public function get_stock_list(){
	$this->db->select('count(stock.s_id) as stocks')->from('stock');
	$this->db->where('stock.status',1);
	return $this->db->get()->row_array();
	}
	
	/* admin*/
	
	public function get_employee_list_admin($e_id){
	$this->db->select('count(employee.e_id) as employees')->from('employee');
	$this->db->where('employee.status',1);
    $this->db->where('employee.admin_id',$e_id);
    $this->db->where('employee.role_id!=',1);	
    return $this->db->get()->row_array();
	}
	public function get_glpayment_list_admin($e_id){
	$this->db->select('count(gl_payment.g_id) as glpayments')->from('gl_payment');
	$this->db->where('gl_payment.status',1);
	$this->db->where('gl_payment.admin_id',$e_id);
    $this->db->where('gl_payment.role_id!=',1);
	return $this->db->get()->row_array();
	}
	public function get_order_cum_invoice_list_admin($e_id){
	$this->db->select('count(order_cum_invoice.o_id) as invoices')->from('order_cum_invoice');
	$this->db->where('order_cum_invoice.status',1);
	$this->db->where('order_cum_invoice.admin_id',$e_id);
    $this->db->where('order_cum_invoice.role_id!=',1);
	return $this->db->get()->row_array();
	}
	public function get_se_st_expenses_list_admin($e_id){
	$this->db->select('count(expenses.e_id) as expenses')->from('expenses');
	$this->db->where('expenses.status',1);
	$this->db->where('expenses.admin_id',$e_id);
    $this->db->where('expenses.role_id!=',1);
	return $this->db->get()->row_array();
	}
	
	
	public function get_sales_bulletin_list_admin($e_id){
	$this->db->select('count(sales_bulletin.s_id) as sales_bulletins')->from('sales_bulletin');
	$this->db->where('sales_bulletin.status',1);
	$this->db->where('sales_bulletin.admin_id',$e_id);
    $this->db->where('sales_bulletin.role_id!=',1);	
	return $this->db->get()->row_array();
	}
	
	public function get_transfer_to_other_camps_list_admin($e_id){
	$this->db->select('count(transfer_to_other_camps.t_id) as transfer')->from('transfer_to_other_camps');
	$this->db->where('transfer_to_other_camps.status',1);
	$this->db->where('transfer_to_other_camps.admin_id',$e_id);
    $this->db->where('transfer_to_other_camps.role_id!=',1);	
	return $this->db->get()->row_array();
	}
	
	public function get_godown_stock_point_list_admin($e_id){
	$this->db->select('count(godown_stock.g_id) as godown_stocks')->from('godown_stock');
	$this->db->where('godown_stock.status',1);
	$this->db->where('godown_stock.admin_id',$e_id);
    $this->db->where('godown_stock.role_id!=',1);	
	return $this->db->get()->row_array();
	}
	
	public function get_stock_list_admin($e_id){
	$this->db->select('count(stock.s_id) as stocks')->from('stock');
	$this->db->where('stock.status',1);
	$this->db->where('stock.admin_id',$e_id);
    $this->db->where('stock.role_id!=',1);	
	return $this->db->get()->row_array();
	}
	
	/* manager */
	
	public function get_employee_list_manager($e_id){
	$this->db->select('count(employee.e_id) as employees')->from('employee');
	$this->db->where('employee.status',1);
     $this->db->where('employee.manager_id',$e_id);
   $this->db->where('employee.role_id!=',1);
   $this->db->where('employee.role_id!=',2);	
    return $this->db->get()->row_array();
	}
	public function get_glpayment_list_manager($e_id){
	$this->db->select('count(gl_payment.g_id) as glpayments')->from('gl_payment');
	$this->db->where('gl_payment.status',1);
    $this->db->where('gl_payment.manager_id',$e_id);
   $this->db->where('gl_payment.role_id!=',1);
   $this->db->where('gl_payment.role_id!=',2);
	return $this->db->get()->row_array();
	}
	public function get_order_cum_invoice_list_manager($e_id){
	$this->db->select('count(order_cum_invoice.o_id) as invoices')->from('order_cum_invoice');
	$this->db->where('order_cum_invoice.status',1);
	 $this->db->where('order_cum_invoice.manager_id',$e_id);
   $this->db->where('order_cum_invoice.role_id!=',1);
   $this->db->where('order_cum_invoice.role_id!=',2);
	return $this->db->get()->row_array();
	}
	public function get_se_st_expenses_list_manager($e_id){
	$this->db->select('count(expenses.e_id) as expenses')->from('expenses');
	$this->db->where('expenses.status',1);
	$this->db->where('expenses.manager_id',$e_id);
   $this->db->where('expenses.role_id!=',1);
   $this->db->where('expenses.role_id!=',2);
	return $this->db->get()->row_array();
	}
	
	public function get_sales_bulletin_list_manager($e_id){
	$this->db->select('count(sales_bulletin.s_id) as sales_bulletins')->from('sales_bulletin');
	$this->db->where('sales_bulletin.status',1);
	$this->db->where('sales_bulletin.manager_id',$e_id);
   $this->db->where('sales_bulletin.role_id!=',1);
   $this->db->where('sales_bulletin.role_id!=',2);
	return $this->db->get()->row_array();
	}
	
	public function get_transfer_to_other_camps_list_manager($e_id){
	$this->db->select('count(transfer_to_other_camps.t_id) as transfer')->from('transfer_to_other_camps');
	$this->db->where('transfer_to_other_camps.status',1);
	$this->db->where('transfer_to_other_camps.manager_id',$e_id);
   $this->db->where('transfer_to_other_camps.role_id!=',1);
   $this->db->where('transfer_to_other_camps.role_id!=',2);
	return $this->db->get()->row_array();
	}
	
	public function get_godown_stock_point_list_manager($e_id){
	$this->db->select('count(godown_stock.g_id) as godown_stocks')->from('godown_stock');
	$this->db->where('godown_stock.status',1);
	$this->db->where('godown_stock.manager_id',$e_id);
   $this->db->where('godown_stock.role_id!=',1);
   $this->db->where('godown_stock.role_id!=',2);
	return $this->db->get()->row_array();
	}
	
	public function get_stock_list_manager($e_id){
	$this->db->select('count(stock.s_id) as stocks')->from('stock');
	$this->db->where('stock.status',1);
	$this->db->where('stock.manager_id',$e_id);
   $this->db->where('stock.role_id!=',1);
   $this->db->where('stock.role_id!=',2);
	return $this->db->get()->row_array();
	}
	
	
	
	/* group leader */
	
	public function get_employee_list_group_leader($e_id){
	$this->db->select('count(employee.e_id) as employees')->from('employee');
	$this->db->where('employee.status',1);
     $this->db->where('employee.group_leader',$e_id);
   $this->db->where('employee.role_id!=',3);
   $this->db->where('employee.role_id!=',2);
   $this->db->where('employee.role_id!=',1);
    return $this->db->get()->row_array();
	}
	public function get_glpayment_list_group_leader($e_id){
	$this->db->select('count(gl_payment.g_id) as glpayments')->from('gl_payment');
	$this->db->where('gl_payment.status',1);
    $this->db->where('gl_payment.group_leader',$e_id);
   $this->db->where('gl_payment.role_id!=',3);
   $this->db->where('gl_payment.role_id!=',2);
   $this->db->where('gl_payment.role_id!=',1);
	return $this->db->get()->row_array();
	}
	public function get_order_cum_invoice_list_group_leader($e_id){
	$this->db->select('count(order_cum_invoice.o_id) as invoices')->from('order_cum_invoice');
	$this->db->where('order_cum_invoice.status',1);
	 $this->db->where('order_cum_invoice.group_leader',$e_id);
   $this->db->where('order_cum_invoice.role_id!=',3);
   $this->db->where('order_cum_invoice.role_id!=',2);
   $this->db->where('order_cum_invoice.role_id!=',1);
	return $this->db->get()->row_array();
	}
	public function get_se_st_expenses_list_group_leader($e_id){
	$this->db->select('count(expenses.e_id) as expenses')->from('expenses');
	$this->db->where('expenses.status',1);
	 $this->db->where('expenses.group_leader',$e_id);
   $this->db->where('expenses.role_id!=',3);
   $this->db->where('expenses.role_id!=',2);
   $this->db->where('expenses.role_id!=',1);
	return $this->db->get()->row_array();
	}
	
	
	
	
	public function get_sales_bulletin_list_group_leader($e_id){
	$this->db->select('count(sales_bulletin.s_id) as sales_bulletins')->from('sales_bulletin');
	$this->db->where('sales_bulletin.status',1);
	 $this->db->where('sales_bulletin.group_leader',$e_id);
   $this->db->where('sales_bulletin.role_id!=',3);
   $this->db->where('sales_bulletin.role_id!=',2);
   $this->db->where('sales_bulletin.role_id!=',1);
	return $this->db->get()->row_array();
	}
	
	public function get_transfer_to_other_camps_list_group_leader($e_id){
	$this->db->select('count(transfer_to_other_camps.t_id) as transfer')->from('transfer_to_other_camps');
	$this->db->where('transfer_to_other_camps.status',1);
	 $this->db->where('transfer_to_other_camps.group_leader',$e_id);
   $this->db->where('transfer_to_other_camps.role_id!=',3);
   $this->db->where('transfer_to_other_camps.role_id!=',2);
   $this->db->where('transfer_to_other_camps.role_id!=',1);
	return $this->db->get()->row_array();
	}
	
	public function get_godown_stock_point_list_group_leader($e_id){
	$this->db->select('count(godown_stock.g_id) as godown_stocks')->from('godown_stock');
	$this->db->where('godown_stock.status',1);
	 $this->db->where('godown_stock.group_leader',$e_id);
   $this->db->where('godown_stock.role_id!=',3);
   $this->db->where('godown_stock.role_id!=',2);
   $this->db->where('godown_stock.role_id!=',1);
	return $this->db->get()->row_array();
	}
	
	public function get_stock_list_group_leader($e_id){
	$this->db->select('count(stock.s_id) as stocks')->from('stock');
	$this->db->where('stock.status',1);
	 $this->db->where('stock.group_leader',$e_id);
   $this->db->where('stock.role_id!=',3);
   $this->db->where('stock.role_id!=',2);
   $this->db->where('stock.role_id!=',1);
	return $this->db->get()->row_array();
	}
	
	
	
	
	
	
	
	
	
	
	/* executives */
	
	public function get_employee_list_executives($e_id){
	$this->db->select('count(employee.e_id) as employees')->from('employee');
	$this->db->where('employee.status',1);
     $this->db->where('employee.e_id',$e_id);
   $this->db->where('employee.role_id',5);
    return $this->db->get()->row_array();
	}
	public function get_glpayment_list_executives($e_id){
	$this->db->select('count(gl_payment.g_id) as glpayments')->from('gl_payment');
	$this->db->where('gl_payment.status',1);
    $this->db->where('gl_payment.created_by',$e_id);
   $this->db->where('gl_payment.role_id',5);
	return $this->db->get()->row_array();
	}
	public function get_order_cum_invoice_list_executives($e_id){
	$this->db->select('count(order_cum_invoice.o_id) as invoices')->from('order_cum_invoice');
	$this->db->where('order_cum_invoice.status',1);
	 $this->db->where('order_cum_invoice.created_by',$e_id);
   $this->db->where('order_cum_invoice.role_id',5);
	return $this->db->get()->row_array();
	}
	public function get_se_st_expenses_list_executives($e_id){
	$this->db->select('count(expenses.e_id) as expenses')->from('expenses');
	$this->db->where('expenses.status',1);
	$this->db->where('expenses.created_by',$e_id);
   $this->db->where('expenses.role_id',5);
	return $this->db->get()->row_array();
	}
	
	
	
	
	public function get_sales_bulletin_list_executives($e_id){
	$this->db->select('count(sales_bulletin.s_id) as sales_bulletins')->from('sales_bulletin');
	$this->db->where('sales_bulletin.status',1);
	$this->db->where('sales_bulletin.created_by',$e_id);
   $this->db->where('sales_bulletin.role_id',5);
	return $this->db->get()->row_array();
	}
	
	public function get_transfer_to_other_camps_list_executives($e_id){
	$this->db->select('count(transfer_to_other_camps.t_id) as transfer')->from('transfer_to_other_camps');
	$this->db->where('transfer_to_other_camps.status',1);
	$this->db->where('transfer_to_other_camps.created_by',$e_id);
   $this->db->where('transfer_to_other_camps.role_id',5);
	return $this->db->get()->row_array();
	}
	
	public function get_godown_stock_point_list_executives($e_id){
	$this->db->select('count(godown_stock.g_id) as godown_stocks')->from('godown_stock');
	$this->db->where('godown_stock.status',1);
	$this->db->where('godown_stock.created_by',$e_id);
   $this->db->where('godown_stock.role_id',5);	
	return $this->db->get()->row_array();
	}
	
	public function get_stock_list_executives($e_id){
	$this->db->select('count(stock.s_id) as stocks')->from('stock');
	$this->db->where('stock.status',1);
	$this->db->where('stock.created_by',$e_id);
   $this->db->where('stock.role_id',5);
	return $this->db->get()->row_array();
	}
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	

}