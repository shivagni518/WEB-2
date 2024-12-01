<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Capture and sanitize input fields
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $phone = htmlspecialchars($_POST['phone']);
    $position = htmlspecialchars($_POST['position']);

    // Handle file upload
    if (isset($_FILES['resume']) && $_FILES['resume']['error'] === UPLOAD_ERR_OK) {
        $uploadDir = 'uploads/'; // Directory for uploaded files
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0777, true); // Create directory if not exists
        }

        $fileTmpPath = $_FILES['resume']['tmp_name'];
        $fileName = basename($_FILES['resume']['name']);
        $fileDestPath = $uploadDir . $fileName;

        if (move_uploaded_file($fileTmpPath, $fileDestPath)) {
            $resumePath = $fileDestPath;
        } else {
            echo "<p style='color: red;'>Failed to upload resume. Please try again.</p>";
            exit;
        }
    } else {
        echo "<p style='color: red;'>Resume upload error. Please try again.</p>";
        exit;
    }

    // Display the submission details
    echo "<h2>Application Submitted Successfully!</h2>";
    echo "<p><strong>Name:</strong> $name</p>";
    echo "<p><strong>Email:</strong> $email</p>";
    echo "<p><strong>Phone:</strong> $phone</p>";
    echo "<p><strong>Position Applied For:</strong> $position</p>";
    echo "<p><strong>Resume Uploaded:</strong> <a href='$resumePath' target='_blank'>View Resume</a></p>";
} else {
    echo "<p style='color: red;'>Invalid request. Please submit the form correctly.</p>";
}
?>