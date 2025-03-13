
<?php
// create database but no display of progress on main page
ob_start();
include 'createTable.php';
ob_end_clean();

$host = 'localhost';
$username = 'root';
$password = '';
$dbname = 'reports';

$conn = new mysqli($host, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT itemNo, lastUpdated, modelNo, itemName, itemDescription, itemCategory,itemLocation, expiration, brand, supplier, pricePerItem, qty, unit, reorderPoint FROM inventoryItems";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventory Summary Report</title>
    <link rel="stylesheet" href="Admin_ReportIS.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.4.0/jspdf.umd.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.5.25/jspdf.plugin.autotable.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.18.5/xlsx.full.min.js"></script> 
</head>

<body>
    
    <!-- for header part -->
    <header>
        <div class="logosec"><img src="./assets/img/Logo.png"
                            class="icn menuicn" 
                            id="menuicn" 
                            alt="menu-icon">
            <div class="logo">UCGS Inventory</div>
        </div>

        <div class="searchbar">
            <input type="text" id="search" placeholder="Search">
            <div class="searchbtn">
              <img src=
"https://media.geeksforgeeks.org/wp-content/uploads/20221210180758/Untitled-design-(28).png"
                    class="icn srchicn" 
                    alt="search-icon">
              </div>
        </div>

        <div class="message">
            <div class="circle"></div>
            <img src=
"https://media.geeksforgeeks.org/wp-content/uploads/20221210183322/8.png" 
                 class="icn" 
                 alt="">
            <div class="dp">
              <img src=
"https://media.geeksforgeeks.org/wp-content/uploads/20221210180014/profile-removebg-preview.png"
                    class="dpicn" 
                    alt="dp">
              </div>
        </div>
    </header>

    <div class="main-container">
        <div class="navcontainer">
            <nav class="nav">
                <div class="nav-upper-options">
                    <div class="nav-option option1">
                        <a href="Admin_Dashboard.php">
                        <img src=
"https://media.geeksforgeeks.org/wp-content/uploads/20221210182148/Untitled-design-(29).png"
                            class="nav-img" 
                            alt="dashboard">
                        <h3> Dashboard</h3>
                        </a>
                    </div>
                    <div class="option2 nav-option">
                        <a href="Admin_Items.php">
                        <img src=
"https://media.geeksforgeeks.org/wp-content/uploads/20221210183322/9.png"
                            class="nav-img" 
                            alt="articles">
                        <h3> Items</h3>
                        </a>
                    </div>
                    <div class="nav-option option5" onclick="myFunction()" >
                        <div class="dropbtn" class="dropdown" >
                            <img src="https://media.geeksforgeeks.org/wp-content/uploads/20221210183323/10.png"
                                class="nav-img" 
                                alt="blog">
                            <h3> Report</h3>
                            <div id="myDropdown" class="dropdown-content">
                                <a href="Admin_Report_InventorySummary.html">Inventory Summary</a>
                                <a href="Admin_Report_TransactionHistory.html">Transaction History</a>
                            </div>
                        </div>
                    </div>
                    <div class="nav-option option6">
                        <a href="Admin_Accounts.php">
                        <img src=
"https://media.geeksforgeeks.org/wp-content/uploads/20221210183320/4.png"
                            class="nav-img" 
                            alt="settings">
                        <h3> Accounts</h3>
                        </a>
                    </div>
                    <div class="nav-option logout">
                        <img src=
"https://media.geeksforgeeks.org/wp-content/uploads/20221210183321/7.png"
                            class="nav-img" 
                            alt="logout">
                        <h3>Logout</h3>
                    </div>

                </div>
            </nav>
        </div>

        <div class="main">
            <div class="headings">
                <h2>Inventory Summary</h2>
                <div class="sortDrop">
                <label for="sort">Sort</label>
                <input type="text" id="sort" class="sortDrop-input" placeholder="Sort by" readonly />
                    <span class="sortDrop-arrow">&#9660;</span>
                    <div class="sortDrop-content">
                        <a href="#" data-value="itemNo">Item No.</a>
                        <a href="#" data-value="updateDate">Last Updated</a>
                        <a href="#" data-value="modelNo">Model No.</a>
                        <a href="#" data-value="items">Item</a>
                        <a href="#" data-value="itemDesc">Item Description</a>
                        <a href="#" data-value="itemCat">Item Category</a>
                        <a href="#" data-value="supplierName">Supplier</a>
                        <a href="#" data-value="pricePerItem">Price/Item</a>
                        <a href="#" data-value="quantity">Quantity</a>
                        <a href="#" data-value="unit">Unit</a>
                        <a href="#" data-value="status">Status</a>
                      </div>
                </div>
                <div class="filterDrop">
                    <label for="filter">Filter</label>
                    <input type="text" id="filter" class="filterDrop-input" placeholder="Filter by" readonly />
                        <span class="filterDrop-arrow">&#9660;</span>
                        <div class="filterDrop-content">
                          <a href="#" data-value="consumable">Consumable</a>
                          <a href="#" data-value="nonConsumable">Non-Consumable</a>
                          <a href="#" data-value="supplier">Supplier</a>
                          <a href="#" data-value="inStock">In Stock</a>
                          <a href="#" data-value="borrowed">Borrowed</a>
                          <a href="#" data-value="used">Used</a>
                          <a href="#" data-value="damaged">Damaged</a>
                          <a href="#" data-value="donated">Donated</a>
                        </div>
                    </div>
                <div class="topButton">
                    <button onclick="exportToExcel()">DOWNLOAD AS XLSX</button>
                    <button onclick="exportToPDF()">DOWNLOAD AS PDF</button>
                </div>
            </div>

            <!-- Item No.|Last Updated|Model No.|Item Name|Item Description|Item Category||Item Location|Expiration|Brand|Supplier|Price/Item(Php)|Quantity|Unit|Status|Edit -->
            <div id="invenTbl" class="table-container">
                <table id="invenTable">
                    <thead>
                        <tr>
                            <th>Item No.</th>
                            <th>Last Updated</th>
                            <th>Model No.</th>
                            <th>Item Name</th>
                            <th>Item Description</th>
                            <th>Item Category</th>
                            <th>Item Location</th>
                            <th>Expiration</th>
                            <th>Brand</th>
                            <th>Supplier</th>
                            <th>Price/Item(Php)</th>
                            <th>Quantity</th>
                            <th>Unit</th>
                            <th>Status</th>
                            <th>Edit</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                    if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {

                        $itemNo = $row["itemNo"];
                        $lastUpdated = $row["lastUpdated"];
                        $modelNo = $row["modelNo"];
                        $itemName = $row["itemName"];
                        $itemDescription = $row["itemDescription"];
                        $itemCategory = $row["itemCategory"];
                        $itemLocation = $row["itemLocation"];
                        $expiration = $row["expiration"];
                        $brand = $row["brand"];
                        $supplier = $row["supplier"];
                        $pricePerItem = $row["pricePerItem"];
                        $qty = $row["qty"];
                        $unit = $row["unit"];
                        $reorderPoint = $row["reorderPoint"];

                        if ($qty == 0) {
                            $status = 'Out of Stock';
                            $status_class = 'out-of-stock';
                        } elseif ($qty <= $reorderPoint) {
                            $status = 'For Restock';
                            $status_class = 'restock';
                        } else {
                            $status = 'In Stock';
                            $status_class = 'in-stock';
                        }

                        echo "<tr>";
                        echo "<td>" . $itemNo . "</td>";
                        echo "<td>" . $lastUpdated . "</td>";
                        echo "<td>" . $modelNo . "</td>";
                        echo "<td>" . $itemName . "</td>";
                        echo "<td>" . $itemDescription . "</td>";
                        echo "<td>" . $itemCategory . "</td>";
                        echo "<td>" . $itemLocation . "</td>";
                        echo "<td>" . $expiration . "</td>";
                        echo "<td>" . $brand . "</td>";
                        echo "<td>" . $supplier . "</td>";
                        echo "<td>" . $pricePerItem . "</td>";
                        echo "<td>" . $qty . "</td>";
                        echo "<td>" . $unit . "</td>";
                        echo "<td class='$status_class'>" . $status . "</td>"; // Add class for status column
                        echo "<td><button>Button</button></td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='10'>No records found</td></tr>";
                }
                ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script>
        //Dropdown for Report navbar
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

        // Dropdown for Sorting
        document.querySelectorAll('.sortDrop-input, .filterDrop-input').forEach(input => {
        input.addEventListener('click', function () {
            const closestDropdown = this.closest('.sortDrop') || this.closest('.filterDrop');
            if (closestDropdown) {
            closestDropdown.classList.toggle('open');
            }
        });
        });

        // Add event listeners to dropdown content items
        document.querySelectorAll('.sortDrop-content a, .filterDrop-content a').forEach(item => {
        item.addEventListener('click', function (e) {
            e.preventDefault(); // Prevent default link behavior

            const selectedValue = this.textContent;
            const closestDropdown = this.closest('.sortDrop') || this.closest('.filterDrop');

            if (closestDropdown) {
                const input = closestDropdown.querySelector('.sortDrop-input, .filterDrop-input');
            if (input) {
                input.value = selectedValue; // put selected value to the input box
            }
            closestDropdown.classList.remove('open'); // dropdown close
            }

        console.log('Selected value:', selectedValue); // logging the choice
        });
        });
    </script>
    <script src="./invenSummaryDownload.js"></script>
</body>
</html> 