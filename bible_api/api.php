<?php
header("Content-Type: application/json");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST");
header("Access-Control-Allow-Headers: Content-Type");

// Database connection
$conn = new mysqli("localhost", "root", "", "bible_api");

if ($conn->connect_error) {
    die(json_encode(["error" => "Connection failed: " . $conn->connect_error]));
}

// Handle POST (add verse)
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $data = json_decode(file_get_contents("php://input"), true);
    if (isset($data["book"], $data["chapter"], $data["verse"], $data["text"])) {
        $stmt = $conn->prepare("INSERT INTO verses (book, chapter, verse, text) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("siis", $data["book"], $data["chapter"], $data["verse"], $data["text"]);
        if ($stmt->execute()) {
            echo json_encode(["success" => "Verse added successfully"]);
        } else {
            echo json_encode(["error" => "Failed to add verse"]);
        }
        $stmt->close();
    } else {
        echo json_encode(["error" => "Invalid input"]);
    }
    exit;
}

// Handle GET (random verse)
$result = $conn->query("SELECT * FROM verses ORDER BY RAND() LIMIT 1");
if ($row = $result->fetch_assoc()) {
    echo json_encode($row);
} else {
    echo json_encode(["error" => "No verses found"]);
}
$conn->close();
