<?php
if (isset($_GET['get_hallpass'])) {
    $stmt = $pdo->prepare("SELECT * FROM hallpass_data WHERE keypad_key = ?");
    $stmt->execute([$_GET['get_hallpass']]);
    echo json_encode($stmt->fetch(PDO::FETCH_ASSOC));
    die;
}

if (isset($_GET['dest'])) {
    $stmt = $pdo->prepare("SELECT * FROM hallpass_data WHERE keypad_key = ?");
    $stmt->execute([$_GET['get_hallpass']]);
    echo json_encode($stmt->fetch(PDO::FETCH_ASSOC));
    die;
}


if ($row['student_state'] == 0) {

    $stmt = $pdo->prepare('INSERT INTO attendance_logs (student_id, api_log, attendance_event, time_in) VALUES (?, ?, ?,?)');
    $stmt->execute([$student_id, 3, "ARRIVED!", $now]);
    $stmt->bindParam(':student_id', $student_id);
    // echo json_encode(array('status' => 'success'));

} else if ($row['student_state'] == 1) {
    $stmt = $pdo->prepare("UPDATE attendance_logs SET time_out = :time_out, attendance_event = :attendance_event WHERE student_id = :student_id ORDER BY id DESC LIMIT 1");
    $stmt->bindParam(':student_id', $student_id);
    $stmt->bindValue(':time_out', $now);
    $stmt->bindValue(':attendance_event', "DEPARTED!");
    $stmt->execute();

}