<?php
    
    include('path/to/db_controller.php');

    $conn->select_db(database: "Alumni");
    session_start();

    if ($_POST) 
    {
        $post = $_POST;
        echo "<pre>";
        print_r($post);
        if ($post['full_name'] && $post['email'] && $post['objective'] && $post['mobile_no'] && $post['dob'] && $post['religion'] && 
            $post['nationality'] && $post['marital_status'] && $post['hobbies'] && $post['languages'] && $post['address']) 
        {
         
            foreach($post as $index=>$value){
                $$index=$db->real_escape_string($value);    
                $columns.=$index.',';

            }

         echo $columns;  
        
        try{
             $query ="INSERT INTO resumes";   
        }
        }
        else 
        {
            echo "All fields are required.";
        }
    }
?>