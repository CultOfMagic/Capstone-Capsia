<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Request</title>
    <link rel="stylesheet" href="Admin_Items_Request.css">
</head>

<body>
    <!-- Header Section -->
    <header>
        <div class="logosec">
            <img src="./img/logo.png" class="icn menuicn" id="menuicn" alt="menu-icon">
            <div class="logo">UCGS Inventory</div>
        </div>

        <div class="message">
            <div class="circle"></div>
            <img src="https://media.geeksforgeeks.org/wp-content/uploads/20221210183322/8.png" class="icn" alt="">
            <div class="dp">
                <img src="https://media.geeksforgeeks.org/wp-content/uploads/20221210180014/profile-removebg-preview.png" class="dpicn" alt="dp">
            </div>
        </div>
    </header>

    <!-- Main Container -->
    <div class="main-container">
        <!-- Navigation Sidebar -->
        <div class="navcontainer">
            <nav class="nav">
                <div class="nav-upper-options">
                    <div class="nav-option option1">
                        <img src="https://media.geeksforgeeks.org/wp-content/uploads/20221210182148/Untitled-design-(29).png" class="nav-img" alt="dashboard">
                        <h3> Dashboard</h3>
                    </div>

                    <div class="nav-option option2">
                        <img src="https://media.geeksforgeeks.org/wp-content/uploads/20221210183322/9.png" class="nav-img" alt="articles">
                        <h3> Items</h3>
                    </div>

                    <div class="nav-option option3">
                        <img src="https://media.geeksforgeeks.org/wp-content/uploads/20221210183320/5.png" class="nav-img" alt="report">
                        <h3> Request</h3>
                    </div>

                    <div class="nav-option option4">
                        <img src="https://media.geeksforgeeks.org/wp-content/uploads/20221210183321/6.png" class="nav-img" alt="institution">
                        <h3> Add Items</h3>
                    </div>

                    <div class="nav-option option5">
                        <img src="https://media.geeksforgeeks.org/wp-content/uploads/20221210183323/10.png" class="nav-img" alt="blog">
                        <h3> Report</h3>
                    </div>

                    <div class="nav-option option6">
                        <img src="https://media.geeksforgeeks.org/wp-content/uploads/20221210183320/4.png" class="nav-img" alt="settings">
                        <h3> Accounts</h3>
                    </div>

                    <div class="nav-option logout">
                        <img src="https://media.geeksforgeeks.org/wp-content/uploads/20221210183321/7.png" class="nav-img" alt="logout">
                        <h3>Logout</h3>
                    </div>
                </div>
            </nav>
        </div>

        <!-- Main Content -->
        <div class="main">
            <!-- Modal Pop-up -->
            <div id="popupModal" class="modal">
                <div class="modal-content">
                    <span class="close">&times;</span>
                    <p id="modalText">This is a pop-up message.</p>
                    <button id="confirmBtn">OK</button>
                </div>
            </div>

            <!-- Request List -->
            <div class="request-list">
                    <div class="request-item">
                      <div class="request-info">
                        <p>Puno, Item Borrow Request</p>
                        <span class="timestamp"></span>
                      </div>
                      <div class="buttons">
                        <button class="button approve">✔</button>
                        <button class="button reject">✖</button>
                        <button class="button view">View</button>
                      </div>
                    </div>
                  
                    <div class="request-item">
                      <div class="request-info">
                        <p>Melo, Item Return Request</p>
                        <span class="timestamp"></span>
                      </div>
                      <div class="buttons">
                        <button class="button approve">✔</button>
                        <button class="button reject">✖</button>
                        <button class="button view">View</button>
                      </div>
                    </div>
                  
                    <div class="request-item">
                      <div class="request-info">
                        <p>Gecolea, Item Return Request</p>
                        <span class="timestamp"></span>
                      </div>
                      <div class="buttons">
                        <button class="button approve">✔</button>
                        <button class="button reject">✖</button>
                        <button class="button view">View</button>
                      </div>
                    </div>
                  
                    <div class="request-item">
                      <div class="request-info">
                        <p>Chappell, Item Usage Request</p>
                        <span class="timestamp"></span>
                      </div>
                      <div class="buttons">
                        <button class="button approve">✔</button>
                        <button class="button reject">✖</button>
                        <button class="button view">View</button>
                      </div>
                    </div>
                  </div>
                
        
    <script src="admin_item_request.js"></script>
</body>
</html>