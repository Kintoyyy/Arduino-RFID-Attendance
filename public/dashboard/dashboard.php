<?php

if (isset($_GET['type'])) {
    try {

        switch ($_GET['type']) {
            case 1:
                $type = "ABSENT";
                break;
            case 2:
                $type = "LATE";
                break;

            case 3:
                $type = "PRESENT";

                break;

            default:
                $type = "ABSENT";
                break;
        }
        $stmt = $pdo->prepare("UPDATE students_data SET student_status = :student_status WHERE id = :id");
        $stmt->bindParam(':student_status', $type);
        $stmt->bindParam(':id', $_GET['student_id']);
        $stmt->execute();
        echo json_encode(array('status' => 'success'));
    } catch (PDOException $e) {
        echo json_encode(array('status' => 'error', 'message' => $e->getMessage()));

    }
    die;
}
if (isset($_GET['get-student-table'])) {
    try {
        $stmt = $pdo->query('SELECT students_data.*,  student_sections.section_name, student_sections.section_adviser
        FROM students_data
        JOIN student_sections ON students_data.student_section = student_sections.id');
        echo json_encode($stmt->fetchAll(PDO::FETCH_ASSOC));
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
    die;
}

if (isset($_GET['edit_student'])) {
    try {
        $stmt = $pdo->prepare("SELECT students_data.*,  student_sections.section_name, student_sections.section_adviser
        FROM students_data
        JOIN student_sections ON students_data.student_section = student_sections.id
        WHERE students_data.id = :id");
        $stmt->bindParam(':id', $_GET['edit_student']);
        $stmt->execute();
        echo json_encode($stmt->fetch(PDO::FETCH_ASSOC));
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
    die;
}

if (isset($_GET['get-table'])) {
    try {
        $stmt = $pdo->query('SELECT students_data.*, device_data.device_name, student_sections.section_name, student_sections.section_adviser
        FROM students_data
        JOIN student_sections ON students_data.student_section = student_sections.id
        JOIN device_data ON students_data.student_registered = device_data.id');
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode($result);
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
    die;
}



if (isset($_GET['get-stats'])) {
    try {
        $stmt = $pdo->prepare("SELECT 
        COUNT(CASE WHEN student_status = 'PRESENT' THEN 1 END) as present_count,
        COUNT(CASE WHEN student_status = 'ABSENT' THEN 1 END) as absent_count,
        COUNT(CASE WHEN student_status = 'LATE' THEN 1 END) as late_count
        FROM students_data;");
        $stmt->execute();
        // $stmt->execute([$_GET['edit_student']]);
        echo json_encode($stmt->fetch(PDO::FETCH_ASSOC));
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
    die;
}




if (isset($_GET['get-log-table'])) {
    try {
        $stmt = $pdo->query('SELECT * FROM attendance_logs');

        $stmt = $pdo->query('SELECT attendance_logs.attendance_event, attendance_logs.log_time, students_data.student_name
        FROM attendance_logs
        JOIN students_data ON attendance_logs.student_id = students_data.id
        ORDER BY attendance_logs.log_time DESC;
        -- JOIN student_sections ON students_data.students_section = student_sections.id;s
        ');


        echo json_encode($stmt->fetchAll(PDO::FETCH_ASSOC));
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
    die;
}
?>

<!DOCTYPE html>
<html>
<?php include "public/partials/html_headers.php"; ?>
<?php include "public/partials/html_navbar_top.php"; ?>

<body>
    <?php include "public/partials/html_hero_header.php"; ?>

    <section class="section">
        <div class="container">
            <div class="columns">
                <div class="column">
                    <div class="columns is-mobile">
                        <div class="column is-8-mobile">
                            <div class="box">
                                <div class="columns is-mobile">
                                    <div class="column">
                                        <p class="title is-1 has-text-primary" id="present"></p>
                                        <p class="subtitle">Present</p>
                                    </div>
                                    <div
                                        class="column is-4-mobile is-5-tablet is-3-desktop is-flex is-align-items-center">
                                        <span class="icon">
                                            <i
                                                class="fa-sharp fa-solid fa-3x has-text-primary-light fa-user-graduate"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="column is-6-tablet">
                            <div class="box">
                                <div class="columns is-mobile">
                                    <div class="column">
                                        <p class="title is-1 has-text-info" id="late"></p>
                                        <p class="subtitle">Late</p>
                                    </div>
                                    <div class="column is-hidden-touch is-3 is-flex is-align-items-center">
                                        <span class="icon">
                                            <i class="fa-sharp fa-solid fa-3x has-text-info-light fa-clock"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="column">
                    <div class="columns is-mobile">
                        <div class="column is-5-tablet">
                            <div class="box">
                                <div class="columns is-mobile">
                                    <div class="column">
                                        <p class="title is-1 has-text-danger" id="absent"></p>
                                        <p class="subtitle">Absent</p>
                                    </div>
                                    <div class="column is-3-desktop is-flex is-align-items-center is-hidden-touch">
                                        <span class="icon">
                                            <i class="fa-sharp fa-solid fa-3x has-text-danger-light fa-question"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="column is-8-mobile">
                            <div class="box">
                                <p class="title is-1">3i Defense</p>
                                <p class="subtitle">12:00 - 2:00 PM</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="columns is-desktop">
                <div class="column is-7-desktop is-12-tablet">
                    <div class="card">
                        <div class="card-content">
                            <p class="title">
                                Students
                            </p>
                            <div class="table-container">
                                <div class="table-container">
                                    <table class="table is-fullwidth is-hoverable is-horizontal" id="studentTable">
                                        <thead>
                                            <tr>

                                                <th><abbr title="student">Student</abbr></th>
                                                <th><abbr title="section">Section</abbr></th>
                                                <th><abbr title="section">Status</abbr></th>
                                                <th><abbr title="uid">ID</abbr></th>
                                                <th><abbr title="edit">Edit</abbr></th>
                                        </thead>
                                        <tbody>
                                            <tr class="has-background-primary-light">
                                                <th data-label="Student"></th>
                                                <td data-label="Student"></td>
                                                <td></td>
                                                <td>
                                                    <button
                                                        class="button is-primary is-small is-fullwidth js-modal-trigger"
                                                        data-target="modal-student">
                                                        <div class="icon is-small">
                                                            <i class="fa-sharp fa-solid fa-pen"></i>
                                                        </div>
                                                        <span>Edit</span>
                                                    </button>
                                                </td>
                                            </tr>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="column is-5-desktop is-12-tablet">
                    <div class="card">
                        <div class="card-content">
                            <p class="title">
                                Logs
                            </p>
                            <div class="table-container">
                                <table class="table is-fullwidth is-hoverable is-horizontal" id="logsTable">
                                    <thead>
                                        <tr>
                                            <th><abbr title="time">Time</abbr></th>
                                            <th><abbr title="student">Student</abbr></th>
                                            <!-- <th><abbr title="section">Section</abbr></th> -->
                                            <th><abbr title="event">Event</abbr></th>
                                    </thead>
                                    <tbody>
                                        <form action="" method="post">
                                            <input type="tex" name="id" hidden>
                                        </form>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div id="modal-student" class="modal">
        <div class="modal-background"></div>
        <div class="modal-card">
            <section class="modal-card-body card">
                <div class="card-image">
                    <figure class="image is-4by3">
                        <img src="\assets\img\istockphoto-1164822188-612x612.jpg" alt="Placeholder image">
                    </figure>
                </div>
                <form class="card-content">
                    <div class="media">
                        <!-- <div class="media-left">
                            <figure class="image is-48x48">
                                <img src="https://bulma.io/images/placeholders/96x96.png" alt="Placeholder image">
                            </figure>
                        </div> -->
                        <div class="media-content">
                            <p class="title is-4" id="student_name"></p>
                            <!-- <p class="subtitle is-6">@kintoyyy</p> -->
                        </div>
                    </div>

                    <div class="content">
                        <ul>
                            <li id="student_section"></li>
                            <li id="student_adviser"></li>
                            <li id="student_id"></li>
                            <li id="student_status"></li>
                            <li id="student_gender"></li>

                            <!-- <li>Class: PM</li> -->
                        </ul>
                    </div>
                    <input type="text" name="id" id="id" hidden>
                </form>
                <footer class="card-footer">
                    <button class="card-footer-item button is-danger" onclick="attendance(1)">
                        <div class="icon is-small">
                            <i class="fa-sharp fa-solid fa-question"></i>
                        </div>
                        <span>Absent</span>
                    </button>
                    <button class="card-footer-item button is-info" onclick="attendance(2)">
                        <div class="icon is-small">
                            <i class="fa-sharp fa-solid fa-clock"></i>
                        </div>
                        <span>Late</span>
                    </button>
                    <button class="card-footer-item button is-success" onclick="attendance(3)">
                        <div class="icon is-small">
                            <i class="fa-sharp fa-solid fa-user-graduate"></i>
                        </div>
                        <span>Present</span>
                    </button>
                </footer>
            </section>
        </div>
    </div>



    <script>

        var modal = document.getElementById("modal-student");

        function openmodal(id) {
            $.ajax({
                type: 'GET',
                data: { 'edit_student': id },
                success: function (response) {
                    var result = JSON.parse(response);
                    console.log(response)
                    $('#student_name').text(result.student_name)
                    $('#student_adviser').text("Adviser: " + result.section_adviser)
                    $('#student_id').text("Student: " + result.student_id)
                    $('#student_status').text("Status: " + result.student_status)
                    $('#student_section').text("Section: " + result.section_name)
                    $('#student_gender').text("Gender: " + result.student_gender)
                    $('#id').val(result.id)
                    // $('#student_id').val(result.student_id)
                    // $('#student_card_id').val(result.student_card_id)
                    // $('#student_adviser').val(result.student_adviser)
                    // $('#apikey').val(result.student_adviser)

                }
            });
            console.log(id);
            modal.classList.add("is-active");

        }


        window.onclick = function (event) {
            if (event.target == modal) {
                modal.classList.remove("is-active");
            }
        };
    </script>

    <script>
        $(document).ready(function () {
            loadLogTable();
            loadStudentTable();
            loadstats();
        });

        setInterval(function () {
            loadLogTable();
            loadStudentTable();
            loadstats();
        }, 5000);

        function loadLogTable() {
            $.ajax({
                type: 'GET',
                data: 'get-log-table',
                success: function (response) {
                    // console.log(response)
                    var result = JSON.parse(response);
                    var tbody = $('#logsTable tbody');
                    tbody.empty();
                    for (var i = 0; i < 10; i++) {
                        var device = result[i];
                        var tr = $('<tr>');
                        tr.append($('<td>').text(convertTime(device.log_time)));
                        tr.append($('<td>').text(device.student_name));
                        tr.append($('<td>').text(device.attendance_event));


                        tbody.append(tr);
                    }
                }
            });
        }

        function attendance(type) {
            var id = $("#id").val();
            $.ajax({
                type: 'GET',
                data: {
                    "student_id": id,
                    "type": type
                },
                success: function (response) {
                    openmodal(id)
                    loadLogTable();
                    loadStudentTable();
                    loadstats();
                    setInterval(function () {
                        modal.classList.remove("is-active");
                    }, 1000);
                }
            });
        }

        function loadstats() {
            $.ajax({
                type: 'GET',
                data: 'get-stats',
                success: function (response) {
                    // console.log(response)
                    var result = JSON.parse(response);
                    var tbody = $('#logsTable tbody');
                    $('#present').text(result.present_count)
                    $('#absent').text(result.absent_count)
                    $('#late').text(result.late_count)
                }
            });
        }


        function loadStudentTable() {
            $.ajax({
                type: 'GET',
                data: 'get-student-table',
                success: function (response) {
                    var result = JSON.parse(response);
                    var tbody = $('#studentTable tbody');
                    tbody.empty();

                    for (var i = 0; i < 20; i++) {
                        var student = result[i];
                        var tr = $('<tr>');

                        // Set the background color of the row based on the attendance event
                        if (student.attendance_event == 'PRESENT') {
                            tr.addClass('has-background-primary-light');
                        } else if (student.attendance_event == 'ABSENT') {
                            tr.addClass('has-background-danger-light');
                        } else if (student.attendance_event == 'LATE') {
                            tr.addClass('has-background-info-light');
                        }

                        tr.append($('<th>').text(student.student_name));
                        tr.append($('<td>').text(student.section_name));
                        tr.append($('<td>').text((student.student_status == "") ? "Not Around" : student.student_status));
                        tr.append($('<td>').text(student.student_id));
                        tr.append($('<td>').html('<button class="button is-primary is-small is-fullwidth" onclick="openmodal(' + student.id + ')"><div class="icon is-small"><i class="fa-sharp fa-solid fa-pen"></i></div><span>Edit</span></button>'));

                        tbody.append(tr);
                    }
                }
            });
        }



        function convertTime(dateTime) {
            const date = new Date(dateTime);

            const month = date.getMonth() + 1;
            const day = date.getDate();
            const year = date.getFullYear().toString().substr(-2);

            const hours = date.getHours();
            const minutes = date.getMinutes();
            const ampm = hours >= 12 ? 'PM' : 'AM';
            const formattedHours = hours % 12 || 12;

            return `${month}/${day}/${year} - ${formattedHours}:${minutes < 10 ? '0' + minutes : minutes} ${ampm}`;
        }
    </script>
    <script>document.addEventListener('DOMContentLoaded', () => {
            // Functions to open and close a modal
            function openModal($el) {
                $el.classList.add('is-active');
            }

            function closeModal($el) {
                $el.classList.remove('is-active');
            }

            function closeAllModals() {
                (document.querySelectorAll('.modal') || []).forEach(($modal) => {
                    closeModal($modal);
                });
            }

            // Add a click event on buttons to open a specific modal
            (document.querySelectorAll('.js-modal-trigger') || []).forEach(($trigger) => {
                const modal = $trigger.dataset.target;
                const $target = document.getElementById(modal);

                $trigger.addEventListener('click', () => {
                    openModal($target);
                });
            });

            // Add a click event on various child elements to close the parent modal
            (document.querySelectorAll('.modal-background, .modal-close, .modal-card-head .delete, .modal-card-foot .button') || []).forEach(($close) => {
                const $target = $close.closest('.modal');

                $close.addEventListener('click', () => {
                    closeModal($target);
                });
            });

            // Add a keyboard event to close all modals
            document.addEventListener('keydown', (event) => {
                const e = event || window.event;

                if (e.keyCode === 27) { // Escape key
                    closeAllModals();
                }
            });
        });</script>

</body>
<?php include "public/partials/html_footer.php"; ?>

</html>