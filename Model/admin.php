<?php
class admin{
    private ?int $id = null;
    private ?string $nom = null;
    private ?string $email = null;
    private ?int $mdp = null;
    function __construct(string $nom,string $email,string $mdp)
    {
        
        $this->nom=$nom;
        $this->email=$email;
     
        $this->mdp=$mdp;
    }
    function getId(): int{
        return $this->id;
    }
    function getNom(): string{
        return $this->nom;
    }
   
    function getEmail(): string{
        return $this->email;
    }
    
   
    function getMdp(): string{
        return $this->mdp;
    }
    function setNom(string $nom): void{
        $this->nom=$nom;
    }
    
    function setEmail(string $email): void{
        $this->email=$email;
    }
 
   
}
?>