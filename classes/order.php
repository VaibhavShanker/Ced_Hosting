<?php
// session_start();
require 'Dbconnect.php';
class order
{
    public $user_id;    
    public $user_billing_id;
    public $order_date;
    public $status;
    public $promocode_applied_id;
    public $discount_amt;    
    public $total_amt_after_dis;
    public $tax_amt;
    public $final_invoice_amt;
}