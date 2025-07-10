<?php

class Userinfo {
    private $name;
    private $id;
    private $address;
    private $file;

    public function __construct($name, $id, $address, $file = "data.txt") {
        $this->name = $name;
        $this->id = $id;
        $this->address = $address;
        $this->file = $file;
    }

    public function formatData() {
        return "Name: {$this->name} | ID: {$this->id} | Batch: {$this->address}" . PHP_EOL;
    }

    public function saveToFile() {
        $data = $this->formatData();
        file_put_contents($this->file, $data, FILE_APPEND);
        return "<h2 style='margin-left:500px; margin-top:300px;'>Data saved successfully!</h2>";
    }
}


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'] ?? '';
    $id = $_POST['id'] ?? '';
    $address = $_POST['address'] ?? '';

    $user = new Userinfo($name, $id, $address);
    echo $user->saveToFile();
} else {
    echo "Invalid request.";
}
?> 