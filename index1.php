<html>
<head>
	<title>File Upload</title>
	<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<body>
<div class="container">
  <h2>Title</h2>
  <form method="post" enctype="multipart/form-data">
    <div class="form-group">
      <label for="title">Title:</label>
      <input type="text" class="form-control" id="title" placeholder="Create New Folder" name="title">
    </div>

    <div class="form-group">
      <label for="file">Upload File:</label>
      <input type="file" class="form-control" id="file"  name="file">
    </div>
    <button type="submit" class="btn btn-default">Submit</button>
  </form>
</div>
</form>

</body>
</html>


<?php
$DB_SERVER ="localhost";
$DB_USERNAME="root";
$DB_PASSWORD="";
$DB_NAME="test";


#connection string
$conn = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD,DB_NAME);

if (isset($_POST["submit"]))
{
    #retrieve file title
      $title = $_POST["title"];

    #file name with a random number so that similar don't get replaced
      $pname = rand(1000,10000)."-".$_FILES["file"]["name"];

    #temporary file name to store file
      $tname = $_FILES["files"]["tmp_name"];

    #upload directory path
      $uploads_dir = '/images;'
    #to move the uploaded file to specific location
      move_uploaded_file($tname, $uploads_dir.'/'.$pname);

    #sql query to insert into database
      $sql = "INSERT into fileup(title,image) VALUES('$title','$pname')";

      if(mysqli_query($conn,$sql))
      {
        echo ""File Uploaded";
      }
      else{
        echo "Error";
      }
}

?>

