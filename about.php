<?php
    $title = "About";
    require ("header.php");
?>
<style>
    #about-item{
        font-weight: 900;
    }
    #user-btn{
        cursor: pointer;
    }
</style>
<body class="main">
    <?php 
        require ("second-header.php"); 
        require ("footer.php"); 
    ?>



    <script>
        const popoverTriggerList = document.querySelectorAll('[data-bs-toggle="popover"]')
        const popoverList = [...popoverTriggerList].map(popoverTriggerEl => new bootstrap.Popover(popoverTriggerEl))

    </script>
</body>
