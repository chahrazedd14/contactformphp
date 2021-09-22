           <?php 

            $serveur = "localhost";
            $dbname = "chahrazesysoftrh";
            $user = "chahrazesysoftrh";
            $pass = "Sherashera26";
    
            $name=$_POST['name'];
            $email=$_POST['email'];
            $phone=$_POST['phone'];
            $Réferance=$_POST['Réfetance'];
            $title=$_POST['title'];
            
            try{
                //On se connecte à la BDD
 //On se connecte à la BDD
                $dbco = new PDO('mysql:host=chahrazesysoftrh.mysql.db;dbname=chahrazesysoftrh','chahrazesysoftrh','Sherashera26');
                $dbco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
                //On insère les données reçues si les champs sont remplis
                if(!empty($name)  && !empty($email) && !empty($phone)&& !empty($Réferance)&& !empty($title)){
                    $sth = $dbco->prepare("
                        INSERT INTO contactform(name, mail, Réferance)
                        VALUES(:name, :email, :phone, :Réferance :title,)");
                    $sth->bindParam(':name',$name);
                    $sth->bindParam(':email',$email);
                    $sth->bindParam(':phone',$phone);
                    $sth->bindParam(':Réferance',$Réferance);
                     $sth->bindParam(':title',$title);
                    $sth->execute();
                }
                
                //On récupère les infos de la table 
                $sth = $dbco->prepare("SELECT name, email, phone, Réferance, title  FROM contactform");
                $sth->execute();
                //On affiche les infos de la table
                $resultat = $sth->fetchAll(PDO::FETCH_ASSOC);
                $keys = array_keys($resultat);
                for($i = 0; $i < count($resultat); $i++){
                    $n = $i + 1;
                    echo 'Utilisateur n°' .$n. ' :<br>';
                    foreach($resultat[$keys[$i]] as $key => $value){
                        echo $key. ' : ' .$value. '<br>';
                    }
                    echo '<br>';
                }
            }   
            catch(PDOException $e){
                echo 'Impossible de traiter les données. Erreur : '.$e->getMessRéferance();
            }
<?