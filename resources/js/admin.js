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


window.validateCreateForm = function () {
    const name = document.getElementById('name')?.value.trim();
    const email = document.getElementById('email')?.value.trim();
    const password = document.getElementById('password')?.value.trim();

    if (!name || !email || !password) {
        showFormAlert(
            'Masih terdapat data yang kosong, silahkan lengkapi',
            'warning'
        );
        return false;
    }

    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!emailRegex.test(email)) {
        showFormAlert(
            'Format email tidak valid, silahkan periksa kembali',
            'error'
        );
        return false;
    }

    return true;
};


function showFormAlert(message, type = 'warning') {
    const existing = document.getElementById('form-alert');
    if (existing) existing.remove();

    const colors = {
        warning: 'bg-amber-500',
        error: 'bg-red-500',
        success: 'bg-emerald-500',
    };

    const alert = document.createElement('div');
    alert.id = 'form-alert';
    alert.className =
        'fixed top-24 left-1/2 -translate-x-1/2 w-11/12 max-w-md z-[9999]';

    alert.innerHTML = `
        <div
            x-data="{ show: true }"
            x-show="show"
            x-init="setTimeout(() => show = false, 3000)"
            class="p-4 ${colors[type]} text-white rounded-lg shadow-lg flex items-center gap-2"
        >
            <svg class="w-5 h-5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd"
                    d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z"
                    clip-rule="evenodd"
                />
            </svg>
            <p class="text-sm font-medium">${message}</p>
        </div>
    `;

    document.body.appendChild(alert);

    // Re-init Alpine untuk elemen baru
    if (window.Alpine) {
        Alpine.initTree(alert);
    }
}


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
        searchLoading?.classList.remove('hidden');

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
            searchLoading?.classList.add('hidden');
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

/*
|--------------------------------------------------------------------------
| Edit User Role Validation
|--------------------------------------------------------------------------
*/
window.validateEditUserRoleForm = function () {
    const form = document.getElementById('editUserRoleForm');
    if (!form) return true;

    const clientId = form.querySelector('select[name="client_id"]')?.value;
    const roleId = form.querySelector('select[name="role_id"]')?.value;

    if (!clientId || !roleId) {
        showFormAlert(
            'Client / Role belum ditetapkan, silahkan dilengkapi',
            'warning'
        );
        return false;
    }

    return true;
};
