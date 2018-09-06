<div class="d-flex pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Live Chats</h1>
</div>

<div>
    <?php include 'http://localhost:8088/admin.php'; ?>
    <script>socket.connect('http://localhost:8088');</script>
</div>