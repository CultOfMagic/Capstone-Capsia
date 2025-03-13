const signupBtn = document.getElementById("signup-btn");
const signinBtn = document.getElementById("signin-btn");
const mainContainer = document.querySelector(".container");

signupBtn.addEventListener("click", () => {
  mainContainer.classList.toggle("change");
});
signinBtn.addEventListener("click", () => {
  mainContainer.classList.toggle("change");
});

document.addEventListener("DOMContentLoaded", () => {
  const editButtons = document.querySelectorAll(".edit-btn");
  const modal = document.getElementById("editModal");
  const cancelButton = document.getElementById("cancelButton");
  const confirmButton = document.getElementById("confirmButton");

  console.log("Script loaded successfully"); // Debug log

  editButtons.forEach((button) => {
      button.addEventListener("click", (event) => {
        console.log("Edit button clicked"); // Debug log
          const row = event.target.closest("tr");
          const userId = row.children[0].textContent;
          const accountName = row.children[1].textContent;
          const email = row.children[2].textContent;

          // Populate modal fields
          document.getElementById("userId").value = userId;
          document.getElementById("accountName").value = accountName;
          document.getElementById("email").value = email;

          // Show the modal
          modal.style.display = "block";
      });
  });

  cancelButton.addEventListener("click", () => {
      modal.style.display = "none";
  });

  confirmButton.addEventListener("click", () => {
      // Handle confirm logic (e.g., form submission)
      modal.style.display = "none";
  });

  window.addEventListener("click", (event) => {
      if (event.target === modal) {
          modal.style.display = "none";
      }
  });
});

const confirmButton = document.getElementById('confirmButton');
const successPopup = document.getElementById('successPopup');
const goBackButton = document.getElementById('goBackButton');

confirmButton.addEventListener('click', () => {
  // Simulate successful account edit (replace with your actual logic)
  // ...

  // Show the success popup
  successPopup.style.display = 'block'; 
});

goBackButton.addEventListener('click', () => {
  // Hide the success popup
  successPopup.style.display = 'none'; 
  // Optionally, you can close the edit modal here
});

document.addEventListener("DOMContentLoaded", () => {
  const deleteButtons = document.querySelectorAll(".delete-btn");
  const confirmationPopup = document.getElementById("confirmationPopup");
  const confirmDeleteButton = document.getElementById("confirmDelete");
  const cancelDeleteButton = document.getElementById("cancelDelete");
  const successDeletePopup = document.getElementById("sccssDelPopup");
  const goBackButton2 = document.getElementById("goBackButton2");

  deleteButtons.forEach((button) => {
    button.addEventListener("click", () => {
      confirmationPopup.style.display = "block"; 
    });
  });

  cancelDeleteButton.addEventListener("click", () => {
    confirmationPopup.style.display = "none";
  });

  confirmDeleteButton.addEventListener("click", () => {
    // Simulate successful account deletion (replace with your actual deletion logic)
    // ...

    confirmationPopup.style.display = "none"; 
    successDeletePopup.style.display = "block"; 
  });

  goBackButton2.addEventListener("click", () => {
    successDeletePopup.style.display = "none";
  });
});

const acceptButtons = document.querySelectorAll('.accept-btn'); // Select buttons with class 'accept-btn'
const acceptPopup = document.getElementById('acceptPopup');
const goBackButton3 = document.getElementById('goBackButton3');

acceptButtons.forEach(button => {
  button.addEventListener('click', () => {
    // Simulate successful account edit (replace with your actual logic)
    // ...

    // Show the success popup
    acceptPopup.style.display = 'block';
  });
});

goBackButton3.addEventListener('click', () => {
  // Hide the success popup
  acceptPopup.style.display = 'none';
  // Optionally, you can close the edit modal here
});