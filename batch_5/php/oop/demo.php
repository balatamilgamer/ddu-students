<?php 


class Person{

    public $name;
    public $age;
    private $gender;

    function __construct($name, $age, $gender){
        $this->name = $name;
        $this->age = $age;
        $this->gender = $gender;
    }

    public function getName(){
        return $this->name;
    }

    public function getAge(){
        return $this->age;
    }

    private function getGender(){
        return $this->gender;
    }

    public function printData(){
        return $this->getGender();
    }

    function __destruct(){
        echo "Object is destroyed";
    }

}

$user1 = new Person("Bala",45,"Male");

echo $user1->printData();


?>