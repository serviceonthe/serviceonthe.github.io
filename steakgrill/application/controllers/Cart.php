<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cart extends CI_Controller {
    function __construct()
    {
        parent::__construct();
        $this->load->model('price_comparison_model');
        $this->load->model('order_model');
    }

    function add_to_cart(){

        $item_id = $this->input->post('item_id');
        $item_qty = $this->input->post('qty');
        //$item_price = $this->input->post('price');

        // if($item_price==0){
        //   $item_price =.01;
        // }

        $itemData = $this->price_comparison_model->getItemDataById($item_id);

        //var_dump($itemData);
        //echo json_encode($itemData); 
        
        if (!empty($itemData)) {
            $flag = TRUE;
            $cart_data = $this->cart->contents();
            foreach ($cart_data as $item) {
                if ($item['id'] == $item_id) {
                    $data = array(
                        'rowid' => $item['rowid'],
                        'qty' => $item['qty']+$item_qty
                    );
                    $this->cart->update($data);
                    $flag = FALSE;
                    break;
                }
            }
            if ($flag) {
                $cart_item = array(
                    'id' => $itemData->item_id,
                    'qty' => $item_qty,
                    'price' => $itemData->price,
                    'name' => $itemData->item_name,
//                    'options' => array('Size' => 'L', 'Color' => 'Red')
                );
                $this->cart->insert($cart_item);
            }

            $c=$this->cart->contents();
            $q=0;
            $p=0;
            if($c){
                foreach ($c as $key => $value) {
                    $q+=$value['qty'];
                    $p+=$value['subtotal'];
                }
            }
            $r=array(
                'qty'=>$q,
                'price'=>$p
                );
            echo json_encode($r);
        }
        else{

        }
    }

    //        Remove item from cart
    function remove_from_cart() {
        $item_id = $this->input->post('item_id');
        $data = array(
            'rowid' => $item_id,
            'qty' => 0
        );
        $this->cart->update($data);

        $c=$this->cart->contents();
            $q=0;
            $p=0;
            if($c){
                foreach ($c as $key => $value) {
                    $q+=$value['qty'];
                    $p+=$value['subtotal'];
                }
            }
            $r=array(
                'qty'=>$q,
                'price'=>$p
                );
            echo json_encode($r);
    }

// Incrase Cart Item Qty
    function increase_item_quantity() {
        $item_id = $this->input->post('item_id');  
        $c=$this->cart->contents();
        $qty=$c[$item_id]['qty']+1;
        $data = array(
            'rowid' => $item_id,
            'qty' => $qty
        );
        $this->cart->update($data);
        /*if($this->cart->update($data)){
           echo 'Incrased Item Qty.'; 
        }else{
            echo 'Failed to incrase item qty.';
        }
*/
        $cu=$this->cart->contents();
        $q=0;
        $p=0;
        if($c){
            foreach ($cu as $key => $value) {
                $q+=$value['qty'];
                $p+=$value['subtotal'];
            }
        }
        $r=array(
            'qty'=>$q,
            'price'=>$p
            );
        echo json_encode($r);        
    }
    // Decrase Cart Item Qty
    function decrease_item_quantity() {
        $item_id = $this->input->post('item_id'); 
        $c=$this->cart->contents();
        $qty=$c[$item_id]['qty']-1;
        $data = array(
            'rowid' => $item_id,
            'qty' => $qty
        );
        $this->cart->update($data);
        $cu=$this->cart->contents();
        $q=0;
        $p=0;
        if($c){
            foreach ($cu as $key => $value) {
                $q+=$value['qty'];
                $p+=$value['subtotal'];
            }
        }
        $r=array(
            'qty'=>$q,
            'price'=>$p
            );
        echo json_encode($r);
    }    

        //Function for update cart exitsing product quantity
    function update_cart() {
        $item_id = $this->input->post('item_id');
        $item_quantity = $this->input->post('item_quantity');
        $data = array(
            'rowid' => $item_id,
            'qty' => $item_quantity
        );
        $this->cart->update($data);
        echo 'Item Updated';
    }

    // Distroy Existing Cart
    function empty_cart()
    {
        $this->session->unset_userdata('cartRestuarantId');
        $this->cart->destroy();
        return "Cart Empty";
    }


    function coupon($number){
        echo $number;
        // 'voucher_number'
    }
    
    
    public function getItemPrice() {
        $item_id = $this->input->post('item_id'); 
        $itemData = $this->order_model->geItemData($item_id);
        $data['price']=$itemData->price; 
        
            echo json_encode($data); 
     
    }

    
}