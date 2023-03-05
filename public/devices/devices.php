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
                    <form id="form" class="card-content" onsubmit="return false">

                        <p class="title">
                            Add Devices
                        </p>
                        <div>
                            <div class="field">
                                <p class="control has-icons-left has-icons-right">
                                    <input class="input" type="text" placeholder="Device">
                                    <span class="icon is-small is-left">
                                        <i class="fa-solid fa-server"></i>
                                    </span>
                                </p>
                            </div>

                            <div class="field">
                                <p class="control has-icons-left has-icons-right">
                                    <input class="input" type="text" placeholder="Room" value="">
                                    <span class="icon is-small is-left">
                                        <i class="fa-solid fa-chalkboard-user"></i>
                                    </span>
                                </p>
                            </div>

                            <div class="field">
                                <p class="control has-icons-left">
                                    <span class="select is-fullwidth">
                                        <select>
                                            <option selected disabled>Mode</option>
                                            <option value="0">Enrollment</option>
                                            <option value="1">Attendance</option>
                                        </select>
                                    </span>
                                    <span class="icon is-small is-left">
                                        <i class="fa-solid fa-gears"></i>
                                    </span>
                                </p>
                            </div>

                            <div class="field is-grouped">
                                <p class="control is-expanded">
                                    <input id="apikey" class="input" type="text" placeholder="API Key">
                                </p>
                                <p class="control">
                                    <button id="keygen" class="button is-warning">
                                        <div class="icon">
                                            <i class="fa-solid fa-dice"></i>
                                        </div>
                                        <span>Generate API</span>
                                    </button>
                                </p>
                            </div>

                            <div class="field is-grouped">

                                <p class="control">
                                    <button class="button is-success">
                                        <div class="icon">
                                            <i class="fa-solid fa-plus"></i>
                                        </div>
                                        <span>Add Device</span>
                                    </button>
                                </p>

                                <p class="control">
                                    <button class="button is-danger">
                                        <div class="icon">
                                            <i class="fa-solid fa-trash"></i>
                                        </div>
                                        <span>Clear</span>
                                    </button>
                                </p>


                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="column is-8-desktop">
                <div class="card">
                    <div class="card-content">
                        <p class="title">
                            Devices
                        </p>
                        <div class="table-container">
                            <div class="table-container">
                                <div class="table-container">
                                    <div class="table-container">
                                        <table class="table is-fullwidth is-hoverable is-horizontal">
                                            <thead>
                                                <tr>
                                                    <th><abbr title="device_name">Name</abbr></th>
                                                    <th><abbr title="device_dep">Room</abbr></th>
                                                    <th><abbr title="mode">Mode</abbr></th>
                                                    <th><abbr title="api_key">Api</abbr></th>
                                                    <th><abbr title="created">Created</abbr></th>
                                                    <th><abbr title="edit">Edit</abbr></th>

                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>ST12P1</td>
                                                    <td>A1-301</td>
                                                    <td>Attendance</td>
                                                    <td>kyuigYG72</td>
                                                    <td>3/43/1232</td>
                                                    <td> <button
                                                            class="button is-success is-small js-modal-trigger is-right  is-fullwidth"
                                                            data-target="modal-student">
                                                            Edit
                                                        </button></td>
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
        </div>
    </div>
</section>


<script>
    /**
 * Function to produce UUID.
 * See: http://stackoverflow.com/a/8809472
 */
    function generateUUID() {
        var d = new Date().getTime();

        if (window.performance && typeof window.performance.now === "function") {
            d += performance.now();
        }

        var uuid = 'xx-4xxx-yxxx-xxxx'.replace(/[xy]/g, function (c) {
            var r = (d + Math.random() * 16) % 16 | 0;
            d = Math.floor(d / 16);
            return (c == 'x' ? r : (r & 0x3 | 0x8)).toString(18);
        });

        // navigator.clipboard.writeText(uuid);

        return uuid;
    }

    $('#keygen').on('click', function () {
        $('#apikey').val(generateUUID());
    });
</script>
</body>
<?php include "public/partials/html_footer.php"; ?>

</html>