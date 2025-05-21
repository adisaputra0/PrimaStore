<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chat</title>
</head>
<body>

    <table id="table-message" border="1" style="font-size: 78px">
        <tr>
            <td>NAME</td>
            <td>MESSAGE</td>
        </tr>
    </table>

<script src="https://js.pusher.com/8.0.1/pusher.min.js"></script>
<script>
    var pusher = new Pusher("prrx3vtblnq3tg4myiff", {
        cluster: "",
        enabledTransports: ['ws'],
        forceTLS:false,
        wsHost: "127.0.0.1",
        wsPort: "8080"
    });

    var channel = pusher.subscribe("chat-messages");
    channel.bind("App\\Events\\MessageSentEvent", (data) => {
    console.log("Event received:", data);  // Tambahkan ini untuk debug
    let tableBid = document.getElementById('table-message');
    var row = tableBid.insertRow();
    var cell1 = row.insertCell(0);
    var cell2 = row.insertCell(1);
    cell1.innerHTML = data.name;
    cell2.innerHTML = data.message;
});
</script>
</body>
</html>
