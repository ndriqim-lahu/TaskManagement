<?php
session_start();
define("LOGIN_SESSION_KEY", "logged_in");
if (
    !isset($_SESSION[LOGIN_SESSION_KEY]) ||
    $_SESSION[LOGIN_SESSION_KEY] != true
) {
    //redirect
    header("Location: ajax-example/index.php");
    die();
}
?>

<html>

<head>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
</head>

<body>
    <button id="refresh_button">Refresh</button>
    <button id="previous_button">Previous </button>
    <span id="page_nr">1</span>
    <button id="next_button">Next</button>
    <ul id="ul_items"></ul>
</body>
<script>
    let currentPage = 1;
    let isFetchingData = false;
    $("#refresh_button").click(function() {
        fetchData(currentPage);
    });
    $("#previous_button").click(function() {
        if (isFetchingData) {
            return;
        }

        if (currentPage - 1 <= 0) {
            return;
        }
        currentPage--;
        fetchData(currentPage);
        $("#page_nr").html(currentPage);
    });
    $("#next_button").click(function() {
        if (isFetchingData) {
            return;
        }
        
        currentPage++;
        fetchData(currentPage);
        $("#page_nr").html(currentPage);
    });
    $(document).ready(function() {
        fetchData(currentPage);
    });

    function fetchData(pageNr) {
        if (isFetchingData) {
            return;
        }

        isFetchingData = true;
        /*$.get("/ajax-example/timeline_ajax.php", function(response) {
            for (let i = 0; i < response.data.length; i++) {
                $("#ul_items").append("<li>" + response.data[i] + "</li>");
            }
        });*/
        const apiEndpoint = "https://gorest.co.in/public-api/users?page=" + pageNr;
        $.get(apiEndpoint, function(response) {
            isFetchingData = false;
            $("#ul_items").html("");
            for (let i = 0; i < response.data.length; i++) {
                const jsonItem = response.data[i];
                // {id}:name email gender status
                const item = jsonItem.id + ":" + jsonItem.name + " " + jsonItem.email + " " + jsonItem.gender + " " + jsonItem.status;
                $("#ul_items").append("<li>" + item + "<button onclick='showPostsCount(" + jsonItem.id + ")'>Show posts count</button></li>");
            }
        });
    }

    function showPostsCount(userId) {
        const apiEndpoint = "https://gorest.co.in/public-api/posts?user_id=" + userId;
        $.get(apiEndpoint, function(response) {
            const total = response.meta.pagination.total;
            alert("This user[" + userId + "] has " + total + " posts.");
        });
    }
</script>

</html>