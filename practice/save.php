<?php
class Userinfo{
    private $name;
    private $id;
    private $address;
    private $file;

    public function __construct($name, $id, $address, $file='data.txt'){
        $this->name = $name;
        $this->id = $id;
        $this->address = $address;
        $this->file = $file;
    }
    public function formdata(){
        return "Name: {$this->name} | ID: {$this->id} | Address: {$this->address}". PHP_EOL;
    }
    public function formsave(){
        $file = $this->formdata();
        file_put_contents($this->file, $file, FILE_APPEND);
        echo "File saved successfully";

    }

}
if($_SERVER['REQUEST_METHOD'] == "POST"){
    $name = $_POST["name"] ?? '';
    $id = $_POST["id"] ?? '';
    $addr = $_POST["addr"] ?? '';
    
    $userdata = new Userinfo($name, $id, $addr);
    echo $userdata->formsave();
}else{
    echo "Invalid data";
}
?>