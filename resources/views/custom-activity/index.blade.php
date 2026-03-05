<!DOCTYPE html>
<html>
<head>
    {{--<script src="https://unpkg.com/postmonger"></script>--}}
    <script src="https://unpkg.com/postmonger@0.0.16/postmonger.js"></script>
</head>
<body>
<h3>Custom Activity Config</h3>
<input type="text" id="apiUrl" placeholder="Write a Message">
<button id="save">Save</button>

<script>
    var connection = new Postmonger.Session();

    connection.on("initActivity", function(data) {
        console.log(data);
    });

    document.getElementById("save").onclick = function() {
        connection.trigger("updateActivity", {});
    };

    /*var connection = new Postmonger.Session();

    // 1. Listen for the initActivity event sent by SFMC
    connection.on("initActivity", function(data) {
        console.log("Activity Initialized:", data);
        if (data) {
            // Populate your UI fields with existing data if needed
            document.getElementById("apiUrl").value = data.arguments.execute.inArguments[0].message || '';
        }
    });*/

    // 2. Tell Journey Builder the activity is ready to be displayed
    // Without this, the loader will spin indefinitely or fail
    /*connection.trigger('ready');

    document.getElementById("save").onclick = function() {
        const message = document.getElementById("apiUrl").value;

        // 3. Update the activity's configuration in the journey
        connection.trigger("updateActivity", {
            arguments: {
                execute: {
                    inArguments: [{ "message": message }]
                }
            },
            metaData: {
                isConfigured: true // Marks the activity as "Done" in the UI
            }
        });
    };*/
</script>
</body>
</html>
