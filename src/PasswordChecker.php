<?php
namespace App;

class PasswordChecker
{
    private String $mdp;
    private int $long = 10;



    public function __construct(String $mdp1){
        $this->mdp = $mdp1;   
    }


    public Function TestPwd(){

        $nbr = strlen($this->mdp);

        if( $nbr >= $this->long ){
            return true;
        }
        else{
            return false;
        }

    }
    
}