// Untuk menghentikan slideshow ketika tab tidak aktif (optional)
document.addEventListener("visibilitychange", function () {
    if (document.hidden) {
        document.querySelector(
            ".slideshow-section::before"
        ).style.animationPlayState = "paused";
    } else {
        document.querySelector(
            ".slideshow-section::before"
        ).style.animationPlayState = "running";
    }
});

$(document).ready(function () {
    const menuWrapper = $(".menu-wrapper");
    const menuBox = $(".menu-box");
    const menuCount = menuBox.length;
    const menuWidth = 320; // Lebar menu-box + margin
    let currentPosition = 0;

    $(".arrow-left").on("click", function () {
        if (currentPosition > 0) {
            currentPosition--;
            moveMenu();
        }
    });

    $(".arrow-right").on("click", function () {
        if (currentPosition < menuCount - 1) {
            currentPosition++;
            moveMenu();
        }
    });

    function moveMenu() {
        const newPosition = -currentPosition * menuWidth;
        menuWrapper.css("transform", `translateX(${newPosition}px)`);
        updateDotPosition(); // Memanggil fungsi untuk meng-update posisi dot
    }

    function updateDotPosition() {
        const dots = $(".dot");
        dots.removeClass("active");
        dots.eq(currentPosition).addClass("active");
    }
});
