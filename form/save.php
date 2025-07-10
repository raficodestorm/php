
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
        // Store in raw format for easy reading later
        return "{$this->name}|{$this->id}|{$this->address}" . PHP_EOL;
    }

    public function saveToFile() {
        $data = $this->formatData();
        file_put_contents($this->file, $data, FILE_APPEND);

        // Show success message and table
        $output = "<h2 style='margin-left:500px; margin-top:100px;'>Data saved successfully!</h2>";
        $output .= $this->generateTable(); // show table under message
        return $output;
    }

    private function generateTable() {
        if (!file_exists($this->file)) {
            return "<p>No data found.</p>";
        }

        $lines = file($this->file, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        if (empty($lines)) {
            return "<p>No data to display.</p>";
        }

        $table = "<table border='1' cellpadding='10' cellspacing='0' style='margin: 20px auto;'>
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>ID</th>
                            <th>Batch</th>
                        </tr>
                    </thead>
                    <tbody>";

        foreach ($lines as $line) {
            $parts = explode("|", $line);
            if (count($parts) === 3) {
                $table .= "<tr>
                            <td>" . htmlspecialchars($parts[0]) . "</td>
                            <td>" . htmlspecialchars($parts[1]) . "</td>
                            <td>" . htmlspecialchars($parts[2]) . "</td>
                        </tr>";
            }
        }

        $table .= "</tbody></table>";
        return $table;
    }
}

// Form submission check
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
