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
                    <div id="form" class="card-content">
                        <p class="title">
                            Add Students
                        </p>
                        <div id="organizerContainer"></div>
                    </div>
                </div>
            </div>
            <div class="column is-8-desktop">
                <div class="card">
                    <div class="card-content">
                        <p class="title">
                            Students
                        </p>
                        <div id="calendarContainer"></div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<link href="https://cdn.rawgit.com/nizarmah/calendar-javascript-lib/master/calendarorganizer.min.css"
        rel="stylesheet" />
<script src="https://cdn.rawgit.com/nizarmah/calendar-javascript-lib/master/calendarorganizer.min.js"></script>
<script>
    // Basic config
    var calendar = new Calendar("calendarContainer", "medium",
        ["Monday", 3],
        ["hsl(171, 100%, 41%)", "hsl(171, 100%, 29%)", "hsl(0, 0%, 100%)", "hsl(142, 52%, 96%)"],
        {
            days: ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"],
            months: ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"],
            indicator: false,
            placeholder: "<span>Custom Placeholder</span>"
        });

    var data = {
        2023: {
            3: {
                5: [
                    {
                        startTime: "00:00",
                        endTime: "24:00",
                        text: "Christmas Day"
                    }
                ]
            }
        }
    };

    var organizer = new Organizer("organizerContainer", calendar, data);
</script>
</body>
<?php include "public/partials/html_footer.php"; ?>

</html>