<?php
if(isset($_POST['submit'])){
    $any_name = $_FILE['nam']['tmp_name'];
    $name = $FILE['nam']['name'];
    
    copy($any_name, "image/", $name);
}

?>
<body>
    <div style=>
    <form action="nam" method="POST" enctype="multipart/form_data">

    </form>
    </div>
</body>