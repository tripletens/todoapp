<?php
    class logic{
        public function questions(){
            $ans = array("a","b","a","d");
            for($i = 1; $i <= 5; $i++){
                if(!empty($_POST[$i])){
                    foreach($_POST[$i] as $option){
                        echo $i . "and " . $option;
                        if($option == $ans[$i]- 1){
                            echo $ans[$i];
                        }else{
                            //tell me that the ans for that question is wrong 
                            //although still implement the remaining 
                            //collect all the correct ans and the makes the person's score 

                        }
                    }
                }
            }
        }
        public function get_option(){

        }
        public function empty(){
            
        }
    }
    $logic_class = new logic();
    
  
?>
<html>
    <head>
        <title>tutorial_Class</title>
        <link rel="stylesheet" type="text/css" href="css/styles.css"/>
        <link rel="stylesheet" type="text/css" href="css/bootstrap.css"/>
        <link rel="stylesheet" type="text/css" href="css/w3.css"/>
        <script type="text/javascript">
            document.getElementById('results').style.display='none';
        </script>
    </head>
    <body>
       <?php require('navbar.php');?>
        <div style="height:90%;width:100%;margin:10%;">
            <h1 class="w3-text-teal w3-center">Exam Questions</h1>
            <br>
            <div class="w3-container w3-row" style="width:100%;">
                <form method="POST" action="index.php">
                       <div class="w3-quarter w3-green w3-margin">
                        <div class="w3-container" >
                            <h1>1. Which of the following is a wild animal?</h1>
                            <div class="form-group w3-xlarge">
                                A. Goat <input type="checkbox" id="1" name="1[]" value="a"/>
                                B. Ram <input type="checkbox" name="1[]" value="b"/>
                                C. Cow <input type="checkbox" name="1[]" value="c"/>
                                D. Leopard <input type="checkbox" name="1[]" value="d"/>
                            </div>
                        </div>
                        <div class="w3-container" >
                            <h1>2. Which of the following is a domestic animal?</h1>
                            <div class="form-group w3-xlarge">
                                A. Snake <input type="checkbox" id="2" name="2[]" value="a"/>
                                B. Lion <input type="checkbox" name="2[]" value="b"/>
                                C. Cow <input type="checkbox" name="2[]" value="c"/>
                                D. Leopard <input type="checkbox" name="2[]" value="d"/>
                            </div>
                        </div>
                    </div>
                    <div class="w3-quarter  w3-green w3-margin">
                        <div class="w3-container" >
                            <h1>3. Which of the following is a slow animal?</h1>
                            <div class="form-group w3-xlarge">
                                A. Snake <input type="checkbox" id="3" name="3[]" value="a"/>
                                B. Lion <input type="checkbox" name="3[]" value="b"/>
                                C. Snail<input type="checkbox" name="3[]" value="c"/>
                                D. Leopard <input type="checkbox" name="3[]" value="d"/>
                            </div>
                        </div>
                        <div class="w3-container" >
                            <h1>4. Which of the following is a fast animal?</h1>
                            <div class="form-group w3-xlarge">
                                A. Tortoise <input type="checkbox" id="4" name="4[]" value="a"/>
                                B. Milipede <input type="checkbox" name="4[]" value="b"/>
                                C. Snail<input type="checkbox" name="4[]" value="c"/>
                                D. Chettah <input type="checkbox" name="4[]" value="d"/>
                            </div>
                        </div>
                        <input type="Submit" class="w3-btn"  name="submit" value="Submit"/>
                    </div>
                </form>
             
                <div class="w3-quarter w3-green w3-padding w3-margin">
                    <p style="font-size:20px;">Results here <button class="w3-btn w3-right" id="show" onclick="document.getElementById('results').style.display='block';">Open</button></p>
                    <div id="results">
                        <p>All Results Show here</p>
                        <p>
                            <?php 
                                if(isset($_POST['submit'])){
                                    $logic_class->questions();
                                } 
                            ?>
                        </p>
                        <button class="w3-btn" onclick="document.getElementById('results').style.display='none'
                                        document.getElementById('show').style.display='block';">Close</button>
                    </div>                    
                </div>
         </div>
        </div>
        <?php require('footer.php');?>
    </body>
</html>