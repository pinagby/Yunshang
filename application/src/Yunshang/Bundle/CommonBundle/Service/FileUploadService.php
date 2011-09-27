<?php
namespace Yunshang\Bundle\CommonBundle\Service;

use Symfony\Component\HttpKernel\Kernel;

class FileUploadService
{
  private  $kernel ;

  public function __construct(Kernel $kernel){
    $this->kernel = $kernel ;
  }
    
  public function getWebBasePath(){
    return $this->request->getBasePath();
  }

  public function getUploadBasePath(){
    $uploadBasePath = $this->kernel->getRootDir().'/../web/uploads/images/';
       if(!file_exists($uploadBasePath)){
          mkdir($uploadBasePath,0777,true);
        }
    return $uploadBasePath;
  }

  public function generateFileName($ext){
    $sha_uuid = sha1(uniqid());
    return $sha_uuid.'.'.$ext;
  }


  public function getUploadPath($fileName){
    return $this->generateUploadPath($fileName,4);
  }

  public function upload($symfonyUploadFile){
    $ext = $this->get_pic_ext($symfonyUploadFile);
    $fileName = $this->generateFileName($ext);
    $uploadPath = $this->generateUploadPath($fileName);
    $filePath = $uploadPath.$fileName;
    $symfonyUploadFile->move($uploadPath, $fileName);
    unset($symfonyUploadFile);
    return $this->generateWebPath($fileName);
  }	


  private function get_pic_ext($image_file){
    //hacker code for exif_imagetype does not existed
    if ( ! function_exists( 'exif_imagetype' ) ) {
      function exif_imagetype ( $filename ) {
        if ( ( list($width, $height, $type, $attr) = getimagesize( $filename ) ) !== false ) {
	  return $type;
        }
	return false;
      }
    }

    //get file type
    if (filesize($image_file) > 11){
      $mimetype = exif_imagetype($image_file);
    }else{
      $mimetype = IMAGETYPE_JPEG;
    }

    switch ($mimetype) {
    case IMAGETYPE_GIF:
      return 'gif';
      break;
    case IMAGETYPE_JPEG:
      return 'jpg';
      break;
    case IMAGETYPE_PNG:
      return 'png';
      break;
    case IMAGETYPE_BMP:
      return 'bmp';
      break;
    case IMAGETYPE_ICO:
      return 'ico';
      break;
    default:
      return 'jpg';
    }
  }

  private function generateUploadPath($fileName,$level=4){
    $uploadRootDir = $this->getUploadBasePath();

    if($level>strlen($fileName)){
      throw new \InvalidArgumentException('invalied level');
    }

    $uploadPath=$uploadRootDir;
    for($i=1;$i<=$level;$i++){
      $uploadPath = $uploadPath.substr($fileName,0,$i).'/';
      if(!file_exists($uploadPath)){
	mkdir($uploadPath,0777,true);
      }
    }
    return $uploadPath;
  }

  private function generateWebPath($fileName){
    $uploadPath='/uploads/images/';
    for($i=1;$i<=4;$i++){
      $uploadPath = $uploadPath.substr($fileName,0,$i).'/';
    }
    return $uploadPath.$fileName;
  }
} 