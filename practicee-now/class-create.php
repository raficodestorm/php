<?php

class stud {
    public $name;
    public $id;
    public $email;

    public function __construct($n, $i, $e){
        $this->name = trim($n);
        $this->id = trim($i);
        $this->email = trim($e);
    }
    public function format(){
        return "{$this->name}|{$this->id}|{$this->email}".PHP_EOL;
    }
    public function toSave($filename){
        file_put_contents($filename, format(), FILE_APPEND);
    }
}
class student extends stud{
    public static function display($filename){
        if(!(file_exists($filename))){
            echo "data not found";
        }
        $line = file($filename, FILE_IGNORENEW_LINES | FILE_SKIP_NEW_LINES);

        echo <<<HTML
        <table>
            <thead>
                <tr>
                    <th>Name</th>
                    <th>ID</th>
                    <th>Email</th>
                </tr>
            </thead>
            <tbody>
        HTML;

        foreach($line as $lin){
            list($name, $id, $email) = explode("|", $line);
            $name = htmlspecialchars($name);
            $id = htmlspecialchars($id);
            $email = htmlspecialchars($mail);
            echo "
                <tr>
                <td>{$name}</td>
                <td>{$id}</td>
                <td>{$email}</td>
                </tr>";
        }
        echo "</tbody></table>";
    }
}

?>