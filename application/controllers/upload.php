<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Upload extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper(array('form', 'url', 'file'));
    }

    public function index() {
        $this->load->view('upload/upload', array('error' => ''));
    }

    public function do_upload() {
        
        $id = $_GET['pro_id'];
        if($id)
        {
            $upload_path_url = base_url() . 'projects/'.$id.'/';
            $upload_path_n = FCPATH . 'projects/'.$id.'/';
            if (!file_exists($upload_path_n)) {
                mkdir($upload_path_n, 0777, true);
            }
            if (!file_exists($upload_path_n.'/thumbs/')) {
                mkdir($upload_path_n.'/thumbs/', 0777, true);
            }
            $config['upload_path'] = FCPATH . 'projects/'.$id.'/';
            $delete_url = base_url() . 'upload/deleteImageEdit/?id='.$id.'&file=';
        }
        else
        {
            $upload_path_url = base_url() . 'files/';
            if (!file_exists(FCPATH . 'files/')) {
                mkdir(FCPATH . 'files/', 0777, true);
            }
            if (!file_exists(FCPATH . 'files/'.'/thumbs/')) {
                mkdir(FCPATH . 'files/'.'/thumbs/', 0777, true);
            }
            $config['upload_path'] = FCPATH . 'files/';  
            if($_GET['first'] == 1)     
            {
                $files = glob('files/*');             
                foreach($files as $file){
                    if(is_file($file))
                    unlink($file); //delete file
                }
                $files = glob('files/thumbs/*'); 
                foreach($files as $file){
                    if(is_file($file))
                    unlink($file); //delete file
                }
            }     
            
            $delete_url = base_url() . 'upload/deleteImage/?file=';
        }        
        
        $config['allowed_types'] = 'jpg|jpeg|png|gif';
        $config['max_size'] = '30000';
        $this->load->library('upload', $config);        
        if (!$this->upload->do_upload()) {             
            $message = $this->upload->display_errors('','');             
            if(isset($_GET['first']) && $_GET['first'] == 1)
            {
                //Load the list of existing files in the upload directory
                $existingFiles = get_dir_file_info($config['upload_path']);
                $foundFiles = array();
                $f=0;
                foreach ($existingFiles as $fileName => $info) {
                  if($fileName!='thumbs'){//Skip over thumbs directory
                    //set the data for the json array   
                    $foundFiles[$f]['name'] = $fileName;
                    $foundFiles[$f]['size'] = $info['size'];
                    $foundFiles[$f]['url'] = $upload_path_url . $fileName;
                    $foundFiles[$f]['thumbnailUrl'] = $upload_path_url . 'thumbs/' . $fileName;
                    $foundFiles[$f]['deleteUrl'] = $delete_url. $fileName;
                    $foundFiles[$f]['deleteType'] = 'DELETE';
                    $foundFiles[$f]['error'] = null;    
                    $f++;
                  }
                }    
            }
            else
            {
                 if($message == 'You did not select a file to upload.') 
                {   
                    //Load the list of existing files in the upload directory
                    $existingFiles = get_dir_file_info($config['upload_path']);
                    $foundFiles = array();
                    $f=0;
                    foreach ($existingFiles as $fileName => $info) {
                      if($fileName!='thumbs'){//Skip over thumbs directory
                        //set the data for the json array   
                        $foundFiles[$f]['name'] = $fileName;
                        $foundFiles[$f]['size'] = $info['size'];
                        $foundFiles[$f]['url'] = $upload_path_url . $fileName;
                        $foundFiles[$f]['thumbnailUrl'] = $upload_path_url . 'thumbs/' . $fileName;
                        $foundFiles[$f]['deleteUrl'] = $delete_url. $fileName;
                        $foundFiles[$f]['deleteType'] = 'DELETE';
                        $foundFiles[$f]['error'] = null;    
                        $f++;
                      }
                    }    
                }
                else
                {      
                        $foundFiles = array();$f=0;
                        $foundFiles[$f]['name'] = $_FILES['userfile']['tmp_name'];
                        $foundFiles[$f]['size'] = null;
                        $foundFiles[$f]['url'] = null;
                        $foundFiles[$f]['thumbnailUrl'] = null;
                        $foundFiles[$f]['deleteUrl'] = null;
                        $foundFiles[$f]['deleteType'] = 'DELETE';
                        $foundFiles[$f]['error'] = 'The uploaded file exceeds the maximum allowed size';    
                }
            }
           
                       
            $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode(array('files' => $foundFiles)));
        } else {
            
            $data = $this->upload->data();            
            // to re-size for thumbnail images un-comment and set path here and in json array
            $config = array();
            $config['image_library'] = 'gd2';
            $config['source_image'] = $data['full_path'];
            $config['create_thumb'] = TRUE;
            $config['new_image'] = $data['file_path'] . 'thumbs/';
            $config['maintain_ratio'] = TRUE;
            $config['thumb_marker'] = '';
            $config['width'] = 75;
            $config['height'] = 50;
            $this->load->library('image_lib', $config);
            $this->image_lib->resize();

            //set the data for the json array
            $info = new StdClass;
            $info->name = $data['file_name'];
            $info->size = $data['file_size'] * 1024;
            $info->type = $data['file_type'];
            $info->url = $upload_path_url . $data['file_name'];
            // I set this to original file since I did not create thumbs.  change to thumbnail directory if you do = $upload_path_url .'/thumbs' .$data['file_name']
            $info->thumbnailUrl = $upload_path_url . 'thumbs/' . $data['file_name'];
            $info->deleteUrl = $delete_url. $data['file_name'];
            $info->deleteType = 'DELETE';
            $info->error = null;

            $files[] = $info;
            //this is why we put this in the constants to pass only json data
            if (IS_AJAX) {
                echo json_encode(array("files" => $files));
                //this has to be the only data returned or you will get an error.
                //if you don't give this a json array it will give you a Empty file upload result error
                //it you set this without the if(IS_AJAX)...else... you get ERROR:TRUE (my experience anyway)
                // so that this will still work if javascript is not enabled
            } else {
                $file_data['upload_data'] = $this->upload->data();
                $this->load->view('upload/upload_success', $file_data);
            }
        }
    }

    public function deleteImage() {//gets the job done but you might want to add error checking and security
        
        $file = $this->input->get('file');
        $success = unlink(FCPATH . 'files/' . $file);
        $success = unlink(FCPATH . 'files/thumbs/' . $file);
        //info to see if it is doing what it is supposed to
    $info = new StdClass;
        $info->sucess = $success;
        $info->path = base_url() . 'files/' . $file;
        $info->file = is_file(FCPATH . 'files/' . $file);

        if (IS_AJAX) {
            //I don't think it matters if this is set but good for error checking in the console/firebug
            echo json_encode(array($info));
        } else {
            //here you will need to decide what you want to show for a successful delete        
            $file_data['delete_data'] = $file;
            $this->load->view('upload/delete_success', $file_data);
        }
    }
    
     public function deleteImageEdit() {//gets the job done but you might want to add error checking and security
        
        $file = $this->input->get('file');
        $id =  $this->input->get('id');
        $success = unlink(FCPATH . 'projects/'.$id.'/' . $file);
        $success = unlink(FCPATH . 'projects/'.$id.'/thumbs/' . $file);
        //info to see if it is doing what it is supposed to
        $info = new StdClass;
        $info->sucess = $success;
        $info->path = base_url() . 'projects/'.$id.'/' . $file;
        $info->file = is_file(FCPATH . 'projects/'.$id.'/' . $file);

        if (IS_AJAX) {
            //I don't think it matters if this is set but good for error checking in the console/firebug
            echo json_encode(array($info));
        } else {
            //here you will need to decide what you want to show for a successful delete        
            $file_data['delete_data'] = $file;
            $this->load->view('upload/delete_success', $file_data);
        }
    }
    function file_upload_max_size() {
          static $max_size = -1;
        
          if ($max_size < 0) {
            // Start with post_max_size.
            $max_size = parse_size(ini_get('post_max_size'));
        
            // If upload_max_size is less, then reduce. Except if upload_max_size is
            // zero, which indicates no limit.
            $upload_max = parse_size(ini_get('upload_max_filesize'));
            if ($upload_max > 0 && $upload_max < $max_size) {
              $max_size = $upload_max;
            }
          }
          return $max_size;
        }
        
        function parse_size($size) {
          $unit = preg_replace('/[^bkmgtpezy]/i', '', $size); // Remove the non-unit characters from the size.
          $size = preg_replace('/[^0-9\.]/', '', $size); // Remove the non-numeric characters from the size.
          if ($unit) {
            // Find the position of the unit in the ordered string which is the power of magnitude to multiply a kilobyte by.
            return round($size * pow(1024, stripos('bkmgtpezy', $unit[0])));
          }
          else {
            return round($size);
          }
        }

}