<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class Cart extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        if($this->session->userdata('sid') == ''){ redirect('login','refresh'); }
        $this->load->model('m_cart');
        $this->uid = $this->session->userdata('sid');
        $this->load->model('m_cart');
        $this->data['cart_item'] = $this->m_cart->cart_item($this->session->userdata('sid'));
        $this->load->model('m_web');
        $this->data['categories'] = $this->m_web->categories();
    }

    public function index($pid = null)
    {
        $data['breadcrumbs'] = FALSE;
        $data['title'] = 'Cart';

        $qty = $this->input->post('qty');
        $brand = $this->input->post('brand');

        if (empty($qty)) { $qty = 1; }
        if (empty($brand)) { $brand = ''; }
        
        $datas = array('qty' => $qty, 'barand_price' => $brand, 'product' => $pid);
        $this->m_cart->addTocart($datas, $this->uid);

        // $data['cart'] = $this->m_cart->getCart($this->uid);
        $this->load->view('pages/cart', $data, FALSE);
    }

    // ajax shoping cart
    public function get_cart()
    {
        $items = ''; $cout = 0; $total = 0;
        $cart = $this->m_cart->getCart($this->uid);
       
        if(!empty($cart)){
            foreach ($cart as $key => $value) {
                $brselect = '';
                $nselect = '';
            $brprice = $this->m_cart->brandpriceFect($value->prid);
            
                foreach ($brprice as $keys => $values) {
                    if(!empty($values)){
                        $brselect .= '<option value="'.$values->id.'">'.$values->title.'</option>';
                    }
                        
                }

                if(!empty($brprice)){
                    $nselect .= '<div class="brand-charge">
                                    <div class="footer-detail">
                                        <div class="quanlity-box">
                                            <div class="colors">
                                            <select name="brandCharge"> 
                                            <option value="">Branding Charges</option>
                                            '.$brselect.' 
                                            </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>';
                    
                }else{
                    $nselect .= '';
                }
           
            

            $amount =  ($value->price * $value->qty) + ($value->qty * $value->bprice );
            $total = $total + $amount;
                $items .= '<div class="cart-items">
                <div class="cart-item" dataid="'.$value->cid.'">
                    <div class="row">
                        <a class="remove-btn" href="'.base_url("delete-cart/").$value->cid.'"><img src="'.base_url().'assets/images/icons/delete.png" /><span> Remove </span></a>
                        <div class="col-8">
                            <div class="cart-item-content">
                                <div class="c-title">
                                    <span><a href="'.base_url("product/").$value->product_id.'">'. $value->ptitle .'</a></span>
                                    
                                </div>
                                <div class="c-category">
                                    <p><span>'. $value->name .'</span> </p>
                                    <p><span>SKU: </span> '. $value->product_id .'</p>
                                </div>
                                <div class="c-price">
                                    <p>&#8377;
                                        <span>'.$amount.'</span>
                                    </p>
                                </div>

                            </div>
                        </div>

                        <div class="col-4">
                            <div class="cart-item-image">
                                <img src="'.base_url().$value->image_path .'" class="" alt="">

                            </div>
                        </div>

                        <div class="col-6 col-sm-8">
                            '.$nselect.'
                        </div>
                        <div class="col-6 col-sm-4">
                            <div class="cart-item-image">
                                <div class="quanlity">
                                    <span class="btn-down"></span>
                                    <input type="number" class="qtyi" name="number"
                                        value="'. $value->qty .'" min="1" max="100"
                                        placeholder="Quanlity">
                                    <span class="btn-up"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                </div>';   

            }
        }else{
            $items .= '<div class="cart-items text-center">
                <center><img src="'.base_url().'assets/images/emptycart.png" style="max-width: 260px; width: 100%;"><center> 
                <h2>Cart is empty</h2> 
                </div>';
        }


        $data = array(
            'items' => $items,
            'count' => count($cart),
            'total' => '&#8377; '. $total,
        );
        echo json_encode($data);
    }

    // cart
    public function cartitem($var = null)
    {
        $data['breadcrumbs'] = FALSE;
        $data['title'] = 'Cart';
        $this->load->view('pages/cart', $data, FALSE);
    }

    // delete cart item
    public function deleteCart($pid)
    {
       $this->m_cart->deletecart($pid,  $this->uid);
    //    redirect('cart','refresh');  
    }

    // update qty
    public function update_qty()
    {
       $cid = $this->input->post('id');
       $qty = $this->input->post('qty');
       $data = array('qty' =>$qty);
       $this->m_cart->setQty($cid, $data, $this->uid);
    }


    // checkout
    public function checkout($var = null)
    {
        $data['cart'] = $this->m_cart->getCart($this->uid);
        $data['shipping'] = $this->m_cart->getShipping($this->uid);
        $data['billing'] = $this->m_cart->getBilling();
        $this->load->model('m_account');
        $data['user'] = $this->m_account->profileGet($this->uid);
        $this->load->view('pages/checkout', $data, FALSE);
        
       
    }

    //  add shipping address
    public function save_shipping()
    {
        $input = $this->input->post();   
        $data = array(
           'name'       => $input['name'], 
           'street'     => $input['street'], 
           'street1'    => $input['street1'], 
           'religion'   => $input['state'], 
           'city'       => $input['city'], 
           'zip_code'   => $input['zip'], 
           'employee'   => $this->uid, 
           'status'     => 1,
           'phone'      =>  $input['phone'],
        );    
        $this->m_cart->saveShipping($data, $this->uid);
        if( !empty($input['addnew'])){
            $this->session->set_flashdata('success', 'Shipping address added successfuly');
            redirect('shipping-address','refresh');
        }else{
            redirect('checkout','refresh');
            
        }
    }



    // shipping address update
    public function shipping_change()
    {
        $this->m_cart->cahnge_address($this->input->post('id'), $this->uid);
    }

   //store bill address in sessio
    public function bill_session($var = null)
    {
        $billid = $this->input->get('biilid');
        $billsess = array(
            'bill_id'  => $billid
        );
        $this->session->set_userdata($billsess);
        
       echo $this->session->userdata('bill_id');
        
    }

    // place order
    public function place_order(Type $var = null)
    {
       $puropse = $this->input->post('purpose');
       $team = $this->input->post('team');
       
       $this->userorders($puropse,$team);
       $this->session->set_flashdata('msg', 'order placed');
       $this->session->unset_userdata('bill_id');
       redirect('my-orders','refresh');
       
    }

    // fetch all order destil
    public function userorders($puropse='',$team='')
    {
        $this->load->helper('string');
        $bach = 'SMB-'.random_string('numeric', 14);
        if(empty($this->session->userdata('bill_id')))
        {
            $shipping = $this->m_cart->getdefaultShipping($this->uid);
        }
        $cartitesms = $this->m_cart->getCart($this->uid);

        foreach ($cartitesms as $key => $value) {
            $orderid = 'SMG-'.random_string('numeric', 14);
            $data  = array(
                'order_id'      => $orderid, 
                'order_bach'    => $bach, 
                'product'       =>  $value->prid, 
                'order_by'      => $this->uid, 
                'brand_price'   =>  $value->bprice, 
                'qty'           =>  $value->qty, 
                'price'         =>  $value->price,
                'team'          => $team,
                'purpose'       => $puropse
            );

            if (!empty($this->session->userdata('bill_id'))) {
                $data['billing'] = $this->session->userdata('bill_id');
                $data['shipping'] = '0';
                $address['bill'] = $this->m_cart->selectedbilling($data['billing']);
                $address['ship'] = $this->m_cart->selectedbilling($data['billing']);
            }else{
                $data['billing'] = $this->input->post('bill_val');
                $data['shipping'] = $shipping;
                $address['bill'] = $this->m_cart->selectedbilling($data['billing']);
                $address['ship'] = $this->m_cart->selectedship($shipping);
            }

            $this->m_cart->insertOrder($data);
            $this->sendorder($cartitesms,$bach,$address);
        }
    }

    // change brand
    public function change_brand($var = null)
    {
       $id = $this->input->post('ids');
       $prd = $this->input->post('prd');
       $this->m_cart->updateBrand($id, $prd);
       echo $id;
    }


        //  place order request
        function sendorder($cartitesms='', $bach='',$address='')
        {

            $c_email = $this->m_cart->getuseremail($this->uid);
            $data['detail'] = $cartitesms;
            $data['bach']   = $bach;
            $data['bill']   = $address['bill'];
            $data['ship']   = $address['ship'];
            $this->load->config('email');
            $this->load->library('email');
            $from = $this->config->item('smtp_user');
            $msg = $this->load->view('email/place-order', $data, true);
            $this->email->set_newline("\r\n");
            $this->email->from($from , 'Gifting Express');
            $this->email->to($c_email);
            $this->email->subject('Purchase order request'); 
            $this->email->message($msg);
            if($this->email->send())  
            { 
                return true;
            } 
            else
            {
                return false;
            }
            
        }

}

/* End of file Cart.php */