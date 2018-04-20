<?php
require_once __DIR__ . '/config.php';
require_once __DIR__ . '/src/autoload.php';

use GoogleCloudVisionPHP\GoogleCloudVision;

if(isset($_POST['detect_type']) && !empty($_POST['detect_type'])){
	//$cvurl = "https://vision.googleapis.com/v1/images:annotate?key=".$apiKey;
	$type = (string)$_POST['detect_type'];
        $error = array();
        
        if(isset($_FILES["file"]["type"]))
	{
	$validextensions = array("jpeg", "jpg", "png");
	$temporary = explode(".", $_FILES["file"]["name"]);
	$file_extension = end($temporary);
	if ((($_FILES["file"]["type"] == "image/png") || ($_FILES["file"]["type"] == "image/jpg") || ($_FILES["file"]["type"] == "image/jpeg")
	) && ($_FILES["file"]["size"] < 100000)//Approx. 100kb files can be uploaded.
	&& in_array($file_extension, $validextensions)) {
	if ($_FILES["file"]["error"] > 0)
	{
	echo "Return Code: " . $_FILES["file"]["error"] . "<br/><br/>";
	}
	else
	{
            $sourcePath = $_FILES['file']['tmp_name']; // Storing source path of the file in a variable
            $data = file_get_contents($sourcePath);
            //convert it to base64
            $gcv = new GoogleCloudVision();
            $gcv->setKey($apiKey);
            $gcv->setImage($data, "RAW");
            
            switch($type){
                case "LABEL_DETECTION":
                    $gcv->addFeatureLabelDetection(1);
                    $response = $gcv->request();
                        
                    if(!empty($response['error'])){
                        $error['status'] = "error";
                        $error['msg'] = $response['error']['message'];
                        echo json_encode($error);
                    }else{
                        var_dump($gcv->request());
                    }
                break;
                case "TEXT_DETECTION":
                    $gcv->addFeatureOCR(1);
                    $response = $gcv->request();
                        
                    if(!empty($response['error'])){
                        $error['status'] = "error";
                        $error['msg'] = $response['error']['message'];
                        echo json_encode($error);
                    }else{
                        var_dump($gcv->request()); 
                    }
                break;
                case "FACE_DETECTION":
                    $gcv->addFeatureFaceDetection(1);
                    $response = $gcv->request();
                        
                    if(!empty($response['error'])){
                        $error['status'] = "error";
                        $error['msg'] = $response['error']['message'];
                        echo json_encode($error);
                    }else{
                        var_dump($gcv->request()); 
                    }
                break;
                case "LANDMARK_DETECTION":
                    $gcv->addFeatureLandmarkDetection(1);
                    $response = $gcv->request();
                        
                    if(!empty($response['error'])){
                        $error['status'] = "error";
                        $error['msg'] = $response['error']['message'];
                        echo json_encode($error);
                        die;
                    }else{
                        var_dump($gcv->request()); 
                    }
                break;
                case "LOGO_DETECTION":
                    $gcv->addFeatureLogoDetection(1);
                    $response = $gcv->request();
                        
                    if(!empty($response['error'])){
                        $error['status'] = "error";
                        $error['msg'] = $response['error']['message'];
                        echo json_encode($error);
                    }else{
                        var_dump($gcv->request()); 
                    }
                break;
                case "SAFE_SEARCH_DETECTION":
                    $gcv->addFeatureSafeSeachDetection(1);
                    $response = $gcv->request();
                        
                    if(!empty($response['error'])){
                        $error['status'] = "error";
                        $error['msg'] = $response['error']['message'];
                        echo json_encode($error);
                    }else{
                        var_dump($gcv->request()); 
                    }
                break;
                case "IMAGE_PROPERTIES":
                    $gcv->addFeatureImageProperty(1);
                    $response = $gcv->request();
                        
                    if(!empty($response['error'])){
                        $error['status'] = "error";
                        $error['msg'] = $response['error']['message'];
                        echo json_encode($error);
                    }else{
                        var_dump($gcv->request()); 
                    }
                break;
            }
		
	}
	}
	else
	{
            $error['status'] = "error";
            $error['msg'] = "***Invalid file Size or Type***";
            echo json_encode($error);
	}
	}	
}else{
        $error['status'] = "error";
        $error['msg'] = "***Cannot Select Detection Type***";
        echo json_encode($error);
}
?>