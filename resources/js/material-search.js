document.addEventListener("DOMContentLoaded", function () {
    const searchInput = document.getElementById("search-materi");

    searchInput.addEventListener(
        "input",
        debounce(function () {
            const keyword = this.value;

            fetch(`/materi/search?keyword=${keyword}`)
                .then((response) => response.json())
                .then((data) => {
                    updateMateriList(data);
                });
        }, 500),
    );
});

function debounce(func, wait) {
    let timeout;
    return function executedFunction(...args) {
        const later = () => {
            clearTimeout(timeout);
            func(...args);
        };
        clearTimeout(timeout);
        timeout = setTimeout(later, wait);
    };
}

function updateMateriList(materi) {
    const container = document.querySelector(".grid");
    container.innerHTML = "";

    materi.forEach((item) => {
        const html = `
        <div class="rounded-xl border-4 border-blue-200 bg-white p-8 shadow-lg transition-all hover:shadow-xl focus-within:ring-4 focus-within:ring-blue-200">
            <h3 class="mb-4 text-2xl font-bold text-gray-800">${item.title}</h3>
        </div>
        `;
        container.insertAdjacentHTML("beforeend", html);
    });
}
