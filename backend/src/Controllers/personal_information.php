<?php 
use Slim\Http\Request; //namespace 
use Slim\Http\Response; //namespace 

//include personal_informationProc.php.php file (new)
include __DIR__ . '/../function/personal_informationProc.php'; 

//All Information will be displayed
$app->get('/DisplayInfo', function (Request $request, Response $response, array $arg)
{ 
    $data = getAllInfo($this->db);
    if (is_null($data)){
    return $this->response->withJson(array('ERROR' => 'no data'), 404); 
    }

    return $this->response->withJson(array('DATA' => $data), 200); //display all the product
});

//Display Information by IC
$app->get('/Info/[{nric}]', function ($request, $response, $args){
    $data = $args['nric']; 
    if (!is_numeric($data)) { 
        return $this->response->withJson(array('ERROR' => 'NUMERIC PARAMETER REQUIRED'), 422); }
        $data = getInfo ($this->db,$data); 
        if (empty($data)) { 
            return $this->response->withJson(array('ERROR' => 'no data'), 404); 
        }
        return $this->response->withJson(array('DATA' => $data), 200); 
    });

//Insert New Information
$app->post('/InsertNewInfo',function(Request $request, Response $response, array $arg)
{
     $form_data=$request->getParsedBody();
     $data = createInfo($this->db, $form_data);   
 
    if(is_null($data)){
     return $this->response->withJson(array('ERROR' => 'no data'), 400);
 }
     return $this->response->withJson(array('DATA' => 'DATA INSERT SUCCESSFULL'), 200); 
});

//Delete by NRIC
  $app->delete('/Info/del/[{nric}]', function ($request, $response, $args){

    $infoIC = $args['nric'];
   if (!is_numeric($infoIC)) {
    return $this->response->withJson(array('ERROR' => 'NUMERIC PARAMETER REQUIRED'), 422);
   }
   $data = deleteIC($this->db,$infoIC);
   if (empty($data)) {
   return $this->response->withJson(array($infoIC=> 'SUCCESSFULL DELETED'), 202);};
});


//Update Information 
   $app->put('/Info/put/[{nric}]', function ($request, $response, $args){
 
    $infoIC = $args['nric'];
    $date = date("Y-m-j h:i:s");
        if (!is_numeric($infoIC)) {
        return $this->response->withJson(array('ERROR' => 'NUMERIC PARAMETER REQUIRED'), 422);
} 
     $form_dat=$request->getParsedBody();
    $data=updateInfo($this->db,$form_dat,$infoIC,$date);
        //  if ($data <=0)
        return $this->response->withJson(array('DATA' => 'SUCCESSFULL UPDATED'), 200);
});