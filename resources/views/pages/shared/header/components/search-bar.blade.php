<search class="relative hidden lg:block">
    <div class="relative">
        <input type="search" 
            id="header-search"
            name="keyword"
            class="font-plus-jakarta-sans h-full w-[35rem] rounded-lg border-2 py-3 pl-4 pr-12 text-base transition-colors focus:border-[#f58a66] focus:outline-none"
            placeholder="Cari Materi Yuk..." 
            aria-label="Cari Materi Yuk..." />
        <button type="button" 
            class="absolute right-4 top-1/2 -translate-y-1/2 focus:outline-none" 
            aria-label="Cari">
            <i class="fa-solid fa-magnifying-glass text-gray-500 transition-colors hover:text-[#f58a66]"></i>
        </button>
    </div>
    <div id="search-results" class="hidden absolute top-full left-0 right-0 mt-2 bg-white rounded-lg shadow-lg border border-gray-200 max-h-[400px] overflow-y-auto z-50">
    </div>
</search>

<script>
const searchInput = document.getElementById('header-search');
const searchResults = document.getElementById('search-results');

// Prevent form submission on enter
searchInput.addEventListener('keydown', (e) => {
    if (e.key === 'Enter') {
        e.preventDefault();
    }
});

searchInput.addEventListener('input', debounce(async (e) => {
    const keyword = e.target.value;
    
    if (keyword.length < 2) {
        searchResults.classList.add('hidden');
        return;
    }

    try {
        const response = await fetch(`/materi/search?keyword=${encodeURIComponent(keyword)}`);
        if (!response.ok) throw new Error('Gagal mengambil data');
        
        const data = await response.json();
        showSearchResults(data);
        
    } catch (error) {
        console.error('Error:', error);
    }
}, 500));

function showSearchResults(results) {
    if (results.length === 0) {
        searchResults.innerHTML = `
            <div class="p-4 text-gray-500 text-center">
                Materi tidak ditemukan
            </div>
        `;
    } else {
        searchResults.innerHTML = results.map(item => `
            <a href="/materi/${item.id}" 
               class="block p-4 hover:bg-gray-50 border-b border-gray-100 last:border-0">
                <h3 class="font-semibold text-gray-800">${item.title}</h3>
                <p class="text-sm text-gray-600 mt-1">${item.description || ''}</p>
            </a>
        `).join('');
    }
    
    searchResults.classList.remove('hidden');
}

// Close dropdown when clicking outside
document.addEventListener('click', (e) => {
    if (!searchInput.contains(e.target) && !searchResults.contains(e.target)) {
        searchResults.classList.add('hidden');
    }
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
</script>