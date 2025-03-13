// Open Add Modal
function openAddModal() {
  document.getElementById('addModal').style.display = 'block';
}

// Close Add Modal
function closeAddModal() {
  document.getElementById('addModal').style.display = 'none';
}

// Open Edit Modal
function openEditModal(userId) {
  // Fetch account details and populate the form
  fetch(`get_account_details.php?userId=${userId}`)
      .then(response => response.json())
      .then(data => {
          document.getElementById('editUserId').value = data.userId;
          document.getElementById('editAccountName').value = data.accountName;
          document.getElementById('editEmail').value = data.email;
          document.getElementById('editRole').value = data.role;
          document.getElementById('editMinistry').value = data.ministry;
          document.getElementById('editModal').style.display = 'block';
      });
}

// Close Edit Modal
function closeEditModal() {
  document.getElementById('editModal').style.display = 'none';
}

// Open Delete Modal
function openDeleteModal(userId) {
  document.getElementById('deleteUserId').value = userId;
  document.getElementById('deleteModal').style.display = 'block';
}

// Close Delete Modal
function closeDeleteModal() {
  document.getElementById('deleteModal').style.display = 'none';
}

// Toggle Password Visibility
function togglePasswordVisibility() {
  const passwordInput = document.getElementById('password');
  if (passwordInput.type === 'password') {
      passwordInput.type = 'text';
  } else {
      passwordInput.type = 'password';
  }
}

// Function to show the success popup (for editing)
function showSuccessPopup() {
  const successPopup = document.getElementById('successPopup');
  successPopup.style.display = 'flex'; // Show the popup
}

// Function to hide the success popup
function hideSuccessPopup() {
  const successPopup = document.getElementById('successPopup');
  successPopup.style.display = 'none'; // Hide the popup
}

// Function to show the delete confirmation popup
function showDeleteConfirmationPopup(userId) {
  const confirmationPopup = document.getElementById('confirmationPopup');
  confirmationPopup.style.display = 'flex'; // Show the popup

  // Set the userId for deletion
  document.getElementById('deleteUserId').value = userId;

  // Handle the "OK" button click
  document.getElementById('confirmDelete').onclick = function () {
      document.getElementById('deleteForm').submit(); // Submit the delete form
      hideDeleteConfirmationPopup(); // Hide the confirmation popup
  };

  // Handle the "CANCEL" button click
  document.getElementById('cancelDelete').onclick = function () {
      hideDeleteConfirmationPopup(); // Hide the confirmation popup
  };
}

// Function to hide the delete confirmation popup
function hideDeleteConfirmationPopup() {
  const confirmationPopup = document.getElementById('confirmationPopup');
  confirmationPopup.style.display = 'none'; // Hide the popup
}

// Function to show the delete success popup
function showDeleteSuccessPopup() {
  const deleteSuccessPopup = document.getElementById('sccssDelPopup');
  deleteSuccessPopup.style.display = 'flex'; // Show the popup
}

// Function to hide the delete success popup
function hideDeleteSuccessPopup() {
  const deleteSuccessPopup = document.getElementById('sccssDelPopup');
  deleteSuccessPopup.style.display = 'none'; // Hide the popup
}

// Event listeners for "Go Back" buttons
document.getElementById('goBackButton').onclick = function () {
  hideSuccessPopup(); // Hide the success popup
  window.location.reload(); // Reload the page
};

document.getElementById('goBackButton2').onclick = function () {
  hideDeleteSuccessPopup(); // Hide the delete success popup
  window.location.reload(); // Reload the page
};

// Function to handle successful form submissions (e.g., edit or delete)
function handleFormSubmission(event) {
  event.preventDefault(); // Prevent the default form submission

  // Simulate a successful submission (replace with actual form submission logic)
  setTimeout(() => {
      if (event.target.id === 'editForm') {
          showSuccessPopup(); // Show the edit success popup
      } else if (event.target.id === 'deleteForm') {
          showDeleteSuccessPopup(); // Show the delete success popup
      }
  }, 1000);
}

// Check for query parameters on page load
window.onload = function () {
  const urlParams = new URLSearchParams(window.location.search);
  const successType = urlParams.get('success');

  if (successType === 'edit') {
      showSuccessPopup(); // Show the edit success popup
  } else if (successType === 'delete') {
      showDeleteSuccessPopup(); // Show the delete success popup
  }
};

// Automatically submit the sort form when the dropdown changes
document.getElementById('sortForm').addEventListener('change', function () {
  this.submit();
});

// Automatically submit the search form when the search button is clicked
document.getElementById('searchForm').addEventListener('submit', function (e) {
  e.preventDefault(); // Prevent default form submission
  const searchQuery = document.querySelector('input[name="search"]').value;
  window.location.href = `Accounts.php?search=${encodeURIComponent(searchQuery)}`;
});

// Attach form submission handlers
document.getElementById('editForm').onsubmit = handleFormSubmission;
document.getElementById('deleteForm').onsubmit = handleFormSubmission;
