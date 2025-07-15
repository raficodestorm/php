<?php
class Stu {
    public $id;
    public $name;
    public $email;

    public function __construct($id, $name, $email) {
        $this->id = trim($id);
        $this->name = htmlspecialchars(trim($name));
        $this->email = trim($email);
    }

    public function dataFormat() {
        return "{$this->id},{$this->name},{$this->email}" . PHP_EOL;
    }

    public function saveToFile($filename) {
        file_put_contents($filename, $this->dataFormat(), FILE_APPEND);
    }
}
    
    
    
    
class student extends stu {  
    
    public static function displayStudents($filename) {
        if (!file_exists($filename)) {
            echo "<p>No student data found.</p>";
            return;
        }

        $lines = file($filename, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

        echo <<<HTML
        <style>
            table {
                border-collapse: collapse;
                width: 60%;
                margin: 20px auto;
                font-family: Arial, sans-serif;
            }
            th, td {
                border: 1px solid #999;
                padding: 8px 12px;
                text-align: center;
            }
            th {
                background-color: #f4f4f4;
            }
            tr:nth-child(even) {
                background-color: #f9f9f9;
            }
        </style>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                </tr>
            </thead>
            <tbody>
        HTML;

        foreach ($lines as $line) {
            list($id, $name, $email) = explode(",", trim($line));
            $id = htmlspecialchars($id);
            $name = htmlspecialchars($name);
            $email = htmlspecialchars($email);
            echo "<tr>
                    <td>{$id}</td>
                    <td>{$name}</td>
                    <td>{$email}</td>
                </tr>";
        }

        echo "</tbody> </table>";
    }
}
?>
