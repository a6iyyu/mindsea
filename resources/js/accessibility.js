// Fungsi untuk memperbesar teks
function adjustFontSize(direction) {
    const root = document.documentElement;
    const currentSize = parseFloat(getComputedStyle(root).fontSize);
    const newSize =
        direction === "increase" ? currentSize * 1.1 : currentSize * 0.9;
    root.style.fontSize = `${newSize}px`;
}

// Animasi yang lembut
document.querySelectorAll(".animate-wave").forEach((element) => {
    element.style.animation = "wave 2s infinite";
});
