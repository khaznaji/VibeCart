<?php
include_once("C:/xampp/htdocs/nourhen/config.php");
include_once("C:/xampp/htdocs/nourhen/Model/admin.php");
class adminC
{
    function afficherAdmin(){
        $sql="select * from admin";
        $db = config::getConnexion();
        try{
            $liste = $db->query($sql);
            return $liste;
    }
    catch(Exception $e){
        echo 'Erreur: '.$e->getMessage();
    }
}
function searchLogin($email,$mdp){
    $sql="select * from admin where email='$email' AND mdp='$mdp'";
    $db = config::getConnexion();
    try{
        $liste = $db->query($sql);
        return $liste;
}

catch(Exception $e){
    echo 'Erreur: '.$e->getMessage();
}
}
public function ajouterAdmin($admin){
    $sql="insert into admin(nom,email,mdp) values(:nom,:email,:mdp)";
    $db = config::getConnexion();
    try{
        $query=$db->prepare($sql);
        $query->execute([
        'nom'=>$admin->getNom(),
        'email'=>$admin->getEmail(),
        
        'mdp'=>$admin->getMdp()
        
        ]);
        
    }
        catch(Exception $e){
            echo 'Erreur: '.$e->getMessage();
        }
}

public function setConn($email,$mdp)
{
    $sql="update admin set token='ON' where email='$email' AND mdp='$mdp'";
    
    $db = config::getConnexion();
    try{
        $liste = $db->query($sql);
        return $liste;
    }
    catch(Exception $e){
        die('Erreur: '.$e->getMessage());
    }
}
public function setDisconn()
{
    $sql="update admin set token='OFF' where token='ON'";
    
    $db = config::getConnexion();
    try{
        $liste = $db->query($sql);
        return $liste;
    }
    catch(Exception $e){
        die('Erreur: '.$e->getMessage());
    }
}

function modifierAdmin($id,$admin) {
    $sql="UPDATE  admin set nom=:nom,email=:email,mdp=:mdp where id=".$id."";
    $db = config::getConnexion();
    try{
        $query = $db->prepare($sql);
    
        $query->execute([
            'nom' => $admin->getNom(),
            
            'email' => $admin->getEmail(),
            'mdp' => $admin->getMdp()
        ]);			
    }
    catch (Exception $e){
        echo 'Erreur: '.$e->getMessage();
    }		
  }
 
public function afficherAdminDetail(int $rech1)
    {
        $sql="select * from admin where id=".$rech1."";
        
        $db = config::getConnexion();
        try{
            $liste = $db->query($sql);
            return $liste;
        }
        catch(Exception $e){
            die('Erreur: '.$e->getMessage());
        }
    }
    public function supprimerAdmin($id)
    {
        $sql = "DELETE FROM admin WHERE id=".$id."";
        $db = config::getConnexion();
        $query =$db->prepare($sql);
        
        try {
            $query->execute();
        }
        catch(Exception $e){
            die('Erreur: '.$e->getMessage());
    
        }
    }
}

?>