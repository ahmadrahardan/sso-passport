@if (session('success'))
    <div id="successNotification"
         style="position: fixed; top: 24px; right: 24px; z-index: 9999; max-width: 384px;"
         class="bg-white rounded-lg shadow-2xl border border-gray-200 overflow-hidden">

        <div class="flex items-start gap-3 p-4">
            <div class="flex-shrink-0">
                <div class="w-10 h-10 bg-green-100 rounded-full flex items-center justify-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7" />
                    </svg>
                </div>
            </div>

            {{-- Message --}}
            <div class="flex-1 pt-0.5">
                <h4 class="text-gray-900 font-semibold text-base mb-0.5">Berhasil!</h4>
                <p class="text-gray-600 text-sm">{{ session('success') }}</p>
            </div>

            {{-- Close Button --}}
            <button onclick="closeSuccessNotification()" class="flex-shrink-0 text-gray-400 hover:text-gray-600 transition-colors">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>

        {{-- Progress Bar --}}
        <div class="h-1 bg-gray-100">
            <div id="successProgressBar" class="h-full bg-green-500 transition-all" style="width: 100%;"></div>
        </div>
    </div>

    <script>
        (function() {
            // Auto close notification after 5 seconds
            let progress = 100;
            const interval = setInterval(() => {
                progress -= 2;
                const progressBar = document.getElementById('successProgressBar');
                if (progressBar) {
                    progressBar.style.width = progress + '%';
                }

                if (progress <= 0) {
                    clearInterval(interval);
                    closeSuccessNotification();
                }
            }, 100);

            window.closeSuccessNotification = function() {
                const notification = document.getElementById('successNotification');
                if (notification) {
                    notification.style.transform = 'translateX(100%)';
                    notification.style.transition = 'transform 0.3s ease-in';
                    setTimeout(() => {
                        notification.remove();
                    }, 300);
                }
            }

            document.addEventListener('DOMContentLoaded', () => {
                const notification = document.getElementById('successNotification');
                if (notification) {
                    notification.style.transform = 'translateX(100%)';
                    setTimeout(() => {
                        notification.style.transition = 'transform 0.3s ease-out';
                        notification.style.transform = 'translateX(0)';
                    }, 100);
                }
            });
        })();
    </script>
@endif
