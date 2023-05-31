<?php
$title = "Home";
require("header.php");
?>
<style>
    #home-item {
        font-weight: 900;
    }

    #user-btn {
        cursor: pointer;
    }
</style>

<body class="main">
    <!-- Home starts here -->

    <?php
    require("reserve-modal.php");
    require("second-header.php");

    ?>

    <div class="home-content">
        <div class="bg"></div>
        <div class="d-grid gap-2 d-md-block" id="home-buttons">
            <h1 class="home-title"> Psalm 77:6</h1>
            <p class="verse">“I said, “Let me remember my song in the night; <br> let me meditate in my heart.” <br> Then my spirit made a diligent search.”</p>
            <a class="btn btn-primary" type="button" id="myReserveBtn" data-target-modal="reserve-modal">Reserve now</a>
            <a href="appointment.php" class="btn btn-primary" type="button" id="home-btn">Make an appointment</a>
        </div>
    </div>
    <div class="content-below my-5">
        <h1 class="text-center" id="content-title">Our venues<i class="fa-solid fa-place-of-worship" id="home-icon"></i></h1>
        <p class="text-center" id="description">Feel free to see the venues in Trinitas</p>
        <div class="gallery">
            <img src="./imgs/main.jpg" class="image" alt="">
            <img src="./imgs/newImage.jpg" class="image" alt="">
            <img src="./imgs/img10.jpg" class="image" alt="">
            <img src="./imgs/img3.jpg" class="image" alt="">

        </div>
        <div class="popup-img">
            <span>&times;</span>
            <img src="./imgs/main.jpg" alt="">
        </div>
        <div class="text-center">
            <a href="view_photos.php" class="btn btn-primary" type="button" id="home-btn-photos" style="width: 300px;">See more photos<i class="fa-solid fa-angle-right" id="see-more-icon"></i></a>
        </div>
    </div>

    <div class="map my-5">
        <h1 class="text-center" id="content-title">Trinitas Map<i class="fa-solid fa-location-dot" id="home-icon"></i></h1>
        <p class="text-center" id="description">Located in Bonga, Bacacay, Albay</p>
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3883.180983304116!2d123.75209207476742!3d13.276627987067506!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x33a1aba244e95adb%3A0x36f1747b0fa5984d!2sTrinitas%20Home%20for%20Contempation!5e0!3m2!1sen!2sph!4v1682841337230!5m2!1sen!2sph" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>
    <?php require("footer.php"); ?>

    <script>
        // PHOTO GALLERY VIEW

        document.querySelectorAll('.gallery img').forEach(image => {
            image.onclick = () => {
                document.querySelector('.popup-img').style.display = 'block';
                document.querySelector('.popup-img img').src = image.getAttribute('src');
                image.addEventListener('dblclick', () => {
                    const popupImg = document.querySelector('.popup-img');
                    const popupImgImg = document.querySelector('.popup-img img');
                    popupImgImg.src = image.src;
                    popupImg.style.display = 'block';
                    popupImgImg.classList.add('zoom');
                });

            }
        })

        document.querySelector('.popup-img span').addEventListener('click', () => {
            const popupImg = document.querySelector('.popup-img');
            const popupImgImg = document.querySelector('.popup-img img');
            popupImg.style.display = 'none';
            popupImgImg.classList.remove('zoom');
        });
    </script>

</body>