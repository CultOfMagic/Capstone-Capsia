async function loadRequests() {
    const response = await fetch('Item_CRUD.php'); // Fetch requests from PHP
    const requests = await response.json();

    const requestList = document.querySelector('.request-list');
    requestList.innerHTML = ''; // Clear existing requests

    requests.forEach(request => {
        const requestItem = document.createElement('div');
        requestItem.className = 'request-item';
        requestItem.innerHTML = `
            <div class="request-info">
                <p>${request.userName}, ${request.type} Request</p>
                <span>${new Date(request.timestamp).toLocaleString()}</span>
            </div>
            <div class="buttons">
                <button class="button approve" data-id="${request.id}">✔</button>
                <button class="button reject" data-id="${request.id}">✖</button>
                <button class="button view" data-id="${request.id}">View</button>
            </div>
        `;
        requestList.appendChild(requestItem);
    });

    // Attach event listeners for approve/reject/view buttons
    document.querySelectorAll('.approve').forEach(button => {
        button.addEventListener('click', () => handleApprove(button.dataset.id));
    });

    document.querySelectorAll('.reject').forEach(button => {
        button.addEventListener('click', () => handleReject(button.dataset.id));
    });

    document.querySelectorAll('.view').forEach(button => {
        button.addEventListener('click', () => handleView(button.dataset.id));
    });
}

async function handleApprove(requestId) {
    const response = await fetch('Item_CRUD.php?action=approve', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
        },
        body: JSON.stringify({ requestId }),
    });
    const result = await response.json();
    alert(result.message);
    loadRequests(); // Refresh the list
}

async function handleReject(requestId) {
    const response = await fetch('Item_CRUD.php?action=reject', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
        },
        body: JSON.stringify({ requestId }),
    });
    const result = await response.json();
    alert(result.message);
    loadRequests(); // Refresh the list
}

async function handleView(requestId) {
    const response = await fetch(`Item_CRUD.php?action=view&requestId=${requestId}`);
    const requestDetails = await response.json();
    alert(`Details: ${JSON.stringify(requestDetails)}`);
}

// Load requests when the page loads
document.addEventListener('DOMContentLoaded', loadRequests);