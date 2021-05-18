<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=h2, initial-scale=1.0">
    <title><?php echo $data["page_tag"]; ?></title>
</head>
<body>
    <h2>Tienda virtual</h2>
    <h3><?php echo $data["page_title"]; ?></h3>

    <?php 
        dep($data);

        echo base_url();
    ?>
</body>
</html>