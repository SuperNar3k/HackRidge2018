<!DOCTYPE HTML>
<?php 
    session_start();
    include "database.php";
    include "loginCheck.php";
    
?>
<html>
    <head>

        <title>LPNHS - My Profile</title>
        
        <link rel="stylesheet" href="baseCSS.css">
        <style>
            #ProfileDataDiv p{
                text-align: left;
                display: inline-block;
            }
            #ProfileDataDiv input{text-align: center;}
            #ProfileDataDiv button{margin: 10px;}
            div.dashboardButton{
                text-align: center;
                margin: 30px 10%;
                border: 3px solid white;
                border-radius: 10px;
                
                /* Adjust Text */
                font-size: 28px;
                align-items: center;
                justify-content: center;
                
                /* Color */
                background-color: white;
                color: #005da3;
            }
            div.dashboardButton:hover {
                background-color: transparent;
                border-color: white;
                color: white;
            }
            div.dashboardButton p{margin: 5px;}
            #eventsPanel{padding: 0;}
            table tr:nth-child(even){background-color: #e8cfa4;}
            #eventsPanel div{
                border-top-left-radius: 15px;
                border-top-right-radius: 15px;
            }
            #tabs{background-color: #e8cfa4; /*darkened moccasin*/}
            #tabs div{
                display: inline-block;
                margin: 0;
                width: calc(50% - 2px);
                background-color: #ffebcd; /*blanched almond*/
            }
            #tabs div.inactive{background-color: #e8cfa4; /*darkened moccasin*/}
            #informationContainer{padding: 10px;}
            table{width: 100%;}
            th, td{
                font-family: Bookman, sans-serif;
                font-size: 18px;
                text-align: center;
            }
            #informationContainer div table th, td{width: 33.33%;}
        </style>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <script src="headerJQuery.js"></script>
        <script>
            $(document).ready(function(){
                $("#myProfileLink").addClass("active");

                $("#adminDashboardButton").click(function(){
                    window.location.href = "admin-dashboard.php";
                });
            });
        </script>
    </head>

    <header id = "header"><?php include "header.php"; ?></header>
        
    <body> 
        <div id = "footerPusher">

        <img id = "fixedBGImg" src = "https://www.nhs.us/assets/images/nhs/NHS_header_logo.png"><!--Fixed Image in Background-->

            <!--Include Admin Dashboard link-->
            <?php 

                // Pulling data from "students" for current user

                    $sql = "SELECT * FROM students WHERE StudentID=:studentID";
                    $stmt = $pdo->prepare($sql);
                    $stmt->execute(["studentID" => $_SESSION["StudentID"]]);
                    $data = $stmt->fetch(PDO::FETCH_OBJ);


                // If users "Position" : admin -> admin dashboard
                
                    if($data->Position!=="Student"):
                        echo '<div id = "adminDashboardButton" class = "dashboardButton">
                            <p>Admin Dashboard</p>
                            </div>';
                    endif;
            ?>

            <div class = "classic panel">
                <p>My Information</p>
                <!--View only data-->
                <table id = "profileDataTable">
                    <tr>
                        <th>Name</th>
                        <th>Hours Volunteered</th>
                        <th>Vice President</th>
                    </tr>
                    <tr>
                        <td><?php echo $data->FirstName, ' ', $data->LastName;?></td>
                        <td><?php echo $data->HoursCompleted;?></td>
                        <td><?php echo $data->VicePresident;?></td>
                    </tr>
                </table>
            </div>

            <div id = "eventsPanel" class = "classic panel">
                <div id = "informationContainer">
                    <p>My Event History</p>
                    <div id = "eventHistory">
                        <table id = "eventHistoryTable">
                            <tr>
                                <th>Event Name</th>
                                <th>Date</th>
                                <th>Location</th>
                            </tr>
                            <!--Load data-->                    
                            <script>
                                $(document).ready(function(){
                                    $("#eventHistoryTable").load("myEventsGetter.php?history=true");
                                });
                            </script>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </body>
        
    <footer id = "footer"><?php include 'footer.php';?></footer>

</html>