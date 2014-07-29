<?php
class GSM_function {
    private $_CI;
    
    public function __construct()
    {
         setlocale(LC_CTYPE, 'fr_FR.UTF8');
        $this->_CI =& get_instance();
        
    }
     function highlightWords($text, $words, $colors=null){
        
               
                        /*** loop of the array of words ***/
                        foreach ($words as $word)
                        {
                              
                             // $word = htmlspecialchars($word, ENT_QUOTES);
                                /*** quote the text for regex ***/
                                $word = preg_quote($word);
                                
                            
                                
                                $worde=trim($word);
                                /*** highlight the words ***/
                                 $worde=trim(preg_replace('/([^.a-z0-9]+)/i', ' ', $worde));
                                 $worde=trim(preg_replace('#[^.0-9a-z]+#i', ' ', $worde));
                                 $worde= preg_replace ("/(\p{P})/", ' ', $worde);
                                 //$text = preg_replace("/($worde)/i", '<em>\1</em>', $text);
                                 $text = preg_replace("/\b($worde)/i", '<em>\1</em>', $text);
                                 //$text = preg_replace('/\b'.$worde.'/i', '<em>'.$worde.'</em>',$text);
                        }
                        /*** return the text ***/
                        return $text;
     }
     
    function my_highlight_phrase($phrase, $aTrueMot, $tag_open = '<strong>', $tag_close = '</strong>')
	{
	   /*
        if (preg_match("/a/i", "PHP is the web scripting language of choice.")) {
            echo "A match was found.";
        } else {
            echo "A match was not found.";
        }
        
        */
        
        $remplcamets = array(
        
            "à" => "a" , 
            "ã" => "a",
            "ä" => "a" , 
            "â" => "a", 
            "@" => "a" ,
               
            "é" => "e" , 
            "è" => "e" , 
            "ë" => "e" , 
            "ê" => "e" ,
            "ée" =>"ee" ,
            "école" => "ecole",
            "réalise"=> "realise",
            
            
            "ï" => "i" , 
            "î" => "i" , 
            "ì" => "i" , 
            
            "ü" => "u" , 
            "ù" => "u" , 
            "û" => "u" , 
            
            "ô" => "o" , 
            "ö" => "o" , 
            
        );
        
        $aBigTring ="";
        
        
        
        
        foreach($remplcamets as $key=>$value){
            
            //echo substr_count($text, 'est');
            
            $aBigTring = $aBigTring ." ".str_replace($value , utf8_encode($key), $aTrueMot);
        }
        
        //echo "<br>==> aBigTring".$aBigTring.".<br>";
        
        $aTrueMot = $aBigTring ." ".$aTrueMot;
       
        $ArrayWord = explode(' ', trim($aTrueMot));
        
        //var_dump($ArrayWord);
        
        
        $ArrayWord = array_unique($ArrayWord);
        
       // var_dump($ArrayWord);
       
       
        foreach($ArrayWord as $word){
            $phrase = highlight_phrase($phrase, $word, $tag_open, $tag_close); 
        }
        
        return $phrase;
	}
     
     /**
      * Rédimensionner l'image uploadé 
      */
     function resizeImage($image,$width,$height,$scale) {
    	$image_data = getimagesize($image);
    	$imageType = image_type_to_mime_type($image_data[2]);
    	$newImageWidth = ceil($width * $scale);
    	$newImageHeight = ceil($height * $scale);
    	$newImage = imagecreatetruecolor($newImageWidth,$newImageHeight);
    	switch($imageType) {
    		case "image/gif":
    			$source=imagecreatefromgif($image); 
    			break;
    	    case "image/pjpeg":
    		case "image/jpeg":
    		case "image/jpg":
    			$source=imagecreatefromjpeg($image); 
    			break;
    	    case "image/png":
    		case "image/x-png":
    			$source=imagecreatefrompng($image); 
    			break;
      	}
    	imagecopyresampled($newImage,$source,0,0,0,0,$newImageWidth,$newImageHeight,$width,$height);
    	
    	switch($imageType) {
    		case "image/gif":
    	  		imagegif($newImage,$image); 
    			break;
          	case "image/pjpeg":
    		case "image/jpeg":
    		case "image/jpg":
    	  		imagejpeg($newImage,$image,90); 
    			break;
    		case "image/png":
    		case "image/x-png":
    			imagepng($newImage,$image);  
    			break;
        }
    	
    	chmod($image, 0777);
    	return $image;
    }
    //You do not need to alter these functions
    function resizeThumbnailImage($thumb_image_name, $image, $width, $height, $start_width, $start_height, $scale){
    	list($imagewidth, $imageheight, $imageType) = getimagesize($image);
    	$imageType = image_type_to_mime_type($imageType);
    	
    	$newImageWidth = ceil($width * $scale);
    	$newImageHeight = ceil($height * $scale);
    	$newImage = imagecreatetruecolor($newImageWidth,$newImageHeight);
    	switch($imageType) {
    		case "image/gif":
    			$source=imagecreatefromgif($image); 
    			break;
    	    case "image/pjpeg":
    		case "image/jpeg":
    		case "image/jpg":
    			$source=imagecreatefromjpeg($image); 
    			break;
    	    case "image/png":
    		case "image/x-png":
    			$source=imagecreatefrompng($image); 
    			break;
      	}
    	imagecopyresampled($newImage,$source,0,0,$start_width,$start_height,$newImageWidth,$newImageHeight,$width,$height);
    	switch($imageType) {
    		case "image/gif":
    	  		imagegif($newImage,$thumb_image_name); 
    			break;
          	case "image/pjpeg":
    		case "image/jpeg":
    		case "image/jpg":
    	  		imagejpeg($newImage,$thumb_image_name,90); 
    			break;
    		case "image/png":
    		case "image/x-png":
    			imagepng($newImage,$thumb_image_name);  
    			break;
        }
    	chmod($thumb_image_name, 0777);
    	return $thumb_image_name;
    }
    //You do not need to alter these functions
    function getHeight($image) {
    	$size = getimagesize($image);
    	$height = $size[1];
    	return $height;
    }
    //You do not need to alter these functions
    function getWidth($image) {
    	$size = getimagesize($image);
    	$width = $size[0];
    	return $width;
    }
    
    function createThumbnail($imageDirectory, $imageName, $thumbDirectory, $thumbWidth)
    {
        $fileType = array("image/gif","image/jpeg","image/x-png","image/jpg","image/pjpeg","image/png");
        $image = $imageDirectory."/".$imageName;
        list($imagewidth, $imageheight, $imageType) = getimagesize($image);
        $imageType = image_type_to_mime_type($imageType);
      
        //if(in_array($imageType, $fileType)){
          /*$file_size = $_FILES['id_fileOfrDmd']['size'];
          if($file_size < 1000000){ */
          
            switch($imageType) {
        		case "image/gif":
        			$srcImg=imagecreatefromgif($image); 
        			break;
        	    case "image/pjpeg":
        		case "image/jpeg":
        		case "image/jpg":
        			$srcImg=imagecreatefromjpeg($image); 
        			break;
        	    case "image/png":
        		case "image/x-png":
        			$srcImg=imagecreatefrompng($image); 
        			break;
                case "application/octet-stream":
                    die;
                    
          	}
            //$srcImg=imagecreatefromjpeg($image); 
            $origWidth = imagesx($srcImg);
            $origHeight = imagesy($srcImg);
            $ratio = $thumbWidth/$origWidth;
            $thumbHeight = $origHeight * $ratio;
            
            $thumbImg = ImageCreateTrueColor($thumbWidth, $thumbHeight);
            imagecopyresized($thumbImg, $srcImg, 0, 0, 0, 0, $thumbWidth, $thumbHeight, $origWidth, $origHeight);
            $temp_file_name = explode(".", $imageName);
            array_pop($temp_file_name);
            $temp_file_name = implode("", $temp_file_name);
            
            switch($imageType) {
        		case "image/gif":
        			$thumbImgName = $temp_file_name. "_thumb.gif";
                    imagegif($thumbImg,$thumbDirectory."/".$thumbImgName); 
        			break;
        	    case "image/pjpeg":
        		case "image/jpeg":
        		case "image/jpg":
        			$thumbImgName = $temp_file_name. "_thumb.jpg";
                    imagejpeg($thumbImg,$thumbDirectory."/".$thumbImgName,90); 
        			break;
        	    case "image/png":
        		case "image/x-png":
        			$thumbImgName = $temp_file_name. "_thumb.png";
                    imagepng($thumbImg,$thumbDirectory."/".$thumbImgName);  
        			break;
          	}
            imagedestroy($thumbImg);
         /*   return true;
        }
       return false;*/
    }
    
    /**
     * Formattage affichage liste des destinataires
     */
    public function listerDestinataire($array_of_dest)
    {
        
        $elem = '';
        $i = 0;
        for ($i = 0; $i < count($array_of_dest) - 1; $i++) {
            $id_dest = $array_of_dest[$i]['id_dest'];
            $nom_dest = $array_of_dest[$i]['nom_dest'];
            $prenom_dest = $array_of_dest[$i]['prenom_dest'];
            $id_crypte = $this->_CI->tmy_cript_url->base64_url_encode($id_dest);
            $nom_prenom = $prenom_dest.' '.$nom_dest;
            $url = site_url('profil/'.$id_crypte);
            $elem .= '<a href="'.$url.'" class="kl_dest_nom_prenom" id="id_dest_nom_prenom_'.$id_dest.'">'.$nom_prenom.'</a>';
            $elem .= ',&nbsp';
            //array_push($return, $elem);
        }
        $id_dest = $array_of_dest[$i]['id_dest'];
        $nom_dest = $array_of_dest[$i]['nom_dest'];
        $prenom_dest = $array_of_dest[$i]['prenom_dest'];
        $id_crypte = $this->_CI->tmy_cript_url->base64_url_encode($id_dest);
        $nom_prenom = $prenom_dest.' '.$nom_dest;
        $url = site_url('profil/'.$id_crypte);
        $elem .= '<a href="'.$url.'" class="kl_dest_nom_prenom" id="id_dest_nom_prenom_'.$id_dest.'">'.$nom_prenom.'</a>';
        //array_push($return, $elem);
        return $elem;
    }
    
    /**
     * Formattage affichage liste des destinataires avec les photo
     */
    public function listerDestinataireWithPhoto($array_of_dest)
    { 
        $elem = '';
        $i = 0;
      
        for ($i = 0; $i < count($array_of_dest) - 1; $i++) {
			$elem .= '<div class="kl_msgListPicture">';
			
            $id_dest = $array_of_dest[$i]['id_dest'];
            $nom_dest = $array_of_dest[$i]['nom_dest'];
            $prenom_dest = $array_of_dest[$i]['prenom_dest'];
            $photo_dest = $array_of_dest[$i]['photo_dest'];
            if ($photo_dest == "no_photo.jpg") {
                        $path = "assets/images/";
            } else {
                $path = "application/upload/".$id_dest.".dir/";
            }
            $id_crypte = $this->_CI->tmy_cript_url->base64_url_encode($id_dest);
            $nom_prenom = $nom_dest.' '.$prenom_dest;
            $url = site_url('profil/'.$id_crypte);
            $elem .= '<div class="kl_userPictureMsg">
                      <a href="'.$url.'">';
            $elem .= '<img alt="'.$prenom_dest.' '.$nom_dest.'" src="'.base_url().'images-'.base64_encode($path.$photo_dest."?width=42&height=42").'" />';
            $elem .='</a> </div> <div class="kl_userNameMsg">
                    <a href="'.$url.' " class="kl_exp_nom_prenom" id="id_exp_nom_prenom_'.$id_dest.'"> '.$prenom_dest.' '.$nom_dest.'</a>';
            $elem .= '</div>';       
            $elem .= '&nbsp';
			
			$elem .= '</div>';
            //array_push($return, $elem);
        }
        $id_dest = $array_of_dest[$i]['id_dest'];
        $nom_dest = $array_of_dest[$i]['nom_dest'];
        $prenom_dest = $array_of_dest[$i]['prenom_dest'];
        $photo_dest = $array_of_dest[$i]['photo_dest'];
        if ($photo_dest == "no_photo.jpg") {
                        $path = "assets/images/";
            } else {
                $path = "application/upload/".$id_dest.".dir/";
            }
        $id_crypte = $this->_CI->tmy_cript_url->base64_url_encode($id_dest);
        $nom_prenom = $prenom_dest.' '.$nom_dest;
        $url = site_url('profil/'.$id_crypte);
        $elem .= '<div class="kl_msgListPicture">';
			$elem .= '<div class="kl_userPictureMsg">
                      <a href="'.$url.'">';
            $elem .= '<img alt="'.$prenom_dest.' '.$nom_dest.'" src="'.base_url().'images-'.base64_encode($path.$photo_dest."?width=42&height=42").'" />';
            $elem .='</a> </div> <div class="kl_userNameMsg">
                    <a href="'.$url.' " class="kl_exp_nom_prenom" id="id_exp_nom_prenom_'.$id_dest.'"> '.$prenom_dest.' '.$nom_dest.'</a>';
            $elem .= '</div>';
			$elem .= '</div>';
        //array_push($return, $elem);
        return $elem;
    }
    
    /**
     * Formattage affichage liste à récommander
     */
    public function listerRecommander($array_of_dest)
    {
        $elem = '';
        $i = 0;
        for ($i = 0; $i < count($array_of_dest) - 1; $i++) {
            $id_user = $array_of_dest[$i]['id_user'];
            $nom_dest = $array_of_dest[$i]['nom'];
            $prenom_dest = $array_of_dest[$i]['prenom'];
            $id_crypte = $this->_CI->tmy_cript_url->base64_url_encode($id_user);
            $nom_prenom = $prenom_dest.' '.$nom_dest;
            $url = site_url('profil/'.$id_crypte);
            $elem .= '<a href="'.$url.'" >'.$nom_prenom.'</a>';
            
            if ($i == count($array_of_dest) - 2){
            	$elem .= '&nbsp et &nbsp';
            }else{
            	$elem .= ', &nbsp';
            }
            
            
        }
        $id_user = $array_of_dest[$i]['id_user'];
        $nom_dest = $array_of_dest[$i]['nom'];
        $prenom_dest = $array_of_dest[$i]['prenom'];
        $id_crypte = $this->_CI->tmy_cript_url->base64_url_encode($id_user);
        $nom_prenom = $prenom_dest.' '.$nom_dest;
        $url = site_url('profil/'.$id_crypte);
        $elem .= '<a href="'.$url.'" >'.$nom_prenom.'</a>';
        return $elem;
    }
    
    /**
     * Formattage affichage liste à récommander dans notification
     */
    public function listerRecommanderNotif($array_of_dest, $idNotif)
    {
        
        $elem = '';
        $i = 0;
        for ($i = 0; $i < count($array_of_dest) - 1; $i++) {
            $id_user = $array_of_dest[$i]['id_user'];
            $nom_dest = $array_of_dest[$i]['nom'];
            $prenom_dest = $array_of_dest[$i]['prenom'];
            $id_crypte = $this->_CI->tmy_cript_url->base64_url_encode($id_user);
            $nom_prenom = $nom_dest.' '.$prenom_dest;
            $url = site_url('profil/'.$id_crypte.'?q='.$idNotif);
            $elem .= '<a href="'.$url.'" >'.$nom_prenom.'</a>';
            $elem .= ',&nbsp';
        }
        $id_user = $array_of_dest[$i]['id_user'];
        $nom_dest = $array_of_dest[$i]['nom'];
        $prenom_dest = $array_of_dest[$i]['prenom'];
        $id_crypte = $this->_CI->tmy_cript_url->base64_url_encode($id_user);
        $nom_prenom = $prenom_dest.' '.$nom_dest;
        $url = site_url('profil/'.$id_crypte.'?q='.$idNotif);
        $elem .= '<a href="'.$url.'" >'.$nom_prenom.'</a>';
        return $elem;
    }
    
    /**
     * generer mot de passe selon longueur voulu
     */
    public function Genere_Password($size)
        {
            // Initialisation des caractères utilisables
            $characters = array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, "a", "b", "c", "d", "e", "f", "g", "h", "i", "j", "k", "l", "m", "n", "o", "p", "q", "r", "s", "t", "u", "v", "w", "x", "y", "z");
            $password="";
            for($i=0;$i<$size;$i++)
            {
                $password .= ($i%2) ? strtoupper($characters[array_rand($characters)]) : $characters[array_rand($characters)];
            }
        		
            return $password;
        }
    /**
     * Calcule different date
     */
    //public function computeDate($start,$end)
	    public function computeDate($start,$end)
	    {
	    	$dtStart = new DateTime($start);
	    	$dtEnd = new DateTime($end);
	    	$interval = $dtStart->diff($dtEnd);
	    	$nbyear = $interval->format('%y');
	    	$nbmonth = $interval->format('%m');
	    	$nbday = $interval->format('%a');
	    	$nbhour = $interval->format('%h');
	    	$nbmin = $interval->format('%i');
	    	$nbsec = $interval->format('%s');
            if($nbday>10){
                $nbday=2;
            }else if($nbday>1){
                $nbday=1;
            }
	    	$res = array("annee"=>$nbyear,
	    			"mois"=>$nbmonth,
	    			"jour"=>$nbday,
	    			"heure"=>$nbhour,
	    			"minute"=>$nbmin,
	    			"seconde"=>$nbsec);
	    	$age_ofr_dmd = "";
	    	if ($res['annee'] > 0) {
	    		$age_ofr_dmd = $res['annee'].'annee';
	    	} else if ($res['mois'] > 0) {
	    		$age_ofr_dmd = $res['mois'].' mois';
	    	}else if ($res['jour'] > 0) {
	    		$age_ofr_dmd = $res['jour'].' j';
	    	}else if ($res['heure'] > 0) {
	    		$age_ofr_dmd = $res['heure'].' h';
	    	} else if ($res['minute'] > 0) {
	    		$age_ofr_dmd = $res['minute'].' mn';
	    	} else if ($res['seconde'] > 0) {
	    		$age_ofr_dmd = $res['seconde'].' s';
	    	}
	    
	    	return $age_ofr_dmd;
	    }
    
   /**
     * fonction qui calcul la similarite texte
     */
    public function similaire($str1, $str2){
            $strlen1=strlen($str1);
            $strlen2=strlen($str2);
            $max=max($strlen1, $strlen2);
            $splitSize=250;
            if($max>$splitSize){
                $lev=0;
                for($cont=0;$cont<$max;$cont+=$splitSize){
                    if($strlen1<=$cont || $strlen2<=$cont){
                        $lev=$lev/($max/min($strlen1,$strlen2));
                        break;
        
                    }
                    $lev+=levenshtein(substr($str1,$cont,$splitSize), substr($str2,$cont,$splitSize));
                }
            }
            else
            $lev=levenshtein($str1, $str2);
            $porcentage= -100*$lev/$max+100;
            if($porcentage>75)
            similar_text($str1,$str2,$porcentage);
         return $porcentage;
        } 
    
    /**
     * fonction qui calcul la similarite texte dans recherche
     */
    public function similairerecherche($str1, $str2){   
            similar_text($str1,$str2,$porcentage);
         return $porcentage;
        } 
    /**
     * remove accents function
     */    
    public function stripAccents($string, $charset='utf-8'){
   // 	return strtr($string,'àáâãäçèéêëìíîïñòóôõöùúûüýÿÀÁÂÃÄÇÈÉÊËÌÍÎÏÑÒÓÔÕÖÙÚÛÜÝ',
//    'aaaaaceeeeiiiinooooouuuuyyAAAAACEEEEIIIINOOOOOUUUUY');

	//$string = Normalizer::normalize($string, Normalizer::FORM_D);
//        return preg_replace('~\p{Mn}~u', '', $string);
    $str = htmlentities($string, ENT_NOQUOTES, $charset);
   
    $str = preg_replace('#&([A-za-z])(?:acute|cedil|circ|grave|orn|ring|slash|th|tilde|uml);#', '\1', $str);
    $str = preg_replace('#&([A-za-z]{2})(?:lig);#', '\1', $str); // pour les ligatures e.g. '&oelig;'
    $str = preg_replace('#&[^;]+;#', '', $str); // supprime les autres caractères
    
    return $str;
    }
    
    /**
     * resize very long string
     */
    public function resizeLength($str,$compte){
        $res=$str;
       if(strlen($str)>$compte){
        $res=mb_substr($str,0,$compte);
        $res.='...';
       }
       return $res; 
    }
   
   
   /**
    * resize auto image
    */
     public  function image_thumb( $image_path,$namefile, $height, $width ) {
        // Get the CodeIgniter super object
        $CI =& get_instance();
    
        // Path to image thumbnail
        //$image_thumb = dirname( $image_path ) . '/'.$namefile.'_'. $height . '_' . $width . '.jpg';
        $image_thumb = dirname( $image_path ) . '/'.$namefile.'_thumbnail.jpg';
        if ( !file_exists( $image_thumb ) ) {
            // LOAD LIBRARY
            $CI->load->library( 'image_lib' );
    
            // CONFIGURE IMAGE LIBRARY
            $config['image_library']    = 'gd2';
            $config['source_image']     = $image_path;
            $config['new_image']        = $image_thumb;
            $config['maintain_ratio']   = TRUE;
            $config['height']           = $height;
            $config['width']            = $width;
            $CI->image_lib->initialize( $config );
            $CI->image_lib->resize();
            $CI->image_lib->clear();
        }
    
       // return '<img src="' . dirname( $_SERVER['SCRIPT_NAME'] ) . '/' . $image_thumb . '" />';
    }
    
    /**
    * resize auto image
    */
     public  function image_thumbprofil( $image_path,$namefile, $height, $width ) {
        // Get the CodeIgniter super object
        $CI =& get_instance();
    
        // Path to image thumbnail
        //$image_thumb = dirname( $image_path ) . '/'.$namefile.'_'. $height . '_' . $width . '.jpg';
        $image_thumb = dirname( $image_path ) . '/'.$namefile;
        if ( !file_exists( $image_thumb ) ) {
            // LOAD LIBRARY
            $CI->load->library( 'image_lib' );
    
            // CONFIGURE IMAGE LIBRARY

            $config['image_library']    = 'gd2';
            $config['source_image']     = $image_path;
            $config['new_image']        = $image_thumb;
            $config['maintain_ratio']   = TRUE;
            $config['height']           = $height;
            $config['width']            = $width;
            $CI->image_lib->initialize( $config );
            $CI->image_lib->resize();
            $CI->image_lib->clear();
        }
    }
    
    
    public function afficha2MotsWithSepration($mot1, $mot2, $separation){
        $ensembleMots = $mot1;
        if(!empty($mot1) && !empty($mot2) ){
            $ensembleMots = $mot1.$separation." ".$mot2;
        }else if(empty($mot1)){
             $ensembleMots = $mot2;
        }else{
            $ensembleMots = $mot1;
        }
        
        return $ensembleMots;
    }
    
    
  
}