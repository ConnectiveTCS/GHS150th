<x-app-layout>
    <div class="max-w-6xl mx-auto px-4 py-6 min-h-[80vh]">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-3xl font-bold">Reservations</h2>
            <a href="{{ route('reservations.create') }}" class="bg-black text-white px-4 py-2 rounded hover:bg-slate-600">
                Create New Reservation
            </a>
        </div>

        <!-- View Toggle Buttons -->
        <div class="flex justify-end mb-4">
            <div class="inline-flex rounded-md shadow-sm" role="group">
                <button type="button" id="card-view-btn"
                    class="view-toggle-btn px-4 py-2 text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-l-lg hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:text-blue-700 active-view">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zm10 0a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zm10 0a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z" />
                    </svg>
                    Cards
                </button>
                <button type="button" id="table-view-btn"
                    class="view-toggle-btn px-4 py-2 text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-r-md hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:text-blue-700">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M3 10h18M3 14h18m-9-4v8m-7 0h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z" />
                    </svg>
                    Table
                </button>
            </div>
        </div>

        <!-- Card View -->
        <div id="card-view" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach ($reservations as $reservation)
                <div class="bg-white rounded shadow p-4">
                    <h3 class="text-xl font-semibold mb-2">
                        {{ $reservation->first_name }} {{ $reservation->last_name }}
                    </h3>
                    <p class="text-gray-700 mb-1">Email: {{ $reservation->email }}</p>
                    <p class="text-gray-700 mb-1">Phone: {{ $reservation->phone }}</p>
                    <p class="text-gray-700 mb-1">Year Group: {{ $reservation->class_of ?? '2010' }}</p>
                    <p class="text-gray-700 mb-4">Paid: {{ $reservation->is_paid ? 'Yes' : 'No' }}</p>
                    <div class="flex justify-between">
                        <a href="{{ route('reservations.edit', $reservation->id) }}"
                            class="text-blue-500 hover:text-blue-700">
                            Edit
                        </a>
                        <form action="{{ route('reservations.destroy', $reservation->id) }}" method="POST"
                            onsubmit="return confirm('Are you sure?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-500 hover:text-red-700">Delete</button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Table View -->
        <div id="table-view" class="overflow-x-auto hidden">
            <table class="w-full text-sm text-left text-gray-500">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                    <tr>
                        <th scope="col" class="px-6 py-3">Name</th>
                        <th scope="col" class="px-6 py-3">Email</th>
                        <th scope="col" class="px-6 py-3">Phone</th>
                        <th scope="col" class="px-6 py-3">Year Group</th>
                        <th scope="col" class="px-6 py-3">Paid</th>
                        <th scope="col" class="px-6 py-3">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($reservations as $reservation)
                        <tr class="bg-white border-b hover:bg-gray-50">
                            <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap" data-label="Name">
                                {{ $reservation->first_name }} {{ $reservation->last_name }}
                            </td>
                            <td class="px-6 py-4" data-label="Email">{{ $reservation->email }}</td>
                            <td class="px-6 py-4" data-label="Phone">{{ $reservation->phone }}</td>
                            <td class="px-6 py-4" data-label="Year Group">{{ $reservation->class_of ?? '2010' }}</td>
                            <td class="px-6 py-4" data-label="Paid">{{ $reservation->is_paid ? 'Yes' : 'No' }}</td>
                            <td class="px-6 py-4 space-x-2">
                                <a href="{{ route('reservations.edit', $reservation->id) }}"
                                    class="text-blue-500 hover:text-blue-700">
                                    Edit
                                </a>
                                <form class="inline" action="{{ route('reservations.destroy', $reservation->id) }}"
                                    method="POST" onsubmit="return confirm('Are you sure?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-500 hover:text-red-700">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- View Toggle JavaScript -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const cardViewBtn = document.getElementById('card-view-btn');
            const tableViewBtn = document.getElementById('table-view-btn');
            const cardView = document.getElementById('card-view');
            const tableView = document.getElementById('table-view');

            // Check if we have a saved preference
            const viewPreference = localStorage.getItem('reservationsViewPreference');

            if (viewPreference === 'table') {
                showTableView();
            } else {
                showCardView();
            }

            // Set up event listeners
            cardViewBtn.addEventListener('click', showCardView);
            tableViewBtn.addEventListener('click', showTableView);

            function showCardView() {
                cardView.classList.remove('hidden');
                tableView.classList.add('hidden');
                cardViewBtn.classList.add('active-view');
                tableViewBtn.classList.remove('active-view');
                localStorage.setItem('reservationsViewPreference', 'card');
            }

            function showTableView() {
                cardView.classList.add('hidden');
                tableView.classList.remove('hidden');
                tableViewBtn.classList.add('active-view');
                cardViewBtn.classList.remove('active-view');
                localStorage.setItem('reservationsViewPreference', 'table');
            }
        });
    </script>

    <style>
        /* Mobile responsive table styles */
        @media screen and (max-width: 768px) {
            #table-view table {
                border: 0;
            }

            #table-view table thead {
                border: none;
                clip: rect(0 0 0 0);
                height: 1px;
                margin: -1px;
                overflow: hidden;
                padding: 0;
                position: absolute;
                width: 1px;
            }

            #table-view table tr {
                border-bottom: 3px solid #ddd;
                display: block;
                margin-bottom: 0.625em;
                padding: 0.35em;
            }

            #table-view table td {
                border-bottom: 1px solid #ddd;
                display: block;
                font-size: 0.8em;
                text-align: right;
                padding-left: 50%;
                position: relative;
            }

            #table-view table td::before {
                content: attr(data-label);
                float: left;
                font-weight: bold;
                text-transform: uppercase;
            }
        }

        .active-view {
            background-color: #f3f4f6;
            font-weight: bold;
        }
    </style>
</x-app-layout>
