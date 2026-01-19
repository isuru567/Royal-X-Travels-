<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../homeSlider/homslider.css">
</head>

<body>
    <div class="carousel--extra">
        <div class="carousel--extra2">
            <div class="carousel">
                <!-- list item -->
                <div class="list">
                    <div class="item active" data-index="0">
                        <img src="../Assets/images/home/img1.webp" class="hero--img">
                        <div class="content">
                            <div class="author">Embark on The Journey of A Lifetime</div>
                            <div class="title">TRAVEL FAR,</div>
                            <div class="topic">FIND YOURSELF</div>
                            <div class="des">
                                Discover the world with Royal X Travels, where every journey is crafted for comfort, adventure, and unforgettable memories. From scenic escapes to thrilling expeditions, we bring your dream destinations to life with trusted service and personalized care.
                            </div>
                            <div class="buttons">
                                <img src="../Assets/icons/bookmark.png" alt="" class="button1">
                                <a href="../Packages/packages.php" class="homeslider--btn1">
                                    <button class="button2">START YOUR ADVENTURE</button>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="item" data-index="1">
                        <img src="../Assets/images/home/img2.webp" class="hero--img">
                        <div class="content">
                            <div class="author">Embark on The Journey of A Lifetime</div>
                            <div class="title">TRAVEL FAR,</div>
                            <div class="topic">FIND YOURSELF</div>
                            <div class="des">
                                Discover the world with Royal X Travels, where every journey is crafted for comfort, adventure, and unforgettable memories. From scenic escapes to thrilling expeditions, we bring your dream destinations to life with trusted service and personalized care.
                            </div>
                            <div class="buttons">
                                <img src="../Assets/icons/bookmark.png" alt="" class="button1">
                                <a href="../Packages/packages.php" class="homeslider--btn1">
                                    <button class="button2">START YOUR ADVENTURE</button>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="item" data-index="2">
                        <img src="../Assets/images/home/img3.webp" class="hero--img">
                        <div class="content">
                            <div class="author">Embark on The Journey of A Lifetime</div>
                            <div class="title">TRAVEL FAR,</div>
                            <div class="topic">FIND YOURSELF</div>
                            <div class="des">
                                Discover the world with Royal X Travels, where every journey is crafted for comfort, adventure, and unforgettable memories. From scenic escapes to thrilling expeditions, we bring your dream destinations to life with trusted service and personalized care.
                            </div>
                            <div class="buttons">
                                <img src="../Assets/icons/bookmark.png" alt="" class="button1">
                                <a href="../Packages/packages.php" class="homeslider--btn1">
                                    <button class="button2">START YOUR ADVENTURE</button>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="item" data-index="3">
                        <img src="../Assets/images/home/img4.webp" class="hero--img">
                        <div class="content">
                            <div class="author">Embark on The Journey of A Lifetime</div>
                            <div class="title">TRAVEL FAR,</div>
                            <div class="topic">FIND YOURSELF</div>
                            <div class="des">
                                Discover the world with Royal X Travels, where every journey is crafted for comfort, adventure, and unforgettable memories. From scenic escapes to thrilling expeditions, we bring your dream destinations to life with trusted service and personalized care.
                            </div>
                            <div class="buttons">
                                <img src="../Assets/icons/bookmark.png" alt="" class="button1">
                                <a href="../Packages/packages.php" class="homeslider--btn1">
                                    <button class="button2">START YOUR ADVENTURE</button>
                                </a>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- list thumnail -->
                <div class="thumbnail ">
                    <div class="item"data-index="0">
                        <img src="../Assets/images/home/img1.webp">
                        <div class="content">
                            <div class="title">
                                Tropical Paradise
                            </div>
                            <div class="description">
                                Discover the calm beauty.
                            </div>
                        </div>
                    </div>
                    <div class="item" data-index="1">
                        <img src="../Assets/images/home/img2.webp">
                        <div class="content">
                            <div class="title">
                                Mountain Escape
                            </div>
                            <div class="description">
                                Breathe in the cool air air.
                            </div>
                        </div>
                    </div>
                    <div class="item" data-index="2">
                        <img src="../Assets/images/home/img3.webp">
                        <div class="content">
                            <div class="title">
                                Mountain Escape
                            </div>
                            <div class="description">
                                Step into timeless cities.
                            </div>
                        </div>
                    </div>
                    <div class="item" data-index="3">
                        <img src="../Assets/images/home/img4.webp">
                        <div class="content">
                            <div class="title">
                                Adventure Awaits
                            </div>
                            <div class="description">
                                Descover unlimited Adventure
                            </div>
                        </div>
                    </div>
                </div>
                <!-- next prev -->

                <div class="arrows">

                    <!-- Left Arrow -->
                    <svg class="slider-arrow slider-arrow--left " id="prev" width="48" height="48" viewBox="0 0 48 48" xmlns="http://www.w3.org/2000/svg">
                        <circle class="arrow-border" cx="24" cy="24" r="22" />
                        <path class="arrow-icon" d="M30 32 L18 24 L30 16" fill="none" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>

                    <!-- Right Arrow -->
                    <svg class="slider-arrow slider-arrow--right " id="next" width="48" height="48" viewBox="0 0 48 48" xmlns="http://www.w3.org/2000/svg">
                        <circle class="arrow-border" cx="24" cy="24" r="22" />
                        <path class="arrow-icon" d="M18 32 L30 24 L18 16" fill="none" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>


                </div>
                <!-- time running -->
                <div class="time"></div>
            </div>
        </div>

        <script src="../homeSlider/homeslider.js"></script>
        <script>
            // Thumbnail click handling
            if (thumbnailBorderDom) {
                let thumbs = thumbnailBorderDom.querySelectorAll('.item');

                thumbs.forEach((thumbItem, clickedIndex) => {
                    thumbItem.addEventListener('click', () => {

                        let currentThumbs = thumbnailBorderDom.querySelectorAll('.item');
                        let activeIndex = 0;

                        currentThumbs.forEach((item, i) => {
                            if (item.classList.contains('active')) {
                                activeIndex = i;
                            }
                        });

                        let difference = clickedIndex - activeIndex;

                        if (difference > 0) {
                            // Move forward difference times
                            for (let i = 0; i < difference; i++) {
                                showSlider('next');
                            }
                        } else if (difference < 0) {
                            // Move backward |difference| times
                            for (let i = 0; i < Math.abs(difference); i++) {
                                showSlider('prev');
                            }
                        }
                    });
                });
            }
        </script>
</body>

</html>