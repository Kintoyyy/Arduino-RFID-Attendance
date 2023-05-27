<?php

$now = date('Y-m-d H:i:s');
$api_key = $_GET['api_key'];
$student_card_id = "";
$student_id = "";

// $log = $pdo->prepare("INSERT INTO logsss (card) VALUES (?)");
// // $log->bindValue(':device_id', 11);
// $log->bindValue(':card', $_GET['card']);
// // $log->bindValue(':api_log', 3);
// // $log->bindValue(':device_event', "card");
// $log->execute();


if (isset($_GET['card'])) {
    $student_card_id = $_GET['card'];
    $student = $pdo->prepare("SELECT students_data.*, device_data.device_name, student_sections.section_name, student_sections.section_name
                            FROM students_data
                            JOIN student_sections ON students_data.student_section = student_sections.id
                            JOIN device_data ON students_data.student_registered = device_data.id
                            WHERE student_card_id = ?");
    $student->execute([$student_card_id]);

    $stmt = $pdo->prepare('INSERT INTO logsss (card) VALUES (?)');
    $stmt->execute([$_GET['card']]);


} elseif (isset($_GET['student_id'])) {
    $student_id = $_GET['student_id'];
    $student = $pdo->prepare("SELECT students_data.*, device_data.device_name, student_sections.section_name, student_sections.section_name
                            FROM students_data
                            JOIN student_sections ON students_data.student_section = student_sections.id
                            JOIN device_data ON students_data.student_registered = device_data.id
                            WHERE student_id = ?");
    $student->execute([$student_id]);
}
//  else {
//     $stmt = $pdo->query('SELECT students_data.*, device_data.device_name, student_sections.section_name, student_sections.section_adviser
//                         FROM students_data
//                         JOIN student_sections ON students_data.student_section = student_sections.id
//                         JOIN device_data ON students_data.student_registered = device_data.id');
//     $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
//     echo json_encode($result);
//     die;
// }


// $stmt = $pdo->prepare('INSERT INTO attendance_logs (student_id, api_log,attendance_event, time_in) VALUES (?, ?, ?,?)');
// $stmt->execute([$student_id, 3, "", $now]);


if ($student->rowCount() == 0) {
    die(json_encode([
        'api_status' => 'card_error',
        'api_event' => 'invalid_card',
        'api_text' => 'Card is not enrolled',
    ]));
} else {
    $row = $student->fetch();
    $student_id = $row['id'];

    $data['student_name'] = $row['student_name'];
    $data['student_section'] = $row['section_name'];
    $data['api_status'] = "success";


    if ($row['student_state'] == 0) {
        $data['api_event'] = "time_in";
        $data['api_message'] = "LOGGED IN";
        $data['student_status'] = "Arrived on time!";
        $data['student_room'] = "A2-301";
        $data['door_access'] = true;

    } else if ($row['student_state'] == 1) {
        $data['student_room'] = "A2-301";
        $data['api_event'] = "time_out";
        $data['api_message'] = "LOGGED OUT";
        $data['student_status'] = "Take Care!";
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


    // if ($row['student_state'] == 0) {

    //     $stmt = $pdo->prepare('INSERT INTO attendance_logs (student_id, api_log,attendance_event, time_in) VALUES (?, ?, ?,?)');
    //     $stmt->execute([$student_id, 3, "ARRIVED!", $now]);
    //     // echo json_encode(array('status' => 'success'));

    // } else if ($row['student_state'] == 1) {
    //     $stmt = $pdo->prepare("UPDATE attendance_logs SET time_out = :time_out, attendance_event = :attendance_event WHERE student_id = :student_id ORDER BY id DESC LIMIT 1");
    //     $stmt->bindParam(':student_id', $student_id);
    //     $stmt->bindValue(':time_out', $now);
    //     $stmt->bindValue(':attendance_event', "DEPARTED!");
    //     $stmt->execute();

    // }



    $stmt = $pdo->prepare("UPDATE students_data SET student_state = :student_state,student_status = :student_status WHERE id = :id");
    $stmt->bindParam(':id', $student_id);
    $stmt->bindValue(':student_state', ($row['student_state'] == 1) ? 0 : 1);
    $stmt->bindValue(':student_status', ($row['student_state'] == 0) ? "PRESENT" : "");
    $stmt->execute();

    // NOTE: NEED update ;)
// Log the values

}


// // Ambot naunsa ni diri
// $student_card_id = $_GET['card'];
// $student_log = $pdo->prepare("SELECT * FROM attendance_logs WHERE student_id = :student_id ORDER BY id DESC LIMIT 1");
// $student_log->execute([':student_card_id' => $student_card_id]);

// if ($student_log->rowCount() == 0 || $student_log->fetch()['student_card_out'] !== null) {
//     // add new log
//     $stmt = $pdo->prepare("INSERT INTO attendance_logs (student_name, student_id, student_section, student_card_id, student_time_in, student_card_out, device_name, device_room) 
//                             VALUES (:student_name, :student_id, :student_section, :student_card_id, :student_time_in, :student_card_out, :device_name, :device_room)");
//     $stmt->execute([
//         ':student_name' => "Kent",
//         ':student_id' => "123456",
//         ':student_section' => "ST12P1",
//         ':student_card_id' => $student_card_id,
//         ':student_time_in' => $now,
//         ':student_card_out' => null,
//         ':device_name' => "Room 1",
//         ':device_room' => "Room 1"
//     ]);
// } else {
//     // update existing log
//     $stmt = $pdo->prepare("UPDATE students_data_logs SET student_time_out = :now WHERE student_card_id = :student_card_id AND student_time_out IS NULL");
//     $stmt->execute([':student_card_id' => $student_card_id, ':now' => $now]);
// }


// echo "<pre>";
// print_r($student_log->fetch());
// echo "</pre>";



// $row = $student->fetch();

// $data['api_status'] = "success";
// $data['api_event'] = "time_in";
// $data['api_message'] = "logged in";
// $data['student_name'] = $row['student_name'];
// $data['student_section'] = $row['student_section'];
// $data['student_room'] = $row['student_room'];
// $data['student_status'] = "arrived on time";
// $data['student_message'] = "Welcome Kent";
// $data['event_time'] = "02:02:02";
// $data['student_date'] = "03/03/03";



// $query = "SELECT * FROM students_data";
// $stmt = $pdo->prepare($query);
// $stmt->execute();

// while ($row = $stmt->fetch()) {
//     echo $row['student_card_id'] . "<br>";
// }

echo json_encode($data, JSON_PRETTY_PRINT);