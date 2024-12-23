    @extends('user.Layout.Layout')
    @section('mainContent')
    <style>
        .input-field {
            width: 100%;
            padding: 12px;
            border: 1px solid #ddd;
            border-radius: 8px;
            margin-bottom: 10px;
        }
        
        .btn-primary {
            background-color: #3490dc;
            color: #fff;
            padding: 10px 20px;
            border-radius: 6px;
            transition: background-color 0.3s;
        }
        
        .btn-primary:hover {
            background-color: #2779bd;
        }
        
        .btn-success {
            background-color: #38c172;
            color: #fff;
            padding: 15px;
            border-radius: 8px;
        }
        
        .btn-success:hover {
            background-color: #2f9e4b;
        }
        </style>
        
    <main class="mt-11 bg-gray-100 min-h-screen">
        <section class="px-4 flex justify-center items-center py-10 bg-skin-primary text-white">
            <h1 class="text-5xl font-bold">Checkout</h1>
        </section>

        @if (auth()->check())
            @if (!empty($groupedCart))
            <section class="px-4 py-12">
                <div class="container mx-auto bg-white shadow-lg rounded-lg p-10">
                    <form action="{{ route('createOrder') }}" method="POST">
                        @csrf
                        @foreach ($groupedCart as $sellerId => $group)
                            <div class="mb-12 border-b pb-8">
                                <h2 class="text-3xl font-semibold text-skin-primary mb-4">{{ $group['seller_name'] }}</h2>
                                <p class="{{ $group['is_verified'] ? 'text-green-600' : 'text-red-600' }} font-medium">
                                    {{ $group['is_verified'] ? 'Verified Seller' : 'Unverified Seller' }}
                                </p>
                                <table class="w-full mt-6 mb-6 border-collapse border border-gray-200">
                                    <thead>
                                        <tr class="bg-gray-100 text-left">
                                            <th class="p-4">Product</th>
                                            <th class="p-4 text-center">Quantity</th>
                                            <th class="p-4 text-right">Price</th>
                                            <th class="p-4 text-right">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($group['items'] as $item)
                                        <tr class="border-b">
                                            <td class="p-4">{{ $item['name'] }}</td>
                                            <td class="p-4 text-center">{{ $item['quantity'] }}</td>
                                            <td class="p-4 text-right">Rs. {{ $item['price'] }}</td>
                                            <td class="p-4 text-right">
                                                <button 
                                                type="button" 
                                                class="btn-primary"
                                                onclick="openModal(
                                                    {
                                                        name: '{{ $item['name'] }}',
                                                        description: '{{ $item['description'] ?? 'No description available' }}',
                                                        price: {{ $item['price'] }},
                                                        quantity: {{ $item['quantity'] }}
                                                    }, 
                                                    {
                                                        bank_name: '{{ $group['paymentDetails']['bank_name'] ?? 'N/A' }}',
                                                        account_number: '{{ $group['paymentDetails']['account_number'] ?? 'N/A' }}',
                                                        account_title: '{{ $group['paymentDetails']['account_title'] ?? 'N/A' }}',
                                                        iban: '{{ $group['paymentDetails']['iban'] ?? 'N/A' }}',
                                                        swift_code: '{{ $group['paymentDetails']['swift_code'] ?? 'N/A' }}',
                                                        branch_address: '{{ $group['paymentDetails']['branch_address'] ?? 'N/A' }}'
                                                    }, 
                                                    '{{ $group['seller_name'] }}',
                                                    {{ $item['price'] * $item['quantity'] }}
                                                )">
                                                Payment Method
                                            </button>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @endforeach
                        <div class="bg-gray-50 p-8 rounded-lg mb-8 shadow-md">
                            <h3 class="text-2xl font-semibold mb-6 text-skin-primary">Billing Details</h3>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div>
                                    <label for="fullName" class="block mb-2">Full Name *</label>
                                    <input type="text" id="fullName" name="fullName" class="input-field" required value="{{ old('fullName', $user->fullName) }}">
                                </div>
                                <div>
                                    <label for="address" class="block mb-2">Address *</label>
                                    <input type="text" id="address" name="address" class="input-field" required value="{{ old('address', $user->address) }}">
                                </div>
                                <div>
                                    <label for="city" class="block mb-2">City *</label>
                                    <input type="text" id="city" name="city" class="input-field" required value="{{ old('city') }}">
                                </div>
                                <div>
                                    <label for="state" class="block mb-2">State *</label>
                                    <input type="text" id="state" name="state" class="input-field" required value="{{ old('state') }}">
                                </div>
                                <div>
                                    <label for="zip" class="block mb-2">Zip Code *</label>
                                    <input type="number" id="zip" name="zip" class="input-field" required value="{{ old('zip') }}">
                                </div>
                                <div>
                                    <label for="number" class="block mb-2">Phone *</label>
                                    <input type="text" id="number" name="number" class="input-field" required value="{{ old('number', $user->number) }}">
                                </div>
                                <div class="col-span-2">
                                    <label for="email" class="block mb-2">Email *</label>
                                    <input type="email" id="email" name="email" class="input-field" required value="{{ old('email', $user->Email) }}">
                                </div>
                            </div>
                        </div>

                        <button type="submit" class="btn-success w-full mt-8">Place Order</button>
                    </form>
                </div>
            </section>
            <style>
                /* General Modal Styling */
                .custom-modal {
                    position: fixed;
                    top: 0;
                    left: 0;
                    width: 100%;
                    height: 100%;
                    background-color: rgba(0, 0, 0, 0.8); /* Darker backdrop */
                    display: flex;
                    align-items: center;
                    justify-content: center;
                    z-index: 1000;
                    transition: opacity 0.3s ease-in-out;
                }
                
                .hidden1 {
                    display: none;
                    opacity: 0;
                    pointer-events: none;
                }
                
                .custom-modal-content {
                    background: linear-gradient(145deg, #ffffff, #f0f0f0); /* Subtle gradient background */
                    border-radius: 20px;
                    padding: 30px;
                    max-width: 800px;
                    width: 90%;
                    box-shadow: 0 15px 50px rgba(0, 0, 0, 0.5);
                    display: flex;
                    flex-wrap: wrap; /* For responsive design */
                    gap: 20px;
                    position: relative;
                    animation: fadeIn 0.4s ease;
                }
                
                /* Modal Sections */
                .modal-section {
                    flex: 1 1 45%;
                    padding: 10px;
                    font-family: 'Arial', sans-serif;
                }
                
                .modal-title {
                    font-size: 2rem;
                    font-weight: bold;
                    color: #333;
                    text-align: center;
                    margin-bottom: 20px;
                }
                
                .payment-details {
                    border-left: 4px solid #3490dc;
                    padding-left: 15px;
                    font-size: 0.9rem;
                }
                
                .payment-details p {
                    margin: 5px 0;
                    color: #555;
                }
                
                /* Receipt Upload Section */
                .upload-section {
                    margin-top: 10px;
                    text-align: center;
                }
                
                .upload-section input[type="file"] {
                    padding: 10px;
                    font-size: 0.9rem;
                    margin-bottom: 10px;
                }
                
                .upload-section label {
                    font-weight: bold;
                    margin-bottom: 5px;
                    display: block;
                }
                
                .upload-section button {
                    background: #3490dc;
                    color: white;
                    padding: 10px 20px;
                    border-radius: 10px;
                    cursor: pointer;
                    border: none;
                    transition: background-color 0.3s;
                }
                
                .upload-section button:hover {
                    background: #2779bd;
                }
                
                /* Receipt Section */
                .receipt-section {
                    background: #f5f5f5;
                    border: 2px dashed #ccc;
                    padding: 20px;
                    border-radius: 12px;
                    text-align: center;
                }
                
                .receipt-section p {
                    color: #888;
                }
                
                /* Right-Side Amount Section */
                .amount-section {
                    background: #eef7f9;
                    padding: 15px;
                    border-radius: 12px;
                    box-shadow: 0px 3px 10px rgba(0, 0, 0, 0.1);
                    text-align: center;
                }
                
                .amount-section h3 {
                    font-size: 1.5rem;
                    color: #3490dc;
                    margin-bottom: 10px;
                }
                
                .amount-section .amount-value {
                    font-size: 2rem;
                    font-weight: bold;
                    color: #333;
                }
                
                /* Close Button */
                .close-button {
                    position: absolute;
                    top: 15px;
                    right: 15px;
                    font-size: 1.5rem;
                    color: #999;
                    cursor: pointer;
                }
                
                .close-button:hover {
                    color: #ff4444;
                }
                
                /* Animations */
                @keyframes fadeIn {
                    from {
                        opacity: 0;
                        transform: scale(0.95);
                    }
                    to {
                        opacity: 1;
                        transform: scale(1);
                    }
                }
                </style>

    <!-- Modal Structure -->
    <div id="customModal" class="custom-modal hidden1">
        <div class="custom-modal-content">
            <span class="close-button" onclick="closeModal()">&times;</span>

            <!-- Product Details Section -->
            <div class="modal-section">
                <h3 class="modal-title">Product Details</h3>
                <div id="productDetails" class="payment-details">
                    <!-- Product details will be dynamically injected here -->
                </div>
            </div>

            <!-- Payment Details Section --> 
            <div class="modal-section">
                <h3 class="modal-title">Payment Details</h3>
                <div id="modalContent" class="payment-details">
                    <!-- Payment details will be dynamically injected here -->
                </div>
            </div>

            <!-- Warning for Unverified Seller -->
            <div id="unverifiedWarning" class="modal-section hidden1">
                <p class="text-red-600 font-bold">
                    Note: An Unverified seller cannot enable the COD option. The first product does not have COD enabled as the seller does not deal in COD.
                </p>
            </div>

            <!-- Right Side: Total Amount -->
            <div class="modal-section amount-section">
                <h3>Total Amount</h3>
                <p class="amount-value">Rs. <span id="totalAmount"></span></p>
            </div>

            <!-- Receipt Upload Section -->
            <div class="modal-section receipt-section">
                <h3>Upload Receipt</h3>
                <div class="upload-section">
                    <label for="receiptFile">Upload Receipt:</label>
                    <input type="file" id="receiptFile" accept=".jpg, .jpeg, .png, .pdf">
                    <button onclick="saveReceipt()">Upload</button>
                </div>
            </div>

            <!-- COD Option -->
            <div class="modal-section">
                <label>
                    <input type="checkbox" id="codOption" onclick="toggleReceiptUpload()"> Enable COD
                </label>
            </div>

            <!-- Proceed Button -->
            <div class="modal-section">
                <button id="proceed-button" class="btn-success w-full mt-4" disabled>Proceed to Cart</button>
            </div>
        </div>
    </div>

            @endif
        @endif
    </main>

    <!-- JavaScript for Modal Functionality -->
    <script>
    function openModal(productDetails, paymentDetails, sellerName, totalAmount, isVerifiedSeller) {
        const modal = document.getElementById('customModal');

        // Populate Product Details
        const productDetailsContainer = document.getElementById('productDetails');
        productDetailsContainer.innerHTML = `
            <p><strong>Product Name:</strong> ${productDetails.name || 'Unknown Product'}</p>
            <p><strong>Description:</strong> ${productDetails.description || 'No description available.'}</p>
            <p><strong>Price:</strong> Rs. ${productDetails.price || '0.00'}</p>
            <p><strong>Quantity:</strong> ${productDetails.quantity || '1'}</p>
        `;

        // Populate Payment Details
        const paymentDetailsContainer = document.getElementById('modalContent');
        paymentDetailsContainer.innerHTML = `
            <p><strong>Seller:</strong> ${sellerName || 'Unknown Seller'}</p>
            <p><strong>Bank Name:</strong> ${paymentDetails.bank_name || 'N/A'}</p>
            <p><strong>Account Number:</strong> ${paymentDetails.account_number || 'N/A'}</p>
            <p><strong>Account Title:</strong> ${paymentDetails.account_title || 'N/A'}</p>
            <p><strong>IBAN:</strong> ${paymentDetails.iban || 'N/A'}</p>
            <p><strong>SWIFT Code:</strong> ${paymentDetails.swift_code || 'N/A'}</p>
            <p><strong>Branch Address:</strong> ${paymentDetails.branch_address || 'N/A'}</p>
        `;

        // Show warning for unverified sellers
        const unverifiedWarning = document.getElementById('unverifiedWarning');
        if (!isVerifiedSeller) {
            unverifiedWarning.classList.remove('hidden1');
        } else {
            unverifiedWarning.classList.add('hidden1');
        }

        // Populate Total Amount
        document.getElementById('totalAmount').innerText = totalAmount || '0.00';

        // Show Modal
        modal.classList.remove('hidden1');
    }

    function closeModal() {
        document.getElementById('customModal').classList.add('hidden1');
    }

    function toggleReceiptUpload() {
        const codOption = document.getElementById('codOption');
        const receiptFile = document.getElementById('receiptFile');
        const proceedButton = document.getElementById('proceed-button');

        if (codOption.checked) {
            receiptFile.disabled = true;
        } else {
            receiptFile.disabled = false;
        }

        checkAllConditions();
    }

    function saveReceipt() {
        const receiptFile = document.getElementById('receiptFile').files[0];

        if (!receiptFile) {
            alert("Please upload a receipt.");
            return;
        }

        alert("Receipt uploaded successfully!");
        closeModal();
        checkAllConditions();
    }

    function checkAllConditions() {
        const proceedButton = document.getElementById('proceed-button');
        const codOption = document.getElementById('codOption');
        const receiptFile = document.getElementById('receiptFile');

        // Enable Proceed Button if COD is selected or Receipt is uploaded
        proceedButton.disabled = !(codOption.checked || receiptFile.files.length > 0);
    }

    </script>
    @endsection
