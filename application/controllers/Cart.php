<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class Cart extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        if($this->session->userdata('sid') == ''){ redirect('login','refresh'); }
        $this->load->model('m_cart');
        $this->uid = $this->session->userdata('sid');
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

        foreach ($cart as $key => $value) {
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
                        <div class="brand-charge">
                            <div class="footer-detail">
                                <div class="quanlity-box">
                                    <div class="colors">
                                        <select name="brandCharge">
                                            <option value="">Select Color</option>
                                            <option value="">Black</option>
                                            <option value="">Red</option>
                                            <option value="">White</option>
                                        </select>
                                    </div>
                                </div><!-- /.quanlity-box -->
                            </div>
                        </div>
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
        $this->load->view('pages/checkout', $data, FALSE);
        
       
    }

}

/* End of file Cart.php */