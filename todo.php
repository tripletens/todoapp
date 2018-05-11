<?php
    require('logic.php');
    $dbclass = new db();
    $checks = new checks();
    $add = isset($_POST['newitem']);
    //---------update

    $olditem = isset($_POST['olditem']);
    $newitem = isset($_POST['updateitem']);
    $checks->clean($newitem);
    $checks->clean($olditem);
    

    $each_item = 'name';

    //this holds the main algorithm for processing 

    // insert items
        if (isset($_POST['add'])) {
            if($checks->clean($add)){
                if(!$dbclass->name_exists($_POST['newitem'])) {
                    if($dbclass->db_insert($_POST['newitem'])){
                        echo('<script>alert("Item Successfully Added");</script>');
                    }else{
                            echo('<script>alert("Items not found");</script>');
                    }
                }else{
                            echo('<script>alert("Item already exist");</script>');
                    }
           } 
        }
    //
        if (isset($_POST['updatebtn'])){
            if ($dbclass->name_exists($_POST['olditem'])) {
                if($checks->clean($newitem) && $checks->clean($olditem)){
                    if($dbclass->db_update($_POST['updateitem'],$_POST['olditem'])){
                        echo('<script>alert("Items Successfully Updated");</script>');
                    }else{
                            echo('<script>alert("Items not found");</script>');
                    }
                }
            }else{
                    echo('<script>alert("Items not found");</script>');
            }
        }
            
            if (isset($_POST['delete'])) {
               if ($dbclass->name_exists($_POST['deleteitem'])) {
                    if($checks->empty($_POST['deleteitem'])){
                        if($dbclass->db_delete($_POST['deleteitem'])){
                            echo('<script>alert("Items Successfully Deleted");</script>');
                        }else{
                            echo('<script>alert("Could not Delete Item");</script>');
                        }
                    }else{
                        echo('<script>alert("Please Select an Item");</script>');
                    }   
               }
            }   
        // if($dbclass->db_fetch_assoc($each_item)){
        // foreach ($dbclass->db_fetch_assoc($each_item) as $name) {
        // }
    // }
   
?>
<html>
    <head>
        <title>tutorial_Class</title>
        <link rel="stylesheet" type="text/css" href="css/styles.css"/>
        <link rel="stylesheet" type="text/css" href="css/bootstrap.css"/>
        <link rel="stylesheet" type="text/css" href="css/w3.css"/>
        <script src="js/jquery.js"></script>
        <script src="bootstrap.min.js"></script>
        <script type="text/javascript">
           $(document).ready(function(){
            var adddiv = $('#adddiv');
            var addbtn = $('.addbtn');
            //update
             var updiv = $('#updiv');
            var upbtn = $('.upbtn');
            //delete
            var deldiv = $('#deldiv');
            var delbtn = $('.delbtn');

            adddiv.hide();
            addbtn.click(
                function(){
                    adddiv.slideToggle(1000)
                }
            );
            updiv.hide();
            upbtn.click(
                function(){
                    updiv.slideToggle(1000);
                });
            deldiv.hide();
            delbtn.click(
                function(){
                    deldiv.slideToggle(1000);
                });
            }); 


        </script>
    </head>
    <body>
       <?php 
            require('navbar.php');
        ?>
        <div class="jumbotron" style="height:90%;width:100%;margin-top:5%;">
            <h1 class="w3-text-teal w3-center " style="text-decoration:none;">TODO APP</h1>
            <div class="container-fluid w3-center" style="width:1000px;height:auto;font-size:24px; font-weight:bolder;">
                <h3>Lists of things To Do </h3>
                <form method="POST" action="todo.php">
                    <ul class="list-group ">
                        
                            <?php 
                                if ($dbclass->name_exists_all()) { 
                                    $result = $dbclass->db_select_all();
                                    while($row = mysqli_fetch_assoc($result)) {
                                        echo "<li class='list-group-item' style='height:auto;'>" . $row['name'].'</li>';
                                    }  
                                }
                            ?>
                            <span class="addbtn w3-btn btn-success pull-right w3-green w3-padding" name="add" > Add </span>
                            <!-- add item div -->
                            <div class="form-group container-fluid" id="adddiv" style="width:400px; w3-padding">
                                <h3 class="heading">Add New Item To Do</h3>
                                <div class="form-group">
                                    <input type="text" name="newitem" class="form-control" placeholder="Add New Item"/><br>
                                    <input type="submit" name="add" class="w3-btn w3-green btn-block btn-success">
                                </div>
                                <hr>
                            </div>

                            <span class="upbtn  pull-right  w3-btn w3-blue " name="update"> Update </span>
                            <!-- update item div  -->
                            <div class="form-group container-fluid" id="updiv" style="width:400px; w3-padding">
                                <h3 class="heading">Update Item To Do</h3>
                                <div class="form-group">
                                    <input type="text" name="olditem" class="form-control w3-input"  placeholder="Old Item"/>
                                    <br>
                                    <input type="text" name="updateitem" class="form-control w3-input"  placeholder="Update Item"/><br>
                                    <input type="submit" name="updatebtn" value="Update" class="w3-btn w3-blue btn-block btn-primary">
                                </div>
                            </div>

                            <span class="delbtn  w3-btn w3-red btn-danger pull-right" name="delete"> Delete </span> 
                            <!-- delete item -->
                            <div class="form-group container-fluid" id="deldiv" style="width:400px; w3-padding">
                                <h3 class="heading">Delete Item To Do</h3>
                                <div class="form-group">
                                   <select class="form-control" name="deleteitem">
                                       <option>-- Select An Item to Delete </option>
                                       <?php 

                                        $result = $dbclass->db_select_all();
                                        while($row = mysqli_fetch_assoc($result)) {
                                            echo "<option value='". $row['name'] . "'>" . $row['name'] . "</option>";
                                        }
                                                                    //call select method 
                                            //call the fetch assoc method
                                       ?>
                                      
                                   </select>
                                   <br>
                                    <input type="submit" name="delete" value="Delete Item" class="w3-btn w3-red btn-block btn-danger">
                                </div>
                            </div>
                    </ul>
                </form>
            </div>
            <br><br><br><br><br><br>
        </div>
        <?php require('footer.php');?>
    </body>

</html>