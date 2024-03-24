<?php session_start(); ?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Owned List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>


<?php include 'navbar.php';?>

<!--<h1 class="text-center mt-5">Owned list</h1>-->
<?php



require_once 'DBC.php';

$db = Database::getInstance();
$conn = $db->getConnection();

$sql = "SELECT name, type FROM Animal WHERE owned = 1";
$result = $conn->query($sql);

if (!$result) {
    echo "<div class='alert alert-danger'>Error fetching animals: " . $conn->error . "</div>";
} else {
    $animals = array();
    while ($row = $result->fetch_assoc()) {
        $animals[] = $row;
    }
}
?>

<div class="container d-flex justify-content-center align-items-center flex-column" style="height: 100vh">
<h1 class="text-center mb-5">Owned List</h1>

<div class="container">
    <ul class="list-group">
        <?php
        if (count($animals) > 0) {
            foreach ($animals as $animal) {
                echo "<li class='list-group-item'>
                        <strong>Name:</strong> {$animal['name']} 
                        - <strong>Type:</strong> {$animal['type']}
                      </li>";
            }
        } else {
            echo "<li class='list-group-item'>No owned animals found.</li>";
        }
        ?>
    </ul>
</div>

    <a href="wish-list.php"><button class="btn btn-dark mt-5">Wished animals</button></a>
</div>






<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>