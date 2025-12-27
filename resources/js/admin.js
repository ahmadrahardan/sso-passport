import './admin';

window.togglePassword = function (
    inputId = 'password',
    eyeId = 'eye-icon',
    eyeOffId = 'eye-off-icon'
) {
    const passwordInput = document.getElementById(inputId);
    const eyeIcon = document.getElementById(eyeId);
    const eyeOffIcon = document.getElementById(eyeOffId);

    if (!passwordInput) return;

    if (passwordInput.type === 'password') {
        passwordInput.type = 'text';
        eyeIcon?.classList.add('hidden');
        eyeOffIcon?.classList.remove('hidden');
    } else {
        passwordInput.type = 'password';
        eyeIcon?.classList.remove('hidden');
        eyeOffIcon?.classList.add('hidden');
    }
};


// Search & Pagination

document.addEventListener('DOMContentLoaded', () => {
    const searchInput = document.getElementById('searchInput');
    const searchLoading = document.getElementById('searchLoading');
    const userTableBody = document.getElementById('userTableBody');
    const paginationContainer = document.getElementById('paginationContainer');

    if (!searchInput || !userTableBody) return;

    let timeout;
    let currentPage = 1;

    searchInput.addEventListener('input', e => {
        clearTimeout(timeout);
        timeout = setTimeout(() => {
            currentPage = 1;
            fetchUsers(e.target.value, currentPage);
        }, 500);
    });

    window.loadPage = function (page) {
        currentPage = page;
        fetchUsers(searchInput.value, page);
    };

    async function fetchUsers(search = '', page = 1) {
        searchLoading.classList.remove('hidden');

        try {
            const res = await fetch(
                `${window.USERS_INDEX_URL}?search=${encodeURIComponent(search)}&page=${page}`,
                { headers: { 'X-Requested-With': 'XMLHttpRequest' } }
            );

            const data = await res.json();

            userTableBody.innerHTML = data.html;
            renderPagination(data.pagination);

        } catch (e) {
            console.error(e);
        } finally {
            searchLoading.classList.add('hidden');
        }
    }

    function renderPagination(p) {
        if (!p || p.total === 0) {
            paginationContainer.innerHTML = '';
            return;
        }

        paginationContainer.innerHTML = `
            <div class="px-6 py-4 border-t">
                <div class="flex justify-between items-center">
                    <div class="text-sm text-gray-700">
                        Menampilkan ${p.from} sampai ${p.to} dari ${p.total} hasil
                    </div>
                    <div class="flex gap-3">
                        ${p.current_page > 1
                            ? `<button onclick="loadPage(${p.current_page - 1})"
                               class="border px-3 py-2 rounded-lg">&lt; Sebelumnya</button>`
                            : ''}
                        ${p.current_page < p.last_page
                            ? `<button onclick="loadPage(${p.current_page + 1})"
                               class="border px-3 py-2 rounded-lg">Selanjutnya &gt;</button>`
                            : ''}
                    </div>
                </div>
            </div>
        `;
    }
});
