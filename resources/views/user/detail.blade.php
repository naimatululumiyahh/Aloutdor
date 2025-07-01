<!DOCTYPE html>
<html lang="id">
    @include('head')
<body class="bg-gray-100 font-poppins">
    <!-- Navbar -->
    @include('navbar')

    <!-- Main Content: Detail Barang -->
    <div class="container mx-auto mt-8 px-4">
        <div class="flex flex-col md:flex-row gap-8">
            <!-- Gambar dan Thumbnail -->
            <div class="w-full md:w-1/2">
                <div class="flex flex-col items-center justify-center">
                    <!-- Main Image Container -->
                    <div id="mainImageContainer" class="relative w-full mx-auto text-center">
                        @if(isset($barang->gambar) && count($barang->gambar) > 0)
                            @foreach($barang->gambar as $index => $gambar)
                                <div class="carousel-item absolute top-0 left-0 w-full h-full transition-opacity duration-300 ease-in-out {{ $index === 0 ? 'opacity-100' : 'opacity-0 pointer-events-none' }}" data-index="{{ $index }}">
                                    <img src="{{ '../images/barang/' . $gambar }}" alt="{{ $barang->nama_barang }} - Gambar {{ $index + 1 }}" class="w-full rounded-lg shadow-md object-cover h-96 mx-auto">
                                </div>
                            @endforeach
                        @else
                            <img src="https://placehold.co/600x600" alt="No Image Available" class="w-full rounded-lg shadow-md h-96 object-cover mx-auto">
                        @endif
                        
                        <!-- Navigation Buttons (in the middle) -->
                        @if(isset($barang->gambar) && count($barang->gambar) > 1)
                            <button id="prevButton" class="absolute left-2 mt-48 transform -translate-y-1/2 bg-white bg-opacity-50 hover:bg-opacity-75 rounded-full p-2 focus:outline-none">
                                <svg class="w-6 h-6 text-gray-800" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                                </svg>
                            </button>
                            <button id="nextButton" class="absolute right-2 mt-48 transform -translate-y-1/2 bg-white bg-opacity-50 hover:bg-opacity-75 rounded-full p-2 focus:outline-none">
                                <svg class="w-6 h-6 text-gray-800" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                </svg>
                            </button>
                        @endif
                    </div>
                    
                    <!-- Indicators (moved to bottom) -->
                    @if(isset($barang->gambar) && count($barang->gambar) > 1)
                        <div class="absolute bottom-12 flex justify-center mb-5 space-x-2">
                            @foreach($barang->gambar as $index => $gambar)
                                <button class="carousel-indicator w-3 h-3 rounded-full {{ $index === 0 ? 'bg-red-400' : 'bg-gray-300' }}" data-index="{{ $index }}"></button>
                            @endforeach
                        </div>
                    @endif
                    
                    <!-- Thumbnails (already at bottom) -->
                    @if(isset($barang->gambar) && count($barang->gambar) > 0)
                        <div class="bottom-24 absolute flex space-x-4 overflow-x-auto pb-2">
                            @foreach($barang->gambar as $index => $gambar)
                                <img 
                                    src="{{ '../images/barang/' . $gambar }}" 
                                    alt="{{ $barang->nama_barang }} - Thumbnail {{ $index + 1 }}" 
                                    class="w-24 h-24 rounded-lg border cursor-pointer thumbnail-image {{ $index === 0 ? 'border-red-400' : 'border-gray-300 opacity-60' }}"
                                    data-index="{{ $index }}">
                            @endforeach
                        </div>
                    @endif
                </div>
                
                <script>
                    document.addEventListener('DOMContentLoaded', function() {
                        const carouselItems = document.querySelectorAll('.carousel-item');
                        const indicators = document.querySelectorAll('.carousel-indicator');
                        const thumbnails = document.querySelectorAll('.thumbnail-image');
                        const prevButton = document.getElementById('prevButton');
                        const nextButton = document.getElementById('nextButton');
                        
                        let currentIndex = 0;
                        const totalItems = carouselItems.length;
                        
                        if (totalItems <= 1) return;
                        
                        function showItem(index) {
                            // Hide all items
                            carouselItems.forEach(item => {
                                item.classList.add('opacity-0', 'pointer-events-none');
                                item.classList.remove('opacity-100');
                            });
                            
                            // Show the selected item
                            carouselItems[index].classList.remove('opacity-0', 'pointer-events-none');
                            carouselItems[index].classList.add('opacity-100');
                            
                            // Update indicators
                            indicators.forEach(indicator => {
                                indicator.classList.remove('bg-red-400');
                                indicator.classList.add('bg-gray-300');
                            });
                            indicators[index].classList.remove('bg-gray-300');
                            indicators[index].classList.add('bg-red-400');
                            
                            // Update thumbnails
                            thumbnails.forEach(thumb => {
                                thumb.classList.remove('border-red-400');
                                thumb.classList.add('border-gray-300', 'opacity-60');
                            });
                            thumbnails[index].classList.remove('border-gray-300', 'opacity-60');
                            thumbnails[index].classList.add('border-red-400');
                            
                            currentIndex = index;
                        }
                        
                        // Event listeners for navigation buttons
                        if (prevButton) {
                            prevButton.addEventListener('click', function() {
                                let newIndex = currentIndex - 1;
                                if (newIndex < 0) newIndex = totalItems - 1;
                                showItem(newIndex);
                            });
                        }
                        
                        if (nextButton) {
                            nextButton.addEventListener('click', function() {
                                let newIndex = currentIndex + 1;
                                if (newIndex >= totalItems) newIndex = 0;
                                showItem(newIndex);
                            });
                        }
                        
                        // Event listeners for indicators
                        indicators.forEach(indicator => {
                            indicator.addEventListener('click', function() {
                                const index = parseInt(this.getAttribute('data-index'));
                                showItem(index);
                            });
                        });
                        
                        // Event listeners for thumbnails
                        thumbnails.forEach(thumbnail => {
                            thumbnail.addEventListener('click', function() {
                                const index = parseInt(this.getAttribute('data-index'));
                                showItem(index);
                            });
                        });
                    });
                </script>
            </div>

            <!-- Detail dan Form Peminjaman -->
            <div class="w-full md:w-1/2 bg-white p-6 rounded-lg shadow-md">
                <div class="flex justify-between items-start">
                    <h2 class="text-3xl font-bold text-gray-800">{{ $barang->nama_barang }}</h2>
                    <div class="text-right">
                        <p class="text-gray-600 text-sm">Rating: {{ $barang->avg_rating }}</p>
                        <div class="flex space-x-1">
                            @php
                                $rating = $barang->avg_rating ?? 0;
                                $fullStars = floor($rating);
                                $halfStar = ($rating - $fullStars) >= 0.5;
                            @endphp
                            
                            @for ($i = 1; $i <= 5; $i++)
                                @if ($i <= $fullStars)
                                    {{-- Full star --}}
                                    <svg class="w-4 h-4 text-orange-400" fill="#fb923c" viewBox="0 0 20 20">
                                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                                    </svg>
                                @elseif ($i == $fullStars + 1 && $halfStar)
                                    {{-- Half star --}}
                                    <svg class="w-4 h-4" viewBox="0 0 20 20">
                                        <defs>
                                            <linearGradient id="halfGradient">
                                                <stop offset="50%" stop-color="#fb923c" />
                                                <stop offset="50%" stop-color="#9ca3af" />
                                            </linearGradient>
                                        </defs>
                                        <path fill="url(#halfGradient)" d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                                    </svg>
                                @else
                                    {{-- Empty star --}}
                                    <svg class="w-4 h-4 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                                    </svg>
                                @endif
                            @endfor
                        </div>
                        <p class="text-gray-500 text-sm">{{ $barang->jml_rating ?? 0 }} reviews</p>
                    </div>
                </div>
                <p class="text-red-400 text-2xl font-bold mt-2">Rp {{ number_format($barang->harga_per_hari) }} /hari</p>
                <p class="text-gray-500 text-sm mt-2">
                    {{ $barang->description }}
                </p>
                <div class="mt-4 space-y-4">

                    {{-- @php
                        $user_id = auth()->id();
                        $cart = DB::table('cart')->where('user_id', $user_id)->first();
                        $cart_id = $cart ? $cart->id : 0;
                    @endphp --}}
                    
                    <form class="mt-6 space-y-6" id="rentalForm" method="POST" action="{{ route('user.cart', ['id_barang' => $barang->id]) }}">
                        @csrf
                        <div>
                            <label class="text-gray-700 text-sm font-medium">Pilih Tanggal Sewa</label>
                            <div class="relative" id="datePickerContainer">
                                <input type="text" id="dateRangeDisplay" readonly class="w-full p-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-red-400" placeholder="Pilih tanggal mulai dan selesai">
                                <input type="hidden" id="startDate" name="start_date">
                                <input type="hidden" id="endDate" name="end_date">
                                <svg class="w-4 h-4 absolute right-3 top-3 text-gray-700 cursor-pointer" id="calendarToggle" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                </svg>
                                
                                <div id="datePickerPopup" class="absolute z-10 mt-1 bg-white border border-gray-300 rounded shadow-lg p-4 hidden w-full">
                                    <div class="flex justify-between items-center mb-2">
                                        <button type="button" id="prevMonth" class="text-gray-600 hover:text-gray-800">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                                            </svg>
                                        </button>
                                        <div id="currentMonthYear" class="text-gray-700 font-medium"></div>
                                        <button type="button" id="nextMonth" class="text-gray-600 hover:text-gray-800">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                            </svg>
                                        </button>
                                    </div>
                                    <div class="grid grid-cols-7 gap-1 text-center text-xs">
                                        <div class="font-medium text-gray-800">Min</div>
                                        <div class="font-medium text-gray-800">Sen</div>
                                        <div class="font-medium text-gray-800">Sel</div>
                                        <div class="font-medium text-gray-800">Rab</div>
                                        <div class="font-medium text-gray-800">Kam</div>
                                        <div class="font-medium text-gray-800">Jum</div>
                                        <div class="font-medium text-gray-800">Sab</div>
                                    </div>
                                    <div id="calendarDays" class="grid grid-cols-7 gap-1 mt-1">
                                        <!-- Calendar days will be inserted here by JavaScript -->
                                    </div>
                                    <div class="mt-2 text-xs text-gray-500">
                                        <p>Klik pertama: Tanggal mulai</p>
                                        <p>Klik kedua: Tanggal selesai</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="flex items-center space-x-4">
                            <label class="text-gray-700 text-sm font-medium">Jumlah</label>
                            <input type="number" name="qty" min="1" max="{{ $barang->stok }}" value="1" class="w-16 p-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-red-400">
                        </div>

                        <input type="number" name="subtotal" id="subtotal" value="{{ $barang->harga_per_hari }}" hidden>
                        <script>
                            document.addEventListener('DOMContentLoaded', function() {
                                const pricePerDay = @json($barang->harga_per_hari);
                                const subtotalInput = document.getElementById('subtotal');
                                const qtyInput = document.querySelector('input[name="qty"]');
                                const startDateInput = document.getElementById('startDate');
                                const endDateInput = document.getElementById('endDate');
                                
                                function updateSubtotal() {
                                    const qty = parseInt(qtyInput.value) || 1;
                                    const days = calculateDays(startDateInput.value, endDateInput.value);
                                    subtotalInput.value = pricePerDay * days * qty;
                                }
                                
                                function calculateDays(start, end) {
                                    if (!start || !end) return 1;
                                    const startDate = new Date(start);
                                    const endDate = new Date(end);
                                    const diffTime = endDate - startDate;
                                    return Math.ceil(diffTime / (1000 * 60 * 60 * 24)) + 1;
                                }
                                
                                // Initial calculation
                                updateSubtotal();
                                
                                // Update when quantity changes
                                qtyInput.addEventListener('input', updateSubtotal);
                                
                                // Check for date changes periodically
                                setInterval(updateSubtotal, 500);
                                
                                // Update before form submission
                                document.getElementById('rentalForm').addEventListener('submit', updateSubtotal);
                            });
                        </script>
                        
                        <button type="submit" class="bg-red-400 text-white px-8 py-3 rounded-lg hover:bg-red-500 w-full">Tambahkan ke keranjang</button>
                    </form>

                    {{-- <form action="{{ route('user.cart', ['cart_id' => 1, 'id_barang' => $barang->id]) }}" method="POST" class="w-full max-w-m rounded-xl space-y-6">
                        <!-- Start Date -->
                        @csrf
                        <div>
                          <label for="start-date" class="block text-sm font-medium text-gray-700 mb-1">Start Date</label>
                          <input type="date" id="start-date" name="start_date" required
                                 class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent" />
                        </div>
                    
                        <!-- End Date -->
                        <div>
                          <label for="end-date" class="block text-sm font-medium text-gray-700 mb-1">End Date</label>
                          <input type="date" id="end-date" name="end_date" required
                                 class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent" />
                        </div>
                    
                       
                        <div class="flex items-center space-x-4">
                            <label class="text-gray-700 text-sm font-medium">Jumlah</label>
                            <input type="number" name="qty" value="1" class="w-16 p-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-red-400">
                        </div>

                         <!-- Submit Button -->
                         <button type="submit"
                         class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded-lg transition">
                        Submit
                        </button>

                    </form> --}}

                    <script>
                    document.addEventListener('DOMContentLoaded', function() {
                        const dateRangeDisplay = document.getElementById('dateRangeDisplay');
                        const startDateInput = document.getElementById('startDate');
                        const endDateInput = document.getElementById('endDate');
                        const calendarToggle = document.getElementById('calendarToggle');
                        const datePickerPopup = document.getElementById('datePickerPopup');
                        const currentMonthYear = document.getElementById('currentMonthYear');
                        const prevMonth = document.getElementById('prevMonth');
                        const nextMonth = document.getElementById('nextMonth');
                        const calendarDays = document.getElementById('calendarDays');
                        const datePickerContainer = document.getElementById('datePickerContainer');
                        
                        let currentDate = new Date();
                        let selectedStartDate = null;
                        let selectedEndDate = null;
                        let isSelectingStartDate = true;
                        
                        // Format date as DD/MM/YYYY
                        const formatDate = (date) => {
                            const day = date.getDate().toString().padStart(2, '0');
                            const month = (date.getMonth() + 1).toString().padStart(2, '0');
                            const year = date.getFullYear();
                            // return `${day}/${month}/${year}`;
                            return `${year}/${month}/${day}`;
                        };
                        
                        // Update the display of the selected date range
                        const updateDateRangeDisplay = () => {
                            if (selectedStartDate && selectedEndDate) {
                                dateRangeDisplay.value = `${formatDate(selectedStartDate)} - ${formatDate(selectedEndDate)}`;
                                startDateInput.value = formatDate(selectedStartDate);
                                endDateInput.value = formatDate(selectedEndDate);
                            } else if (selectedStartDate) {
                                dateRangeDisplay.value = `${formatDate(selectedStartDate)} - Pilih tanggal akhir`;
                                startDateInput.value = formatDate(selectedStartDate);
                                endDateInput.value = '';
                            } else {
                                dateRangeDisplay.value = '';
                                startDateInput.value = '';
                                endDateInput.value = '';
                            }
                        };
                        
                        // Render the calendar for the current month
                        const renderCalendar = () => {
                            calendarDays.innerHTML = '';
                            
                            const months = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
                            currentMonthYear.textContent = `${months[currentDate.getMonth()]} ${currentDate.getFullYear()}`;
                            
                            const firstDay = new Date(currentDate.getFullYear(), currentDate.getMonth(), 1);
                            const lastDay = new Date(currentDate.getFullYear(), currentDate.getMonth() + 1, 0);
                            
                            let firstDayOfWeek = firstDay.getDay();
                            for (let i = 0; i < firstDayOfWeek; i++) {
                                const emptyCell = document.createElement('div');
                                calendarDays.appendChild(emptyCell);
                            }
                            
                            const today = new Date();
                            today.setHours(0, 0, 0, 0);
                            
                            for (let day = 1; day <= lastDay.getDate(); day++) {
                                const dayCell = document.createElement('div');
                                const dayDate = new Date(currentDate.getFullYear(), currentDate.getMonth(), day);
                                
                                dayCell.textContent = day;
                                dayCell.classList.add('p-1', 'text-center', 'text-sm', 'cursor-pointer', 'rounded');
                                
                                if (dayDate < today) {
                                    dayCell.classList.add('text-gray-300', 'cursor-not-allowed');
                                } else {
                                    if (selectedStartDate && dayDate.getTime() === selectedStartDate.getTime()) {
                                        dayCell.classList.add('bg-red-400', 'text-white');
                                    } else if (selectedEndDate && dayDate.getTime() === selectedEndDate.getTime()) {
                                        dayCell.classList.add('bg-red-400', 'text-white');
                                    } else if (selectedStartDate && selectedEndDate && 
                                               dayDate > selectedStartDate && dayDate < selectedEndDate) {
                                        dayCell.classList.add('bg-red-100');
                                    } else {
                                        dayCell.classList.add('hover:bg-gray-100');
                                    }
                                    
                                    dayCell.addEventListener('click', () => {
                                        if (isSelectingStartDate) {
                                            selectedStartDate = dayDate;
                                            selectedEndDate = null;
                                            isSelectingStartDate = false;
                                        } else {
                                            if (dayDate >= selectedStartDate) {
                                                selectedEndDate = dayDate;
                                                isSelectingStartDate = true;
                                                datePickerPopup.classList.add('hidden');
                                            } else {
                                                selectedEndDate = selectedStartDate;
                                                selectedStartDate = dayDate;
                                                isSelectingStartDate = true;
                                                datePickerPopup.classList.add('hidden');
                                            }
                                        }
                                        updateDateRangeDisplay();
                                        renderCalendar();
                                    });
                                }
                                
                                calendarDays.appendChild(dayCell);
                            }
                        };
                        
                        calendarToggle.addEventListener('click', () => {
                            datePickerPopup.classList.toggle('hidden');
                            renderCalendar();
                        });
                        
                        dateRangeDisplay.addEventListener('click', () => {
                            datePickerPopup.classList.toggle('hidden');
                            renderCalendar();
                        });
                        
                        prevMonth.addEventListener('click', () => {
                            currentDate.setMonth(currentDate.getMonth() - 1);
                            renderCalendar();
                        });
                        
                        nextMonth.addEventListener('click', () => {
                            currentDate.setMonth(currentDate.getMonth() + 1);
                            renderCalendar();
                        });
                        
                        document.addEventListener('click', (e) => {
                            if (!datePickerContainer.contains(e.target)) {
                                datePickerPopup.classList.add('hidden');
                            }
                        });
                        
                        renderCalendar();
                    });
                    </script>
                </div>
                <div class="mt-6 flex items-center space-x-4">
                    <span class="text-gray-800 font-bold">Bagikan:</span>
                    <a href="#" class="w-8 h-8 bg-white rounded-full flex items-center justify-center">
                        <span class="text-black">IG</span>
                    </a>
                    <a href="#" class="w-8 h-8 bg-white rounded-full flex items-center justify-center">
                        <span class="text-black">FB</span>
                    </a>
                    <a href="#" class="w-8 h-8 bg-white rounded-full flex items-center justify-center">
                        <span class="text-black">WA</span>
                    </a>
                </div>
            </div>
        </div>

        <!-- Produk Lainnya -->
        <div class="mt-12">
            <h2 class="text-3xl font-bold text-red-400 text-center">Produk Lainnya</h2>
            <p class="text-gray-400 text-center">Kamu bisa mencari produk lainnya di sini</p>
            <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-5 gap-6 mt-6">
                @foreach($produkLainnya as $produk)
                    <?php
                    $gambarArray = json_decode($produk->gambar);
                    $gambarPertama = $gambarArray[0] ?? null;
                    ?>
                    <div class="bg-white rounded-lg shadow-md p-4">
                        <img src="{{ '../images/barang/' . $gambarPertama }}" alt="{{ $produk->nama_barang }}" class="w-full h-48 object-cover rounded-lg mb-4">
                        <h3 class="text-xl font-semibold text-gray-800">{{ $produk->nama_barang }}</h3>
                        <p class="text-red-400 text-lg font-bold">Rp {{ number_format($produk->harga_per_hari) }} /hari</p>
                        <a href="{{ route('user.detail', ['id' => $produk->id]) }}" class="mt-2 inline-block bg-red-400 text-white px-4 py-2 rounded-lg hover:bg-red-500">Lihat Detail</a>
                    </div>
                @endforeach
                
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-red-400 text-white py-16 mt-12">
        <div class="container mx-auto grid grid-cols-1 md:grid-cols-4 gap-8">
            <div>
                <h3 class="text-xl font-semibold mb-4 font-montserrat">ALoutdor</h3>
                <ul class="space-y-2">
                    <li><a href="#" class="hover:underline">Sewa</a></li>
                    <li><a href="#" class="hover:underline">Tentang Kami</a></li>
                    <li><a href="#" class="hover:underline">Kontak Media</a></li>
                </ul>
            </div>
            <div>
                <h3 class="text-xl font-semibold mb-4 font-lato">Ikuti Kami</h3>
                <ul class="space-y-2">
                    <li class="flex items-center space-x-2">
                        <div class="w-8 h-8 bg-white rounded-full flex items-center justify-center">
                            <span class="text-black">IG</span>
                        </div>
                        <a href="#" class="hover:underline">Instagram</a>
                    </li>
                    <li class="flex items-center space-x-2">
                        <div class="w-8 h-8 bg-white rounded-full flex items-center justify-center">
                            <span class="text-black">WA</span>
                        </div>
                        <a href="#" class="hover:underline">Whatsapp</a>
                    </li>
                    <li class="flex items-center space-x-2">
                        <div class="w-8 h-8 bg-white rounded-full flex items-center justify-center">
                            <span class="text-black">FB</span>
                        </div>
                        <a href="#" class="hover:underline">Facebook</a>
                    </li>
                </ul>
            </div>
            <div>
                <h3 class="text-xl font-semibold mb-4 font-lato">Metode Pembayaran</h3>
                <div class="flex space-x-2">
                    <div class="w-12 h-8 bg-purple-900 rounded"></div>
                    <div class="w-12 h-8 bg-sky-700 rounded"></div>
                    <div class="w-12 h-8 bg-sky-500 rounded"></div>
                    <div class="w-12 h-8 bg-white border border-gray-300 rounded"></div>
                </div>
            </div>
        </div>
    </footer>
</body>
</html>