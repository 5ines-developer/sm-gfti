<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Offers_model extends CI_Model {


    /**
	 * Offers -> Insert offers data 
	 * @url : insert-banner
	 * @param : position,uniq,image,link
	 * 
	 */
        public function insert($insert)
		{
			$this->db->where('uniq', $insert['uniq']);
			$query = $this->db->get('offers');
			if ($query->num_rows() > 0) 
			{
                
                $result = $this->checkposition($insert);

				// $this->db->where('uniq', $insert['uniq']);
				// return $this->db->update('offers', $insert);
			}
			else
			{
				return $this->db->insert('offers',$insert);
			}
        }

        public function checkposition($insert)
		{

            $query = $this->db->get('offers');
            foreach ($query->result() as $key => $value) {
                // echo 'mst-'. $value->position.'<br>';
                if($this->input->post('opst') > $insert['position']){

                    if($insert['position'] >=  $value->position  && $value->position != $this->input->post('opst') && $value->position >= $insert['position'] ){
                        echo $value->id.' id <br>';
                        echo $value->position + 1 .' n <br>';
                        echo $value->position.' p <br><br>';
                        // $this->db->where('id',  $value->id)->update('offers', array('position' => $value->position + 1 ));
                    }
                    elseif($this->input->post('opst') == $value->position){
                        echo $value->id.' id <br>';
                        echo  $insert['position'].' n<br><br>';
                        // $this->db->where('id',  $value->id)->update('offers', array('position' => $insert['position'] ));
                    }elseif($this->input->post('opst') < $value->position){
                        echo $value->id.' id <br>';
                        echo  $insert['position'].' n<br><br>';
                        echo  $value->position.' p<br><br>';

                        // $this->db->where('id',  $value->id)->update('offers', array('position' => $value->position + 1 ));
                    }

                }else{
                    


                }
                    // if ($insert['position'] < $value->position) {
                    //     echo '>'. $value->position.'<br>';
                    // }
                    // elseif($insert['position'] == $value->position){
                    //     echo '='.$value->position .'<br>';
                    // }
                    // else{
                    //     echo '<'. $value->position.'<br>';
                    // }
               
               
               
            }

            
            
         
            exit;

        }

        

        /**
         * get offer
         * @url : manage-offers
         * 
        */
        public function getoffer()
		{
            $this->db->order_by('position', 'asc');
			$query = $this->db->get('offers');
			if ($query->num_rows() > 0) 
			{
				
				return $query->result();
			}
			else
			{
				return false;
			}
        }

        /**
         * delete offer 
         * @url : delete-offers
         * @param : id
         * 
        */
        public function deleteoffer($id)
		{
			$this->db->where('id', $id);
			return $this->db->delete('offers');
        }
        
        /**
         * offer -> edit offer
         * url : edit-offers
         * @param : id
        */
        public function edit_Offers($id)
		{
            $this->db->where('id', $id);
			$query = $this->db->get('offers');
			if ($query->num_rows() > 0) 
			{
				
				return $query->row_array();
			}
			else
			{
				return false;
			}
		}

        
    

}

/* End of file ModelName.php */
