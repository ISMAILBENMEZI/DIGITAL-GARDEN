<?php
if (isset($page) && $page === 'dashboard') {
    include "config/database.php";
} else {
    include "../config/database.php";
    session_start();
}

if (isset($_GET['logout'])) {
    session_unset();
    session_destroy();
    header("location:../index.php ");
    exit();
}

if (isset($_POST['addTheme'])) {

    addAndUpdateTheme($conn);
}


if (isset($_POST['modify'])) {
    addAndUpdateTheme($conn);
}

function addAndUpdateTheme($conn)
{

    $id = $_POST['id'] ?? null;
    $title = $_POST['Title'] ?? null;
    $color = $_POST['color'] ?? null;
    $user_id = $_SESSION['userId'];

    if (empty($title) || empty($color)) {
        $_SESSION["themesMessage"] = "Please fill in all experience fields";
    }

    if ($id) {

        $_SESSION['Update'] = 'Modify';
        $_SESSION['updateTitle'] = $title;
        $_SESSION['updateColor'] = $color;
        $_SESSION['updateId'] = $id;

        $query = "UPDATE theme SET color = ? , title = ? WHERE id = ? AND  user_id = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("ssii", $color, $title, $id, $user_id);
        $stmt->execute();

        header("location:../themes.php");
        exit();
    } else {
        $query = "INSERT INTO theme(Title , Color , user_id) VALUES(?,?,?)";

        $stmt = $conn->prepare($query);
        $stmt->bind_param("ssi", $title, $color, $user_id);
        $stmt->execute();

        $_SESSION['success'] = 'Theme created successfully';
        header("location:../dashboard.php");
        exit();
    }

    unset($_SESSION['updateTitle'], $_SESSION['updateColor'], $_SESSION['updateId'], $_SESSION['Update']);

    header("Location: ../dashboard.php");
}


function affichaeTheTheme($conn)
{
    $user_id = $_SESSION['userId'];
    $query = "SELECT * FROM theme WHERE user_id = ?";

    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $user_id);
    $stmt->execute();

    $result = $stmt->get_result();

    return $myThemes = $result->fetch_all(MYSQLI_ASSOC);
}


if (isset($_POST['delete'])) {
    deleteThemeInDatabaseById($conn);
}

function deleteThemeInDatabaseById($conn)
{
    $query = "DELETE FROM theme WHERE id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $_POST['id']);
    $stmt->execute();
    header("location:../dashboard.php");
    exit();
}
