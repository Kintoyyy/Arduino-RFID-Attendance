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
                <div class="card">
                    <div class="card-content">
                        <p class="title">
                            Logs
                            <button class="button is-outlined">Export</button>
                        </p>
                        <div class="table-container">
                            <div class="table-container">
                                <table class="table is-fullwidth is-hoverable is-horizontal">
                                    <thead>
                                        <tr>
                                            <th><abbr title="student">Student</abbr></th>
                                            <th><abbr title="section">Section</abbr></th>
                                            <th><abbr title="device">Device</abbr></th>
                                            <th><abbr title="Room">Room</abbr></th>
                                            <th><abbr title="time_in">Time In</abbr></th>
                                            <th><abbr title="time_out">Time Out</abbr></th>
                                            <th><abbr title="destination">Event</abbr></th>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th data-label="Student">Kent Rato</th>
                                            <td data-label="Student">ST12P1</td>
                                            <td>8172353</td>
                                            <td>A1-301</td>
                                            <td>3:00 PM</td>
                                            <td>3:23 PM</td>
                                            <td>Dismisal</td>
                                        </tr>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
</body>
<?php include "public/partials/html_footer.php"; ?>

</html>