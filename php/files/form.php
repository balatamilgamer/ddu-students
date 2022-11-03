<form action="" method="post" enctype="multipart/form-data">
    <input type="file" name="file_upload" id="" />
    <input type="submit" value="Upload" />
</form>

<?php

print_r($_FILES);

if(isset($_FILES['file_upload'])){
    print_r($_FILES);

    $file_name = $_FILES['file_upload']['name'];
    $file_tmp = $_FILES['file_upload']['tmp_name'];
    $file_size = $_FILES['file_upload']['size'];

    $file_ext = explode('.', $file_name);
    $file_ext = strtolower(end($file_ext));


    // echo 

    // move_uploaded_file($file_tmp, $file_destination);



    $allowed = array('jpg', 'jpeg', 'png', 'gif', 'JPG', 'JPEG', 'PNG', 'GIF', 'pdf', 'PDF');

    if(in_array($file_ext, $allowed)){
        if($file_size <= 2097){

            $file_destination = 'upload/'.time().$file_name;

            if(move_uploaded_file($file_tmp, $file_destination)){
                echo $file_destination;
            } else{
                echo "Error";
            }
        } else{
            echo 'File size must be less than 2MB';
        }
    } else{
        echo 'File type not allowed';
    }
}

?>