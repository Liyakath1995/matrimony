<?php
// User Registration
function registerUser($name, $email, $password, $age, $gender, $religion, $caste, $education, $career, $family, $partner_age, $partner_religion, $partner_caste, $profile_photo, $privacy) {
    $connection = connect();
    $hashed_password = password_hash($password, PASSWORD_BCRYPT);
    $token = bin2hex(random_bytes(50));

    $stmt = $connection->prepare("INSERT INTO users (name, email, password, age, gender, religion, caste, education, career, family, partner_age, partner_religion, partner_caste, profile_photo, privacy) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssissssssissss", $name, $email, $hashed_password, $age, $gender, $religion, $caste, $education, $career, $family, $partner_age, $partner_religion, $partner_caste, $profile_photo, $privacy);
    $stmt->execute();

    sendVerificationEmail($email, $token);

    $stmt->close();
    $connection->close();
}

// User Login
function loginUser($email, $password) {
    $connection = connect();

    $stmt = $connection->prepare("SELECT id, password FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();
    $stmt->bind_result($user_id, $hashed_password);
    $stmt->fetch();

    if ($stmt->num_rows > 0 && password_verify($password, $hashed_password)) {
        $_SESSION['user_id'] = $user_id;
        header('Location: dashboard.html');
    } else {
        echo "Invalid email or password";
    }

    $stmt->close();
    $connection->close();
}

// Profile Management
function createProfile($user_id, $name, $age, $gender, $location, $religion, $profession, $education, $family, $partner_preferences, $profile_photo, $privacy) {
    $connection = connect();

    $stmt = $connection->prepare("INSERT INTO profiles (user_id, name, age, gender, location, religion, profession, education, family, partner_preferences, profile_photo, privacy) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("isisssssssss", $user_id, $name, $age, $gender, $location, $religion, $profession, $education, $family, $partner_preferences, $profile_photo, $privacy);
    $stmt->execute();

    $stmt->close();
    $connection->close();
}

// Search and Matchmaking
function searchProfiles($age, $location, $religion, $profession) {
    $connection = connect();

    $stmt = $connection->prepare("SELECT * FROM profiles WHERE age = ? AND location = ? AND religion = ? AND profession = ?");
    $stmt->bind_param("isss", $age, $location, $religion, $profession);
    $stmt->execute();
    $result = $stmt->get_result();

    $profiles = [];
    while ($row = $result->fetch_assoc()) {
        $profiles[] = $row;
    }

    $stmt->close();
    $connection->close();

    return $profiles;
}

function calculateMatchPercentage($user_id, $matched_user_id) {
    // Placeholder for match percentage calculation logic
    return rand(70, 100);
}

// Communication System
function sendMessage($sender_id, $receiver_id, $message) {
    $connection = connect();

    $stmt = $connection->prepare("INSERT INTO messages (sender_id, receiver_id, message) VALUES (?, ?, ?)");
    $stmt->bind_param("iis", $sender_id, $receiver_id, $message);
    $stmt->execute();

    $stmt->close();
    $connection->close();
}

// Admin Features
function manageUsers($action, $user_id) {
    $connection = connect();

    if ($action === 'activate') {
        $stmt = $connection->prepare("UPDATE users SET status = 'active' WHERE id = ?");
    } elseif ($action === 'deactivate') {
        $stmt = $connection->prepare("UPDATE users SET status = 'inactive' WHERE id = ?");
    }

    $stmt->bind_param("i", $user_id);
    $stmt->execute();

    $stmt->close();
    $connection->close();
}

function verifyProfile($profile_id) {
    $connection = connect();

    $stmt = $connection->prepare("UPDATE profiles SET verified = 1 WHERE id = ?");
    $stmt->bind_param("i", $profile_id);
    $stmt->execute();

    $stmt->close();
    $connection->close();
}

function reportManagement($report_id, $action) {
    $connection = connect();

    if ($action === 'resolve') {
        $stmt = $connection->prepare("UPDATE reports SET status = 'resolved' WHERE id = ?");
    } elseif ($action === 'dismiss') {
        $stmt = $connection->prepare("UPDATE reports SET status = 'dismissed' WHERE id = ?");
    }

    $stmt->bind_param("i", $report_id);
    $stmt->execute();

    $stmt->close();
    $connection->close();
}

function getAnalytics() {
    $connection = connect();

    $stmt = $connection->prepare("SELECT COUNT(*) AS user_count FROM users");
    $stmt->execute();
    $stmt->bind_result($user_count);
    $stmt->fetch();

    $stmt->close();
    $connection->close();

    return ['user_count' => $user_count];
}
?>
