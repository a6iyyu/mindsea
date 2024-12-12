function completeContent(materialId) {
    const btn = document.getElementById('complete-btn');
    btn.disabled = true;
    btn.innerHTML = 'Memproses... <i class="fa-solid fa-spinner fa-spin ml-2"></i>';

    fetch(`/materi/${materialId}/complete`, {
        method: 'POST',
        headers: {
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
            'Accept': 'application/json',
        }
    })
    .then(response => response.json())
    .then(data => {
        if (data.status === 'success') {
            btn.classList.add('bg-gray-500');
            btn.classList.remove('hover:bg-green-700');
            btn.innerHTML = 'Sudah Selesai <i class="fa-solid fa-check ml-2"></i>';
            alert(data.message);
            window.location.reload();
        } else {
            btn.disabled = false;
            btn.innerHTML = 'Selesai <i class="fa-solid fa-check ml-2"></i>';
            alert(data.message);
        }
    })
    .catch(error => {
        console.error('Error:', error);
        btn.disabled = false;
        btn.innerHTML = 'Selesai <i class="fa-solid fa-check ml-2"></i>';
        alert('Terjadi kesalahan: ' + error.message);
    });
}