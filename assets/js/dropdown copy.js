// Parent dropdown for status
document.querySelector('.staDropdown-input').addEventListener('click', function() {
  this.closest('.staDropdown').classList.toggle('open');
});

document.querySelectorAll('.staDropdown-content a').forEach(item => {
  item.addEventListener('click', function(e) {
    e.preventDefault();
    var selectedValue = this.textContent;
    var input = this.closest('.staDropdown').querySelector('.staDropdown-input');
    input.value = selectedValue;  // Set selected value to the input box
    this.closest('.staDropdown').classList.remove('open');  // Close the dropdown
    console.log('Selected value:', selectedValue);  // You can handle the value here
  });
});

// Parent dropdown for sort
document.querySelector('.sortDropdown-input').addEventListener('click', function() {
  this.closest('.sortDropdown').classList.toggle('open');
});

document.querySelectorAll('.sortDropdown-content a').forEach(item => {
  item.addEventListener('click', function(e) {
    e.preventDefault();
    var selectedValue = this.textContent;
    var input = this.closest('.sortDropdown').querySelector('.sortDropdown-input');
    input.value = selectedValue;  // Set selected value to the input box
    this.closest('.sortDropdown').classList.remove('open');  // Close the dropdown
    console.log('Selected value:', selectedValue);  // You can handle the value here
  });
});

// Dropdown for Sorting
document.querySelector('.sortDrop-input').addEventListener('click', function() {
  this.closest('.sortDrop').classList.toggle('open');
});

document.querySelectorAll('.sortDrop-content a').forEach(item => {
  item.addEventListener('click', function(e) {
    e.preventDefault();
    var selectedValue = this.textContent;
    var input = this.closest('.sortDrop').querySelector('.sortDrop-input');
    input.value = selectedValue;  // Set selected value to the input box
    this.closest('.sortDrop').classList.remove('open');  // Close the dropdown
    console.log('Selected value:', selectedValue);  // You can handle the value here
  });
});


//Toggle show/hide dropdown when report button is clicked
function myFunction() {
  document.getElementById("myDropdown").classList.toggle("show");
}

// Close the dropdown menu if the user clicks outside of it
window.onclick = function(event) {
  if (!event.target.matches('.option5') && !event.target.matches('.another-class')) {
    var dropdowns = document.getElementsByClassName(".dropbtn");
    var i;
    for (i = 0; i < dropdowns.length; i++) {
      var openDropdown = dropdowns[i];
      if (openDropdown.classList.contains('show')) {
        openDropdown.classList.remove('show');
      }
    }
  }
}