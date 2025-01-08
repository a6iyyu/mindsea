document.addEventListener("DOMContentLoaded", function () {
    const searchInput = document.getElementById("search-materi");
    const searchForm = document.getElementById("search-form");
    const materiContainer = document.querySelector(".grid");

    searchForm.addEventListener("submit", (e) => {
        e.preventDefault();
    });

    let isLoading = false;

    searchInput.addEventListener(
        "input",
        debounce(async function () {
            const keyword = this.value.trim();
            
            isLoading = true;
            materiContainer.innerHTML = `
                <div class="text-center py-8 text-gray-600">
                    <i class="fa-solid fa-spinner fa-spin text-2xl"></i>
                    <p class="mt-2">Mencari materi...</p>
                </div>
            `;

            try {
                const response = await fetch(`/materi/search?keyword=${encodeURIComponent(keyword)}`);
                const data = await response.json();
                updateMateriList(data);
            } catch (error) {
                console.error("Error:", error);
                materiContainer.innerHTML = `
                    <div class="text-center py-8 text-red-600">
                        <p>Terjadi kesalahan saat mencari materi</p>
                    </div>
                `;
            } finally {
                isLoading = false;
            }
        }, 500)
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
    
    if (materi.length === 0) {
        container.innerHTML = `
            <div class="text-center py-8 text-gray-600">
                <i class="fa-solid fa-search text-2xl mb-2"></i>
                <p>Materi tidak ditemukan</p>
            </div>
        `;
        return;
    }

    container.innerHTML = materi.map(item => `
        <div class="materi-item rounded-xl border-4 border-${item.color}-200 bg-white p-8 shadow-lg transition-all hover:shadow-xl">
            <h3 class="mb-4 text-2xl font-bold text-gray-800">${item.title}</h3>
            <p class="text-gray-600 mb-4">${item.description}</p>
            <a href="/materi/${item.id}" class="text-${item.color}-500 hover:text-${item.color}-600">
                Lihat Materi <i class="fa-solid fa-arrow-right ml-1"></i>
            </a>
        </div>
    `).join('');
}
