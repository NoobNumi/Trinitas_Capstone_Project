<?php     
    $title = "Photos";
    require ("header.php");
?>
<style>
    #home-item{
        font-weight: 900;
    }
    #user-btn{
        cursor: pointer;
    }
</style>
<body class="main">

    <?php require ("second-header.php");?>
    <a href="index.php" class="back my-5"><i class="fa-solid fa-chevron-left" id="prev-icon"></i></a>
        <div class="gallery" style="padding: 3rem;">
            <img src="./imgs/main.jpg" class="image" alt="">
            <img src="./imgs/newImage.jpg" class="image" alt="">
            <img src="./imgs/img10.jpg" class="image" alt="">
            <img src="./imgs/img3.jpg" class="image" alt="">
            <img src="./imgs/img1.jpg" class="image" alt="">
            <img src="./imgs/img2.jpg" class="image" alt="">
            <img src="./imgs/img7.jpg" class="image" alt="">
            <img src="./imgs/img8.jpg" class="image" alt="">
            <img src="./imgs/img9.jpg" class="image" alt="">
            <img src="./imgs/img11.jpg" class="image" alt="">
            <img src="./imgs/img12.jpg" class="image" alt="">
            <img src="./imgs/bgImage.png" class="image" alt="">
            <img src="./imgs/img16.jpg" class="image" alt="">
            <img src="./imgs/img13.jpg" class="image" alt="">
            <img src="./imgs/img14.jpg" class="image" alt="">
            <img src="./imgs/img15.jpg" class="image" alt="">
        </div>
    
        <div class="popup-img">
            <span>&times;</span>
            <img src="./imgs/main.jpg" alt="">
        </div>
    <?php  require ("footer.php"); ?>

</body>