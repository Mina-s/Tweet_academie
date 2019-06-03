  


<?php require_once ('../controleur/search.php')?>



        <div>
                <form class="form-inline md-form mr-auto mb-4"  method="post" id="search_form" action="search.php">
                    <input class="form-control mr-sm-2" type="text" name="search" id="search_content">

                    <button class="btn aqua-gradient btn-rounded btn-sm my-0" type="submit" name="s" value ="Rechercher">Search</button>
                 </form>
            </div>   

            <div class="panel-body">
                        <span id="search_get"></span>
                        <!-- <?php var_dump($result);foreach($result as $row)?> -->
                        <div class="row">
                        <div class = "col-md-4">
                        <?php '<img src="../assets/membres/avatar/'.$row->avatar.'" class="img-thumbnail" width="150" />';?></div>
                        
                           
             </div>  