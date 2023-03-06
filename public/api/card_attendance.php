<?php
$student_card_id = $_GET['card'];
$student = $pdo->prepare("SELECT * FROM students WHERE student_card_id = :student_card_id");
$student->execute([':student_card_id' => $student_card_id]);

if ($student->rowCount() == 0) {
    die(json_encode([
        'api_status' => 'card_error',
        'api_event' => 'invalid_card',
        'api_text' => 'Card in not Enrolled',
    ]));
}

$student_card_id = $_GET['card'];
$student_log = $pdo->prepare("SELECT * FROM students_logs WHERE student_card_id = :student_card_id ORDER BY id DESC LIMIT 1");
$student_log->execute([':student_card_id' => $student_card_id]);

$now = date('Y-m-d H:i:s');

if ($student_log->rowCount() == 0 || $student_log->fetch()['student_card_out'] !== null) {
    // add new log
    $stmt = $pdo->prepare("INSERT INTO students_logs (student_name, student_id, student_section, student_card_id, student_time_in, student_card_out, device_name, device_room) 
                            VALUES (:student_name, :student_id, :student_section, :student_card_id, :student_time_in, :student_card_out, :device_name, :device_room)");
    $stmt->execute([
        ':student_name' => "Kent",
        ':student_id' => "123456",
        ':student_section' => "ST12P1",
        ':student_card_id' => $student_card_id,
        ':student_time_in' => $now,
        ':student_card_out' => null,
        ':device_name' => "Room 1",
        ':device_room' => "Room 1"
    ]);
} else {
    // update existing log
    $stmt = $pdo->prepare("UPDATE students_logs SET student_time_out = :now WHERE student_card_id = :student_card_id AND student_time_out IS NULL");
    $stmt->execute([':student_card_id' => $student_card_id, ':now' => $now]);
}


// echo "<pre>";
// print_r($student_log->fetch());
// echo "</pre>";



// $row = $student->fetch();

// $data['api_status'] = "success";
// $data['api_event'] = "time_in";
// $data['api_message'] = "logged in";
// $data['data']['student_name'] = $row['student_name'];
// $data['data']['student_section'] = $row['student_section'];
// $data['data']['student_room'] = $row['student_room'];
// $data['data']['student_status'] = "arrived on time";
// $data['data']['student_message'] = "Welcome Kent";
// $data['data']['event_time'] = "02:02:02";
// $data['data']['student_date'] = "03/03/03";



// $query = "SELECT * FROM students";
// $stmt = $pdo->prepare($query);
// $stmt->execute();

// while ($row = $stmt->fetch()) {
//     echo $row['student_card_id'] . "<br>";
// }

// echo json_encode($data, JSON_PRETTY_PRINT);