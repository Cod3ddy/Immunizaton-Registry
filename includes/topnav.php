<!-- top navigation bar -->
<div class="top-navigation-bar">
    <div class="top-nav-title">
        <div class="top-nav-logo">
            <img src="../assets/imgs/logo.png" alt="logo" />
            <h3>IRIS</h3>
        </div>
        <div class="toggle-side-nav-bar">
            <i class="bi bi-list"></i>
        </div>
    </div>
    <!-- left side top nav -->
    <form class="top-nav-left" action="#" method="get">
        <input type="text" placeholder="Search" name="search" />
        <button type="submit"><i class="fa fa-search"></i></button>
    </form>

    <!-- right side top nav-->
    <div class="top-nav-right">
        <i class="bi bi-bell"></i>
        <i class="bi bi-chat-left-text"></i>
        <div class="profile-tab">
            <img src="../assets/imgs/cat.jpg" alt="" />
            <p> <?php 
            if(isset($_SESSION['userType'])){
                $userType = $_SESSION["userType"];
                     if($userType === "provider"){
                        echo $userType;
                    }else if ($userType === "admin"){
                        echo $userType;
                    }else if ($userType === "patient"){
                        echo $userType;
                    }       
            }
            ?><i class="bi bi-caret-down-fill"></i></p>
            <div id="dropdown-menu" class="dropdown-menu">
                <!-- start session -->
                <div class="full-name">
                    <?php
                        if(isset($_SESSION['userType'])){
                            $userType = $_SESSION["userType"];
                            if($userType === "provider"){
                                echo $userType;
                            }else if ($userType === "admin"){
                                echo $userType;
                            }else if ($userType === "patient"){
                                echo $userType;
                            }
                        }
                    ?>
                </div>
                <div class="dropdown-links">
                    <div class="dropdown-link-item">
                        <a href="#"><i class="bi bi-person"></i>My Profile</a>
                    </div>
                    <div class="dropdown-link-item">
                        <a href="#"><i class="bi bi-question-circle"></i>Need Help?</a>
                    </div>
                    <div class="dropdown-link-item">
                        <a href="#"><i class="bi bi-box-arrow-right"></i>Sign Out</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>