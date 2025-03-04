let marquee = document.getElementById("marqueeText");
let colors = ["white", "black", "white"]; // 🔥 Color array for sections
let sectionWidth = window.innerWidth / 3;
let lastColorIndex = 0;

function changeColor() {
    let position = marquee.getBoundingClientRect().left + (marquee.offsetWidth / 3);
    let newColorIndex = Math.floor(position / sectionWidth);

    // 🔥 Change color smoothly after crossing a section line
    if (newColorIndex !== lastColorIndex) {
        marquee.style.color = colors[newColorIndex];
        lastColorIndex = newColorIndex;
    }

    requestAnimationFrame(changeColor);
}

changeColor(); // Start the color change animation
