<?php 

//get all information
function getAllInfo($db) 
{

    $sql = 'Select p.name, p.nric, p.address, p.age, p.gender, p.phonenumber, p.email, p.religion, p.nationality, 
            p.maritalstatus, p.positionhistory, p.lastsalary, p.expectedsalary, p.lastcompanyname, 
            p.businesscategory, p.lastposition, p.workingperiod, p.reasonleaving from personal_information p '; 
   // $sql .='Inner Join categories c on p.category_id = c.id'; 
    $stmt = $db->prepare ($sql); 
    $stmt ->execute(); 
    return $stmt->fetchAll(PDO::FETCH_ASSOC); 
}

//get product by nric 
function getInfo($db, $nric) 
{
     $sql = 'Select p.name, p.nric, p.address, p.age, p.gender, p.phonenumber, p.email, p.religion, p.nationality, 
            p.maritalstatus, p.positionhistory, p.lastsalary, p.expectedsalary, p.lastcompanyname, 
            p.businesscategory, p.lastposition, p.workingperiod, p.reasonleaving from personal_information p '; 
    // $sql .= 'Inner Join categories c on p.category_id = c.id '; 
     $sql .= 'Where p.nric = :nric'; 
     $stmt = $db->prepare ($sql); 
     $id = (int) $nric; $stmt->bindParam(':nric', $nric, PDO::PARAM_INT); 
     $stmt->execute(); 
     return $stmt->fetchAll(PDO::FETCH_ASSOC);
    
}

//insert new information
function createInfo($db,$form_data)
{
    $sql = 'Insert into personal_information (name, nric, address, age, gender, phonenumber, email, religion, nationality, 
            maritalstatus, positionhistory, lastsalary, expectedsalary, lastcompanyname, 
            businesscategory, lastposition, workingperiod, reasonleaving)';

    $sql .= 'values (:name, :nric, :address, :age, :gender, :phonenumber, :email, :religion, :nationality, 
            :maritalstatus, :positionhistory, :lastsalary, :expectedsalary, :lastcompanyname, 
            :businesscategory, :lastposition, :workingperiod, :reasonleaving)';

    $stmt = $db -> prepare ($sql);
    $stmt -> bindParam(':name', $form_data['name']);
    $stmt -> bindParam(':nric', $form_data['nric']);
    $stmt -> bindParam(':address', ( $form_data['address']));
    $stmt -> bindParam(':age', ( $form_data['age']));
    $stmt -> bindParam(':gender', $form_data['gender']);
    $stmt -> bindParam(':phonenumber', $form_data['phonenumber']);
    $stmt -> bindParam(':email', $form_data['email']);
    $stmt -> bindParam(':religion', $form_data['religion']);
    $stmt -> bindParam(':nationality', $form_data['nationality']);
    $stmt -> bindParam(':maritalstatus', $form_data['maritalstatus']);
    $stmt -> bindParam(':positionhistory', $form_data['positionhistory']);
    $stmt -> bindParam(':lastsalary', $form_data['lastsalary']);
    $stmt -> bindParam(':expectedsalary', $form_data['expectedsalary']);
    $stmt -> bindParam(':lastcompanyname', $form_data['lastcompanyname']);
    $stmt -> bindParam(':businesscategory', $form_data['businesscategory']);
    $stmt -> bindParam(':lastposition', $form_data['lastposition']);
    $stmt -> bindParam(':workingperiod', $form_data['workingperiod']);
    $stmt -> bindParam(':reasonleaving', $form_data['reasonleaving']);

    $stmt->execute();
    return $db ->lastInsertID(); //insert last number.. continue
}

//Delete by IC
function deleteIC($db,$infoIC) {
    $sql = ' Delete from personal_information where nric = :nric';
    $stmt = $db->prepare($sql);
    $id = (int) $infoIC; 
    $stmt->bindParam(':nric', $nric, PDO::PARAM_INT);
    $stmt->execute();
}

 //Update Information by IC
 function updateInfo($db,$form_dat,$infoIC,$date) {
    $sql = 'UPDATE personal_information SET name = :name, nric = :nric, address = :address, age = :age, gender = :gender, 
            phonenumber = :phonenumber, email=:email, religion=:religion, nationality=:nationality, 
            maritalstatus = :maritalstatus, positionhistory = :positionhistory, lastsalary = :lastsalary, 
            expectedsalary = :expectedsalary, lastcompanyname = :lastcompanyname, businesscategory = :businesscategory, 
            lastposition = :lastposition, workingperiod = :workingperiod, reasonleaving = :reasonleaving ';

    $sql .='WHERE nric = :nric';
    $stmt = $db->prepare ($sql);
    $id = (int)$infoIC;
    $mod = $date;
    $stmt -> bindParam(':name', $form_data['name']);
    $stmt -> bindParam(':nric', $form_data['nric']);
    $stmt -> bindParam(':address', ( $form_data['address']));
    $stmt -> bindParam(':age', ( $form_data['age']));
    $stmt -> bindParam(':gender', $form_data['gender']);
    $stmt -> bindParam(':phonenumber', $form_data['phonenumber']);
    $stmt -> bindParam(':email', $form_data['email']);
    $stmt -> bindParam(':religion', $form_data['religion']);
    $stmt -> bindParam(':nationality', $form_data['nationality']);
    $stmt -> bindParam(':maritalstatus', $form_data['maritalstatus']);
    $stmt -> bindParam(':positionhistory', $form_data['positionhistory']);
    $stmt -> bindParam(':lastsalary', $form_data['lastsalary']);
    $stmt -> bindParam(':expectedsalary', $form_data['expectedsalary']);
    $stmt -> bindParam(':lastcompanyname', $form_data['lastcompanyname']);
    $stmt -> bindParam(':businesscategory', $form_data['businesscategory']);
    $stmt -> bindParam(':lastposition', $form_data['lastposition']);
    $stmt -> bindParam(':workingperiod', $form_data['workingperiod']);
    $stmt -> bindParam(':reasonleaving', $form_data['reasonleaving']);
    
    $stmt->execute();

    $sql1 = 'Select p.name, p.nric, p.address, p.age, p.gender, p.phonenumber, p.email, p.religion, p.nationality, 
             p.maritalstatus, p.positionhistory, p.lastsalary, p.expectedsalary, p.lastcompanyname, 
             p.businesscategory, p.lastposition, p.workingperiod, p.reasonleaving from personal_information p ';
   // $sql1 .= 'Inner Join categories c on p.category_id = c.id ';
    $sql1 .= 'Where p.nric = :nric'; 
    $stmt1 = $db->prepare ($sql1);
    $stmt1->bindParam(':nric', $nric, PDO::PARAM_INT);
    $stmt1->execute();
    return $stmt1->fetchAll(PDO::FETCH_ASSOC);
   
   }