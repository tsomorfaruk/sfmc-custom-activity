<!DOCTYPE html>
<html>
<head>
    <script src="https://unpkg.com/postmonger"></script>
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
</script>
</body>
</html>
